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
        Role Detail
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href={{ url("/role") }}><i class="fa fa-th"></i> roles list</a></li>
        <li class="active"></li>
    </ol>
    <div class="box box-info">

        <div class="box-body">
            <form id="site_form" role="form" action="{{url('/role')}}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Role Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Role Display Name</label>
                    <input type="text" class="form-control" name="display_name" placeholder="Display Name">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control" name="description" placeholder="Description">
                </div>
                <div class="box-footer clearfix">
                    <button type="submit" class="pull-right btn btn-default" id="submit">Add
                        <i class="fa fa-arrow-circle-right"></i></button>
                </div>
            </form>
        </div>

    </div>
@stop
