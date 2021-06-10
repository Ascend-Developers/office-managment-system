@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Inventory') }}</div>

                <div class="card-body">
                    <form action="{{route('inventory.update', $inventory->id)}}" method="POST">
                        @method('PATCH')
                        @csrf
                            @include('inventorys.form')
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
    $("#warranty-date").hide()
    $(document).on('change','#warranty-type',function(e){
        $val = $("#warranty-type").val()

        if($val === "Under Warranty"){
            $("#warranty-date").show()
        }
        if($val === "Out of warranty"){
            $("#warranty-date").hide()
        }
        if($val === "null"){
            $("#warranty-date").hide()
        }
    })
</script>
@endpush