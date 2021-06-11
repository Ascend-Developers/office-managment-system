@extends('layouts.master')

@section('content')
<!-- Invoice -->
<div class="col-xl-12 col-md-12 col-12">
    <div class="card invoice-preview-card">
        <div class="card-body invoice-padding pb-0">
            <!-- Header starts -->
            <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                <div>
                    <span class="brand-logo">
                        <img src="/app-assets/images/logo/LOGO-b.png" alt="">
                    </span>
                </div>
                <div class="mt-md-0 mt-2">
                    <div class="invoice-date-wrapper">
                        <p class="invoice-date-title">Date Issued:</p>
                        <p class="invoice-date">{{$inventory->created_at}}</p>
                    </div>
                </div>
            </div>
            <!-- Header ends -->
        </div>

        <hr class="invoice-spacing" />

        <!-- Address and Contact starts -->
        <div class="card-body invoice-padding pt-0">
            <div class="row invoice-spacing">
                <div class="col-xl-8 p-0">
                    <h6 class="mb-2">Provide To:</h6>
                    <h6 class="mb-25">Name : {{$inventory->getUser ? $inventory->getUser->name : "--" }}</h6>
                    <p class="card-text mb-25">Email : {{$inventory->getUser ? $inventory->getUser->email : "--" }}</p>
                    <p class="card-text mb-25">Phone : {{$inventory->getUser ? $inventory->getUser->phone : "--" }}</p>
                </div>
                <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                    <h6 class="mb-2">Product Details:</h6>
                    <table>
                        <tbody>
                            <tr>
                                <td class="pr-1">Product Name :</td>
                                <td><span class="font-weight-bold">{{$inventory->productName}}</span></td>
                            </tr>
                            <tr>
                                <td class="pr-1">Serial No :</td>
                                <td><span class="font-weight-bold">{{$inventory->serialNo}}</span></td>
                            </tr>
                            <tr>
                                <td class="pr-1">Date Of Acquisition :</td>
                                <td><span class="font-weight-bold">{{$inventory->dateOfAquritation}}</span></td>
                            </tr>
                            <tr>
                                <td class="pr-1">Location :</td>
                                <td><span class="font-weight-bold">{{$inventory->location}}</span></td>
                            </tr>
                            <!-- <tr>
                                <td class="pr-1">Condition :</td>
                                <td><span class="font-weight-bold">{{$inventory->condition}}</span></td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Address and Contact ends -->

        <hr class="invoice-spacing" />

        <!-- Invoice Note starts -->
        <div class="card-body invoice-padding pt-0">
            <div class="row">
                <div class="col-12">
                    <span class="font-weight-bold">Note:</span>
                    <span>Thank You!</span>
                </div>
            </div>
        </div>
        <!-- Invoice Note ends -->
    </div>
</div>
<!-- /Invoice -->
@endsection