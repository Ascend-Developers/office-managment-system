@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group">
    <label for="">GMDN</label>
    <input type="text" class="form-control" name="gmdn" value="{{old('gmdn')}}"  @if(isset($inventory)) value="{{$inventory->gmdn}}" @endif>
</div>

<div class="form-group">
    <label for="">Region</label>
    <select name="region" class="form-control form-control-lg select2 selectpicker" @if ($errors->has('region_id')) is-invalid @endif" id="region_id" data-live-search="true" autocomplete="off">
        <option value="{{null}}" selected="selected">Select Options</option>
        @foreach ($regions as $region)
            <option value="{{$region->_id}}" @if(isset($inventory->region) && $region->_id == $inventory->region) value="{{$inventory->region}}" selected="selected" @endif>
                {{$region->region}}
            </option>
        @endforeach
    </select>
    
</div>

<div class="form-group">
    <label for="">Hospital</label>
    <select name="hospital" class="form-control form-control-lg select2 selectpicker"  @if ($errors->has('hospital_id')) is-invalid @endif" id="hospital_id" data-live-search="true" autocomplete="off">
        <option value="{{null}}" selected="selected">Select Options</option>
            @foreach ($hospitals as $hospital)
                <option value="{{$hospital->_id}}" @if(isset($inventory->hospital) && $hospital->_id == $inventory->hospital) value="{{$inventory->hospital}}" selected="selected" @endif>
                    {{$hospital->hospitalName}}
                </option>
            @endforeach
    </select>
</div>

<div class="form-group">
    <label for="">Equipment Name</label>
    <select name="equipmentName" class="form-control form-control-lg select2"  id="exampleSelectl2">
        <option value="{{null}}" selected="selected">Select Options</option>
            @foreach ($equipments as $equipment)
                <option value="{{$equipment->_id}}" @if(isset($inventory->equipmentName) && $equipment->_id == $inventory->equipmentName) value="{{$inventory->equipmentName}}" selected="selected" @endif>
                    {{$equipment->nameEnglish}}
                </option>
            @endforeach
    </select>
</div>

<div class="form-group">
    <label for="">Equipment Type</label>
    <select name="equipmentType" class="form-control form-control-lg select2"  id="exampleSelectl2">
        <option value="{{null}}" selected="selected">Select Options</option>
            <option value="Inversive" @if((isset($inventory) &&  $inventory->equipmentType == "Inversive")|| old('equipmentType') == "Inversive" ) selected="selected" @endif>Inversive</option>
            <option value="Non-Inversive" @if((isset($inventory) &&  $inventory->equipmentType == "Non-Inversive")|| old('equipmentType') == "Non-Inversive" ) selected="selected" @endif>Non-Inversive</option>
    </select>
</div>

<div class="form-group">
    <label for="">Model Name</label>
    <input type="text" class="form-control" name="modelName" value="{{old('modelName')}}"  @if(isset($inventory)) value="{{$inventory->modelName}}" @endif>
</div>

<div class="form-group">
    <label for="">Serial Number</label>
    <input type="text" class="form-control" name="serialNumber" value="{{old('serialNumber')}}" @if(isset($inventory)) value="{{$inventory->serialNumber}}" @endif>
</div>

<div class="form-group">
    <label for="">Class</label>
    <select name="class" class="form-control form-control-lg select2"  id="exampleSelectl2">
        <option value="{{null}}" selected="selected">Select Options</option>
            <option value="Class A" @if((isset($inventory) &&  $inventory->class == "Class A")|| old('class') == "Class A" ) selected="selected" @endif>Class A</option>
            <option value="Class B" @if((isset($inventory) &&  $inventory->class == "Class B")|| old('class') == "Class B" ) selected="selected" @endif>Class B</option>
            <option value="Class C" @if((isset($inventory) &&  $inventory->class == "Class C")|| old('class') == "Class C" ) selected="selected" @endif>Class C</option>
    </select>
</div>

<div class="form-group">
    <label for="">Department</label>
    <select name="department" class="form-control form-control-lg select2"  id="exampleSelectl2">
        <option value="{{null}}" selected="selected">Select Options</option>
            @foreach ($departments as $department)
                <option value="{{$department->_id}}" @if(isset($inventory->department) && $department->_id == $inventory->department) value="{{$inventory->department}}" selected="selected" @endif>
                    {{$department->department}}
                </option>
            @endforeach
    </select>
