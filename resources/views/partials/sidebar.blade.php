<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("/image/Administrator-64.png") }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <!-- Status -->

            </div>
        </div>

        <!-- search form (Optional) -->

        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Navigation</li>
            <!-- Optionally, you can add icons to the links -->
            <li @if (Request::is('admin*')) class="active" @endif><a href="{{ url("admin")}}"><span>Dashboard</span></a></li>
            <li class="treeview" @if (Request::is('admin/reports*')) class="active" @endif>
                <a href="{{ url("admin/reports")}}"><span>Report</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url("admin/reports/sales")}}">Sales Report</a></li>
                    <li><a href="{{ url("admin/reports/best")}}">Best Seller</a></li>
                </ul>
            </li>
            <li class="treeview" @if (Request::is('admin/receivings*')) class="active" @endif>
                <a href="{{ url("admin/receivings")}}"><span>Receivings</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url("admin/receivings")}}">Receivings List</a></li>
                    <li><a href="{{ url("admin/receivings/create")}}">Create Receivings</a></li>
                </ul>
            </li>
            <li class="treeview" @if (Request::is('admin/movings*')) class="active" @endif>
                <a href="{{ url("admin/movings")}}"><span>Item Stock</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                   <li><a href="{{ url("admin/inventories")}}">Inventories</a></li>
                   <li><a href="{{ url("admin/movings")}}">Movings List</a></li>
                   <li><a href="{{ url("admin/movings/create")}}">Create Movings</a></li>
               </ul>
           </li>
           <li class="treeview" @if (Request::is('admin/sellings*')) class="active" @endif>
            <a href="{{ url("admin/sellings")}}"><span>Sellings</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{ url("admin/sellings")}}">Sellings List</a></li>
                <li><a href="{{ url("admin/sellings/create")}}">Create Sellings</a></li>
            </ul>
        </li>
        <li @if (Request::is('admin/items*')) class="active" @endif><a href="{{ url("admin/items")}}"><span>Items</span></a></li>
        <li @if (Request::is('admin/locations*')) class="active" @endif><a href="{{ url("admin/locations")}}"><span>Locations</span></a></li>
        <li @if (Request::is('admin/employees*')) class="active" @endif><a href="{{ url("admin/employees")}}"><span>Employees</span></a></li>
        <li @if (Request::is('admin/suppliers*')) class="active" @endif><a href="{{ url("admin/suppliers")}}"><span>Suppliers</span></a></li>

    </ul><!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>