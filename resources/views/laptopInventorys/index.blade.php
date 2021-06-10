@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Laptop Inventory') }}</div>

                <div class="card-body table-responsive w-100">
                    <table class="table responsive " id="invt-table">
                        <thead>
                            <tr>
                                <th scope="col">Product Name</th>
                                <th scope="col">Serial No</th>
                                <th scope="col">Location</th>
                                <th scope="col">User</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>

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

            $(function() {
                $('#invt-table').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    ajax: '{!! route('inventory.datatable') !!}',
                    columns: [
                        { data: 'productName', name: 'Product Name' },
                        { data: 'serialNo', name: 'Serial No' },
                        { data: 'location', name: 'Location' },
                        { data: 'user', name: 'User' },
                        { data: 'action', name: 'Action' },
                    ]
                });
            });
    </script>
@endpush