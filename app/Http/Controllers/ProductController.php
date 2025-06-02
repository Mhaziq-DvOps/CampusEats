<?php

namespace App\Http\Controllers;
use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProductSimilarity;
use App\Models\BusinessHour;
use App\Models\Shop;
use Carbon\Carbon;

class ProductController extends Controller
{
    
    function index(Request $req)
    {



        $booking = DB::table('customer_order')->get();
        // $products = DB::table('product')->get();
        $products = Product::with('promotion')->get();

        $category = DB::table('product_category')->get();
        $cart = DB::table('cart')->get();
        $order = $req->otype;
        $bookdate = $req->bookdate;
        $booktime = $req->booktime;
        $booktable = $req->booktable;
        $promotion=Promotion::all();




        return view('catalogue')->with('products', $products)->with('category', $category)->with('cart', $cart)->with('order', $order)->with('bookdate', $bookdate)->with('booktable', $booktable)->with('booktime', $booktime)->with('promotionBanner',$promotion);
    }

    public function catalogueBooking(Request $req)
    {
        $booking = DB::table('customer_order')->get();
        $products = DB::table('product')->get();
        $category = DB::table('product_category')->get();
        $dates = BusinessHour::where('Status', '0')->get();
        $cart = DB::table('cart')->get();
        $order = $req->otype;
        $bookdate = $req->bookdate;
        $day =  Carbon::parse($bookdate)->format('l');
        $booktime = $req->booktime;
        $booktable = $req->booktable;

        $date = array();
        $time = array();
        $table = array();
        foreach ($booking as $book) {
            $date[] = $book->Book_Date;
            $time[] = $book->Book_Time;
            $table[] = $book->T_Id;
        }

        $daysOff = array();
        foreach ($dates as $dayShop) {
                $daysOff[] = $dayShop->Day_Of_Week;
        }

        if(in_array($day, $daysOff)){
            return redirect()->back()->with('faildate', "Date not available. Please Select Another Date");    
        }
        elseif (in_array($bookdate, $date) && in_array($booktime, $time)  && in_array($booktable, $table)) {
            return redirect()->back()->with('fail', "Table not available. Please select another table or time");
        }
        return view('catalogue')->with('products', $products)->with('category', $category)->with('cart', $cart)->with('order', $order)->with('bookdate', $bookdate)->with('booktable', $booktable)->with('booktime', $booktime);
    }

    function detail($P_Id)
    {
        $detail = Product::find($P_Id);
        $users=DB::table('users')->get();
        $review=Review::where('P_Id',$P_Id )->get();

        //Product Similarity Controller
        $products        = json_decode(file_get_contents(storage_path('data/products-data.json')));
        // $products1 = json_encode($products);
        // dd($products1);

        $selectedId      = intval(app('request')->input('id') ?? '8');
        $selectedProduct = $products[0];

    
        $selectedProducts = array_filter($products, function ($product) use ($selectedId) { return $product->id === $selectedId; });

        if (count($selectedProducts)) {
            $selectedProduct = $selectedProducts[array_keys($selectedProducts)[0]];
        }

        $productSimilarity = new ProductSimilarity($products);
        $similarityMatrix  = $productSimilarity->calculateSimilarityMatrix();
        $products          = $productSimilarity->getProductsSortedBySimularity($selectedId, $similarityMatrix);

    

        return view('detail', compact('detail', 'selectedId', 'selectedProduct', 'products', 'review', 'users'));

        // dd($similarityMatrix);
    }
    function search(Request $req)
    {
         $query = $req->input('query'); // ✅ define $query

        $data = Product::where('P_Name', 'like', '%' . $req->input('query') . '%')->get();
         $promotedProducts = Product::whereNotNull('P_Disc_Price')
        ->whereColumn('P_Disc_Price', '<', 'P_Price')
        ->where('P_Name', 'like', '%' . $query . '%')
        ->get();
        return view('search', ['product' => $data], compact('promotedProducts','query'));
    }


public function popularProducts()
{
    //model Product , select column product . (merujuk) SUM( hasil tambah order_quantity dari table Order_product ( dalam table order_product ada order_quantity) ), kemudian kita namakan column tersebut sebagai total_ordered.
    $popularProducts = Product::select('product.*', DB::raw('SUM(order_product.Order_Quantity) as total_ordered'))
    //JOIN table order_product table yang mana Product Id match dengan P_Id di order_product
        ->join('order_product', 'product.P_Id', '=', 'order_product.P_Id')
        //group the product by each product id, jadi ia akan dikira berdasarkan setiap produk id
        ->groupBy('product.P_Id')
        //susunan secara menurun dari jmlah paling byk dibeli ke paling sedikit
        ->orderByDesc('total_ordered')
        ->take(6) // ambil top 6
        ->get();

    return view('home', compact('popularProducts'));
}


}

