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
    <input type="text" class="form-control" name="name" @if(isset($user)) value="{{$user->name}}" @else value="{{old('name')}}" @endif>
</div>

<div class="form-group">
    <label for="">Email</label>
    <input type="email" class="form-control" name="email" @if(isset($user)) value="{{$user->email}}" @else value="{{old('email')}}" @endif>
</div>

<div class="form-group">
    <label for="">Password</label>
    <input type="password" class="form-control" name="password" @if(isset($user)) value="{{$user->password}}" @else value="{{old('password')}}" @endif>
</div>

<div class="form-group">
    <label for="">Phone</label>
    <input type="text" class="form-control" name="phone" @if(isset($user)) value="{{$user->phone}}" @else value="{{old('phone')}}" @endif>
</div>

<button type="submit" class="btn btn-primary mr-2">Submit</button>
