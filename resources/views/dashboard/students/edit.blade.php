@extends('dashboard.layouts.layouts')
@section('title', 'Dashboard')
{{--Drop Your Customized Style Codes Here--}}
@section('customizedScript')
    <script>
        //Initialize Select2 Elements
        $('.select2').select2();

        $(document).ready(function () {
            $('#level').on('change', function () {
                var level_id = $(this).val();
                if (level_id)
                {
                    $.ajax({
                        header: '@csrf',
                        url: 'student-grade/'+level_id,
                        type: "GET",
                        dataType: 'json',
                        success: function (data) {
                            $('#grade').empty();
                            $.each(data, function (key, value) {
                                $('#grade').append('<option value="' + key +'">'+value.grade_en.grade_name+'</option>')
                            })
                        }
                    })
                }
            });

            $('#grade').on('change', function () {
                var grade_id = $(this).val();
                if (grade_id)
                {
                    $.ajax({
                        url: 'student-class/'+grade_id,
                        type: "GET",
                        //dataType: + 'json',
                        success: function (data) {
                            var outObjA = data;
                            var outObjA = JSON.parse(outObjA);
                            for (var i = 0; i < outObjA.length; i++) {
                                var jsonData = outObjA[i];
                                $('#class').append('<option value="' + jsonData.id +'">'+jsonData.name+'</option>')
                                console.log(jsonData.name);
                            }

                        }
                    })


                }
            })
        });
    </script>
@endsection
{{--Drop Your Customized Scripts Codes Here--}}
{{-- Start of page Content --}}
@section('content')

    <section class="content-header">
        <h1>
            Students
            <small>Update Student Info</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/admin/students')}}">Students</a></li>
            <li class="active">Update Student</li>
        </ol>
    </section>


    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Level Info</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    @include('dashboard.layouts.messages')
                    <form role="form" action="{{route('students.update', $student->id)}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="created_by">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1">Student Name</label>
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Student Name" value="{{$student->name}}">
                                </div>

                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1"> Email</label>
                                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter Student Email" value="{{$student->email}}">
                                </div>

                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1"> Phone</label>
                                    <input type="number" class="form-control" name="phone" id="exampleInputEmail1" placeholder="Enter Student Phone" value="{{$student->phone}}">
                                </div>

                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1">Address</label>
                                    <input type="text" class="form-control" name="address" id="exampleInputEmail1" placeholder="Enter Student Address" value="{{$student->address}}">
                                </div>

                                <div class="col-lg-6">
                                    <label>Level</label>
                                    <select class="form-control select2" name="level_id" style="width: 100%;" id="level">
                                        <option selected="selected" disabled="">Select Student Level</option>
                                        @foreach($levels as $level)
                                            <option value="{{$level->id}}" {{$level->id == $student->level_id ? 'selected' : ''}}>
                                                {{$level->{'level_'.currentLang()}->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-6">
                                    <label>Grade</label>
                                    <select class="form-control select2" name="grade_id" style="width: 100%;" id="grade">
                                        <option selected="selected" disabled="">Select Student Grade</option>
                                        @foreach($grades as $grade)
                                            <option value="{{$grade->id}}" {{$grade->id == $student->grade_id ? 'selected' : ''}}>
                                                {{$grade->{'grade_'.currentLang()}->grade_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-6">
                                    <label>Class</label>
                                    <select class="form-control select2" name="class_id" style="width: 100%;" id="class">
                                        <option selected="selected" disabled="">Select Student Class</option>
                                        @foreach($classes as $class)
                                            <option value="{{$class->id}}" {{$class->id == $student->class_id ? 'selected' : ''}}>
                                                {{$class->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
