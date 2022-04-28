<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    @can('الرئيسية')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('main_trans.Home')}}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('dashboard.home')}}">{{trans('main_trans.Home')}}</a> </li>
                        </ul>
                    </li>
                    @endcan

                    <!-- menu item calendar-->
                    @can('الاقسام')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">{{trans('main_trans.Categories')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('dashboard.categories.index')}}">{{trans('main_trans.Categories')}}</a> </li>
                        </ul>
                    </li>
                    @endcan
                    <!-- menu item todo-->

                    @can('المنتجات')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                            <div class="pull-left"><i class="ti-pie-chart"></i><span
                                    class="right-nav-text">{{trans('main_trans.products')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="chart" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('dashboard.products.index')}}">{{trans('main_trans.products')}}</a> </li>
                        </ul>
                    </li>
                    @endcan

                    @can('المستخدمين')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                                <div class="pull-left"><i class="ti-palette"></i><span
                                        class="right-nav-text">{{trans('main_trans.Users')}}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="elements" class="collapse" data-parent="#sidebarnav">
                                <li><a href="{{route('dashboard.users.index')}}">{{trans('main_trans.Users')}}</a></li>
                                <li><a href="{{route('dashboard.roles.index')}}">{{trans('main_trans.Permissions')}}</a></li>

                            </ul>
                        </li>
                    @endcan

                    <!-- menu font icon-->
                    @can('العملاء')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#font-icon">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text"> {{trans('main_trans.clients')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="font-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('dashboard.clients.index')}}">{{trans('main_trans.clients')}}</a> </li>
                        </ul>
                    </li>
                    @endcan


                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
