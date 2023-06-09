@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box box-widget widget-user">
                        <div class="widget-user-header bg-black">
                            <h3 class="widget-user-username">{{$user->name}}</h3>
                            <h6 class="widget-user-desc text-success">{{$user->usertype}}</h6>
                            <a href="{{route('profile.edit')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Edit Profile</a>
                        </div>
                        <div class="widget-user-image">
                            <img class="rounded-circle" src="{{( !empty($user->image) ? url('upload/user_images/'.$user->image) : url('upload/no_image.jpg') )}}" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">Name</h5>
                                        <span class="description-text">{{$user->name}}</span>
                                    </div>
                                </div>
                                <div class="col-sm-4 br-1 bl-1">
                                    <div class="description-block">
                                        <h5 class="description-header">Email</h5>
                                        <span class="description-text">{{$user->email}}</span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">Role</h5>
                                        <span class="description-text">{{$user->usertype}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">Mobile No</h5>
                                        <span class="description-text">{{$user->mobile}}</span>
                                    </div>
                                </div>
                                <div class="col-sm-4 br-1 bl-1">
                                    <div class="description-block">
                                        <h5 class="description-header">Address</h5>
                                        <span class="description-text">{{$user->address}}</span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">Gender</h5>
                                        <span class="description-text">{{$user->gender}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection