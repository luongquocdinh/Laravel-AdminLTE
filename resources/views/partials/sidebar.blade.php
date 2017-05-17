<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src={{ asset('img/default_avatar.png') }} class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">APPLICATIONS</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href='#'><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            @role('admin')
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Manage Account</span>
                <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                 </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href={{ url('/role') }}><i class="fa fa-search"></i> <span>Role</span></a></li>
                    <li><a href={{ url('/permission') }}><i class="fa fa-search"></i> <span>Permission</span></a></li>
                    <li><a href={{ url('/user') }}><i class="fa fa-fw fa-users"></i> <span>User Manager</span></a></li>
                </ul>
            </li>
            @endrole
            <li class="hover treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Manage Apps</span>
                <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                 </span>
                </a>
                
            </li>
        </ul>
        <script>
            $(function () {
                function stripTrailingSlash(str) {
                    if (str.substr(-1) == '/') {
                        return str.substr(0, str.length - 1);
                    }
                    return str;
                }

                var baseUrl = "{{ url("/") }}";
                var url = window.location.href.replace(baseUrl, "");
                var activePage = stripTrailingSlash(url);


                $('.sidebar-menu li a').each(function () {
                    var currentPage = stripTrailingSlash($(this).attr('href').replace(baseUrl, ""));

                    if (activePage.indexOf(currentPage) > -1) {
                        $(this).parent().addClass(' active');
                        $(this).parent().addClass('active');
                        $parent_1 = $(this).parent();
                        $parent_1.parent().addClass(' menu-open');
                        $parent_1.parent().css('display', 'block');
                        $parent_2 = $parent_1.parent();
                        $parent_3 = $parent_2.parent();
                        $parent_3.parent().addClass(' menu-open');
                        $parent_3.parent().addClass('menu-open');
                        $parent_3.parent().css('display', 'block');
                        $parent_4 = $parent_3.parent();
                        $parent_4.parent().parent().addClass('menu-open');
                        $parent_4.parent().parent().css('display', 'block');
                    }
                });


            });
        </script>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>