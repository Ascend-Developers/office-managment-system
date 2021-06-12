@extends('layouts.master')

@section('content')
<!-- Table Hover Animation start -->
<div class="row" id="table-hover-animation">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('Laptop Inventory') }}</h4>
            </div>
            <div class="table-responsive">
                <table class="table table-hover-animation">
                    <thead>
                        <tr>
                            <th scope="col">Product Name</th>
                            <th scope="col">Serial No</th>
                            <th scope="col">Location</th>
                            <th scope="col">User</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inventorys as $inventory)
                        <tr>
                            <td>{{$inventory->productName}}</td>
                            <td>{{$inventory->serialNo}}</td>
                            <td>{{$inventory->location}}</td>
                            <td>{{$inventory->getUser ? $inventory->getUser->name : "--" }}</td>
                            <td>
                                <a href="{{route('laptopInventory.edit', $inventory->_id)}}"><i data-feather='edit'></i></a>
                                <form action="{{route('laptopInventory.destroy', $inventory->_id)}}" method="POST" style="display: inline" class="macros-delete" id="delete-macros-{{$inventory->_id}}">
                                    @csrf
                                    @method('delete')
                                    <button style="color: red;" class="btn selectDelBtn" type="submit"><i data-feather='delete'></i></button>
                                </form>
                                <a style="color: green;" href="{{route('laptopInventory.show', $inventory->_id)}}"><i data-feather='eye'></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Table head options end -->
@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.select2').select2({
                placeholder: 'Select an option'
            });
        $(document).on('submit','.macros-delete',function(e){
            e.preventDefault();
            console.log("submit sections");
                // return false;
                let form = $(this).attr('id');
                var delete_id =$(this).closest("").find('.serDelValu').val();
                //alert(delete_id);
                swal({
                        position: 'top-end',
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover Inventory!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        e.currentTarget.submit();
                        swal({
                            position: 'top-end',
                            title: "Inventory",
                            text: "Inventory is deleted successfully",
                            icon: "success",
                        });
                    }else{
                    }
                    });
            });
            });
    </script>
@endpush