<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Hash;
use DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $users = User::all();
        // return view('users.index', compact('users'));
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  Hash::make($request->input('password'))
        ];

        $user = User::create($data);

        return redirect()->route('user.index')->with('success','Employ is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index');
    }

    public function getFilterData($request){
        $user = User::query();
        return $user;
    }

    public function DataTables(Request $request){
        $users = $this->getFilterData($request)->get();

        return DataTables::of($users)
        ->addColumn('name', function($u) {
            return $u->name;
        })
        ->addColumn('email', function($u) {
            return $u->email;
        })
        ->addColumn('action', function ($u) {
                $route = route('user.edit', $u);
                $routeShow = route('user.show', $u);
                return '<a href="'.$route.'" class="text-primary">Update</a> |
                <form action=" '.route("user.destroy", $u->id).' " method="POST" style="display: inline" class="macros-delete" id="delete-macros-'.$u->_id.'">
                <input type="hidden" name="_method" value="delete">
                <input type="hidden" name="_token" value="'.csrf_token().'">
                <button class="text-danger selectDelBtn" type="submit" style="background: none; border:none; display:inline">Delete</button>
                </form> |
                <a href="'.$routeShow.'" class="text-primary">show</a>';
        })

        ->whitelist(['name','email'])
        // ->rawColumns([])
        ->toJson();

    }
}
