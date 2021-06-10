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
    <label for="">Serial No</label>
    <input type="text" class="form-control" name="serialNo"  @if(isset($inventory)) value="{{$inventory->serialNo}}" @else value="{{old('serialNo')}}" @endif>
</div>

<div class="form-group">
    <label for="">Description</label>
    <textarea class="form-control" name="description" rows="3" >{{old('description')}} @if(isset($inventory)) {{$inventory->description}} @endif</textarea>
</div>

<div class="form-group">
    <label for="">Product Name</label>
    <input type="text" class="form-control" name="productName"  @if(isset($inventory)) value="{{$inventory->productName}}" @else value="{{old('productName')}}" @endif>
</div>

<div class="form-group">
    <label for="">Date Of Aquritation</label>
    <input type="date" class="form-control" name="dateOfAquritation" @if(isset($inventory)) value="{{$inventory->dateOfAquritation}}" @else value="{{old('dateOfAquritation')}}" @endif>
</div>

<div class="form-group">
    <label for="">Location</label>
    <input type="text" class="form-control" name="location"  @if(isset($inventory)) value="{{$inventory->location}}" @else value="{{old('location')}}" @endif>
</div>

<div class="form-group">
    <label for="">Condition</label>
    <input type="text" class="form-control" name="condition"  @if(isset($inventory)) value="{{$inventory->condition}}" @else value="{{old('condition')}}" @endif>
</div>

<div class="form-group">
    <label for="">Assign To</label>
    <select name="user_id" class="form-control form-control-lg select2"  id="exampleSelectl2">
        <option value="{{null}}" selected="selected">Select Options</option>
            @foreach ($users as $user)
                <option value="{{$user->_id}}" @if(isset($inventory->user_id) && $user->_id == $inventory->user_id) value="{{$inventory->user_id}}" selected="selected" @endif>
                    {{$user->name}}
                </option>
            @endforeach
    </select>
</div>

<div class="form-group">
    <label>File Upload</label>
    <div></div>
    <div class="custom-file">
        <input type="file" name="fileUpload[]" multiple class="custom-file-input" id="customFile"/>
        <label class="custom-file-label" for="customFile">File Upload</label>
    </div>
</div>

<button type="submit" class="btn btn-primary mr-2">Submit</button>
