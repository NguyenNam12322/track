<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\products;
use DB;
use Carbon\Carbon;

use Gloudemans\Shoppingcart\Facades\Cart;

class blogController extends Controller
{
    public function index($slug)
    {
        $data = trim($slug);

        $checkCategory = DB::table('categories')->where('link', $data)->first();

             
        if($checkCategory){

            if($checkCategory->parent_id == 0){
                $datas = DB::table('categories')->Join('posts', 'categories.id', '=', 'posts.category')->where('categories.link',$data)->get();


                return view('frontend.category',compact('datas'));
            }
            else{

                $datas = DB::table('categories')->Join('products', 'categories.id', '=', 'products.category')->where('categories.link',$data)->get();

                return view('frontend.categoryproduct',compact('datas'));
               
            }

        }
        else{

            return abort('404');
        }

    }

    public function detail($slug)
    {

        $link = trim($slug);
        $data = post::where('link', $slug)->first();

        if(!empty($data)){

            return view('frontend.blogdetail', compact('data'));
        }
        else{
            return abort('404');
        }

    }

    public function addProductToCart(Request $request)
    {
        

        $id = $request->id;
        
        $data_Product = products::find($id);

        if(!empty($data_Product->id)){

             Cart::add(['id' => $id, 'name' => $data_Product->name,  'qty' => 1, 'price' => $data_Product->price, 'weight' => '0', 'options' => ['image' => $data_Product->image]]);

        }

        return redirect()->back();

       
    }

    public function showCart()
    {
        

        $data_cart = Cart::content();

        $total = $data_cart->pluck('price')->toArray();

        $total = array_sum($total);

       

        return view('frontend.cart', compact('data_cart', 'total'));
    }

    public function addOrder(Request $request)
    {
        

         $data = $request->All();

        unset($data['_token']);

         unset($data['step1button']);

         $data['created_at'] = Carbon::now();
         $data['updated_at'] = Carbon::now();



        DB::table('order1')->insert($data);

        Cart::destroy();

         return redirect()->back();

    }

    public function removeCart($id)
    {
       Cart::remove($id);

        return redirect()->route('cart');
    }



    public function productDetails($slug)
    {
        $link = trim($slug);
        $data = products::where('link', $slug)->first();

         if(!empty($data)){

            return view('frontend.productdetails', compact('data'));
        }
        else{
            return abort('404');
        }
    }




    public function lienhe()
    {
        return view('frontend.lienhe');
    }

    public function sendLienhe(Request $request)
    {
        $data = $request->All();

        unset($data['_token']);

         unset($data['step1button']);

        DB::table('order')->insert($data);

       
        return redirect()->back();
    }

    public function sanphamdathicong()
    {
        $datas = DB::table('categories')->where('parent_id', 1)->get();


         return view('frontend.categoriesParent',compact('datas'));
    }
    
}
