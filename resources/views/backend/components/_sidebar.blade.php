<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('static')}}/main/avatar/img_avatar2.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li >
                <a href="{{route('admin')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="{{((Request::is('admin/category')) ? 'active': '' || Request::is('admin/product'))? 'active': ''}} treeview">
                <a href="#">
                    <i class="fa fa-table"></i>  <span>Quản lý sản phẩm</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="{{ Request::is('admin/category') ? 'active' : '' }}"><a href="{{route('category')}}"><i class="fa fa-circle-o"></i> Danh mục sản phẩm</a></li>
                    <li class="{{ Request::is('admin/product') ? 'active' : '' }}"><a href="{{route('product')}}"><i class="fa fa-circle-o"></i> Sản phẩm </a></li>
                </ul>
            </li>
            <li class="{{((Request::is('admin/transaction-user')) ? 'active': '' || Request::is('admin/transaction-user'))? 'active': ''}} treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>  <span>Quản lý đặt hàng</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/transaction-user') ? 'active' : '' }}"><a href="{{route('transaction-user')}}"><i class="fa fa-circle-o"></i> Khách thành viên</a></li>
                    <li class="{{ Request::is('admin/transaction-user/list-transaction') ? 'active' : '' }}"><a href="{{route('transaction-user.list-transaction')}}"><i class="fa fa-circle-o"></i>Khách vãng lai</a></li>
                    {{--<li class="{{ Request::is('admin/product') ? 'active' : '' }}"><a href="{{route('product')}}"><i class="fa fa-circle-o"></i> Sản phẩm </a></li>--}}
                </ul>
            </li>
            <li class="{{ Request::is('admin/slider') ? 'active' : '' }} ">
                <a href="{{route('slider')}}"><i class="fa fa-pie-chart"></i> <span>Quản lý Slider</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/inventory') ? 'active' : '' }} ">
                <a href="{{route('inventory')}}"><i class="fa fa-calendar"></i> <span>Quản lý hàng tồn</span></a>
            </li>
            <li class="{{ Request::is('admin/revenue') ? 'active' : '' }} ">
                <a href="{{route('revenue')}}"><i class="fa fa-pie-chart"></i> <span>Thống kê doanh thu </span>
                </a>
            </li>
            <li class="{{((Request::is('admin/user-admin')) ? 'active': '' || Request::is('admin/user-admin'))? 'active': ''}} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>  <span>Quản lý người dùng</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/user-admin') ? 'active' : '' }} ">
                        <a href="{{route('user-admin')}}"><i class="fa fa-circle-o"></i> <span>Người dùng</span></a>
                    </li>
                    <li class="{{ Request::is('admin/admin') ? 'active' : '' }} ">
                        <a href="{{route('admin-admin')}}"><i class="fa fa-circle-o"></i> <span>Quản trị viên</span></a>
                    </li>

                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>