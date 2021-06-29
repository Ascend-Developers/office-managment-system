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
            <label for="fname-icon">Name</label>
        </div>
        <div class="col-sm-10">
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i data-feather="user"></i></span>
                </div>
                <input type="text" class="form-control" name="name" @if(isset($user)) value="{{$user->name}}" @else value="{{old('name')}}" @endif />
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="form-group row">
        <div class="col-sm-2 col-form-label">
            <label for="fname-icon">Email</label>
        </div>
        <div class="col-sm-10">
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i data-feather="mail"></i></span>
                </div>
                <input type="email" class="form-control" name="email" @if(isset($user)) value="{{$user->email}}" @else value="{{old('email')}}" @endif />
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="form-group row">
        <div class="col-sm-2 col-form-label">
            <label for="fname-icon">Password</label>
        </div>
        <div class="col-sm-10">
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i data-feather="lock"></i></span>
                </div>
                <input type="password" class="form-control" name="password" @if(isset($user)) readonly @else value="{{old('email')}}" @endif/>
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="form-group row">
        <div class="col-sm-2 col-form-label">
            <label for="fname-icon">Phone</label>
        </div>
        <div class="col-sm-10">
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i data-feather="smartphone"></i></span>
                </div>
                <input type="text" class="form-control" name="phone" @if(isset($user)) value="{{$user->phone}}" @else value="{{old('phone')}}" @endif />
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="form-group row">
        <div class="col-sm-2 col-form-label">
            <label for="fname-icon">Address</label>
        </div>
        <div class="col-sm-10">
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i data-feather="map"></i></span>
                </div>
                <input type="text" class="form-control" name="address" @if(isset($user)) value="{{$user->address}}" @else value="{{old('address')}}" @endif />
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="form-group row">
        <div class="col-sm-2 col-form-label">
            <label for="fname-icon">Status</label>
        </div>
        <div class="col-sm-10">
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i data-feather='eye'></i></span>
                </div>
                <select name="status" class="form-control form-control-lg select2"  id="exampleSelectl2">
                    <option value="{{null}}" selected="selected">Select Options</option>
                    <option value="Part Time" @if(isset($inventory)) value="{{$inventory->status}}" selected="selected" @endif>Part Time</option>
                    <option value="Full Time" @if(isset($inventory)) value="{{$inventory->status}}" selected="selected" @endif>Full Time</option>
                </select>
            </div>
        </div>
    </div>
</div>


<div class="col-12">
    <div class="form-group row">
        <div class="col-sm-2 col-form-label">
            <label for="fname-icon">Crruntly Deploy</label>
        </div>
        <div class="col-sm-10">
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i data-feather="map-pin"></i></span>
                </div>
                <input type="text" class="form-control" name="cruntDeploy" @if(isset($user)) value="{{$user->cruntDeploy}}" @else value="{{old('cruntDeploy')}}" @endif />
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="form-group row">
        <div class="col-sm-2 col-form-label">
            <label for="fname-icon">Contract NDA</label>
        </div>
        <div class="col-sm-10">
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i data-feather="FilePlusIcon"></i></span>
                </div>
                <input type="file" name="contractNDA[]" multiple class="custom-file-input" id="customFile1" />
                <label class="custom-file-label" for="customFile">File Upload</label>
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="form-group row">
        <div class="col-sm-2 col-form-label">
            <label for="fname-icon">Contract Consultancy</label>
        </div>
        <div class="col-sm-10">
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i data-feather="FilePlusIcon"></i></span>
                </div>
                <input type="file" name="contractConsultancy[]" multiple class="custom-file-input" id="customFile2" />
                <label class="custom-file-label" for="customFile">File Upload</label>
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="form-group row">
        <div class="col-sm-2 col-form-label">
            <label for="fname-icon">Contract ID Proves</label>
        </div>
        <div class="col-sm-10">
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i data-feather="FilePlusIcon"></i></span>
                </div>
                <input type="file" name="contractIDProves[]" multiple class="custom-file-input" id="customFile3" />
                <label class="custom-file-label" for="customFile">File Upload</label>
            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary mr-2">Submit</button>
