<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'status'=> 'required|in:null,admin,writer'
        ]);
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        User::create($data);
        return redirect()->back()->with('success', 'success');
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
    public function edit($id)
    {
        $user = User::find($id);
        // dd($user);
        return view('dashboard.users.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        User::where('id',$id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'status'=>$request->status
        ]);
        return redirect()->route('dashboard.users.index');
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
        $users = User::find(request()->id);
        if ($users->status == 'admin') {
            return redirect()->back()->with('error' , 'this user is admin');
        }
        User::where('id',$request->id)->delete();
        return redirect()->back()->with('success' , 'success') ;
    }

    public function getUserDataTable() {
        $data = User::select('*');
        $users = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                return $btn = '
                <a class="edit btn btn-success btn-sm" href=" ' . Route('dashboard.users.edit', $row->id) . ' " ><i class="fa fa-edit"></i></a>
                <a id="deletBtn" data-id="' .$row->id . '"class="edit btn btn-danger btn-sm" data-toggle="modal"
                data-target="#deletemodal"><i class="fa fa-trash"></i></a>';
            })
            ->addColumn('status' , function($row){
                if ($row->status == null) {
                    $status = __('words.notActive');
                }elseif($row->status == 'writer'){
                    $status = __('words.writer');
                }elseif($row->status == 'admin'){
                    $status = __('words.admin');
                }
                return $status;
            })
            ->rawColumns(['action'])
            ->make(true);
        return($users);
    }
    public function addUser(){
        return view('dashboard.users.add');
    }
}
