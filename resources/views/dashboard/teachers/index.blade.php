@extends('dashboard.layouts.layouts')
@section('title', 'Dashboard')
{{--Drop Your Customized Style Codes Here--}}
@section('customizedStyle')
@endsection
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
                'autoWidth'   : false
            })
        })
    </script>
@endsection
{{-- Start of page Content --}}
@section('content')

    <section class="content-header">
        <h1>
            Teachers
            <small>All Teachers</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/admin/teachers')}}">Teachers</a></li>
            <li class="active">All Teachers</li>
        </ol>
    </section>



    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary" style="padding: 20px">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Teachers Info</h3>
                        <a href="{{url('admin/teachers/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Teacher </a>
                    </div>
                    @include('dashboard.layouts.messages')
                    <!-- /.box-header -->
                    <!-- form start -->

                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Grades</th>
                            <th>Subjects</th>
                            <th>Students</th>
                            <th>Classes</th>
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
                            <th>Grades</th>
                            <th>Subjects</th>
                            <th>Students</th>
                            <th>Classes</th>
                            <th>Created By</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @if($teachers)
                            @foreach($teachers as $teacher)
                                <tr>
                                    <td>{{$teacher->id}}</td>
                                    <td>{{$teacher->name}}</td>
                                    <td>
                                        <a href="{{url('admin/grades?teacherID='.$teacher->id)}}">Show Grades</a>
                                    </td>
                                    <td>
                                        <a href="{{url('admin/subjects?teacherID='.$teacher->id)}}">Show Subjects</a>
                                    </td>
                                    <td>
                                        <a href="{{url('admin/students?teacherID='.$teacher->id)}}">Show Students</a>
                                    </td>
                                    <td>
                                        <a href="{{url('admin/classes?teacherID='.$teacher->id)}}">Show Classes</a>
                                    </td>
                                    <td>
                                        <a href="{{url('admin/users/'.$teacher->createdBy->id.'/edit')}}">{{$teacher->createdBy->name}}</a>
                                    </td>
                                    <td>{{$teacher->created_at->diffForHumans()}}</td>
                                    <td>{{$teacher->updated_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{url('admin/teachers/' . $teacher->id . '/show')}}" class="btn btn-block"><i class="fa fa-eye"></i> </a>
                                        <a href="{{url('admin/teachers/' . $teacher->id . '/edit')}}" class="btn btn-primary"><i class="fa fa-edit"></i> </a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{$teacher->id}}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>
                    @if($teachers)
                        @foreach($teachers as $teacher)
                            <div class="modal modal-danger fade" id="{{$teacher->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Delete Subject</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are You Sure You Want To Delete Teacher <strong>{{$teacher->name }}</strong></p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route('teachers.destroy', $teacher->id)}}" method="post">
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
