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
            Classes
            <small>Create New Class</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/admin/classes')}}">Classes</a></li>
            <li class="active">Create New Classes</li>
        </ol>
    </section>


    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Class Info</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    @include('dashboard.layouts.messages')
                    <form role="form" action="{{route('classes.store')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('post')
                        <input type="hidden" name="created_by">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1">Class Name</label>
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Class name" value="{{old('name')}}">
                                </div>

                                <div class="col-lg-6">
                                    <label>Grade</label>
                                    <select class="form-control select2" name="grade_id" style="width: 100%;">
                                        <option selected="selected">Choose Grade of Class</option>
                                        @if($grades)
                                            @foreach($grades as $grade)
                                                <option value="{{$grade->id}}">{{$grade->{'grade_'.app()->getLocale()}->grade_name }}</option>
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
