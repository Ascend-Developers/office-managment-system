@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Inventory Details') }}</div>

                <div class="card-body">
                
                    <h5><strong>GMDN : </strong>{{$inventory->gmdn}}</h5>
                    <h5><strong>Region : </strong>{{$inventory->region}}</h5>
                    <h5><strong>Hospital : </strong>{{$inventory->hospital}}</h5>
                    <h5><strong>Equipment Name : </strong>{{$inventory->equipmentName}}</h5>
                    <h5><strong>Equipment Type : </strong>{{$inventory->equipmentType}}</h5>
                    <h5><strong>Model Name : </strong>{{$inventory->modelName}}</h5>
                    <h5><strong>Serial Number : </strong>{{$inventory->serialNumber}}</h5>
                    <h5><strong>Class : </strong>{{$inventory->class}}</h5>
                    <h5><strong>Department : </strong>{{$inventory->department}}</h5>
                    <h5><strong>Manufacturer : </strong>{{$inventory->manufacturer}}</h5>
                    <h5><strong>Current Status : </strong>{{$inventory->currentStatus}}</h5>
                    <h5><strong>Installation Date : </strong>{{$inventory->installationDate}}</h5>
                    <h5><strong>Warranty : </strong>{{$inventory->warranty}}</h5>
                    <h5><strong>Warranty Expiration Date : </strong>{{$inventory->warrantyExpirationDate}}</h5>
                    <h5><strong>Agent : </strong>{{$inventory->agent}}</h5>
                    <h5><strong>HMC : </strong>{{$inventory->hmc}}</h5>
                    <h5><strong>Number Of Inspection Annualy : </strong>{{$inventory->numberOfInspectionAnnualy}}</h5>
                    <h5><strong>First Scheduled PPM : </strong>{{$inventory->firstScheduledPPM}}</h5>
                    {{-- <h5><strong>File Upload : </strong>{{$inventory->fileUpload}}</h5> --}}
                    <h5><strong>Comments : </strong>{{$inventory->comments}}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection