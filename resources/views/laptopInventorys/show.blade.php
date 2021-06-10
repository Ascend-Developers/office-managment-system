@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Inventory Details') }}</div>

                <div class="card-body">
                    <h5><strong>Product Name : </strong>{{$inventory->productName}}</h5>
                    <h5><strong>Serial No : </strong>{{$inventory->serialNo}}</h5>
                    <h5><strong>Description : </strong>{{$inventory->description}}</h5>
                    <h5><strong>Date Of Aquritation : </strong>{{$inventory->dateOfAquritation}}</h5>
                    <h5><strong>Location : </strong>{{$inventory->location}}</h5>
                    <h5><strong>Condition : </strong>{{$inventory->condition}}</h5>
                    <h5><strong>User : </strong>{{$inventory->getUser ? $inventory->getUser->name : "--" }}</h5>
                    <!-- <h5><strong>File : </strong>{{"--"}}</h5> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection