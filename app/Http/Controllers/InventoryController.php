<?php

namespace App\Http\Controllers;

use App\Inventory;
use Illuminate\Http\Request;
use App\User;
use Storage;
use File;

class InventoryController extends Controller
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
        $inventorys = Inventory::all();
        return view('Inventorys.index', compact('inventorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::all();
        return view('Inventorys.create', compact('users'));
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
        // $this->validate($request, [
        //     'location' => ['required'],
        //     'user_id' => ['required']
        // ]);
        $data = [
            'serialNo' => $request->input('serialNo'),
            'productName' => $request->input('productName'),
            'dateOfAquritation' => $request->input('dateOfAquritation'),
            'assiningDate' => $request->input('assiningDate'),
            'location' => $request->input('location'),
            'type' => $request->input('type'),
            'user_id' => $request->input('user_id'),
        ];
        $inventory = Inventory::create($data);

        if($request->file('fileUpload')){
            $files = $request->file('fileUpload');
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                Storage::disk('public')->put($file->getFilename().'.'.$extension,  File::get($file));
                $inventory->push('fileUpload', $file->getFilename().'.'.$extension);
                $inventory->save();
            }
        }

        return redirect()->route('inventory.index')->with('success','Inventory is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $inventory = Inventory::find($id);
        return view('Inventorys.show', compact('inventory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $users = User::all();
        $inventory = Inventory::find($id);
        return view('Inventorys.edit', compact('inventory','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // $this->validate($request, [
        //     'location' => ['required'],
        //     'user_id' => ['required']
        // ]);

        $inventory = Inventory::find($id);

        $inventory->serialNo = $request->input('serialNo');
        $inventory->productName = $request->input('productName');
        $inventory->dateOfAquritation = $request->input('dateOfAquritation');
        $inventory->assiningDate = $request->input('assiningDate');
        $inventory->location = $request->input('location');
        $inventory->type = $request->input('type');
        $inventory->user_id = $request->input('user_id');

        $inventory->save();

        if($request->file('fileUpload')){
            $files = $request->file('fileUpload');
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                Storage::disk('public')->put($file->getFilename().'.'.$extension,  File::get($file));
                $inventory->push('fileUpload', $file->getFilename().'.'.$extension);
                $inventory->save();
            }
        }

        return redirect()->route('inventory.index')->with('success','Inventory is Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $inventory = Inventory::find($id);
        $inventory->delete();
        return redirect('inventory');
    }

}
