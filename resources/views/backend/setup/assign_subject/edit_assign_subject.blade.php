@extends('admin.admin_master')
@section('admin')
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Assign Subject</h4>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{route('update.assign.subject',$editData[0]->class_id)}}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="add_item">
                                            <div class="form-group">
                                                <h5>Class Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="class_id" class="form-control">
                                                        <option value="" selected="" disabled="">Select Class</option>
                                                        @foreach($classes as $class)
                                                        <option value="{{$class->id}}" {{($editData['0']->class_id == $class->id ? 'selected' : '' )}}>{{$class->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            @foreach($editData as $edit)
                                            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <h5>Student Subject <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <select name="subject_id[]" class="form-control">
                                                                    <option value="" selected="" disabled="">Select Subject</option>
                                                                    @foreach($subject as $sub)
                                                                    <option value="{{$sub->id}}" {{($edit->subject_id == $sub->id ? 'selected' : '' )}}>{{$sub->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <h5>Full Mark <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" value="{{$edit->full_mark}}" name="full_mark[]" class="form-control">
                                                            </div>
                                                            @error('full_mark')
                                                            <span class="text-danger m-1">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <h5>Pass Mark <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" value="{{$edit->pass_mark}}" name="pass_mark[]" class="form-control">
                                                            </div>
                                                            @error('pass_mark')
                                                            <span class="text-danger m-1">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <h5>Subjective Mark <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" value="{{$edit->subjective_mark}}" name="subjective_mark[]" class="form-control">
                                                            </div>
                                                            @error('subjective_mark')
                                                            <span class="text-danger m-1">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2" style="padding: 25px;">
                                                        <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                                                        <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info" value="Save">
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

<div style="visibility: hidden;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="form-row">
                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Student Subject <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="subject_id[]" class="form-control">
                                <option value="" selected="" disabled="">Select Subject</option>
                                @foreach($subject as $sub)
                                <option value="{{$sub->id}}">{{$sub->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <h5>Full Mark <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="full_mark[]" class="form-control">
                        </div>
                        @error('full_mark')
                        <span class="text-danger m-1">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <h5>Pass Mark <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="pass_mark[]" class="form-control">
                        </div>
                        @error('pass_mark')
                        <span class="text-danger m-1">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <h5>Subjective Mark <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="subjective_mark[]" class="form-control">
                        </div>
                        @error('subjective_mark')
                        <span class="text-danger m-1">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2" style="padding: 25px;">
                    <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                    <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var counter = 0;
        $(document).on("click", ".addeventmore", function() {
            var whole_extra_item_add = $('#whole_extra_item_add').html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });
        $(document).on("click", ".removeeventmore", function(event) {
            $(this).closest(".delete_whole_extra_item_add").remove();
            counter -= 1;
        });
    });
</script>
@endsection