@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Designation List</h3>
                            <a href="{{route('designation.add')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Add Designation</a>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>School Subject Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key => $designation)
                                        <tr>
                                            <td width="5%">{{$key+1}}</td>
                                            <td>{{$designation->name}}</td>
                                            <td width="25%">
                                                <a href="{{route('designation.edit',$designation->id)}}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{route('designation.delete',$designation->id)}}" class="btn btn-danger" id="delete"><i class="fa-solid fa-trash"></i></a>
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