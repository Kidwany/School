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
            Subjects
            <small>@if(!empty($teacher)){{$teacher->name . ' Teacher'}} @else All @endif Subjects</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/admin/subjects')}}">Subjects</a></li>
            <li class="active">@if(!empty($teacher))<a href="{{url('admin/teachers/'.$teacher->id.'/show')}}">{{$teacher->name . ' Teacher'}}</a>  @else All @endif Subjects</li>
        </ol>
    </section>



    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary" style="padding: 15px">
                    <div class="box-header with-border">
                        <h3 class="box-title">@if(!empty($teacher))<a href="{{url('admin/teachers/'.$teacher->id.'/show')}}">{{$teacher->name}}</a> Teacher  @else All @endif Subjects</h3>
                        <a href="{{url('admin/subjects/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Subject </a>
                    </div>
                    @include('dashboard.layouts.messages')
                    <!-- /.box-header -->
                    <!-- form start -->
                    <!-- form start -->
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Subject Name</th>
                            <th>Grades</th>
                            <th>Teachers</th>
                            <th>Created By</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Subject Name</th>
                            <th>Grades</th>
                            <th>Teachers</th>
                            <th>Created By</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @if($subjects)
                            @foreach($subjects as $subject)
                                <tr>
                                    <td>{{$subject->id}}</td>
                                    <td>{{$subject->{'subject_'.currentLang()}->name}}</td>
                                    <td>
                                        <a href="{{url('admin/grades?subjectID='.$subject->id)}}">Show Grades</a>
                                    </td>
                                    <td>
                                        <a href="{{url('admin/teachers?subjectID='.$subject->id)}}">Show Teachers</a>
                                    </td>
                                    <td>
                                        <a href="{{url('admin/users/'.$subject->createdBy->id.'/edit')}}">{{$subject->createdBy->name}}</a>
                                    </td>
                                    <td>{{$subject->created_at->diffForHumans()}}</td>
                                    <td>{{$subject->updated_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{url('admin/subjects/' . $subject->id . '/edit')}}" class="btn btn-primary"><i class="fa fa-edit"></i> </a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{$subject->id}}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>
                    @if($subjects)
                        @foreach($subjects as $subject)
                            <div class="modal modal-danger fade" id="{{$subject->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Delete Subject</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are You Sure You Want To Delete Subject <strong>{{$subject->{'subject_'.currentLang()}->name }}</strong></p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route('subjects.destroy', $subject->id)}}" method="post">
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
