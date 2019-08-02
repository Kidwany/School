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
                'autoWidth'   : true
            })
        })
    </script>
@endsection
{{-- Start of page Content --}}
@section('content')

    <section class="content-header">
        <h1>
            Classes
            <small> @if(!empty($teacher))
                        <a href="{{url('admin/teachers/'.$teacher->id.'/edit')}}">Classes Taught By Mr.   {{$teacher->name}} </a>
                        {{--@elseif(!empty($teacher))
                            Grades Taught By Mr. <a href="{{url('admin/teachers/'.$teacher->id.'/show')}}">{{$teacher->name}}</a>--}}
                    @else
                        All Classes
                    @endif</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/admin/classes')}}">Classes</a></li>
            <li class="active"> @if(!empty($teacher))
                        <a href="{{url('admin/teachers/'.$teacher->id.'/edit')}}">Classes Taught By Mr.   {{$teacher->name}} </a>
                        {{--@elseif(!empty($teacher))
                            Grades Taught By Mr. <a href="{{url('admin/teachers/'.$teacher->id.'/show')}}">{{$teacher->name}}</a>--}}
                    @else
                        All Classes
                    @endif
            </li>
        </ol>
    </section>



    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary" style="padding: 20px">
                    <div class="box-header with-border d-flex flex-row justify-content-between">
                        <h3 class="box-title">
                            @if(!empty($teacher))
                                Classes Taught By Mr. <a href="{{url('admin/teachers/'.$teacher->id.'/edit')}}">   {{$teacher->name}} </a>
                                    {{--@elseif(!empty($teacher))
                                        Grades Taught By Mr. <a href="{{url('admin/teachers/'.$teacher->id.'/show')}}">{{$teacher->name}}</a>--}}
                            @else
                                All Classes
                            @endif Info
                        </h3>
                        <a href="{{url('admin/classes/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Class </a>
                    </div>
                    @include('dashboard.layouts.messages')
                    <!-- /.box-header -->
                    <!-- form start -->
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Class Name</th>
                            <th>Grade</th>
                            <th>Created By</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
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
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            @if($classes)
                                @foreach($classes as $class)
                                    <tr>
                                        <td>{{$class->id}}</td>
                                        <td>{{$class->name}}</td>
                                        <td>
                                            <a href="{{url('admin/grades/'.$class->grade->id.'/edit')}}">{{$class->grade_id ? $class->grade->grade_en ? $class->grade->grade_en->grade_name : '' : ''}}</a>
                                        </td>
                                        <td>
                                            <a href="{{url('admin/users/'.$class->createdBy->id.'/edit')}}">{{$class->createdBy->name}}</a>
                                        </td>
                                        <td>{{$class->created_at->diffForHumans()}}</td>
                                        <td>{{$class->updated_at->diffForHumans()}}</td>
                                        <td>
                                            <a href="{{url('admin/classes/' . $class->id . '/edit')}}" class="btn btn-primary"><i class="fa fa-edit"></i> </a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{$class->id}}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                    @if($classes)
                        @foreach($classes as $class)
                            <div class="modal modal-danger fade" id="{{$class->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Delete Class</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are You Sure You Want To Delete Class <strong>{{$class->name}}</strong></p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route('classes.destroy', $class->id)}}" method="post">
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