</div>

<div class="form-group">
    <label for="">Manufacturer</label>
    <input type="text" class="form-control" name="manufacturer" value="{{old('manufacturer')}}" @if(isset($inventory)) value="{{$inventory->manufacturer}}" @endif>
</div>

<div class="form-group">
    <label for="">Current Status</label>
    <select name="currentStatus" class="form-control form-control-lg select2"  id="exampleSelectl2">
        <option value="{{null}}" selected="selected">Select Options</option>
            <option value="Working" @if((isset($inventory) &&  $inventory->currentStatus == "Working")|| old('currentStatus') == "Working" ) selected="selected" @endif>Working</option>
            <option value="Down" @if((isset($inventory) &&  $inventory->currentStatus == "Down")|| old('currentStatus') == "Down" ) selected="selected" @endif>Down</option>
            <option value="Partially Down" @if((isset($inventory) &&  $inventory->currentStatus == "Partially Down")|| old('currentStatus') == "Partially Down" ) selected="selected" @endif>Partially Down</option>
            <option value="Back Up" @if((isset($inventory) &&  $inventory->currentStatus == "Back Up")|| old('currentStatus') == "Back Up" ) selected="selected" @endif>Back Up</option>
            <option value="Retired" @if((isset($inventory) &&  $inventory->currentStatus == "Retired")|| old('currentStatus') == "Retired" ) selected="selected" @endif>Retired</option>
    </select>
</div>

<div class="form-group">
    <label for="">Installation Date</label>
    <input type="date" class="form-control" name="installationDate" value="{{old('installationDate')}}" @if(isset($inventory)) value="{{$inventory->installationDate}}" @endif>
</div>

<div class="form-group">
    <label for="">Warranty Status </label>
    <select name="warranty" id="warranty-type" class="form-control form-control-lg select2"  id="exampleSelectl2">
            <option value="{{null}}" selected="selected">Select Options</option>
            <option value="Under Warranty" @if((isset($inventory) &&  $inventory->warranty == "Under Warranty")|| old('warranty') == "Under Warranty" ) selected="selected" @endif>Under Warranty</option>
            <option value="Out of warranty" @if((isset($inventory) &&  $inventory->warranty == "Out of warranty")|| old('warranty') == "Out of warranty" ) selected="selected" @endif>Out of warranty</option>
    </select>
</div>

<div class="form-group" id="warranty-date">
    <label for="">Warranty Expiration Date</label>
    <input type="date" class="form-control" name="warrantyExpirationDate" value="{{old('warrantyExpirationDate')}}" @if(isset($inventory)) value="{{$inventory->warrantyExpirationDate}}" @endif>
</div>

<input type="hidden"  name="agent" @if(isset($inventory)) value="{{$inventory->agent}}" @endif value="{{ Auth::user()->name }}">

