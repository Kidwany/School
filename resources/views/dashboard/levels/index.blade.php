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
            Levels
            <small>All Levels</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/admin/grades')}}">Levels</a></li>
            <li class="active">All Levels</li>
        </ol>
    </section>



    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Levels Info</h3>
                        <a href="{{url('admin/levels/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Level </a>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <!-- form start -->
                     @include('dashboard.layouts.messages')
                <!-- /.box-header -->
                    <!-- form start -->
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Level Name</th>
                                <th>Created By</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Level Name</th>
                            <th>Created By</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @if($levels)
                            @foreach($levels as $level)
                                <tr>
                                    <td>{{$level->id}}</td>
                                    <td>{{$level->{'level_'.currentLang()}->name }}</td>
                                    <td>
                                        <a href="{{url('admin/users/'.$level->createdBy->id.'/edit')}}">{{$level->createdBy->name}}</a>
                                    </td>
                                    <td>{{$level->created_at->diffForHumans()}}</td>
                                    <td>{{$level->updated_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{url('admin/levels/' . $level->id . '/edit')}}" class="btn btn-primary"><i class="fa fa-edit"></i> </a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{$level->id}}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>

                    @if($levels)
                        @foreach($levels as $level)
                            <div class="modal modal-danger fade" id="{{$level->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Delete Level</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are You Sure You Want To Delete Level <strong>{{$level->{'level_'.currentLang()}->name }}</strong></p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route('levels.destroy', $level->id)}}" method="post">
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
