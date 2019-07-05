@extends('dashboard.layouts.layouts')
@section('title', 'Dashboard')
{{--Drop Your Customized Style Codes Here--}}
@section('customizedStyle')
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice
        {
            background-color: #3c8dbc !important;
        }
    </style>
@endsection
{{--Drop Your Customized Scripts Codes Here--}}
@section('customizedScript')
    <script>
        //Initialize Select2 Elements
        $('.select2').select2()
    </script>
@endsection
{{-- Start of page Content --}}
@section('content')

    <section class="content-header">
        <h1>
            Teachers
            <small>Update Teacher Info</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/admin/teachers')}}">Teachers</a></li>
            <li class="active">Create Teacher</li>
        </ol>
    </section>


    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Teacher Info</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    @include('dashboard.layouts.messages')
                    <form role="form" action="{{route('teachers.update', $teacher->id)}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="created_by">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1">Teacher Name</label>
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Teacher Name" value="{{$teacher->name}}">
                                </div>


                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1"> Email</label>
                                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter Teacher Email" value="{{$teacher->email}}">
                                </div>


                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1"> Phone</label>
                                    <input type="number" class="form-control" name="phone" id="exampleInputEmail1" placeholder="Enter Teacher Phone" value="{{$teacher->phone}}">
                                </div>


                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1">Address</label>
                                    <input type="text" class="form-control" name="address" id="exampleInputEmail1" placeholder="Enter Teacher Address" value="{{$teacher->address}}">
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Subjects Taught By Teacher</label>
                                        <select name="subjects[]" class="form-control select2" multiple="multiple" data-placeholder="Select a Subjects Taught by Teacher"
                                                style="width: 100%;">
                                            @if($subjects)
                                                @foreach($subjects as $subject)
                                                    <option value="{{$subject->id}}" @foreach($teacher->subjects as $teacherSubject) {{$subject->id == $teacherSubject->id ? 'selected' : ''}} @endforeach>
                                                        {{$subject->{'subject_'.currentLang()}->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Grades Taught By Teacher</label>
                                        <select name="grades[]" class="form-control select2" multiple="multiple" data-placeholder="Select a Grades Taught by Teacher"
                                                style="width: 100%;">
                                            @if($grades)
                                                @foreach($grades as $grade)
                                                    <option value="{{$grade->id}}" @foreach($teacher->grades as $teacherGrade) {{$grade->id == $teacherGrade->id ? 'selected' : ''}} @endforeach>
                                                        {{$grade->{'grade_'.currentLang()}->grade_name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="password">Profile Picture</label>
                                    <input type="file" name="image_id" class="form-control" id="password" placeholder="Repeat Password">
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
