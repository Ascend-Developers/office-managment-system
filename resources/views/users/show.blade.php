@extends('layouts.master')

@section('content')
<div class="content-body">
    <section class="app-user-view">
        <!-- User Card & Plan Starts -->
        <div class="row">
            <!-- User Card starts-->
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card user-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
                                <div class="user-avatar-section">
                                    <div class="d-flex justify-content-start">
                                        <img class="avatar-icon " src="../../../app-assets/images/avatars/img_avatar.png" height="104" width="104" alt="User avatar" />
                                        <div class="d-flex flex-column ml-1">
                                            <div class="user-info mb-1">
                                                <h4 class="mb-0">{{$user->name}}</h4>
                                                <span class="card-text">{{$user->email}}</span>
                                            </div>
                                            <div class="d-flex flex-wrap">
                                                <a href="{{route('user.edit', $user->_id)}}" class="btn btn-primary">Edit</a>
                                                <!-- <button class="btn btn-outline-danger ml-1">Delete</button> -->
                                                <form action="{{route('user.destroy', $user->_id)}}" method="POST" style="display: inline" class="macros-delete" id="delete-macros-'.$u->_id.'">
                                                    <input type="hidden" name="_method" value="delete">
                                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                                    <button class="btn btn-outline-danger ml-1 selectDelBtn" type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 mt-2 mt-xl-0">
                                <div class="user-info-wrapper">
                                    <div class="d-flex flex-wrap">
                                        <div class="user-info-title">
                                            <i data-feather="hash" class="mr-1"></i>
                                            <span class="card-text user-info-title font-weight-bold mb-0">Employ ID : </span>
                                        </div>
                                        <p class="card-text mb-0">{{$user->emp_id}}</p>
                                    </div>
                                    <div class="d-flex flex-wrap">
                                        <div class="user-info-title">
                                            <i data-feather="user" class="mr-1"></i>
                                            <span class="card-text user-info-title font-weight-bold mb-0">Username : </span>
                                        </div>
                                        <p class="card-text mb-0">{{$user->name}}</p>
                                    </div>
                                    <div class="d-flex flex-wrap my-50">
                                        <div class="user-info-title">
                                            <i data-feather="check" class="mr-1"></i>
                                            <span class="card-text user-info-title font-weight-bold mb-0">Status : </span>
                                        </div>
                                        <p class="card-text mb-0">{{$user->status}}</p>
                                    </div>
                                    <div class="d-flex flex-wrap my-50">
                                        <div class="user-info-title">
                                            <i data-feather="star" class="mr-1"></i>
                                            <span class="card-text user-info-title font-weight-bold mb-0">Role : </span>
                                        </div>
                                        <p class="card-text mb-0">Admin</p>
                                    </div>
                                    <div class="d-flex flex-wrap my-50">
                                        <div class="user-info-title">
                                            <i data-feather="flag" class="mr-1"></i>
                                            <span class="card-text user-info-title font-weight-bold mb-0">Crruntly Deploy : </span>
                                        </div>
                                        <p class="card-text mb-0">{{$user->cruntDeploy}}</p>
                                    </div>
                                    <div class="d-flex flex-wrap">
                                        <div class="user-info-title">
                                            <i data-feather="phone" class="mr-1"></i>
                                            <span class="card-text user-info-title font-weight-bold mb-0">Contact : </span>
                                        </div>
                                        <p class="card-text mb-0">{{$user->phone}}</p>
                                    </div>
                                    <div class="d-flex flex-wrap">
                                        <div class="user-info-title">
                                            <i data-feather="map-pin" class="mr-1"></i>
                                            <span class="card-text user-info-title font-weight-bold mb-0">Address : </span>
                                        </div>
                                        <p class="card-text mb-0">{{$user->address}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /User Card Ends-->
        </div>
    </div>
</div>
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