<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="/base"><img src="{{URL::asset('admin-assets/images/CampusEatsLogo.png')}}" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="active"><a href="/admin"><i class="ti-dashboard"></i><span>Dashboard</span></a></li>
                    <li><a href="{{ route('biz_hour.index')}}"><i class="ti-time"></i><span>Business Hours</span></a></li>
                    <li><a href="/reminder"><i class="ti-announcement"></i><span>Reminder</span></a></li>
                    <li><a href="{{ route('faq.index')}}"><i class="ti-help"></i><span>FAQ</span></a></li>
                    <li>
                        <a aria-expanded="true"><i class="ti-settings"></i><span>Settings</span></a>
                        <ul class="collapse">
                            <!--<li><a href="/res_form">Reservation form</a></li>-->
                            <li><a href="{{ route('payment.index')}}">Payments</a></li>
                            <li><a href="{{ route('term.index')}}">Terms & Condition</a></li>
                        </ul>
                    </li>
                    <li>
                        <a aria-expanded="true"><i class="fa fa-wrench"></i><span>System Options</span></a>
                        <ul class="collapse">
                            <li><a href="/captcho"><span>Captcha</span></a></li>
                            <li><a href="/backup"><span>Backup</span></a></li>
                            <li ><a href="/cleanup"><span>Cleanup</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a aria-expanded="true"><i class="ti-user"></i><span>User</span></a>
                        <ul class="collapse">
                            <li><a href="{{ route('customer.index')}}">Customer</a></li>
                            <li><a href="{{ route('manager.index')}}">Manager</a></li>
                            <li><a href="{{ route('ban_user.index') }}">Banned User</a></li>
                        </ul>
                    </li>
                    <li>
                        <a aria-expanded="true"><i class="fa fa-users"></i><span>Partners</span></a>
                        <ul class="collapse">
                            <li><a href="{{ route('shop.index') }}">List</a></li>
                            <li><a href="/indexPend">Pending Request</a></li>
                            <li><a href="/indexBan">Banned Partners</a></li>
                        </ul>
                    </li>
                    <li>
                        <a aria-expanded="true"><i class="ti-file"></i><span>Logs</span></a>
                        <ul class="collapse">
                            <li><a href="/logs_login">Login</a></li>
                            <li><a href="/logs_pay">Payment</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>