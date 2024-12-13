<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initioal-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CampusEats</title>
    <link rel="icon" href="asset/img/logo.png" type="image/icon type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="{{asset('asset/img/favicon.ico')}}" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet"> 
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{asset('asset/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/lib/owlcarousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/lib/flaticon/font/flaticon.css')}}" rel="stylesheet">
    <link href="{{asset('asset/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="{{asset('asset/css/style.css')}}" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
    
    
<style>
       

        .fa {
          font-size: 25px;
        }

        .checked {
          color: orange;
        }
</style>






    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    


 

<!-- first chatbot -->
<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<df-messenger
  intent="WELCOME"
  chat-title="Amy"
  agent-id="fa6702c0-320a-4d7f-8333-1eb8252437e4"
  language-code="en"
></df-messenger>

<!-- dialogflow cx  ally-->
<!-- <script src="https://www.gstatic.com/dialogflow-console/fast/messenger-cx/bootstrap.js?v=1"></script>
<df-messenger
  df-cx="true"
  location="us-central1"
  chat-title="Ally"
  agent-id="a0f5ee66-35e9-4c6d-a0ac-3463b8f9d6e5"
  language-code="en"
></df-messenger> -->

<!-- dialogflow cx diona -->
<!-- <script src="https://www.gstatic.com/dialogflow-console/fast/messenger-cx/bootstrap.js?v=1"></script>
<df-messenger
  df-cx="true"
  location="us-central1"
  chat-title="Diona"
  agent-id="e211c708-7710-4fef-b46c-5c6e3a49408e"
  language-code="en"
></df-messenger> -->



<script src="https://www.gstatic.com/dialogflow-console/fast/messenger-cx/bootstrap.js?v=1"></script>
<meta name="viewport" content="width-device-width, initial-scale=1"> 
<!-- kalau minimize full screen akan jadi cb -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    {{View::make('header')}}
    @yield('content')
    {{View::make('footer')}}
    @yield('scripts')

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('asset/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('asset/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('asset/lib/tempusdominus/js/moment.min.js')}}"></script>
<script src="{{asset('asset/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
<script src="{{asset('asset/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

<!-- Contact Javascript File -->
<script src="{{asset('asset/mail/jqBootstrapValidation.min.js')}}"></script>
<script src="{{asset('asset/mail/contact.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('asset/js/main.js')}}"></script>
<script src="{{asset('asset/js/checkout.js')}}"></script>

</body>
</html>