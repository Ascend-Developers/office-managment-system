<?php

namespace App\Http\Controllers;

use App\Inventory;
use Illuminate\Http\Request;
use DataTables;

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
        // $inventorys = Inventory::all();
        // return view('inventorys.index', compact('inventorys'));
        return view('inventorys.index');
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
        return view('inventorys.create', compact('users'));
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
        $this->validate($request, [
            'gmdn' => ['required'],
            'region' => ['required'],
            'hospital' => ['required'],
            'equipmentName' => ['required'],
            'equipmentType' => ['required'],
            'modelName' => ['required','alpha_num'],
            'serialNumber' => ['required','alpha_num','unique:serialNumber','min:22','max:22'],
            'class' => ['required'],
            // 'department' => ['required','alpha'],
            // 'manufacturer' => ['required','alpha'],
            'currentStatus' => ['required'],
            'installationDate' => ['required'],
            'warranty' => ['required'],
            // 'warrantyExpirationDate' => ['required'],
            'agent' => ['required'],
            'hmc' => ['required'],
            'numberOfInspectionAnnualy' => ['required'],
            'firstScheduledPPM' => ['required'],
            'fileUpload' => ['required'],
            'comments' => ['required'],
        ]);
        $data = [
            'gmdn' => $request->input('gmdn'),
            'region' => $request->input('region'),
            'hospital' => $request->input('hospital'),
            'equipmentName' => $request->input('equipmentName'),
            'equipmentType' => $request->input('equipmentType'),
            'modelName' => $request->input('modelName'),
            'serialNumber' => $request->input('serialNumber'),
            'class' => $request->input('class'),
            'department' => $request->input('department'),
            'manufacturer' => $request->input('manufacturer'),
            'currentStatus' => $request->input('currentStatus'),
            'installationDate' => $request->input('installationDate'),
            'warranty' => $request->input('warranty'),
            'warrantyExpirationDate' => $request->input('warrantyExpirationDate'),
            'agent' => $request->input('agent'),
            'hmc' => $request->input('hmc'),
            'numberOfInspectionAnnualy' => $request->input('numberOfInspectionAnnualy'),
            'firstScheduledPPM' => $request->input('firstScheduledPPM'),
            // 'fileUpload' => $request->input('fileUpload'),
            'comments' => $request->input('comments'),
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
        return view('inventorys.show', compact('inventory'));
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
        $inventory = Inventory::find($id);
        $regions = Region::all();
        $hospitals = Hospital::all();
        $equipments = MedicalEquipment::all();
        $departments = Departments::all();
        return view('inventorys.edit', compact('inventory','regions','hospitals','equipments','departments'));
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
        $this->validate($request, [
            'gmdn' => ['required'],
            'region' => ['required'],
            'hospital' => ['required'],
            'equipmentName' => ['required'],
            'equipmentType' => ['required'],
            'modelName' => ['required','alpha_num'],
            'serialNumber' => ['required','alpha_num','unique:serialNumber','min:22','max:22'],
            'class' => ['required'],
            'department' => ['required','alpha'],
            'manufacturer' => ['required','alpha'],
            'currentStatus' => ['required'],
            'installationDate' => ['required'],
            'warranty' => ['required'],
            'warrantyExpirationDate' => ['required'],
            'agent' => ['required'],
            'hmc' => ['required'],
            'numberOfInspectionAnnualy' => ['required'],
            'firstScheduledPPM' => ['required'],
            'fileUpload' => ['required'],
            'comments' => ['required'],
        ]);

        $inventory = Inventory::find($id);

        $inventory->gmdn =  $request->input('gmdn');
        $inventory->region =  $request->input('region');
        $inventory->hospital =  $request->input('hospital');
        $inventory->equipmentName =  $request->input('equipmentName');
        $inventory->equipmentType =  $request->input('equipmentType');
        $inventory->modelName =  $request->input('modelName');
        $inventory->serialNumber =  $request->input('serialNumber');
        $inventory->class =  $request->input('class');
        $inventory->department =  $request->input('department');
        $inventory->manufacturer =  $request->input('manufacturer');
        $inventory->currentStatus =  $request->input('currentStatus');
        $inventory->installationDate =  $request->input('installationDate');
        $inventory->warranty =  $request->input('warranty');
        $inventory->warrantyExpirationDate =  $request->input('warrantyExpirationDate');
        $inventory->agent =  $request->input('agent');
        $inventory->hmc =  $request->input('hmc');
        $inventory->numberOfInspectionAnnualy =  $request->input('numberOfInspectionAnnualy');
        $inventory->firstScheduledPPM =  $request->input('firstScheduledPPM');
        $inventory->fileUpload =  $request->input('fileUpload');
        $inventory->comments =  $request->input('comments');

        $inventory->save();

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
        return redirect()->route('inventory.index');
    }

    public function getFilterData($request){
        $inv = Inventory::query();

        return $inv;
    }

    public function DataTables(Request $request){
        $inventory = $this->getFilterData($request)->get();

        return DataTables::of($inventory)
        ->addColumn('gmdn', function($i) {
            return $i->gmdn;
        })
        ->addColumn('region', function($i) {
            return $i->getRegion ? $i->getRegion->region : "--";
        })
        ->addColumn('hospital', function($i) {
            return $i->getHospital ? $i->getHospital->hospitalName : "--";
        })
        ->addColumn('equipmentName', function($i) {
            return $i->getEquipment ? $i->getEquipment->nameEnglish : "--";
        })
        ->addColumn('equipmentType', function($i) {
            return $i->equipmentType;
        })
        ->addColumn('modelName', function($i) {
            return $i->modelName;
        })
        ->addColumn('serialNumber', function($i) {
            return $i->serialNumber;
        })
        ->addColumn('class', function($i) {
            return $i->class;
        })
        ->addColumn('department', function($i) {
            return $i->getDepartment ? $i->getDepartment->department : "--";
        })
        ->addColumn('manufacturer', function($i) {
            return $i->manufacturer;
        })
        ->addColumn('currentStatus', function($i) {
            return $i->currentStatus;
        })
        ->addColumn('installationDate', function($i) {
            return $i->installationDate;
        })
        ->addColumn('warranty', function($i) {
            return $i->warranty;
        })
        ->addColumn('warrantyExpirationDate', function($i) {
            return $i->warrantyExpirationDate;
        })
        ->addColumn('agent', function($i) {
            return $i->agent;
        })
        ->addColumn('hmc', function($i) {
            return $i->hmc;
        })
        ->addColumn('numberOfInspectionAnnualy', function($i) {
            return $i->numberOfInspectionAnnualy;
        })
        ->addColumn('firstScheduledPPM', function($i) {
            return $i->firstScheduledPPM;
        })
        ->addColumn('comments', function($i) {
            return $i->comments;
        })
        ->addColumn('action', function ($i) {
                $route = route('inventory.edit', $i);
                $routeShow = route('inventory.show', $i);
                return '<a href="'.$route.'" class="text-primary">Update</a> |
                <form action=" '.route("inventory.destroy", $i->id).' " method="POST" style="display: inline" class="macros-delete" id="delete-macros-'.$i->_id.'">
                <input type="hidden" name="_method" value="delete">
                <input type="hidden" name="_token" value="'.csrf_token().'">
                <button class="text-danger selectDelBtn" type="submit" style="background: none; border:none; display:inline">Delete</button>
                </form> |
                <a href="'.$routeShow.'" class="text-primary">show</a>';
        })

        ->whitelist(['gmdn', 'region', 'hospital'])
        // ->rawColumns([])
        ->toJson();

    }

    public function regionAjexHospital (Request $request){
        
        $return  = Hospital::where('region_id', $request->region_id)->get();
        return response()->json($return);
    }

}
