<!-- sidebar menu area start -->
<div class="sidebar-menu">

    <div class="sidebar-header">

        <div class="logo">
            <a href="/dashboard"><img src="{{ asset('assets/images/icon/APPXILON.png') }}" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li><a href="/dashboard"><i class="ti-dashboard"></i><span>Dashboard</span></a></li>
                    <li><a href="/order"><i class="fa fa-shopping-cart"></i><span>Order</span></a>
                    </li>
                    <li><a href="/catalogues"><i class="fa fa-file"></i><span>Catalogue</span></a></li>
                    <li><a href="/promotion"><i class="fa fa-file"></i><span>Promotion</span></a></li>
                    <li><a href="javascript:void(0)" aria-expanded="true"><i
                                class="ti-layout-sidebar-left"></i><span>Booking
                            </span></a>
                        <ul class="collapse">
                            <li><a href="/bookinglist">Booking List</a></li>
                            <li><a href="/seatmap">Seat Map</a></li>

                        </ul>
                    </li>
                    <li><a href="/cust_analytics"><i class="ti-bar-chart"></i> <span>Customer Analytics</span></a></li>
                    <li><a href="/order_trends"><i class="ti-bar-chart-alt"></i> <span>Ordering Trends</span></a></li>
                    <li><a href="/feedback"><i class="ti-comments"></i> <span>Feedback</span></a></li>
                    <li><a href="javascript:void(0)" aria-expanded="true"><i
                                class="ti-layout-sidebar-left"></i><span>Report
                            </span></a>
                        <ul class="collapse">
                            <li><a href="/report">Sales</a></li>
                            <li><a href="/customerreport">Customer</a></li>
                            <li><a href="/data">Expenses</a></li>
                        </ul>
                    </li>
                    {{-- <li><a href="/report"><i class="ti-printer"></i> <span>Report</span></a></li> --}}
                    <li><a href="/shopInfo"><i class="ti-info-alt"></i> <span>Shop Information</span></a></li>
                    <li><a href="/businesshour"><i class="ti-time"></i> <span>Business Hour</span></a>
                    <li><a href="/faq"><i class="ti-signal"></i> <span>FAQ</span></a></li>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->