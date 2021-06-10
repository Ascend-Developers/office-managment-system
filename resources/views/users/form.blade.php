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
    <label for="">Name</label>
    <input type="text" class="form-control" name="name" @if(isset($user)) value="{{$user->name}}" @endif>
</div>

<div class="form-group">
    <label for="">Email</label>
    <input type="email" class="form-control" name="email" @if(isset($user)) value="{{$user->email}}" @endif>
</div>

<div class="form-group">
    <label for="">Password</label>
    <input type="password" class="form-control" name="password" @if(isset($user)) value="{{$user->password}}" @endif>
</div>

<button type="submit" class="btn btn-primary mr-2">Submit</button>
