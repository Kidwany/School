
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
            Dashboard
            <small>School Statistics</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/admin')}}">Dashboard</a></li>
            <li class="active">School Statistics</li>
        </ol>
    </section>

    <!---- General Statistics ---->
    <section class="content" style="min-height: 160px !important;">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$students}}</h3>

                        <p>Students</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="{{url('admin/students')}}" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{$teachers}}</h3>

                        <p>Teachers</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-male"></i>
                    </div>
                    <a href="{{url('admin/teachers')}}" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{$classes}}</h3>

                        <p>Classes</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-graduation-cap"></i>
                    </div>
                    <a href="{{url('admin/classes')}}" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{$subjects}}</h3>

                        <p>Subjects</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-book"></i>
                    </div>
                    <a href="{{url('admin/subjects')}}" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </section>

    <!---- Users ---->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Latest Added Users</h3>
                                    <a href="{{url('admin/users/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New User </a>
                                </div>
                            @include('dashboard.layouts.messages')
                            <!-- /.box-header -->
                                <!-- form start -->
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @if($users)
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->created_at->diffForHumans()}}</td>
                                                <td>{{$user->updated_at->diffForHumans()}}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            {{--<div class="col-lg-3">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Browser Usage</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="chart-responsive">
                                    <canvas id="pieChart" height="150"></canvas>
                                </div>
                                <!-- ./chart-responsive -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <ul class="chart-legend clearfix">
                                    <li><i class="fa fa-circle-o text-red"></i> Chrome</li>
                                    <li><i class="fa fa-circle-o text-green"></i> IE</li>
                                    <li><i class="fa fa-circle-o text-yellow"></i> FireFox</li>
                                    <li><i class="fa fa-circle-o text-aqua"></i> Safari</li>
                                    <li><i class="fa fa-circle-o text-light-blue"></i> Opera</li>
                                    <li><i class="fa fa-circle-o text-gray"></i> Navigator</li>
                                </ul>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">United States of America
                                    <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
                            <li><a href="#">India <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a>
                            </li>
                            <li><a href="#">China
                                    <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
                        </ul>
                    </div>
                    <!-- /.footer -->
                </div>
                <!-- /.box -->
            </div>--}}
        </div>
    </div>


@endsection
