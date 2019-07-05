@extends('dashboard.layouts.layouts')
@section('title', 'Dashboard')
{{--Drop Your Customized Style Codes Here--}}
@section('customizedStyle')
@endsection
{{--Drop Your Customized Scripts Codes Here--}}
@section('customizedScript')
    <script>
        $(function () {
            $('#example1').DataTable();
            $('#example2, #example3').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection
{{-- Start of page Content --}}
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Mr. <strong>{{$teacher->name}}</strong> Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('admin/teachers')}}">teachers</a></li>
            <li class="active">Teacher profile</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{asset($teacher->image_id ? $teacher->image->path : 'images/user.png')}}" alt="User profile picture" style="width: 100px; height: 100px; object-fit: cover">

                        <h3 class="profile-username text-center">{{$teacher->name}}</h3>

                        <p class="text-muted text-center">
                            @foreach($teacher->subjects as $teacherSubject)
                                <a href="{{url('admin/subjects/'.$teacherSubject->id.'/edit')}}">{{$teacherSubject->{'subject_'.currentLang()}->name }}, </a>
                            @endforeach
                        </p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Students</b> <a class="pull-right">{{$students->count()}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Subjects</b> <a class="pull-right">{{$teacher->subjects->count()}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Classes</b> <a class="pull-right">{{$teacher->classes->count()}}</a>
                            </li>
                        </ul>

                        <a href="{{url('admin/teachers/'.$teacher->id.'/edit')}}" class="btn btn-primary btn-block"><b>Update</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Teacher Info</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <strong><i class="fa fa-phone margin-r-5"></i> Email</strong>

                        <p class="text-muted">{{$teacher->email}}</p>

                        <strong><i class="fa fa-phone margin-r-5"></i> Phone</strong>

                        <p class="text-muted">{{$teacher->phone}}</p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                        <p class="text-muted">{{$teacher->address}}</p>

                        <hr>

                        <strong><i class="fa fa-pencil margin-r-5"></i> Grades</strong>

                        <p>
                            @foreach($teacher->grades as $grade)
                                <a class="label label-default" href="{{url('admin/grades/'.$grade->id.'/edit')}}">{{$grade->{'grade_'.currentLang()}->grade_name }}</a>
                            @endforeach
                        </p>

                        <hr>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">Students</a></li>
                        <li><a href="#timeline" data-toggle="tab">Grades</a></li>
                        <li><a href="#settings" data-toggle="tab">Classes</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- /Teacher Students -->
                        <div class="active tab-pane" id="activity">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Grade</th>
                                    <th>Level</th>
                                    <th>Created By</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Grade</th>
                                    <th>Level</th>
                                    <th>Created By</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @if($students)
                                    @foreach($students as $teacherStudent)
                                        @foreach($teacherStudent->student as $student)
                                            <tr>
                                                <td>{{$student->id}}</td>
                                                <td>{{$student->name}}</td>
                                                <td>
                                                    <a href="{{url('admin/classes/' . $student->classes->id  . '/edit')}}">
                                                        {{$student->classes->name }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{url('admin/grades/' . $student->grade->id  . '/edit')}}">
                                                        {{$student->grade->{'grade_'.currentLang()}->grade_name }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{url('admin/levels/' . $student->level->id  . '/edit')}}">
                                                        {{$student->level->{'level_'.currentLang()}->name }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{url('admin/users/'.$student->createdBy->id.'/edit')}}">{{$student->createdBy->name}}</a>
                                                </td>
                                                <td>{{$student->created_at->diffForHumans()}}</td>
                                                <td>{{$student->updated_at->diffForHumans()}}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                            <!-- /.post -->
                        </div>
                        <!-- /Teacher Grades -->
                        <div class="tab-pane" id="timeline">
                            <table id="example3" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Grade Name</th>
                                    <th>Level</th>
                                    <th>Created By</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>id</th>
                                    <th>Grade Name</th>
                                    <th>Level</th>
                                    <th>Created By</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @if($grades)
                                    @foreach($grades as $grade)
                                        <tr>
                                            <td>{{$grade->id}}</td>
                                            <td>{{$grade->{'grade_'.currentLang()}->grade_name }}</td>
                                            <td>
                                                <a href="{{url('admin/levels/'.$grade->level->id.'/edit')}}">{{$grade->level->{'level_' . currentLang()}->name }}</a></td>
                                            <td>
                                                <a href="{{url('admin/users/'.$grade->createdBy->id.'/edit')}}">{{$grade->createdBy->name}}</a>
                                            </td>
                                            <td>{{$grade->created_at->diffForHumans()}}</td>
                                            <td>{{$grade->updated_at->diffForHumans()}}</td>
                                            <td>
                                                <a href="{{url('admin/grades/' . $grade->id . '/edit')}}" class="btn btn-primary"><i class="fa fa-edit"></i> </a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{$grade->id}}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                        </div>
                        <!-- /.tab-pane -->

                        <!-- /Teacher Classes -->
                        <div class="tab-pane" id="settings">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Class Name</th>
                                    <th>Grade</th>
                                    <th>Created By</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>id</th>
                                    <th>Class Name</th>
                                    <th>Grade</th>
                                    <th>Created By</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @if($classes)
                                    @foreach($classes as $class)
                                        <tr>
                                            <td>{{$class->id}}</td>
                                            <td>{{$class->name}}</td>
                                            <td>
                                                <a href="{{url('admin/grades/'.$class->grade->id.'/edit')}}">{{$class->grade->{'grade_' . app()->getLocale()}->grade_name }}</a></td>
                                            <td>
                                                <a href="{{url('admin/users/'.$class->createdBy->id.'/edit')}}">{{$class->createdBy->name}}</a>
                                            </td>
                                            <td>{{$class->created_at->diffForHumans()}}</td>
                                            <td>{{$class->updated_at->diffForHumans()}}</td>
                                        </tr>
                                    @endforeach
                                @endif


                                </tbody>

                            </table>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->

@endsection
