@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ backpack_avatar_url(Auth::user()) }}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <small>
                        <small><a href="{{ route('backpack.account.info') }}"><span><i
                                            class="fa fa-user-circle-o"></i> {{ trans('backpack::base.my_account') }}</span></a>
                            &nbsp; &nbsp; <a href="{{ backpack_url('logout') }}"><i class="fa fa-sign-out"></i>
                                <span>{{ trans('backpack::base.logout') }}</span></a></small>
                    </small>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">{{ trans('backpack::base.administration') }}</li>
                <li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i>
                        <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
                <li><a href="{{  backpack_url('task') }}"><i class="fa fa-check-square-o"></i>
                        <span>Tasks</span></a></li>
                <li><a href="{{  backpack_url('task/group') }}"><i class="fa fa-list-ul"></i>
                        <span>Task Groups</span></a></li>
                <li><a href="{{  backpack_url('elfinder') }}"><i class="fa fa-files-o"></i>
                        <span>File manager</span></a></li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-group"></i> <span>Users, Roles, Permissions</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/user') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
                        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/role') }}"><i class="fa fa-group"></i> <span>Roles</span></a></li>
                        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/permission') }}"><i class="fa fa-key"></i> <span>Permissions</span></a></li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
@endif
