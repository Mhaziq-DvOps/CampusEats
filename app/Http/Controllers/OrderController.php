<?php

namespace App\Http\Controllers;

use App\Models\Order;
//use App\Models\ManagerLogs;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Order::all();

        return view('layouts.order')->with('orders', $orders);
    }

    public function search(Request $request) 
    {
        $search = $request->get('search');
        $list = DB::table('customer_order')->where('Tracking_No', 'like', '%'.$search.'%')->get();
        return view('layouts.order',['orders' => $list]);

    }

    public function searchBook(Request $request)
    {
        if($request->has('search')){
            $book = \App\Models\Order::where('Tracking_No', 'LIKE', '%' .$request->search.'%')->get();
         
     }else {
            $book = \App\Models\Order::all();
     }
     return view('layouts.bookinglist',['booking' => $book]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
        $order->update([
            'O_Status' =>  $request->input('O_Status'),
        ]);


        return redirect()
        ->route('order.index')
                ->with('success', 'Order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
        $order->delete();

        return redirect()->back();
    }

    public function bookingList()
    {
        //
        $booking = Order::all();

        return view('layouts.bookinglist')->with('booking', $booking);
    }

    public function updateBooking(Request $request, $order)
    {

        //
        $orders = Order::find($order);

        $orders->update([
            'O_Status' =>  $request->input('O_Status'),
        ]);

        return redirect()->back();    
    }



// public function checkoutComplete($orderId)
// {
//     $order = Order::find($orderId);

//     if (!$order) {
//         return redirect('/')->with('error', 'Order not found');
//     }

//     return view('checkout_complete', compact('order'));
// }


public function checkoutComplete($orderId)
{
    $order = Order::find($orderId);

    if (!$order) {
        return redirect('/')->with('error', 'Order not found');
    }

    // Check if the order is "Preparing" (status = 2) and older than 10 minutes
    if ($order->O_Status == 2 && $order->updated_at < now()->subMinutes(value: 10)) {
        $order->O_Status = 0; // Auto-cancel the order
        $order->save();

        return view('checkout_complete', compact('order'))
            ->with('error', 'Order was automatically cancelled due to timeout.');
    }

    return view('checkout_complete', compact('order'));
}



    public function cancelOrder($id)
        {
            $order = Order::findOrFail($id);

            // Hanya benarkan cancel kalau status masih "Order Receive"
            if ($order->O_Status == 1) {
                $order->O_Status = 0; // 0 = canceled
                $order->save();

                return redirect()->back()->with('success', 'Your order has been canceled.');
            }

            return redirect()->back()->with('error', 'You cannot cancel this order at this stage.');
        }
public function orderHistory(Request $request)
{
    $userId = auth()->id();
    $filter = $request->query('filter');

    $query = Order::where('user_id', $userId);

    if ($filter === 'approved') {
        $query->where('O_Status', 5); // Assuming 4 means "picked up"
    } elseif ($filter === 'pending') {
        $query->whereNotIn('O_Status', [0, 5]); // Exclude Canceled (0) and Completed (4)
    }

    $orders = $query->get();

    return view('order_history', [
        'order' => $orders
    ]);
}

public function markAsPickedUp($id)
{
    $order = Order::findOrFail($id);

    if ($order->O_Status == 4) { // Only allow pickup confirmation if food is ready
        $order->O_Status = 5; // Mark as Picked Up
        $order->save();

        return redirect()->back()->with('success', 'Thank you! Your pickup has been confirmed.');
    }

    return redirect()->back()->with('error', 'You can only confirm pickup when the order is marked as Complete.');
}

}

