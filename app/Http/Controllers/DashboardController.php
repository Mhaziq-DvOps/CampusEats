<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Fetch aggregated data
        $totalOrder = DB::table('customer_order')->count();
        $pendingOrder = DB::table('customer_order')->whereIn('O_Status', [1, 2])->count();
        $completeOrder = DB::table('customer_order')->where('O_Status', 3)->count();
        $totalSales = DB::table('customer_order')->sum('O_Total_Price');

        // Fetch monthly sales and expenses
        $salesChart = $this->getMonthlyData('customer_order', 'O_Total_Price', 'created_at');
        $expensesChart = $this->getMonthlyData('data', 'amount', 'date');

        // Reviews data
        $avgRating = DB::table('review')->avg('R_Rating');
        $totalReview = DB::table('review')->count();

        $ratingCounts = DB::table('review')
            ->selectRaw('R_Rating, COUNT(*) as count')
            ->groupBy('R_Rating')
            ->pluck('count', 'R_Rating')
            ->toArray();

        $fiveRating = $ratingCounts[5] ?? 0;
        $fourRating = $ratingCounts[4] ?? 0;
        $threeRating = $ratingCounts[3] ?? 0;
        $twoRating = $ratingCounts[2] ?? 0;
        $oneRating = $ratingCounts[1] ?? 0;

        // Popular products
        $popularChart = DB::table('order_product')
            ->join('product', 'order_product.P_Id', '=', 'product.P_Id')
            ->selectRaw('product.P_Name, SUM(order_product.Order_Quantity) as P_Qty')
            ->groupBy('product.P_Name')
            ->orderByDesc('P_Qty')
            ->limit(5)
            ->get();

        // Top customers
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
            'expensesChart',
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

    private function getMonthlyData($table, $column, $dateColumn)
    {
        return DB::table($table)
            ->selectRaw("
                Sum(CASE WHEN MONTH($dateColumn) = 1 THEN $column END) AS January,
                Sum(CASE WHEN MONTH($dateColumn) = 2 THEN $column END) AS February,
                Sum(CASE WHEN MONTH($dateColumn) = 3 THEN $column END) AS March,
                Sum(CASE WHEN MONTH($dateColumn) = 4 THEN $column END) AS April,
                Sum(CASE WHEN MONTH($dateColumn) = 5 THEN $column END) AS May,
                Sum(CASE WHEN MONTH($dateColumn) = 6 THEN $column END) AS June,
                Sum(CASE WHEN MONTH($dateColumn) = 7 THEN $column END) AS July,
                Sum(CASE WHEN MONTH($dateColumn) = 8 THEN $column END) AS August,
                Sum(CASE WHEN MONTH($dateColumn) = 9 THEN $column END) AS September,
                Sum(CASE WHEN MONTH($dateColumn) = 10 THEN $column END) AS October,
                Sum(CASE WHEN MONTH($dateColumn) = 11 THEN $column END) AS November,
                Sum(CASE WHEN MONTH($dateColumn) = 12 THEN $column END) AS December
            ")
            ->first();
    }

}
