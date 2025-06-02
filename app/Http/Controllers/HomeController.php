<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
//     public function index()
    
// {
//     $popularProducts = Product::where('is_popular', true)->take(8)->get(); // already used

//     $promotedProducts = Product::whereNotNull('promotion_id')->take(8)->get();

//     $topRatedProducts = Product::where('rating', '>=', 5)->take(8)->get();

//     return view('home', compact('popularProducts', 'promotedProducts', 'topRatedProducts'));
// }
//23 MAY 2025
public function index()
{
    // Products with high ratings
    // $popularProducts = Review::where('R_Rating', '>=', 4.5)->take(8)->get();
    $popularProducts = Product::select('product.*', DB::raw('SUM(order_product.Order_Quantity) as total_ordered'))
        ->join('order_product', 'product.P_Id', '=', 'order_product.P_Id')
        ->groupBy('product.P_Id')
        ->orderByDesc('total_ordered')
        ->take(6) // ambil top 6
        ->get();
    // Products that have a promotion assigned
    $promotedProducts = Product::whereNotNull('Promotion_Id')->take(8)->get();

    // Top-rated food (e.g. 5-star)
    // $topRatedProducts = Review::where('R_Rating', '>=', 5)->take(8)->get();


    $topRatedProducts = DB::table('product')
    ->join('review', 'product.P_Id', '=', 'review.P_Id')
    ->select('product.*', DB::raw('AVG(review.R_Rating) as avg_rating'), DB::raw('MAX(review.R_Comment) as R_Comment'))
    ->groupBy('product.P_Id')
    ->orderByDesc('avg_rating')
    ->take(6)
    ->get();
    return view('home', compact( 'popularProducts','promotedProducts', 'topRatedProducts'));
}

       // return view('home');
    //    return redirect('/');
    
}
