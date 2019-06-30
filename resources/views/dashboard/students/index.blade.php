@extends('dashboard.layouts.layouts')
@section('title', 'Dashboard')
{{--Drop Your Customized Style Codes Here--}}
@section('customizedStyle')
@endsection
{{--Drop Your Customized Scripts Codes Here--}}
{{--Drop Your Customized Scripts Codes Here--}}
@section('customizedScript')
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true
            })
        })
    </script>
@endsection
{{-- Start of page Content --}}
@section('content')

    <section class="content-header">
        <h1>
            Students
            <small>All Students</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/admin/students')}}">Grades</a></li>
            <li class="active">All Students</li>
        </ol>
    </section>



    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary" style="padding: 15px">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Students Info</h3>
                        <a href="{{url('admin/students/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Student </a>
                    </div>
                    @include('dashboard.layouts.messages')
                    <!-- /.box-header -->
                    <!-- form start -->
                    <!-- form start -->
                <!-- /.box-header -->
                    <!-- form start -->
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Class</th>
                            <th>Grade</th>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Class</th>
                            <th>Grade</th>
                            <th>Level</th>
                            <th>Created By</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @if($students)
                            @foreach($students as $student)
                                <tr>
                                    <td>{{$student->id}}</td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->email}}</td>
                                    <td>{{$student->phone}}</td>
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
                                    <td>
                                        <a href="{{url('admin/students/' . $student->id . '/edit')}}" class="btn btn-primary"><i class="fa fa-edit"></i> </a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{$student->id}}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>

                    @if($students)
                        @foreach($students as $student)
                            <div class="modal modal-danger fade" id="{{$student->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Delete Student</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are You Sure You Want To Delete Student <strong>{{$student->name }}</strong></p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route('students.destroy', $student->id)}}" method="post">
                                                @method('delete')
                                                @csrf
                                                <div class="d-flex flex-row">
                                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal" style="margin-right: 5px">
                                                        cancel
                                                    </button>
                                                    <button type="submit" class="btn btn-danger">
                                                        Delete
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </section>

@endsection
