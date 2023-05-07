@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Assign Subject Details</h3>
                            <a href="{{route('assign.subject.add')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Add Fee Amount</a>
                        </div>
                        <div class="box-body">
                            <h4><Strong>Assign Subject</Strong> :{{$detailData['0']['student_class']['name']}}</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>SL</th>
                                            <th>Subject</th>
                                            <th>Full Mark</th>
                                            <th>Pass Mark</th>
                                            <th>Subjective Mark</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($detailData as $key => $detail)
                                        <tr>
                                            <td width="5%">{{$key+1}}</td>
                                            <td>{{$detail['School_subject']['name']}}</td>
                                            <td width="25%">{{$detail->full_mark}} </td>
                                            <td width="25%">{{$detail->pass_mark}} </td>
                                            <td width="25%">{{$detail->subjective_mark}} </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SL</th>
                                            <th>Subject</th>
                                            <th>Full Mark</th>
                                            <th>Pass Mark</th>
                                            <th>Subjective Mark</th>
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