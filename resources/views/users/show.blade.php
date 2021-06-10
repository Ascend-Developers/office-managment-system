@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('User Details') }}</div>

                <div class="card-body">
                
                    <h5><strong>Name : </strong>{{$user->name}}</h5>
                    <h5><strong>Email : </strong>{{$user->email}}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection