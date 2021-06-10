@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Inventory') }}</div>

                <div class="card-body table-responsive w-100">
                    <table class="table responsive " id="invt-table">
                        <thead>
                            <tr>
                                <th scope="col">GMDN</th>
                                <th scope="col">Region</th>
                                <th scope="col">Hospital</th>
                                <th scope="col">Equipment Name</th>
                                <th scope="col">Equipment Type</th>
                                <th scope="col">Model Name</th>
                                <th scope="col">Serial Number</th>
                                <th scope="col">Class</th>
                                <th scope="col">Department</th>
                                <th scope="col">Manufacturer</th>
                                <th scope="col">Current Status</th>
                                <th scope="col">Installation Date</th>
                                <th scope="col">Warranty</th>
                                <th scope="col">Warranty Expiration Date</th>
                                <th scope="col">Agent</th>
                                <th scope="col">HMC</th>
                                <th scope="col">Number Of Inspection Annualy</th>
                                <th scope="col">First Scheduled PPM</th>
                                {{-- <th scope="col">File Upload</th> --}}
                                <th scope="col">Comments</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                            @foreach($inventorys as $inventory)
                            <tr>
                                <td>{{ $inventory->gmdn }}</td>
                                <td>
                                    <a href="{{route('inventory.edit', $inventory->id)}}">Edit</a>
                                    |
                                    <form action="{{ route('inventory.destroy', $inventory->id) }}" method="POST" style="display: inline" class="macros-delete" id="delete-macros-{{$inventory->_id}}">
                                        @csrf
                                        @method('delete')
                                        <button class="text-danger selectDelBtn" type="submit" style="background: none; border:none; display:inline">Delete</button>
                                    </form>
                                    |
                                    <a href="{{ route('inventory.show', $inventory->id) }}">Show </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody> --}}
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
                        { data: 'gmdn', name: 'GMDN' },
                        { data: 'region', name: 'Region' },
                        { data: 'hospital', name: 'Hospital' },
                        { data: 'equipmentName', name: 'Equipment Name' },
                        { data: 'equipmentType', name: 'Equipment Type' },
                        { data: 'modelName', name: 'Model Name' },
                        { data: 'serialNumber', name: 'Serial Number' },
                        { data: 'class', name: 'Class' },
                        { data: 'department', name: 'Department' },
                        { data: 'manufacturer', name: 'Manufacturer' },
                        { data: 'currentStatus', name: 'Current Status' },
                        { data: 'installationDate', name: 'Installation Date' },
                        { data: 'warranty', name: 'Warranty' },
                        { data: 'warrantyExpirationDate', name: 'Warranty Expiration Date' },
                        { data: 'agent', name: 'Agent' },
                        { data: 'hmc', name: 'HMC' },
                        { data: 'numberOfInspectionAnnualy', name: 'Number Of Inspection Annualy' },
                        { data: 'firstScheduledPPM', name: 'First Scheduled PPM' },
                        // // { data: 'fileUpload', name: 'File Upload' },
                        { data: 'comments', name: 'Comments' },
                        { data: 'action', name: 'Action' },
                    ]
                });
            });
    </script>
@endpush