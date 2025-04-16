<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use MonkeyLearn\Client;

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
    public function addReview($P_Id)
    {
        $data = array(
            'list' => DB::table ('product') ->where('P_Id', $P_Id) -> get()
            
        );
        return view('write-review', $data);
    }

    public function submitReview(Request $request){
        
       //******SENTIMENT ANALYSIS WORK******//

       $req = $request->input('comment');
       $ml = new Client(MONKEYLEARN);
       $data = [" $req "]; 
       $model_id = 'cl_PNXNX5sL';
       $res = $ml->classifiers->classify($model_id, $data);
       $json_en = json_encode($res->result)."\n";
       $json_de = json_decode($json_en, true);

       $comment = $json_de[0]['classifications'][0]['tag_name'];


       //*****SENTIMENT ANALYSIS WORK DONEEEE */
     if($request->hasFile('R_Image')) {
         $request->validate([
             'comment'=> 'required',
             'R_Image' => 'mimes:jpg,png,jpeg|max:5048'
         ]);
  
         $newImageName = time() . '-' . $request->name . '.' . 
         $request->R_Image->extension();
         $request->R_Image->move(public_path('images'), $newImageName);
         $UserId=Auth::id();
         $query = DB::table('review') ->insert ([
 
                         'User_Id'=> $UserId,
                         'P_Id'=>$request->input('pid' ),
                         'R_Rating'=>$request->input('R_Rating' ),
                         'R_Comment'=>$request->input('comment' ),
                         'R_Image'=>$newImageName,
                         'R_Sentiment'=>$comment,
                         "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
                         "updated_at" => \Carbon\Carbon::now(), 
                     ]);
                     DB::table('order_product')
                     ->where('P_Id', $request->input('pid' ))
                     ->update ([
                         'rstatus'=>'1',
                     ]);

     }else{
        $request->validate([
            'comment'=> 'required'
           
        ]);
         $UserId=Auth::id();
         $query = DB::table('review') ->insert ([
 
                         'User_Id'=> $UserId,
                         'P_Id'=>$request->input('pid' ),
                         'R_Rating'=>$request->input('R_Rating' ),
                         'R_Comment'=>$request->input('comment' ),
                         'R_Sentiment'=>$comment,
                         "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
                         "updated_at" => \Carbon\Carbon::now(), 
                     ]);
                     DB::table('order_product')
                     ->where('P_Id', $request->input('pid' ))
                     ->update ([
                         'rstatus'=>'1',
                     ]);
     }

     
   
     
     if ($query) {
         return back()-> with ('success' , 'Review has been successfully submitted');
     }else{
         return back() -> with ('fail' , 'Something went wrong');
     }
 
    }

//     if ($query) {
//         return view('history_detail') -> with ('success' , 'Review has been successfully submitted');
//         //  return back()-> with ('success' , 'Review has been successfully submitted');
//      }else{
//         return view('history_detail') -> with ('fail' , 'Something went wrong');
//  }

}
