<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


    public function dashboard() {
        
        // Total Orders
        $totalOrder = DB::table('customer_order')->count();
        
        // Pending Orders
        $pendingOrder = DB::table('customer_order')->whereIn('O_Status', [1, 2])->count();
        
        // Completed Orders
        $completeOrder = DB::table('customer_order')->where('O_Status', 5)->count();
        
        // Total Sales
        $totalSales = DB::table('customer_order')->sum('O_Total_Price');
        
        // Sales Data per Month
        $sales = DB::table('customer_order')->selectRaw(
            "SUM(CASE WHEN MONTH(created_at) = 1 THEN O_Total_Price ELSE 0 END) AS January, 
             SUM(CASE WHEN MONTH(created_at) = 2 THEN O_Total_Price ELSE 0 END) AS February, 
             SUM(CASE WHEN MONTH(created_at) = 3 THEN O_Total_Price ELSE 0 END) AS March, 
             SUM(CASE WHEN MONTH(created_at) = 4 THEN O_Total_Price ELSE 0 END) AS April, 
             SUM(CASE WHEN MONTH(created_at) = 5 THEN O_Total_Price ELSE 0 END) AS May, 
             SUM(CASE WHEN MONTH(created_at) = 6 THEN O_Total_Price ELSE 0 END) AS June, 
             SUM(CASE WHEN MONTH(created_at) = 7 THEN O_Total_Price ELSE 0 END) AS July, 
             SUM(CASE WHEN MONTH(created_at) = 8 THEN O_Total_Price ELSE 0 END) AS August, 
             SUM(CASE WHEN MONTH(created_at) = 9 THEN O_Total_Price ELSE 0 END) AS September, 
             SUM(CASE WHEN MONTH(created_at) = 10 THEN O_Total_Price ELSE 0 END) AS October, 
             SUM(CASE WHEN MONTH(created_at) = 11 THEN O_Total_Price ELSE 0 END) AS November, 
             SUM(CASE WHEN MONTH(created_at) = 12 THEN O_Total_Price ELSE 0 END) AS December"
        )->first();

        $salesChart = json_encode(array_values((array) $sales));

        // Average Rating
        $avgRating = DB::table('review')->avg('R_Rating');
        
        // Total Reviews
        $totalReview = DB::table('review')->count();
        
        // Ratings Breakdown
        $ratings = DB::table('review')
            ->selectRaw('R_Rating, COUNT(*) as count')
            ->groupBy('R_Rating')
            ->pluck('count', 'R_Rating');
        
        $fiveRating = $ratings[5] ?? 0;
        $fourRating = $ratings[4] ?? 0;
        $threeRating = $ratings[3] ?? 0;
        $twoRating = $ratings[2] ?? 0;
        $oneRating = $ratings[1] ?? 0;

        // Popular Products
        $popularChart = DB::table('order_product')
            ->join('product', 'order_product.P_Id', '=', 'product.P_Id')
            ->selectRaw('product.P_Name, SUM(order_product.Order_Quantity) as P_Qty')
            ->groupBy('product.P_Name')
            ->orderByDesc('P_Qty')
            ->limit(5)
            ->get();
        
        $popularChart = json_encode($popularChart);
        
        // Popular Customers
        $popularCustomer = DB::table('customer_order')
            ->join('users', 'customer_order.User_Id', '=', 'users.id')
            ->selectRaw('users.name, SUM(customer_order.O_Total_Price) as total_spend')
            ->groupBy('users.id', 'users.name')
            ->orderByDesc('total_spend')
            ->limit(5)
            ->get();
        
        return view('layouts.index', compact(
            'totalOrder',
            'pendingOrder',
            'completeOrder',
            'totalSales',
            'salesChart',
            'avgRating',
            'totalReview',
            'fiveRating',
            'fourRating',
            'threeRating',
            'twoRating',
            'oneRating',
            'popularChart',
            'popularCustomer'
        ));
    }
    
}