<div class="form-group">
    <label for="">HMCs (Hospital Maintenance companies)</label>
    <select name="hmc" class="form-control form-control-lg select2"  id="exampleSelectl2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="Al Mashreq" @if((isset($inventory) &&  $inventory->numberOfInspectionAnnualy == "Al Mashreq")|| old('numberOfInspectionAnnualy') == "Al Mashreq" ) selected="selected" @endif>Al Mashreq</option>
        <option value="Sedr" @if((isset($inventory) &&  $inventory->numberOfInspectionAnnualy == "Sedr")|| old('numberOfInspectionAnnualy') == "Sedr" ) selected="selected" @endif>Sedr</option>
        <option value="Samamah" @if((isset($inventory) &&  $inventory->numberOfInspectionAnnualy == "Samamah")|| old('numberOfInspectionAnnualy') == "Samamah" ) selected="selected" @endif>Samamah</option>
        <option value="Afras" @if((isset($inventory) &&  $inventory->numberOfInspectionAnnualy == "Afras")|| old('numberOfInspectionAnnualy') == "Afras" ) selected="selected" @endif>Afras</option>
        <option value="First Gulf" @if((isset($inventory) &&  $inventory->numberOfInspectionAnnualy == "First Gulf")|| old('numberOfInspectionAnnualy') == "First Gulf" ) selected="selected" @endif>First Gulf</option>
        <option value="Al Arfaj" @if((isset($inventory) &&  $inventory->numberOfInspectionAnnualy == "Al Arfaj")|| old('numberOfInspectionAnnualy') == "Al Arfaj" ) selected="selected" @endif>Al Arfaj</option>
        <option value="Iman" @if((isset($inventory) &&  $inventory->numberOfInspectionAnnualy == "Iman")|| old('numberOfInspectionAnnualy') == "Iman" ) selected="selected" @endif>Iman</option>
        <option value="Asco" @if((isset($inventory) &&  $inventory->numberOfInspectionAnnualy == "Asco")|| old('numberOfInspectionAnnualy') == "Asco" ) selected="selected" @endif>Asco</option>
        <option value="Alrakhees" @if((isset($inventory) &&  $inventory->numberOfInspectionAnnualy == "Alrakhees")|| old('numberOfInspectionAnnualy') == "Alrakhees" ) selected="selected" @endif>Alrakhees</option>
        <option value="Al majal Al Arabi" @if((isset($inventory) &&  $inventory->numberOfInspectionAnnualy == "Al majal Al Arabi")|| old('numberOfInspectionAnnualy') == "Al majal Al Arabi" ) selected="selected" @endif>Al majal Al Arabi</option>
        <option value="Al Hanouf" @if((isset($inventory) &&  $inventory->numberOfInspectionAnnualy == "Al Hanouf")|| old('numberOfInspectionAnnualy') == "Al Hanouf" ) selected="selected" @endif>Al Hanouf</option>
        <option value="Scientific & Medical Equipment House" @if((isset($inventory) &&  $inventory->numberOfInspectionAnnualy == "Scientific & Medical Equipment House")|| old('numberOfInspectionAnnualy') == "Scientific & Medical Equipment House" ) selected="selected" @endif>Scientific & Medical Equipment House</option>
        <option value="Rajab & Sulsulah" @if((isset($inventory) &&  $inventory->numberOfInspectionAnnualy == "Rajab & Sulsulah")|| old('numberOfInspectionAnnualy') == "Rajab & Sulsulah" ) selected="selected" @endif>Rajab & Sulsulah</option>
        <option value="Zahran" @if((isset($inventory) &&  $inventory->numberOfInspectionAnnualy == "Zahran")|| old('numberOfInspectionAnnualy') == "Zahran" ) selected="selected" @endif>Zahran</option>
        <option value="Saraco" @if((isset($inventory) &&  $inventory->numberOfInspectionAnnualy == "Saraco")|| old('numberOfInspectionAnnualy') == "Saraco" ) selected="selected" @endif>Saraco</option>
    </select>
</div>

<div class="form-group">
    <label for="">Number Of Inspection Annualy</label>
    <select name="numberOfInspectionAnnualy" class="form-control form-control-lg select2"  id="exampleSelectl2">
        <option value="{{null}}" selected="selected">Select Options</option>
            <option value="1" @if((isset($inventory) &&  $inventory->numberOfInspectionAnnualy == "1")|| old('numberOfInspectionAnnualy') == "1" ) selected="selected" @endif>1</option>
            <option value="2" @if((isset($inventory) &&  $inventory->numberOfInspectionAnnualy == "2")|| old('numberOfInspectionAnnualy') == "2" ) selected="selected" @endif>2</option>
            <option value="3" @if((isset($inventory) &&  $inventory->numberOfInspectionAnnualy == "3")|| old('numberOfInspectionAnnualy') == "3" ) selected="selected" @endif>3</option>
            <option value="4" @if((isset($inventory) &&  $inventory->numberOfInspectionAnnualy == "4")|| old('numberOfInspectionAnnualy') == "4" ) selected="selected" @endif>4</option>
    </select>
</div>

<div class="form-group">
    <label for="">First Scheduled PPM</label>
    <input type="date" class="form-control" name="firstScheduledPPM" value="{{old('firstScheduledPPM')}}" @if(isset($inventory)) value="{{$inventory->firstScheduledPPM}}" @endif>
</div>

<div class="form-group">
    <label>File Upload</label>
    <div></div>
    <div class="custom-file">
        <input type="file" name="fileUpload[]" multiple class="custom-file-input" id="customFile"/>
        <label class="custom-file-label" for="customFile">File Upload</label>
    </div>
</div>

<div class="form-group">
    <label for="">Comments</label>
    <textarea class="form-control" name="comments" rows="3" >{{old('comments')}} @if(isset($inventory)) {{$inventory->comments}} @endif</textarea>
</div>

<button type="submit" class="btn btn-primary mr-2">Submit</button>
