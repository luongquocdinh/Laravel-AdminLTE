@extends('layouts.main')

@section("customStyle")
    <link rel="stylesheet" href={{ asset('plugins/datatables/dataTables.bootstrap.css') }}>
@stop

@section("customJs")
    <script src={{ asset('plugins/datatables/jquery.dataTables.min.js') }}></script>
    <script src={{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}></script>
    <!-- SlimScroll -->
    <script src={{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}></script>
    <!-- FastClick -->
    <script src={{ asset('plugins/fastclick/fastclick.js') }}></script>
    <script>
        $(function () {
            $("#example1").DataTable();
            {{--$("a.changeStatus").click(function (event) {--}}
                {{--event.preventDefault();--}}
                {{--var url = $(this).context.href;--}}
                {{--$.ajax({--}}
                    {{--type: "GET",--}}
                    {{--url,--}}
                    {{--headers: {--}}
                        {{--'Authorization': 'Bearer {{ Auth::user()->api_token }}'--}}
                    {{--},--}}
                    {{--success: function (response) {--}}
                        {{--console.log(response.data.status);--}}
                        {{--var result = response.data.status;--}}
                        {{--var id = response.data.id;--}}
                        {{--$("#" + id).removeClass();--}}
                        {{--$("#" + id).addClass('label ' + (result ? "label-danger" : "label-success"));--}}
                        {{--$("#" + id).html(result ? 'Block' :'UnBlock' );--}}
                        {{--$('#changeStatus' + id).html(result ? 'UnBlock' :'Block' );--}}
                    {{--}--}}
                {{--});--}}
            {{--});--}}
        });
    </script>

@stop

@section("page_header")
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">List Users</h3>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
                <table class="table no-margin" id="example1">

                    <thead>
                    <tr>
                        <th>Role Name</th>
                        <th>Display Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($datas as $data)
                        <tr>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->display_name }}</td>
                            <td>{{$data->description}}</td>


                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle"
                                            data-toggle="dropdown">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        {{--<li>--}}
                                            {{--<a id = "changeStatus{{$data->_id}}" class="changeStatus" href={{ url('/api/user/'.$data->_id).'/change_block' }}>{{ $data['is_block'] ? "UnBlock" : "Block" }}</a>--}}
                                        {{--</li>--}}
                                        <li><a   href={{ url('/role/'.$data->id).'/edit' }}>Edit</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>


            <!-- /.table-responsive -->
        </div>

    <!-- /.box-body -->
        <div class="box-footer clearfix">

            <a href="{{url('/role/create')}}" class="btn btn-sm btn-info btn-flat pull-left">Add New Role</a>

        </div>
        <!-- /.box-footer -->
    </div>
@stop
