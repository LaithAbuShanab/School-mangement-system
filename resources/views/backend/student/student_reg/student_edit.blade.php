@extends('admin.admin_master')
@section('admin')
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Student</h4>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{route('update.student.register',$editData->student_id)}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$editData->id}}">
                                <input type="hidden" name="img_name" value="{{$editData['student_name']['image']}}">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Student Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" value="{{$editData['student_name']['name']}}" name="name" class="form-control">
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
                                                        <input type="text" value="{{$editData['student_name']['fname']}}" name="fname" class="form-control">
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
                                                        <input type="text" value="{{$editData['student_name']['mname']}}" name="mname" class="form-control">
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
                                                        <input type="text" value="{{$editData['student_name']['mobile']}}" name="mobile" class="form-control">
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
                                                        <input type="text" value="{{$editData['student_name']['address']}}" name="address" class="form-control">
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
                                                            <option value="Male" {{ ($editData['student_name']['gender'] == 'Male' ? 'selected' : '' ) }}>Male</option>
                                                            <option value="Female" {{ ($editData['student_name']['gender'] == 'Female' ? 'selected' : '' ) }}>Female</option>
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
                                                            <option value="Islam" {{ ($editData['student_name']['religion'] == 'Islam' ? 'selected' : '' ) }}>Islam</option>
                                                            <option value="Christian" {{ ($editData['student_name']['religion'] == 'Christian' ? 'selected' : '' ) }}>Christian</option>
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
                                                        <input type="date" value="{{$editData['student_name']['dob']}}" name="dob" class="form-control">
                                                    </div>
                                                    @error('dob')
                                                    <span class="text-danger m-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Discount <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" value="{{$editData['discount']['discount']}}" name="discount" class="form-control">
                                                    </div>
                                                    @error('discount')
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
                                                    <h5>Year <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="year_id" id="select" class="form-control">
                                                            <option value="" selected="" disabled="">Select Year</option>
                                                            @foreach($years as $year)
                                                            <option value="{{$year->id}}" {{($year->id == $editData->year_id ? 'selected' : '')}}>{{$year->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('year_id')
                                                    <span class="text-danger m-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Class <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="class_id" id="select" class="form-control">
                                                            <option value="" selected="" disabled="">Select Class</option>
                                                            @foreach($classes as $class)
                                                            <option value="{{$class->id}}" {{($class->id == $editData->class_id ? 'selected' : '')}}>{{$class->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('class_id')
                                                    <span class="text-danger m-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Group <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="group_id" id="select" class="form-control">
                                                            <option value="" selected="" disabled="">Select Group</option>
                                                            @foreach($groups as $group)
                                                            <option value="{{$group->id}}" {{($group->id == $editData->group_id ? 'selected' : '')}}>{{$group->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('group_id')
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
                                                    <h5>Shift <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="shift_id" id="select" class="form-control">
                                                            <option value="" selected="" disabled="">Select Shift</option>
                                                            @foreach($shifts as $shift)
                                                            <option value="{{$shift->id}}" {{($shift->id == $editData->shift_id ? 'selected' : '')}}>{{$shift->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('shift_id')
                                                    <span class="text-danger m-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Student Image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="image" class="form-control" id="image">
                                                    </div>
                                                    @error('image')
                                                    <span class="text-danger m-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <img id="showImage" src="{{( !empty($editData['student_name']['image']) ? url('upload/student_images/'.$editData['student_name']['image']) : url('upload/no_image.jpg') )}}" style="width: 100px; border:1px solid #000000" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Update Student">
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