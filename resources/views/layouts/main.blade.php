@extends('layouts.default')

@section("body")
    <body class="hold-transition skin-black sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="/" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b></b>Apps</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Apps</b> Admin</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                @include("partials.navbar_right")
            </nav>
        </header>
    @include("partials.sidebar")

    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
                @section("page_header")
                @show
            </section>
            <section class="content">
                @section("content")
                @show
            </section>
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
                If you never try, you'll never know.
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2016 <a href="#">9Action</a>.</strong> All rights reserved.
        </footer>

        @section("sidebar_right")
        @show
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    @include('includes.footer')

    </body>
@stop
