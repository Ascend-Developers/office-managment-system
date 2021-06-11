<?php

namespace App\Http\Controllers;

use App\laptopInventory;
use Illuminate\Http\Request;
use DataTables;
use App\User;

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
        // $inventorys = Inventory::all();
        // return view('inventorys.index', compact('inventorys'));
        return view('laptopInventorys.index');
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
            'condition' => $request->input('condition'),
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
        $inventory->condition = $request->input('condition');
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
        return redirect()->route('laptopInventory.index');
    }

    public function getFilterData($request){
        $inv = laptopInventory::query();

        return $inv;
    }

    public function DataTables(Request $request){
        $inventory = $this->getFilterData($request)->get();

        return DataTables::of($inventory)
        ->addColumn('productName', function($i) {
            return $i->productName;
        })
        ->addColumn('serialNo', function($i) {
            return $i->serialNo;
        })
        ->addColumn('location', function($i) {
            return $i->location;
        })
        ->addColumn('user', function($i) {
            return $i->getUser ? $i->getUser->name : "--";
        })
        ->addColumn('action', function ($i) {
                $route = route('laptopInventory.edit', $i);
                $routeShow = route('laptopInventory.show', $i);
                return '<a href="'.$route.'" class="text-primary">Update</a> |
                <form action=" '.route("laptopInventory.destroy", $i->id).' " method="POST" style="display: inline" class="macros-delete" id="delete-macros-'.$i->_id.'">
                <input type="hidden" name="_method" value="delete">
                <input type="hidden" name="_token" value="'.csrf_token().'">
                <button class="text-danger selectDelBtn" type="submit" style="background: none; border:none; display:inline">Delete</button>
                </form> |
                <a href="'.$routeShow.'" class="text-primary">show</a>';
        })

        ->whitelist(['name', 'productName', 'model', 'units', 'user'])
        // ->rawColumns([])
        ->toJson();

    }

}
