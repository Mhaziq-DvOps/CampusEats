<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use MonkeyLearn\Client;
use MonkeyLearn\MonkeyLearn;

// require_once('../vendor/autoload.php');
// require_once('../config.php');

class ReviewController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function index()
    {
        //
$feedback = DB::select("
    SELECT R.Review_Id, U.name as C_Name, P.P_Name as P_Name, R.R_Rating, R.R_Comment, R_Sentiment
    FROM review R
    INNER JOIN users U ON (R.User_Id = U.id)
    INNER JOIN product P ON (R.P_Id = P.P_Id)
    GROUP BY R.Review_Id, U.name, P.P_Name, R.R_Rating, R.R_Comment, R.R_Sentiment
    ORDER BY 1 ASC
");
        return view('layouts.feedback', compact('feedback'));
    }
    public function addReview($P_Id)
    {
        $data = array(
            'list' => DB::table ('product') ->where('P_Id', $P_Id) -> get()
            
        );
        return view('write-review', $data);
    }

public function submitReview(Request $request){
    $comment = 'neutral'; // Default sentiment

    if($request->hasFile('R_Image')) {
        $request->validate([
            'comment'=> 'required',
            'R_Image' => 'mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = time() . '-' . $request->name . '.' . 
        $request->R_Image->extension();
        $request->R_Image->move(public_path('images'), $newImageName);

    } else {
        $request->validate([
            'comment'=> 'required'
        ]);

        $newImageName = null;
    }

    $UserId = Auth::id();
    $query = DB::table('review')->insert([
        'User_Id'=> $UserId,
        'P_Id'=> $request->input('pid'),
        'R_Rating'=> $request->input('R_Rating'),
        'R_Comment'=> $request->input('comment'),
        'R_Image'=> $newImageName,
        'R_Sentiment'=> $comment,
        "created_at" => now(),
        "updated_at" => now(),
    ]);

    DB::table('order_product')
        ->where('P_Id', $request->input('pid'))
        ->update(['rstatus'=>'1']);

    if ($query) {
        return back()->with('success', 'Review has been successfully submitted');
    } else {
        return back()->with('fail', 'Something went wrong');
    }
}
public function search(Request $request)
{
    $search = $request->input('search');

    $feedback = DB::table('review')
        ->join('product', 'review.P_Id', '=', 'product.P_Id')
        ->join('users', 'review.User_id', '=', 'users.id')
        ->select('review.*', 'users.name as C_Name', 'product.P_Name')
        ->where('product.P_Name', 'like', '%' . $search . '%')
        ->get();

    return view('layouts.feedback', compact('feedback'));
}


}
