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
            Grades


            <small>@if(!empty($subject)){{$subject->{'subject_'.currentLang()}->name . ' Subject'}} @else All @endif Grades</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/admin/grades')}}">Grades</a></li>
            <li class="active">All Grades</li>
        </ol>
    </section>


    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary" style="padding: 15px">
                    <div class="box-header with-border">
                        <h3 class="box-title">@if(!empty($subject)){{$subject->{'subject_'.currentLang()}->name . ' Subject'}} @else All @endif Grades Info</h3>
                        <a href="{{url('admin/grades/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Grade </a>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    @include('dashboard.layouts.messages')
                    <!-- /.box-header -->
                    <!-- form start -->
                    <table id="example2" class="table table-bordered table-hover">
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

                    @if($grades)
                        @foreach($grades as $grade)
                            <div class="modal modal-danger fade" id="{{$grade->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Delete Class</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are You Sure You Want To Delete Grade <strong>{{$grade->{'grade_'.currentLang()}->grade_name }}</strong></p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route('grades.destroy', $grade->id)}}" method="post">
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
