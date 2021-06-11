<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Hash;
use Storage;
use File;

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
        $users = User::all();
        return view('users.index', compact('users'));
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
            'password' => Hash::make($request->input('password')),
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status,
            'cruntDeploy' => $request->cruntDeploy,
        ];

        $user = User::create($data);

        $lastUser = User::whereNotNull('emp_id')->orderBy('emp_id', 'dsec')->first();
        if($lastUser){
            $lastUserId = $lastUser->emp_id + 1;
        }else{
            $lastUserId = 1000;
        }
        $user->emp_id = "AHS".$lastUserId;
        $user->save();

        if($request->file('contractNDA')){
            $files = $request->file('contractNDA');
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                Storage::disk('public')->put($file->getFilename().'.'.$extension,  File::get($file));
                $user->push('contractNDA', $file->getFilename().'.'.$extension);
                $user->save();
            }
        }
        if($request->file('contractConsultancy')){
            $files = $request->file('contractConsultancy');
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                Storage::disk('public')->put($file->getFilename().'.'.$extension,  File::get($file));
                $user->push('contractConsultancy', $file->getFilename().'.'.$extension);
                $user->save();
            }
        }
        if($request->file('contractIDProves')){
            $files = $request->file('contractIDProves');
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                Storage::disk('public')->put($file->getFilename().'.'.$extension,  File::get($file));
                $user->push('contractIDProves', $file->getFilename().'.'.$extension);
                $user->save();
            }
        }

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
    public function update(Request $request,$id)
    {
        //
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->password = Hash::make($request->input('password'));
        $user->address = $request->input('address');
        $user->status = $request->input('status');
        $user->cruntDeploy = $request->input('cruntDeploy');

        $user->save();

        if($request->file('contractNDA')){
            $files = $request->file('contractNDA');
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                Storage::disk('public')->put($file->getFilename().'.'.$extension,  File::get($file));
                $user->push('contractNDA', $file->getFilename().'.'.$extension);
                $user->save();
            }
        }
        if($request->file('contractConsultancy')){
            $files = $request->file('contractConsultancy');
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                Storage::disk('public')->put($file->getFilename().'.'.$extension,  File::get($file));
                $user->push('contractConsultancy', $file->getFilename().'.'.$extension);
                $user->save();
            }
        }
        if($request->file('contractIDProves')){
            $files = $request->file('contractIDProves');
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                Storage::disk('public')->put($file->getFilename().'.'.$extension,  File::get($file));
                $user->push('contractIDProves', $file->getFilename().'.'.$extension);
                $user->save();
            }
        }
        
        return redirect()->route('user.index')->with('success','User is Updated successfully');
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
}
