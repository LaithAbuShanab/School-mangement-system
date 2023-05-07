@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Fee Amount List</h3>
                            <a href="{{route('fee.amount.add')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Add Fee Amount</a>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Fee Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key => $amount)
                                        <tr>
                                            <td width="5%">{{$key+1}}</td>
                                            <td>{{$amount['fee_category']['name']}}</td>
                                            <td width="25%">
                                                <a href="{{route('fee.amount.edit',$amount->fee_category_id)}}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{route('fee.amount.delete',$amount->fee_category_id)}}" class="btn btn-danger" id="delete"><i class="fa-solid fa-trash"></i></a>
                                                <a href="{{route('fee.amount.details',$amount->fee_category_id)}}" class="btn btn-primary"><i class="fa-solid fa-circle-info"></i></a>
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