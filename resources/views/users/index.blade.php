@extends('layouts.master')

@section('content')
<!-- Table Hover Animation start -->
<div class="row" id="table-hover-animation">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('Users') }}</h4>
            </div>
            <div class="table-responsive">
                <table class="table table-hover-animation">
                    <thead>
                        <tr>
                            <th scope="col">Employ ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Crruntly Deploy</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->emp_id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->status}}</td>
                            <td>{{$user->cruntDeploy}}</td>
                            <td>
                                <a href="{{route('user.edit', $user->_id)}}"><i data-feather='edit'></i></a>
                                <form action="{{route('user.destroy', $user->_id)}}" method="POST" style="display: inline" class="macros-delete" id="delete-macros-{{$user->_id}}">
                                    @csrf
                                    @method('delete')
                                    <button style="color: red;" class="btn selectDelBtn" type="submit"><i data-feather='delete'></i></button>
                                </form>
                                <a style="color: green;" href="{{route('user.show', $user->_id)}}"><i data-feather='eye'></i></a>
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
                        text: "Once deleted, you will not be able to recover User!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        e.currentTarget.submit();
                        swal({
                            position: 'top-end',
                            title: "User",
                            text: "User is deleted successfully",
                            icon: "success",
                        });
                    }else{
                    }
                    });
            });
            });
    </script>
@endpush