<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CampusEats</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin-assets/images/icon/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/slicknav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/responsive.css') }}">
    <script src="{{ asset('admin-assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>
<body>
    {{-- <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div> --}}

    <!-- Page Container -->
    <div class="page-container">
        <!-- Sidebar -->
        @include("admin-include.sidebar")
        
        <!-- Main Content -->
        <div class="main-content">
            @include('admin-include.header')

            <!-- Page Title -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Dashboard</span></li>
                            </ul>
                        </div>
                    </div>
                    @include("admin-include.adminbar")
                </div>
            </div>

            <!-- Main Content Inner -->
            <div class="main-content-inner">
                <!-- Sales Report -->
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-3 mt-5 mb-3">
                            <div class="card">
                                <div class="seo-fact sbg1">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon">Total User</div>
                                        <h2>{{ $total ?? 0 }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-md-5 mb-3">
                            <div class="card">
                                <div class="seo-fact sbg2">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon">Total Shop</div>
                                        <h2>{{ $shopCount ?? 0 }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-md-5 mb-3">
                            <div class="card">
                                <div class="seo-fact sbg3">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon">Banned User</div>
                                        <h2>{{ $ban ?? 0 }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-md-5 mb-3">
                            <div class="card">
                                <div class="seo-fact sbg4">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon">Total Orders</div>
                                        {{-- <h2>{{$partner ?? 0}}</h2> --}}
                                    <h2>{{ $completedOrders ?? 0 }}</h2>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 
                <!-- Pending Partners List -->
                <div class="card mt-5">
                    <div class="card-body">
                        <h4 class="header-title">Partners List</h4>
                        <div class="table-responsive">
                            <table class="dbkit-table">
                                <thead>
                                    <tr class="heading-td">
                                        <th>Company Name</th>
                                        <th>Category</th>
                                        <th>Manager Name</th>
                                        <th>Date Registered</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pending ?? [] as $partner)
                                    <tr>
                                        <td>{{ $partner->Shop_Id ?? 'N/A' }}</td>
                                        <td>Food & Beverages</td>
                                        <td>{{ $partner->Name ?? 'N/A' }}</td>
                                        <td>{{ $partner->created_at ?? 'N/A' }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4">No Pending Partners</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div> --}}

                        <!-- All Partners List -->
<div class="card mt-5">
    <div class="card-body">
        <h4 class="header-title">All Partners List</h4>
        <div class="table-responsive">
            <table class="dbkit-table">
                <thead>
                    <tr class="heading-td">
                        <th>Company Name</th>
                        <th>Category</th>
                        <th>Manager Name</th>
                        <th>Status</th>
                        <th>Date Registered</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($Manager ?? [] as $partner)
                    <tr>
                        <td>{{ $partner->Shop-> S_Name ?? 'N/A' }}</td>
                        <td>Food & Beverages</td>
                        <td>{{ $partner->Name ?? 'N/A' }}</td>
                        <td>
                            @if($partner->isBanned == 0)
                                <span class="text-success">Active</span>
                            @elseif($partner->isBanned == 1)
                                <span class="text-danger">Banned</span>
                            @elseif($partner->isBanned == 2)
                                <span class="text-warning">Pending</span>
                            @endif
                        </td>
                        <td>{{ $partner->created_at ?? 'N/A' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">No Partners Found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

                    </div>
                </div>
            </div>
        </div>

        @include('admin-include.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('admin-assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/plugins.js') }}"></script>
    <script src="{{ asset('admin-assets/js/scripts.js') }}"></script>
</body>
</html>
