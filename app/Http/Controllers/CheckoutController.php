<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Logs;
use App\Models\OrderProduct;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Notifications\SendEmailReminder;
use Illuminate\Support\Facades\Notification;
use App\Models\Reminder;

class CheckoutController extends Controller
{
    function shipping()
    {
        $custId = Auth::id();
        $customer = DB::table('cart')
            ->join('customer', 'cart.cust_id', '=', 'customer.id')
            ->where('cart.cust_id', $custId);

        return view('checkout_shipping');
    }
    function orderDetails(Request $req)
    {
        $old_cartitems = Cart::where('cust_id', Auth::id())->get();
        foreach ($old_cartitems as $item) {
            if (Product::where('P_Id', $item->Pro_Id)->where('P_Status', '!=', '1')->exists()) {
                $removeItem = Cart::where('cust_id', Auth::id())->where('Pro_Id', $item->Pro_Id)->first();
                $removeItem->delete();
            }
        }
        $cartitems = Cart::where('cust_id', Auth::id())->get();

        $notes = $req->extranotes;
        $table = DB::table('restaurant_table')->get();
        $payment = DB::table('payment_type')->get();

        $orType = DB::select("SELECT Order_Type FROM cart LIMIT 1;");
        foreach ($orType as $row) {
            $oType = "$row->Order_Type";
        }

        return view('checkout_shipping', compact('cartitems', 'notes', 'payment', 'table', 'oType'));
    }
    function orderPlace(Request $req)
    {

        $order = new Order();
        $order->User_Id = Auth::id();
        $order->O_Name = $req->input('O_Name');
        $order->O_Email = $req->input('O_Email');
        $order->O_Street_1 = $req->input('O_Street_1');
        $order->O_Postcode = $req->input('O_Postcode');
        $order->O_City = $req->input('O_City');
        $order->O_State = $req->input('O_State');
        $order->O_Phone = $req->input('O_Phone');
        $order->O_Notes = $req->input('O_Notes');
        $order->O_Payment = $req->payment;
        $order->Tracking_No = rand(1000, 9999);
        $order->Remarks = $req->input('Remarks');
        $order->O_Date = $req->input('odate');
        $order->O_Time = $req->input('otime');

        $total = 0;
        $cartitems_total = Cart::where('Cust_Id', Auth::id())->get();
        foreach ($cartitems_total as $prod) {
            $total += $prod->products->P_Price * $prod->Pro_Qty;
            $bookdate = $prod->BookDate;
            $bookpax = $prod->BookPax;
            $booktime = $prod->BookTime;
            $booktable = $prod->BookTable;
        }

        $orType = DB::select("SELECT Order_Type FROM cart LIMIT 1;");
        foreach ($orType as $row) {
            $orderType = "$row->Order_Type";
        }

        $order->Book_Time = $booktime;
        $order->Book_Date = $bookdate;
        $order->O_Type = $orderType;
        if ($booktable == null) {
            $order->T_Id = $req->input('TableNo');
        } else {
            $order->T_Id = $booktable;
        }

        $order->T_Pax = $bookpax;
        $order->O_Total_Price = $total;
        $order->save();

        $name = $req->input('O_Name');
        $user = User::where('name', $name)->get();
        
        $text = Reminder::where('id', 1)->pluck('data');
        $footer = Reminder::where('id', 1)->pluck('footer');
        $status = Reminder::where('id', 1)->pluck('status');

        if ($status= 1) {

            $orderData =[
                'body' => $text,
                'orderText' => 'Total: RM'.$total.' in CampusEats',
                'url' => url('/'),
                'thankyou' => $footer
            ];
            Notification::send($user, new SendEmailReminder($orderData));
        }
        
        $logs = new Logs;
        $logs->Cust_Id = Auth::id();
        $logs->Log_Module = $req->input('Log_Module');
        $logs->Log_Pay_Type = 0;
        $logs->Log_Total_Price = $total;
        $logs->Log_Status = $req->input('Log_Status');
        $logs->created_at = Carbon::now();
        $logs->updated_at = Carbon::now();
        $logs->save();

        $cartitems = Cart::where('Cust_Id', Auth::id())->get();
        foreach ($cartitems as $item) {
            OrderProduct::create([
                'Order_Id' => $order->id,
                'P_Id' => $item->Pro_Id,
                'Order_Quantity' => $item->Pro_Qty,
                'Order_Price' => $item->products->P_Price * $item->Pro_Qty,
            ]);
        }
        $cartitems = Cart::where('Cust_Id', Auth::id())->get();
        Cart::destroy($cartitems);

        return view('checkout_summary');
    }
    public function summary()
    {
        $summary = Order::where('User_Id', Auth::id())->get();
        return view('orderplace', compact('summary'));
    }
    public function stripePay(Request $req)
    {
        if ($req->type === 'charge.suceeded') {
            try {
                $order = new Order();
                $order->User_Id = Auth::id();
                $order->O_Name = $req->input('O_Name');
                $order->O_Email = $req->input('O_Email');
                $order->O_Street_1 = $req->input('O_Street_1');
                $order->O_Postcode = $req->input('O_Postcode');
                $order->O_City = $req->input('O_City');
                $order->O_State = $req->input('O_State');
                $order->O_Phone = $req->input('O_Phone');
                $order->O_Notes = $req->input('O_Notes');
                $order->O_Payment = $req->payment;
                $order->Tracking_No = rand(1000, 9999);
                $order->Remarks = $req->input('Remarks');
                $order->O_Date = $req->input('odate');
                $order->O_Time = $req->input('otime');

                $total = 0;
                $cartitems_total = Cart::where('Cust_Id', Auth::id())->get();
                foreach ($cartitems_total as $prod) {
                    $total += $prod->products->P_Price * $prod->Pro_Qty;
                    $bookdate = $prod->BookDate;
                    $booktime = $prod->BookTime;
                    $booktable = $prod->BookTable;
                }

                $orType = DB::select(DB::raw("SELECT Order_Type FROM cart LIMIT 1;"));
                foreach ($orType as $row) {
                    $orderType = "$row->Order_Type";
                }

                $order->Book_Time = $booktime;
                $order->Book_Date = $bookdate;
                $order->O_Type = $orderType;
                if ($booktable == null) {
                    $order->T_Id = $req->input('TableNo');
                } else {
                    $order->T_Id = $booktable;
                }
                
                $order->O_Total_Price = $total;
                $order->save();

                $logs = new Logs;
                $logs->Cust_Id = Auth::id();
                $logs->Log_Module = $req->input('Log_Module');
                $logs->Log_Pay_Type = 0;
                $logs->Log_Total_Price = $total;
                $logs->Log_Status = $req->input('Log_Status');
                $logs->created_at = Carbon::now();
                $logs->updated_at = Carbon::now();
                $logs->save();

                $cartitems = Cart::where('Cust_Id', Auth::id())->get();
                foreach ($cartitems as $item) {
                    OrderProduct::create([
                        'Order_Id' => $order->id,
                        'P_Id' => $item->Pro_Id,
                        'Order_Quantity' => $item->Pro_Qty,
                        'Order_Price' => $item->products->P_Price * $item->Pro_Qty,
                    ]);
                }
                $cartitems = Cart::where('Cust_Id', Auth::id())->get();
                Cart::destroy($cartitems);
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
    }
    public function checkoutstripe()
    {
        $cartitems = Cart::where('Cust_Id', Auth::id())->get();
        Cart::destroy($cartitems);

        return view('checkout_summary');
    }
}
