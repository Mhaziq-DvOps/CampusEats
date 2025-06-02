<?php

namespace App\Http\Controllers;

use id;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    function addToCart(Request $req)
    {
        if(Auth::check())
        {
            $cart=new Cart;
            $cart->Cust_Id=Auth::id();
            $cart->Pro_Id=$req->Pro_Id;
            $cart->Pro_qty=$req->Pro_qty;
            $cart->Order_Type=$req->otype;
            $cart->BookDate=$req->bookdate;
            $cart->BookTime=$req->booktime;
            $cart->BookPax=$req->bookpax;
            $cart->BookTable=$req->booktable;
          
            if(Cart::where('Cust_Id','=',Auth::id())
                ->where('Pro_Id','=',$req->Pro_Id)->exists())
                {
                    echo "Already in your cart";
                     return redirect('/catalogue');

                }
            else{
                $cart->save();
                return redirect('/cartlist');
            }
        }
        else
        {
            return redirect('/login');
        }
    }
    static function cartItem()
    {
        $custId=Auth::id();
        return Cart::where('Cust_Id', $custId)->count();
    }
    function cartList(Request $req)
    {
        $custId=Auth::id();
        $product=DB::table('cart')
        ->join('product', 'cart.pro_id', '=', 'product.P_Id')
        ->where('cart.cust_id', $custId)
        ->select('product.*','cart.*','cart.id as cart_id')
        ->get();

        return view('cartlist', compact('product'));
    }
    function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }
    function addItem(Product $product, $P_Id)
    {
        $product = Product::find($P_Id);
        Cart::add($P_Id,$product->P_Name,1,$product->P_Price);
        return redirect('cartlist');
    }
public function updateCart(Request $request)
{
    $productIds = $request->input('product_id');
    $quantities = $request->input('quantity');
    $notes = $request->input('extranotes');

    if (!$productIds || !$quantities || count($productIds) != count($quantities)) {
        return back()->with('error', 'Invalid cart data');
    }

    foreach ($productIds as $index => $cartId) {
        $cart = Cart::with('products.promotion')->find($cartId);

        if ($cart) {
            $qty = (int) $quantities[$index];
            $qty = max(1, min(10, $qty)); // Ensure qty between 1 and 10

            // Calculate discounted price if promotion exists
            $originalPrice = $cart->products->P_Price;
            $discountPercent = $cart->products->promotion ? $cart->products->promotion->Promo_Discount : 0;

            if ($discountPercent > 0) {
                $discountedPrice = round($originalPrice * (1 - $discountPercent / 100), 2);
            } else {
                $discountedPrice = $originalPrice;
            }

            $cart->Pro_Qty = $qty;
            // $cart->P_Disc_Price = $discountedPrice; // Simpan discounted price di cart record (kalau ada kolum)
            $cart->save();
        }
    }

    // Store notes in session to use later in checkout
    if ($notes) {
        session(['cart_extra_notes' => $notes]);
    }

    return redirect('checkout_shipping');
}
// public function showCheckoutShipping()
// {
//     $customerId = auth()->id(); // atau guna session/cookie jika tiada login
//     $cartitems = Cart::with('product.promotion')
//         ->where('Cust_id', $customerId)
//         ->whereHas('product')
//         ->get();

//     return view('checkout_shipping', compact('cartitems'));
// }

    
}
 