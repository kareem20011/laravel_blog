<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PostsController extends Controller
{

    use FileUpload;

    public function getPostsDataTable(){
        $data = Post::select('*')->with('category');
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                return $btn = '
                <a class="edit btn btn-success btn-sm" href=" ' . Route('dashboard.posts.edit', $row->id) . ' " ><i class="fa fa-edit"></i></a>
                <a id="deletBtn" data-id="' .$row->id . '"class="edit btn btn-danger btn-sm" data-toggle="modal"
                data-target="#deletemodal"><i class="fa fa-trash"></i></a>';
            })
            ->addColumn('category', function($row){
                return $row->category->translate(app()->getLocale())->title;
            })
            ->addColumn('smallDesc', function($row){
                return $row->translate(app()->getLocale())->smallDesc;
            })
            ->addColumn('tags', function($row){
                return $row->translate(app()->getLocale())->tags;
            })
            ->rawColumns(['action', 'content', 'title'])
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        if (count($categories) > 0) {
            return view('dashboard.posts.add')->with('categories', $categories);
        }
        abort(404);
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
        if ($request->has('image')) {

            $data['image'] = $this->upload($request->image);

        }
        // return $data;
        Post::create($data);
        return redirect()->back();
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
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('dashboard.posts.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        if ($request->has('image')) {
            $data['image'] = $this->upload($request->image);
        }
        $post->update($data);
        return redirect()->route('dashboard.posts.index');
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
        Post::where('id', $request->id)->delete();
        return redirect()->back();
    }
}
