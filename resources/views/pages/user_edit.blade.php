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

@stop

@section("page_header")
    <h1>
        Edit User

        <small></small>
    </h1>
    {{--@role('admin')--}}

    <ol class="breadcrumb">
        <li><a href={{ url("/user") }}><i class="fa fa-th"></i> users list</a></li>
        <li class="active"></li>
    </ol>
    <div class="box box-info">
        <div class="box-body">
            <form  id="site_form" role="form" action="{{url('/user/'.$data->id) }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>User Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{$data->name}}">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{$data->email}}">
                </div>
                <div class="form-group">
                    <label>Current Password</label>
                    <input type="password" class="form-control"  placeholder="Password"value="{{$data->password}}"disabled>
                    <label>New Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <h1>List Roles</h1></br>
                @foreach($roles as $role)
                <input type="checkbox" name="roles[]" id="{{$role->name}}" value="{{ $role->id }}"/>{{$role->display_name}}</br>
                @endforeach
                <script>
                    var listroles = JSON.parse('<?php echo json_encode($roles)?>');
                    var a = JSON.parse( '<?php echo json_encode($roles_user)?>');
                    for(var i = 0; i< listroles.length;i++)
                    {
                        for(var j = 0; j< a.length;j++)
                        {
                            if(listroles[i].name == a[j])
                            {
                                $('#'+listroles[i].name).attr('checked',true);
                                break;
                            }
                        }
                    }
                </script>
                    </div>
                <div class="box-footer clearfix">

                    <button type="submit" class="pull-right btn btn-default" id="submit">Edit
                        <i class="fa fa-arrow-circle-right"></i></button>
                </div>
            </form>


        </div>


    </div>
    {{--@endrole--}}
@stop
