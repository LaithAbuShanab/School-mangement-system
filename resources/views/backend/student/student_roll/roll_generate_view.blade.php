@extends('admin.admin_master')
@section('admin')
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box bb-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">Student<strong>Roll Generate</strong></h4>
                        </div>
                        <div class="box-body">
                            <form method="POST" action="{{route('roll.generate.store')}}">
                                @csrf
                                @error('roll[]')
                                <span class="text-danger m-1">{{$message}}</span>
                                @enderror
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Year <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="year_id" id="year_id" class="form-control">
                                                    <option value="" selected="" disabled="">Select Year</option>
                                                    @foreach($years as $year)
                                                    <option value="{{$year->id}}">{{$year->name}}</option>
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
                                                <select name="class_id" id="class_id" class="form-control">
                                                    <option value="" selected="" disabled="">Select Class</option>
                                                    @foreach($classes as $class)
                                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('class_id')
                                            <span class=" text-danger m-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <a id="search" class="btn btn-rounded btn-dark mb-5 mt-1">Search</a>
                                    </div>
                                </div>


                                <div class="row d-none" id="roll-generate">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-striped" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>ID No</th>
                                                    <th>Student Name</th>
                                                    <th>Father Name</th>
                                                    <th>Gender</th>
                                                    <th>Roll</th>
                                                </tr>
                                            </thead>
                                            <tbody id="roll-generate-tr">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <input id="submit-roll" type="submit" class="btn btn-info d-none" value="Roll Generator">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>


<script type="text/javascript">
    $(document).on('click', '#search', function() {
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();
        $.ajax({
            url: "{{ route('student.registration.getstudents')}}",
            type: "GET",
            data: {
                'year_id': year_id,
                'class_id': class_id
            },
            success: function(data) {
                console.log(data.length)
                if (data.length != 0) {
                    $('#roll-generate').removeClass('d-none');
                    var html = '';
                    $.each(data, function(key, v) {
                        html +=
                            '<tr>' +
                            '<td>' + v.student_name.id_no + '<input type="hidden" name="student_id[]" value="' + v.student_id + '"></td>' +
                            '<td>' + v.student_name.name + '</td>' +
                            '<td>' + v.student_name.fname + '</td>' +
                            '<td>' + v.student_name.gender + '</td>' +
                            '<td><input type="text" class="form-control form-control-sm" name="roll[]" value="' + v.roll + '"></td>' +
                            '</tr>';
                    });
                    html = $('#roll-generate-tr').html(html);
                    $('#submit-roll').removeClass('d-none');
                } else {
                    toastr.warning("There Is No Student");
                }
            }
        });
    });
</script>


@endsection