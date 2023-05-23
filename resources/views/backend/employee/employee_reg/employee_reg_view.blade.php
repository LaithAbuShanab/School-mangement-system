@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Employee List</h3>
                            <a href="{{route('employee.add')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Add Employee</a>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>ID NO</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Gender</th>
                                            <th>Join Date</th>
                                            <th>Salary</th>
                                            @if(Auth::user()->role == 'Admin')
                                            <th>Code</th>
                                            @endif
                                            <th>Photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key => $employee)
                                        <tr>
                                            <td width="5%">{{$key+1}}</td>
                                            <td>{{$employee->id_no}}</td>
                                            <td>{{$employee->name}}</td>
                                            <td>{{$employee->mobile}}</td>
                                            <td>{{$employee->gender}}</td>
                                            <td width="25%">{{$employee->join_data}}</td>
                                            <td>{{$employee->salary}}</td>
                                            <td>{{$employee->code}}</td>
                                            <td>
                                                <img src="{{url('upload/employee_images/'.$employee->image)}}" style="width: 60px;" alt="">
                                            </td>
                                            <td width="25%">
                                                <a href="{{route('employee.edit',$employee->id)}}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{route('employee.details',$employee->id)}}" target="_blank" class="btn btn-secondary"><i class="fa-solid fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SL</th>
                                            <th>ID NO</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Gender</th>
                                            <th>Join Date</th>
                                            <th>Salary</th>
                                            @if(Auth::user()->role == 'Admin')
                                            <th>Code</th>
                                            @endif
                                            <th>Photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
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