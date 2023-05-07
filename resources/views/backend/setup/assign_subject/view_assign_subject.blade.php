@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Assign Subject List</h3>
                            <a href="{{route('assign.subject.add')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Add Assign Subject</a>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Class Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key => $assign)
                                        <tr>
                                            <td width="5%">{{$key+1}}</td>
                                            <td>{{$assign['student_class']['name']}}</td>
                                            <td width="25%">
                                                <a href="{{route('assign.subject.edit',$assign->class_id)}}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{route('assign.subject.delete',$assign->class_id)}}" class="btn btn-danger" id="delete"><i class="fa-solid fa-trash"></i></a>
                                                <a href="{{route('assign.subject.details',$assign->class_id)}}" class="btn btn-primary"><i class="fa-solid fa-circle-info"></i></a>
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
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection