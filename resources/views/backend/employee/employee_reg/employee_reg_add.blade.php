@extends('admin.admin_master')
@section('admin')
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Register New Employee</h4>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{route('store.employee.register')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Employee Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control">
                                                    </div>
                                                    @error('name')
                                                    <span class="text-danger m-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Father's Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="fname" class="form-control">
                                                    </div>
                                                    @error('fname')
                                                    <span class="text-danger m-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Mother's Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="mname" class="form-control">
                                                    </div>
                                                    @error('mname')
                                                    <span class="text-danger m-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Mobile Number <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="mobile" class="form-control">
                                                    </div>
                                                    @error('mobile')
                                                    <span class="text-danger m-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Address <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="address" class="form-control">
                                                    </div>
                                                    @error('address')
                                                    <span class="text-danger m-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Gender <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="gender" id="select" class="form-control">
                                                            <option value="" selected="" disabled="">Select Gender</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                    @error('gender')
                                                    <span class="text-danger m-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Religion <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="religion" id="select" class="form-control">
                                                            <option value="" selected="" disabled="">Select Religion</option>
                                                            <option value="Islam">Islam</option>
                                                            <option value="Christian">Christian</option>
                                                        </select>
                                                    </div>
                                                    @error('religion')
                                                    <span class="text-danger m-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Date Of Birth <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="date" name="dob" class="form-control">
                                                    </div>
                                                    @error('dob')
                                                    <span class="text-danger m-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Designation <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="designation_id" id="select" class="form-control">
                                                            <option value="" selected="" disabled="">Select Year</option>
                                                            @foreach($designation as $value)
                                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('designation_id')
                                                    <span class="text-danger m-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Salary <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="salary" class="form-control" id="salary">
                                                    </div>
                                                    @error('salary')
                                                    <span class="text-danger m-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Join Of Date <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="date" name="join_date" class="form-control" id="join_data">
                                                    </div>
                                                    @error('join_data')
                                                    <span class="text-danger m-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Employee Image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="image" class="form-control" id="image">
                                                    </div>
                                                    @error('image')
                                                    <span class="text-danger m-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <img id="showImage" src="{{( !empty($user->image) ? url('upload/user_images/'.$user->image) : url('upload/no_image.jpg') )}}" style="width: 100px; border:1px solid #000000" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Add Employee">
                                </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#image').on('change', function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>
@endsection