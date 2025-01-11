<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset ('admin-assets/images/icon/favicon.ico')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/slicknav.min.css')}}">
    <!-- amcharts css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/typography.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/default-css.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{asset('admin-assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>

    <title>Backups</title>
    <link type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />

</head>
<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        @include("admin-include.sidebar") <!-- sidebar menu -->
        <!-- main content area start -->
        <div class="main-content">
            @include('admin-include.header')
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Database Backup</span></li>
                            </ul>
                        </div>
                    </div>
                    @include("admin-include.adminbar")
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="row"><div class="col"><h4 class="header-title">Databases</h4></div>
                                <div class="col col-lg-2">
                                    <form action="{{ url('backup/create') }}" method="GET" class="add-new-backup" enctype="multipart/form-data" id="CreateBackupForm">
                                            {{ csrf_field() }}
                                            <input type="submit" name="submit" class="theme-button btn btn-primary pull-right" style="margin-bottom:2em;" value="Create Database Backup">
                                        </form>
                                    </div>
                                <div class="col col-lg-2">
                                    @if ( Session::has('success') )
                                            <div class="alert alert-success alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                {{ Session::get('success') }}
                                            </div>
                                            @endif
                            
                                            @if ( Session::has('update') )
                                            <div class="alert alert-success alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                {{ Session::get('update') }}
                                            </div>
                                            @endif
                            
                                            @if ( Session::has('delete') )
                                            <div class="alert alert-danger alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                {{ Session::get('delete') }}
                                            </div>
                                        @endif 
                                    </div>
                                </div>
                                <div class="single-table">
                                    <div class="table-responsive">
                                    <table class="table">
                                        @if (count($backups))
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th>File Name</th>
                                                <th>File Size</th>
                                                <th>Created Date</th>
                                                <th>Created Age</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($backups as $backup)
                                            <tr>
                                                <td>{{ $backup['file_name'] }}</td>
                                                <td>{{ \App\Http\Controllers\BackupController::humanFilesize($backup['file_size']) }}</td>
                                                <td>
                                                    {{ date('F jS, Y, g:ia (T)',$backup['last_modified']) }}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($backup['last_modified'])->diffForHumans() }}
                                                </td>
                                                <td class="text-right">
                                                    <a class="btn btn-success" href="{{ url('/backup/download/'.$backup['file_path']) }}"><i
                                                        class="fa fa-cloud-download"></i> Download</a>
                                                        <a class="btn btn-danger" onclick="return confirm('Do you really want to delete this file')" data-button-type="delete"
                                                        href="{{ url('/backup/delete/'.$backup['file_name']) }}"><i class="fa fa-trash-o"></i>
                                                        Delete</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                    </table>
                                        @else
                                        <div class="well">
                                            <h4>No backups</h4>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- data table end -->
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2024. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $("#CreateBackupForm").on('submit',function(e){
            $('.theme-button').attr('disabled','disabled');
        });
    </script>
</body>
</html>