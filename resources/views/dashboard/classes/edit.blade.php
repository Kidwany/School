@extends('dashboard.layouts.layouts')
@section('title', 'Dashboard')
{{--Drop Your Customized Style Codes Here--}}
@section('customizedStyle')
@endsection
{{--Drop Your Customized Scripts Codes Here--}}
@section('customizedScript')
@endsection
{{-- Start of page Content --}}
@section('content')

    <section class="content-header">
        <h1>
            Classes
            <small>Update Class</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/admin/classes')}}">Classes</a></li>
            <li class="active">Update Class</li>
        </ol>
    </section>


    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Students Info</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    @include('dashboard.layouts.messages')
                    <form role="form" action="{{route('classes.update', $class->id)}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="created_by">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1">Class Name</label>
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Class name" value="{{$class->name}}">
                                </div>

                                <div class="col-lg-6">
                                    <label>Grade</label>
                                    <select class="form-control select2" name="grade_id" style="width: 100%;">
                                        @if($grades)
                                            @foreach($grades as $grade)
                                                @if($grade->grade_en)
                                                    <option value="{{$grade->id}}" {{$grade->id == $class->grade_id ? 'selected' : ''}}>
                                                        {{$grade->grade_en ? $grade->grade_en->grade_name : ''}}
                                                    </option>
                                                @endif
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
