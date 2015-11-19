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

            <li class="treeview" @if (Request::is('erp_system/item*')) class="active" @endif>
                <a href=""><span>Inventory</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                   <li  @if (Request::is('erp_system/item*')) class="active" @endif><a href="{{ url("erp_system/item")}}">Item</a></li>
                   
        
               </ul>
           </li>
             <li class="treeview" @if (Request::is('erp_system/rfq*')) class="active" @endif>
                <a href=""><span>RFQ</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                   <li ><a href="{{ url("erp_system/rfq")}}">RFQ List</a></li>
                   <li><a href="{{ url("erp_system/rfq/create")}}">Create RFQ</a></li>
        
               </ul>
           </li>
           <li class="treeview" @if (Request::is('erp_system/qtn*')) class="active" @endif>
                <a href=""><span>QTN</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                   <li ><a href="{{ url("erp_system/qtn")}}">QTN List</a></li>
                  <!--  <li><a href="{{ url("erp_system/qtn/create")}}">Create QTN</a></li> -->
        
               </ul>
           </li>
          <li @if (Request::is('erp_system/customer*')) class="active" @endif><a href="{{ url("erp_system/customer")}}"><span>Customer</span></a></li>

    </ul><!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>