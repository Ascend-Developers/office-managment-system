@extends('layouts.master')

@section('content')
<!-- Greetings Card starts -->
<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="card card-congratulations">
        <div class="card-body text-center">
            <img src="../../../app-assets/images/elements/decore-left.png" class="congratulations-img-left" alt="card-img-left" />
            <img src="../../../app-assets/images/elements/decore-right.png" class="congratulations-img-right" alt="card-img-right" />
            <div class="avatar avatar-xl bg-primary shadow">
                <div class="avatar-content">
                    <i data-feather="award" class="font-large-1"></i>
                </div>
            </div>
            <div class="text-center">
                <h1 class="mb-1 text-white">Welcome {{auth()->user()->name}},</h1>
            </div>
        </div>
    </div>
</div>
<!-- Greetings Card ends -->
<div class="row">
    <!-- Subscribers Chart Card starts -->
    <div class="col-lg-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-header flex-column align-items-start pb-0">
                <div class="avatar bg-light-primary p-50 m-0">
                    <div class="avatar-content">
                        <i data-feather="users" class="font-medium-5"></i>
                    </div>
                </div>
                <h2 class="font-weight-bolder mt-1">{{$u}}</h2>
                <p class="card-text">User</p>
            </div>
            <div id="gained-chart"></div>
        </div>
    </div>
    <!-- Subscribers Chart Card ends -->

    <!-- Orders Chart Card starts -->
    <div class="col-lg-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-header flex-column align-items-start pb-0">
                <div class="avatar bg-light-warning p-50 m-0">
                    <div class="avatar-content">
                        <i data-feather="package" class="font-medium-5"></i>
                    </div>
                </div>
                <h2 class="font-weight-bolder mt-1">{{$i}}</h2>
                <p class="card-text">Laptop Inventory</p>
            </div>
            <div id="order-chart"></div>
        </div>
    </div>
    <!-- Orders Chart Card ends -->
</div>

@endsection