<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>FAQ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset ('admin-assets/images/icon/favicon.ico')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/slicknav.min.css')}}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/typography.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/default-css.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{asset('admin-assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <?php use Carbon\Carbon; ?>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        @include("admin-include.sidebar") <!-- sidebar menu -->
        <!-- main content area start -->
        <div class="main-content">
            @include('admin-include.header') <!-- header-->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index2.html">Home</a></li>
                                <li><span>Faq</span></li>
                            </ul>
                        </div>
                    </div>
                    @include("admin-include.adminbar")
                </div>
            </div>
        <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Frequently Asked Questions</h4>
                <div class="col col-lg-2">
                    <a href="{{ route('faq.create') }}">
                        <button type="button" class="btn btn-success mb-3" style="text-align: right;">Add Question</button>
                    </a>
                </div>
                <div class="single-table">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">Category</th>
                                    <th scope="col">Question</th>
                                    <th scope="col">Answer</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            @foreach($list as $faq)
                            <tbody>
                                <tr>
                                    <td><br>{{$faq->Faq_Category}}</td>
                                    <td><br>{{$faq->Faq_Question}}</td>
                                    <td><br>{{$faq->Faq_Answer}}</td>
                                      <td>
                            
                                        
                                        <form action="{{ route('faq.destroy', $faq->Faq_id) }}"
                                                            method="POST">
                                                           
                                                            <a class="btn btn-primary" href="{{ route('faq.edit', $faq->Faq_id) }}">Edit</a>
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                    </td>
                                </tr>
                                
                                
                                
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>    
                <div class="main-content-inner">
                    <div class="col-lg-6 mt-5">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jquery latest version -->
    <script src="{{asset('admin-assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{asset('admin-assets/js/popper.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/metisMenu.min.js')}}"></script>
  
    <script src="{{asset('admin-assets/js/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/jquery.slicknav.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" 
    integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w==" crossorigin="anonymous" 
    referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css" 
    integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ==" crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
    <!-- others plugins -->
    <script src="{{asset('admin-assets/js/plugins.js')}}"></script>
    <script src="{{asset('admin-assets/js/scripts.js')}}"></script>
</body>
</html>

