<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use PhpParser\Node\Stmt\Return_;
use Yajra\DataTables\Facades\DataTables;


class CategoryController extends Controller
{
    protected $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function getCategoriesDataTable() {
        $data = Category::select('*')->with('parent');
        $response = 1;
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                if (auth()->user()->can('viewAny', $this->setting)){
                return $btn = '
                <a class="edit btn btn-success btn-sm" href=" ' . Route('dashboard.category.edit', $row->id) . ' " ><i class="fa fa-edit"></i></a>
                <a id="deletBtn" data-id="' .$row->id . '"class="edit btn btn-danger btn-sm" data-toggle="modal"
                data-target="#deletemodal"><i class="fa fa-trash"></i></a>';
                }
    })
            ->addColumn('parent', function($row){
                // return ($row->parent == 0) ? trans('words.mainContent') : $row->parent->translate(app()->getLocale())->title ;
                if ($row->parent == 0) {
                    return trans('words.mainContent');
                }else{
                    // return "bigger than zero";
                    return Category::find($row->parent)->title;
                    // return $row->parent->translate(app()->getLocale())->title;
                }
            })
            ->addColumn('title', function($row){
                return $row->translate(app()->getLocale())->title;
            })
            ->addColumn('status' , function($row){
                return $row->status == null ? __('words.notActive') : __('words.' . $row->status);
            })
            ->rawColumns(['action', 'status', 'title'])
            ->make(true);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('viewAny', $this->setting);
        // $categories = Category::all();
        $categories = Category::where('parent', 0)->get();

        return view('dashboard.categories.add')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->has('img')) {
            $fileName = time().'.'.$request->img->getClientOriginalExtension();
            $request->img->move(public_path('dashboard/uploads/'), $fileName);
            $data['image'] = 'dashboard/uploads/'.$fileName ;
        }

        Category::create($data);
        return redirect()->back()->with('success','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::where('parent', 0)->get();
        return view('dashboard.categories.edit',compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        if ($request->has('img')) {
            $fileName = time().'.'.$request->img->getClientOriginalExtension();
            $request->img->move(public_path('dashboard/uploads/'), $fileName);
            $category->update(['image'=>'dashboard/uploads/'.$fileName]) ;
        }


        return redirect()->route('dashboard.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function delete(Request $request){
        Category::where('parent',$request->id)->delete();
        Category::where('id',$request->id)->delete();
        return redirect()->back();
    }

}
