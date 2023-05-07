@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Student Shift List</h3>
                            <a href="{{route('student.shift.add')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Add Student Shift</a>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Shift Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key => $student)
                                        <tr>
                                            <td width="5%">{{$key+1}}</td>
                                            <td>{{$student->name}}</td>
                                            <td width="25%">
                                                <a href="{{route('student.shift.edit',$student->id)}}" class="btn btn-info">Edit</a>
                                                <a href="{{route('student.shift.delete',$student->id)}}" class="btn btn-danger" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
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