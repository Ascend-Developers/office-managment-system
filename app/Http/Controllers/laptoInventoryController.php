<?php

namespace App\Http\Controllers;

use App\laptopInventory;
use Illuminate\Http\Request;
use App\User;
use Storage;
use File;

class laptoInventoryController extends Controller
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
        $inventorys = laptopInventory::all();
        return view('laptopInventorys.index', compact('inventorys'));
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
        return view('laptopInventorys.create', compact('users'));
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
        //     'name' => ['required'],
        //     'model'=> ['required'],
        //     'serialNo' => ['required'],
        //     'description' => ['required'],
        //     'productName' => ['required'],
        //     'units' => ['required'],
        //     'quantity' => ['required'],
        //     'cost' => ['required'],
        //     'dateOfAquritation' => ['required'],
        //     'location' => ['required'],
        //     'condition' => ['required'],
        //     'user_id' => ['required'],
        // ]);
        $data = [
            'serialNo' => $request->input('serialNo'),
            'productName' => $request->input('productName'),
            'dateOfAquritation' => $request->input('dateOfAquritation'),
            'location' => $request->input('location'),
            // 'condition' => $request->input('condition'),
            'user_id' => $request->input('user_id'),
        ];
        $inventory = laptopInventory::create($data);

        if($request->file('fileUpload')){
            $files = $request->file('fileUpload');
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                Storage::disk('public')->put($file->getFilename().'.'.$extension,  File::get($file));
                $inventory->push('fileUpload', $file->getFilename().'.'.$extension);
                $inventory->save();
            }
        }

        return redirect()->route('laptopInventory.index')->with('success','Inventory is created successfully');
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
        $inventory = laptopInventory::find($id);
        return view('laptopInventorys.show', compact('inventory'));
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
        $inventory = laptopInventory::find($id);
        return view('laptopInventorys.edit', compact('inventory','users'));
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
        //     'name' => ['required'],
        //     'model'=> ['required'],
        //     'serialNo' => ['required'],
        //     'description' => ['required'],
        //     'productName' => ['required'],
        //     'units' => ['required'],
        //     'quantity' => ['required'],
        //     'cost' => ['required'],
        //     'dateOfAquritation' => ['required'],
        //     'location' => ['required'],
        //     'condition' => ['required'],
        //     'user_id' => ['required'],
        // ]);

        $inventory = laptopInventory::find($id);

        $inventory->serialNo = $request->input('serialNo');
        $inventory->productName = $request->input('productName');
        $inventory->dateOfAquritation = $request->input('dateOfAquritation');
        $inventory->location = $request->input('location');
        // $inventory->condition = $request->input('condition');
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

        return redirect()->route('laptopInventory.index')->with('success','Inventory is Updated successfully');
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
        $inventory = laptopInventory::find($id);
        $inventory->delete();
        return redirect('laptopInventory');
    }

}
