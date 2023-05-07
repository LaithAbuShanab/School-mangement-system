@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Fee Amount Details</h3>
                            <a href="{{route('fee.amount.add')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Add Fee Amount</a>
                        </div>
                        <div class="box-body">
                            <h4><Strong>Fee Category</Strong> :{{$detailData['0']['fee_category']['name']}}</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>SL</th>
                                            <th>Class Name</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($detailData as $key => $detail)
                                        <tr>
                                            <td width="5%">{{$key+1}}</td>
                                            <td>{{$detail['student_class']['name']}}</td>
                                            <td width="25%">{{$detail->amount}} </td>
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