@extends('admin.admin_master')
@section('admin')
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js" integrity="sha512-RNLkV3d+aLtfcpEyFG8jRbnWHxUqVZozacROI4J2F1sTaDqo1dPQYs01OMi1t1w9Y2FdbSCDSQ2ZVdAC8bzgAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box bb-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">Student <strong>Monthly Fee</strong></h4>
                        </div>
                        <div class="box-body">

                            <div class="row">
                                <div class="col-md-3">
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
                                <div class="col-md-3">
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
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Month <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="month" id="month" class="form-control">
                                                <option value="" selected="" disabled="">Select Month</option>
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </div>
                                        @error('month_id')
                                        <span class=" text-danger m-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3 mt-4">
                                    <a id="search" class="btn btn-rounded btn-dark mb-5 mt-1">Search</a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div id="document-result">
                                        <script id="document-template" type="text/x-handlebars-template">
                                            <table class="table table-bordered table-striped" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    @{{{thsource}}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @{{#each this}}
                                                    <tr>
                                                        @{{{tdsource}}}
                                                    </tr>
                                                @{{/each}}
                                            </tbody>
                                        </table>
                                        </script>
                                    </div>
                                </div>
                            </div>

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
        var month_id = $('#month').val();
        $.ajax({
            url: "{{ route('student.monthly.fee.classwise.get')}}",
            type: "get",
            data: {
                'year_id': year_id,
                'class_id': class_id,
                'month': month_id
            },
            beforeSend: function() {},
            success: function(data) {
                var source = $("#document-template").html();
                var template = Handlebars.compile(source);
                var html = template(data);
                $('#document-result').html(html);
                $('[data-toggle="tooltip"]').tooltip();
            }
        });
    });
</script>
@endsection