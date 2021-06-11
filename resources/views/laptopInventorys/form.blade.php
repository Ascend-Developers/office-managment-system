@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="col-12">
    <div class="form-group row">
        <div class="col-sm-2 col-form-label">
            <label for="fname-icon">Serial No</label>
        </div>
        <div class="col-sm-10">
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i data-feather="more-vertical"></i></span>
                </div>
                <input type="text" class="form-control" name="serialNo"  @if(isset($inventory)) value="{{$inventory->serialNo}}" @else value="{{old('serialNo')}}" @endif />
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="form-group row">
        <div class="col-sm-2 col-form-label">
            <label for="fname-icon">Product Name</label>
        </div>
        <div class="col-sm-10">
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i data-feather='align-center'></i></span>
                </div>
                <input type="text" class="form-control" name="productName"  @if(isset($inventory)) value="{{$inventory->productName}}" @else value="{{old('productName')}}" @endif />
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="form-group row">
        <div class="col-sm-2 col-form-label">
            <label for="fname-icon">Date Of Acquisition</label>
        </div>
        <div class="col-sm-10">
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i data-feather='calendar'></i></span>
                </div>
                <input type="date" class="form-control" name="dateOfAquritation" @if(isset($inventory)) value="{{$inventory->dateOfAquritation}}" @else value="{{old('dateOfAquritation')}}" @endif />
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="form-group row">
        <div class="col-sm-2 col-form-label">
            <label for="fname-icon">Location</label>
        </div>
        <div class="col-sm-10">
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i data-feather='map-pin'></i></span>
                </div>
                <select name="location" class="form-control form-control-lg select2"  id="exampleSelectl2">
                    <option value="{{null}}" selected="selected">Select Options</option>
                    <option value="Lahore" @if(isset($inventory)) value="{{$inventory->location}}" selected="selected" @endif>Lahore</option>
                    <option value="Islamabad" @if(isset($inventory)) value="{{$inventory->location}}" selected="selected" @endif>Islamabad</option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="form-group row">
        <div class="col-sm-2 col-form-label">
            <label for="fname-icon">Condition</label>
        </div>
        <div class="col-sm-10">
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i data-feather='alert-octagon'></i></span>
                </div>
                <input type="text" class="form-control" name="condition"  @if(isset($inventory)) value="{{$inventory->condition}}" @else value="{{old('condition')}}" @endif />
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="form-group row">
        <div class="col-sm-2 col-form-label">
            <label for="fname-icon">Assign To</label>
        </div>
        <div class="col-sm-10">
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i data-feather="user"></i></span>
                </div>
                <select name="user_id" class="form-control form-control-lg select2"  id="exampleSelectl2">
                    <option value="{{null}}" selected="selected">Select Options</option>
                    @foreach ($users as $user)
                        <option value="{{$user->_id}}" @if(isset($inventory->user_id) && $user->_id == $inventory->user_id) value="{{$inventory->user_id}}" selected="selected" @endif>{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="form-group row">
        <div class="col-sm-2 col-form-label">
            <label for="fname-icon">File Upload</label>
        </div>
        <div class="col-sm-10">
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i data-feather="FilePlusIcon"></i></span>
                </div>
                <input type="file" name="fileUpload[]" multiple class="custom-file-input" id="customFile" />
                <label class="custom-file-label" for="customFile">File Upload</label>
            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary mr-2">Submit</button>
