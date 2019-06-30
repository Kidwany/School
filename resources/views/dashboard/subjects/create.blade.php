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
            Subjects
            <small>Create New Subject</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/admin/subjects')}}">Subjects</a></li>
            <li class="active">Create Subject</li>
        </ol>
    </section>


    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Subject Info</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    @include('dashboard.layouts.messages')
                    <form role="form" action="{{route('subjects.store')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('post')
                        <input type="hidden" name="created_by">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1">Subject Name in English</label>
                                    <input type="text" class="form-control" name="name_en" id="exampleInputEmail1" placeholder="Enter Subject Name in English">
                                </div>

                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1"> Subject Name in Arabic</label>
                                    <input type="text" class="form-control" name="name_ar" id="exampleInputEmail1" placeholder="Enter Subject Name in Arabic">
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Grades Learn Subject</label>
                                        <select name="grades[]" class="form-control select2" multiple="multiple" data-placeholder="Select a Grades"
                                                style="width: 100%;">
                                            @if($grades)
                                                @foreach($grades as $grade)
                                                    <option value="{{$grade->id}}">{{$grade->{'grade_'.currentLang()}->grade_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Grades Learn Subject</label>
                                        <select name="teachers[]" class="form-control select2" multiple="multiple" data-placeholder="Select a Grades"
                                                style="width: 100%;">
                                            @if($teachers)
                                                @foreach($teachers as $teacher)
                                                    <option value="{{$teacher->id}}">{{$teacher->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
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
