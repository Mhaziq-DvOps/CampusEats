<?php
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
$total=0;

if (Auth::check()) {
    $total= CartController::cartItem();
}

?>

<!-- Nav Bar Start -->
<div class="navbar navbar-expand-lg bg-light navbar-light">
    <div class="container-fluid">
        <a href="/" class="navbar-brand">Campus<span>Eats</span></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav ml-auto">
                <a href="/" class="nav-item nav-link active">Home</a>

                <a href="about" class="nav-item nav-link">About</a>
                
                <a href="shop_category" class="nav-item nav-link">Shop</a>

                <div class="nav-item dropdown">
                @if (Auth::check())
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                    <div class="dropdown-menu">
                        <a href="/profileDetail" class="dropdown-item">Profile</a>
                        <a href="order_history" class="dropdown-item">My Order</a> 
                            
                        <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        </form>
                    </div>
                
                @else
              

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Login</a>
                    <div class="dropdown-menu">
                        <a href="/login" class="dropdown-item">Customer Login</a>
                        <a href="manager_login" class="dropdown-item">Manager Login</a>
                        <a href="/register" class="dropdown-item">Register</a>
                            
                    </div>
                </div>
                
                @endif

                </div>

                <div class="search-widget">
                    <form action="/search">
                        <input class="form-control" type="text" name="query" placeholder="Search Keyword">
                </div>
                        <button class="btn mb-3"><i class="fa fa-search"></i></button>
                    </form>
                
                <div class="nav-item nav-link">
                    <a href="/cartlist">
                        <i class="fa fa-shopping-cart" style="font:size 30px;text-decoration: none;"></i>
                        <span>{{$total}}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

        <!-- Nav Bar End -->
