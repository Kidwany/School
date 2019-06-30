@extends('dashboard.layouts.layouts')
@section('title', 'Dashboard')
{{--Drop Your Customized Style Codes Here--}}
@section('customizedStyle')
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
            Grades
            <small>Create New Grade</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/admin/grades')}}">Grades</a></li>
            <li class="active">Create New Grade</li>
        </ol>
    </section>


    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Grade Info</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <form role="form" action="{{route('grades.store')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('post')
                        <input type="hidden" name="created_by">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1">Grade Name in English</label>
                                    <input type="text" class="form-control" name="grade_name_en" id="exampleInputEmail1" placeholder="Enter Grade name in English">
                                </div>

                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1">Grade Name in Arabic</label>
                                    <input type="text" class="form-control" name="grade_name_ar" id="exampleInputEmail1" placeholder="Enter Grade name in Arabic">
                                </div>

                                <div class="col-lg-6">
                                    <label>level</label>
                                    <select class="form-control select2" name="level_id" style="width: 100%;">
                                        <option selected="selected">Choose Grade's Level</option>
                                        @if($levels)
                                            @foreach($levels as $level)
                                                <option value="{{$level->id}}">{{$level->{'level_'.currentLang()}->name }}</option>
                                            @endforeach
                                        @endif
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
