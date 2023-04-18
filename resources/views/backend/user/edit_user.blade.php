@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit User</h4>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{route('user.update',$user->id)}}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>User Role <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select value="{{$user->usertype}}" name="usertype" id="select" class="form-control">
                                                            <option value="" selected="" disabled="">Select User Role</option>
                                                            <option value="Admin" {{$user->usertype == 'Admin' ? 'selected' : "" }}>Admin</option>
                                                            <option value="User" {{$user->usertype == 'User' ? 'selected' : "" }}>User</option>
                                                        </select>
                                                    </div>
                                                    @error('usertype')
                                                    <span class="text-danger m-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>User Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input value="{{$user->name}}" type="text" name="name" class="form-control">
                                                    </div>
                                                    @error('name')
                                                    <span class="text-danger m-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>User Email <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input value="{{$user->email}}" type="email" name="email" class="form-control">
                                                    </div>
                                                    @error('email')
                                                    <span class="text-danger m-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Update User">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection