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

<button type="submit" class="btn btn-primary mr-2">Submit</button>
