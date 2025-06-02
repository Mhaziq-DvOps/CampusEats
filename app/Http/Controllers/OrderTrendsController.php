<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderTrendsController extends Controller
{
    public static function analytics() {
        
        $payment = DB::select("Select count(CASE WHEN O_Payment = 'Cash' then 1 end) as Cash, count(CASE WHEN O_Payment = 'Stripe' then 1 end) as Stripe FROM customer_order;");
        foreach($payment as $row){
            $orderPayment = "[".$row->Cash.", ".$row->Stripe."]";
        }

        $paymentWeek = DB::select("Select count(CASE WHEN O_Payment = 'Cash' then 1 end) as Cash, count(CASE WHEN O_Payment = 'Stripe' then 1 end) as Stripe FROM customer_order 
        where created_at between date_sub(now(),INTERVAL 1 WEEK) and now();");
        foreach ($paymentWeek as $row) {
            $filterpaymentWeek = "[" . $row->Cash . ", " .$row->Stripe. "]";
        }

        $paymentMonth = DB::select("Select count(CASE WHEN O_Payment = 'Cash' then 1 end) as Cash, count(CASE WHEN O_Payment = 'Stripe' then 1 end) as Stripe FROM customer_order 
        where created_at between date_sub(now(),INTERVAL 2 MONTH) and now();");
        foreach ($paymentMonth as $row) {
            $filterpaymentMonth = "[" . $row->Cash . ", " .$row->Stripe."]";
        }

        $paymentYear = DB::select("Select count(CASE WHEN O_Payment = 'Cash' then 1 end) as Cash, count(CASE WHEN O_Payment = 'Stripe' then 1 end) as Stripe FROM customer_order 
        where created_at between date_sub(now(),INTERVAL 1 Year) and now();");
        foreach ($paymentYear as $row) {
            $filterpaymentYear = "[" . $row->Cash . ", " . $row->Stripe. "]";
        }

        $service = DB::select("Select count(CASE WHEN O_Type = 'dineIn' then 1 end) as DineIn, count(CASE WHEN O_Type = 'delivery' then 1 end) as Delivery, count(CASE WHEN O_Type = 'pickUp' then 1 end) as PickUp, count(CASE WHEN O_Type = 'booking' then 1 end) as Booking
        FROM customer_order;");
        foreach($service as $row){
            $orderService = "[".$row->DineIn.", ".$row->Delivery.", ".$row->PickUp.", ".$row->Booking."]";
        }

        $serviceWeek = DB::select("Select count(CASE WHEN O_Type = 'dineIn' then 1 end) as DineIn, count(CASE WHEN O_Type = 'delivery' then 1 end) as Delivery, count(CASE WHEN O_Type = 'pickUp' then 1 end) as PickUp, count(CASE WHEN O_Type = 'booking' then 1 end) as Booking
        FROM customer_order 
        where created_at between date_sub(now(),INTERVAL 1 WEEK) and now();");
        foreach ($serviceWeek as $row) {
            $filterServiceWeek = "[".$row->DineIn.", ".$row->Delivery.", ".$row->PickUp.", ".$row->Booking."]";
        }

        $serviceMonth = DB::select("Select count(CASE WHEN O_Type = 'dineIn' then 1 end) as DineIn, count(CASE WHEN O_Type = 'delivery' then 1 end) as Delivery, count(CASE WHEN O_Type = 'pickUp' then 1 end) as PickUp, count(CASE WHEN O_Type = 'booking' then 1 end) as Booking
        FROM customer_order 
        where created_at between date_sub(now(),INTERVAL 2 MONTH) and now();");
        foreach ($serviceMonth as $row) {
            $filterServiceMonth = "[".$row->DineIn.", ".$row->Delivery.", ".$row->PickUp.", ".$row->Booking."]";
        }

        $serviceYear = DB::select("Select count(CASE WHEN O_Type = 'dineIn' then 1 end) as DineIn, count(CASE WHEN O_Type = 'delivery' then 1 end) as Delivery, count(CASE WHEN O_Type = 'pickUp' then 1 end) as PickUp, count(CASE WHEN O_Type = 'booking' then 1 end) as Booking
        FROM customer_order
        where created_at between date_sub(now(),INTERVAL 1 Year) and now();");
        foreach ($serviceYear as $row) {
            $filterServiceYear = "[".$row->DineIn.", ".$row->Delivery.", ".$row->PickUp.", ".$row->Booking."]";
        }

        // dd($orderService);

        $sales = DB::select("SELECT 
        Sum(CASE WHEN MONTH(created_at) = 1 THEN O_Total_Price END) AS January,
        Sum(CASE WHEN MONTH(created_at) = 2 THEN O_Total_Price END) AS February,
        Sum(CASE WHEN MONTH(created_at) = 3 THEN O_Total_Price END) AS March,
        Sum(CASE WHEN MONTH(created_at) = 4 THEN O_Total_Price END) AS April,
        Sum(CASE WHEN MONTH(created_at) = 5 THEN O_Total_Price END) AS May,
        Sum(CASE WHEN MONTH(created_at) = 6 THEN O_Total_Price END) AS June,
        Sum(CASE WHEN MONTH(created_at) = 7 THEN O_Total_Price END) AS July,
        Sum(CASE WHEN MONTH(created_at) = 8 THEN O_Total_Price END) AS August,
        Sum(CASE WHEN MONTH(created_at) = 9 THEN O_Total_Price END) AS September,
        Sum(CASE WHEN MONTH(created_at) = 10 THEN O_Total_Price END) AS October,
        Sum(CASE WHEN MONTH(created_at) = 11 THEN O_Total_Price END) AS November,
        Sum(CASE WHEN MONTH(created_at) = 12 THEN O_Total_Price END) AS 'December'
        from customer_order
        ");
        foreach($sales as $row){
            $salesChart = "[".$row->January.", ".$row->February.", ".$row->March.", ".$row->April.", ".$row->May.", ".$row->June.", ".$row->July.", ".$row->August.", ".$row->September.", ".$row->October.", ".$row->November.", ".$row->December."]";

        }


        $popular = DB::select("SELECT product.P_Image, product.P_Name, product.P_Id, SUM(order_product.Order_Quantity) as P_Qty, product.P_Price
        FROM order_product,product
        WHERE order_product.P_Id=product.P_Id
        GROUP BY product.P_Id, product.P_Name, product.P_Price, product.P_Image
        ORDER BY SUM(order_product.Order_Quantity) DESC
        LIMIT 5;");

        $least = DB::select("SELECT product.P_Image, product.P_Name, product.P_Id, SUM(order_product.Order_Quantity) as P_Qty, product.P_Price
        FROM order_product,product
        WHERE order_product.P_Id=product.P_Id
        GROUP BY product.P_Id, product.P_Name, product.P_Price, product.P_Image
        ORDER BY SUM(order_product.Order_Quantity) ASC
        LIMIT 5;");

        // top category bar chart


        $data = "";
        $category = DB::select("SELECT C.P_Cat_Name as Category, Sum(B.Order_Quantity) as Total 
        FROM product A
        INNER JOIN order_product B
          ON (B.P_Id = A.P_Id)
        INNER JOIN product_category C
          ON (C.P_Cat_Id = A.Cat_Id)
         GROUP BY P_Cat_Name
         ORDER BY 2 Desc;
        ");
        foreach($category as $row){
            $data.= "['".$row->Category."', ".$row->Total."],";
        }
        $categoryChart = $data;


    
        // dd($popular);
        // dd($chartProductCategory);
        // dd($categoryChart);

        return view('reports.order_trends', compact(
            'orderPayment',
            'orderService', 
            'salesChart',
            'popular', 
            'least',
            'categoryChart',
            'filterpaymentWeek',
            'filterpaymentMonth',
            'filterpaymentYear',
            'filterServiceWeek',
            'filterServiceMonth',
            'filterServiceYear'
        ));
    }
}
