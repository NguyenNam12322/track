<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\post;

class tintucController extends Controller
{


     public function newsDetail($id)
    {
          

       $data = post::where('link', $id)->first();
       if(empty($data)){
            abort(404, 'Page Not Found');
       }
       $datas = post::find($data->id);
       if(!empty($datas)){
            $newposts = post::orderBy('id')->take(4)->get();
            return view('frontend.blogdetail',compact('datas'));
            
       }
       else{
            abort(404, 'Page Not Found');
       }


    }
}
