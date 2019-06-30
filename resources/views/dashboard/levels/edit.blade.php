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
            Levels
            <small>Update Level</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/admin/grades')}}">Levels</a></li>
            <li class="active">Update Level</li>
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
                    <form role="form" action="{{route('levels.update', $level->id)}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="created_by">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1">Level Name in English</label>
                                    <input type="text" class="form-control" name="level_name_en" id="exampleInputEmail1" placeholder="Enter Level name in English" value="{{$level->level_en->name}}">
                                </div>

                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1">Level Name in Arabic</label>
                                    <input type="text" class="form-control" name="level_name_ar" id="exampleInputEmail1" placeholder="Enter Level name in Arabic" value="{{$level->level_ar->name}}">
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
