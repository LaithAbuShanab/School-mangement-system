@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">

            <div class="row">
                <div class="col-12">
                    <div class="box bb-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">Student Search <strong>left</strong></h4>
                        </div>
                        <div class="box-body">
                            <form method="GET" action="{{route('student.year.class.wise')}}">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Year <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="year_id" id="select" class="form-control">
                                                    <option value="" selected="" disabled="">Select Year</option>
                                                    @foreach($years as $year)
                                                    <option value="{{$year->id}}" {{ (@$year->id == $year->id) ? 'selected' : ''}}>{{$year->name}}</option>
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
                                                    <option value="{{$class->id}}" {{ (@$class->id == $class->id) ? 'selected' : ''}}>{{$class->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('class_id')
                                            <span class=" text-danger m-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <input type="submit" name="search" value="Search" class="btn btn-rounded btn-dark mb-5 mt-1">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Student List</h3>
                            <a href="{{route('student.reg.add')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Add Student</a>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">

                                @if(!isset($search))
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>ID No</th>
                                            <th>Role</th>
                                            <th>Year</th>
                                            <th>Class</th>
                                            <th>Image</th>
                                            @if(Auth::user()->role=="Admin")
                                            <th>Code</th>
                                            @endif
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key => $value)
                                        <tr>
                                            <td width="5%">{{$key+1}}</td>
                                            <td>{{$value['student_name']['name']}}</td>
                                            <td>{{$value['student_name']['id_no']}}</td>
                                            <td>{{$value->roll}}</td>
                                            <td>{{$value['student_year']['name']}}</td>
                                            <td>{{$value['student_class']['name']}}</td>
                                            <td>
                                                <img src="{{url('upload/student_images/'.$value['student_name']['image'])}}" style="width: 60px;" alt="">
                                            </td>
                                            <td>{{$value['student_name']['code']}}</td>
                                            <td>
                                                <a href="{{route('student.reg.edit',$value->student_id)}}" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{route('student.reg.promotion',$value->student_id)}}" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i>
                                                </a>
                                                <a target="_blank" href="{{route('student.reg.details',$value->student_id)}}" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>ID No</th>
                                            <th>Role</th>
                                            <th>Year</th>
                                            <th>Class</th>
                                            <th>Image</th>
                                            @if(Auth::user()->role=="Admin")
                                            <th>Code</th>
                                            @endif
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                @else
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>ID No</th>
                                            <th>Role</th>
                                            <th>Year</th>
                                            <th>Class</th>
                                            <th>Image</th>
                                            @if(Auth::user()->role=="Admin")
                                            <th>Code</th>
                                            @endif
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key => $value)
                                        <tr>
                                            <td width="5%">{{$key+1}}</td>
                                            <td>{{$value['student_name']['name']}}</td>
                                            <td>{{$value['student_name']['id_no']}}</td>
                                            <td>{{$value['student_name']['usertype']}}</td>
                                            <td>{{$value['student_year']['name']}}</td>
                                            <td>{{$value['student_class']['name']}}</td>
                                            <td>
                                                <img src="{{url('upload/student_images/'.$value['student_name']['image'])}}" style="width: 60px;" alt="">
                                            </td>
                                            <td>{{$value['student_name']['code']}}</td>
                                            <td>
                                                <a href="{{route('student.reg.edit',$value->student_id)}}" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{route('student.reg.promotion',$value->student_id)}}" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i>
                                                </a>
                                                <a target="_blank" href="{{route('student.reg.details',$value->student_id)}}" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>ID No</th>
                                            <th>Role</th>
                                            <th>Year</th>
                                            <th>Class</th>
                                            <th>Image</th>
                                            @if(Auth::user()->role=="Admin")
                                            <th>Code</th>
                                            @endif
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                @endif
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection