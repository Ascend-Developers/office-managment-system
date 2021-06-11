@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Edit Laptop Inventory') }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('laptopInventory.update', $inventory->id)}}" method="POST">
                        @method('PATCH')
                        @csrf
                            @include('laptopInventorys.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $('.select2').select2({
        placeholder: 'Select an option'
    });
</script>
@endpush