@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Exam Type</h4>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{route('update.exam.type',$editData->id)}}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Exam Type Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" value="{{$editData->name}}" name="name" class="form-control">
                                            </div>
                                            @error('name')
                                            <span class="text-danger m-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info" value="Update">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection