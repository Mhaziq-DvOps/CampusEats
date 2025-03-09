<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="/admin">
                <img src="{{ asset('admin-assets/images/CampusEatsLogo.png') }}" alt="logo">
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <!-- Dashboard -->
                    <li class="{{ request()->is('admin') ? 'active' : '' }}">
                        <a href="/admin">
                            <i class="ti-dashboard"></i><span>Dashboard</span>
                        </a>
                    </li>
                    
                    <!-- Business Hours -->
                    <li class="{{ request()->routeIs('biz_hour.index') ? 'active' : '' }}">
                        <a href="{{ route('biz_hour.index') }}">
                            <i class="ti-time"></i><span>Business Hours</span>
                        </a>
                    </li>

                    <!-- Reminder -->
                    <li class="{{ request()->is('reminder') ? 'active' : '' }}">
                        <a href="/reminder">
                            <i class="ti-announcement"></i><span>Reminder</span>
                        </a>
                    </li>

                    <!-- FAQ -->
                    <li class="{{ request()->routeIs('faq.index') ? 'active' : '' }}">
                        <a href="{{ route('faq.index') }}">
                            <i class="ti-help"></i><span>FAQ</span>
                        </a>
                    </li>

                    <!-- Settings -->
                    <li class="{{ request()->is('payment*', 'term*') ? 'active' : '' }}">
                        <a aria-expanded="{{ request()->is('payment*', 'term*') ? 'true' : 'false' }}">
                            <i class="ti-settings"></i><span>Settings</span>
                        </a>
                        <ul class="collapse">
                            <li class="{{ request()->routeIs('payment.index') ? 'active' : '' }}">
                                <a href="{{ route('payment.index') }}">Payments</a>
                            </li>
                            <li class="{{ request()->routeIs('term.index') ? 'active' : '' }}">
                                <a href="{{ route('term.index') }}">Terms & Conditions</a>
                            </li>
                        </ul>
                    </li>

                    <!-- System Options -->
                    <li class="{{ request()->is('captcho', 'backup', 'cleanup') ? 'active' : '' }}">
                        <a aria-expanded="{{ request()->is('captcho', 'backup', 'cleanup') ? 'true' : 'false' }}">
                            <i class="fa fa-wrench"></i><span>System Options</span>
                        </a>
                        <ul class="collapse">
                            <li class="{{ request()->is('captcho') ? 'active' : '' }}">
                                <a href="/captcho">Captcha</a>
                            </li>
                            <li class="{{ request()->is('backup') ? 'active' : '' }}">
                                <a href="/backup">Backup</a>
                            </li>
                            <li class="{{ request()->is('cleanup') ? 'active' : '' }}">
                                <a href="/cleanup">Cleanup</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Users -->
                    <li class="{{ request()->is('customer*', 'manager*', 'ban_user*') ? 'active' : '' }}">
                        <a aria-expanded="{{ request()->is('customer*', 'manager*', 'ban_user*') ? 'true' : 'false' }}">
                            <i class="ti-user"></i><span>User</span>
                        </a>
                        <ul class="collapse">
                            <li class="{{ request()->routeIs('customer.index') ? 'active' : '' }}">
                                <a href="{{ route('customer.index') }}">Customer</a>
                            </li>
                            <li class="{{ request()->routeIs('manager.index') ? 'active' : '' }}">
                                <a href="{{ route('manager.index') }}">Manager</a>
                            </li>
                            <li class="{{ request()->routeIs('ban_user.index') ? 'active' : '' }}">
                                <a href="{{ route('ban_user.index') }}">Banned User</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Partners -->
                    <li class="{{ request()->is('shop*', 'indexPend', 'indexBan') ? 'active' : '' }}">
                        <a aria-expanded="{{ request()->is('shop*', 'indexPend', 'indexBan') ? 'true' : 'false' }}">
                            <i class="fa fa-users"></i><span>Partners</span>
                        </a>
                        <ul class="collapse">
                            <li class="{{ request()->routeIs('shop.index') ? 'active' : '' }}">
                                <a href="{{ route('shop.index') }}">List</a>
                            </li>
                            <li class="{{ request()->is('indexPend') ? 'active' : '' }}">
                                <a href="/indexPend">Pending Request</a>
                            </li>
                            <li class="{{ request()->is('indexBan') ? 'active' : '' }}">
                                <a href="/indexBan">Banned Partners</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Logs -->
                    <li class="{{ request()->is('logs_login', 'logs_pay') ? 'active' : '' }}">
                        <a aria-expanded="{{ request()->is('logs_login', 'logs_pay') ? 'true' : 'false' }}">
                            <i class="ti-file"></i><span>Logs</span>
                        </a>
                        <ul class="collapse">
                            <li class="{{ request()->is('logs_login') ? 'active' : '' }}">
                                <a href="/logs_login">Login</a>
                            </li>
                            <li class="{{ request()->is('logs_pay') ? 'active' : '' }}">
                                <a href="/logs_pay">Payment</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
