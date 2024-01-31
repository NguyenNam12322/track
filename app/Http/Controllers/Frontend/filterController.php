<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\filter;

use App\Models\product;

use App\Models\groupProduct;

use App\Http\Controllers\Frontend\categoryController;

class filterController extends Controller
{
    public function index()
    {
        return view('filter.index');
    }

    public function filter()
    {


      
        $link     = strip_tags($_GET['link']);

        $group_id =  strip_tags($_GET['group_id']);

        $filter =   explode(',', $_GET['filter']) ;

        $property = explode(',', $_GET['property']);

        $link     = strip_tags($_GET['link']);

        $new_filter = [];

        $new_property = [];

        if(isset($filter)){
            foreach($filter as $value){
                array_push($new_filter, strip_tags($value));
            }
        }

        if(isset($property)){
            foreach($property as $values){
                array_push($new_property, strip_tags($values));
            }
        }

    
        $list_data_group = filter::where('group_product_id', $group_id)->whereIn('id', $filter)->select('value')->get()->toArray();



        $findID = groupProduct::where('link', $link)->first();

        $id_cate = $findID->id;

        $filter = filter::where('group_product_id', $id_cate)->select('name', 'id')->get();

        $fill = [];

        $keys =  [];


      
        if(!empty($list_data_group[0]['value'])){

            foreach ($list_data_group as $key => $value) {

                foreach($value as $values){

                    $arr = json_decode($values, true);

                    if(isset($arr)){

                        array_push($fill, $arr);

                        $keys[] = array_keys($arr);
                    }
                    
                }
               
            }

            $result = [];
            $product = [];

            

            if(isset($keys)){

                foreach($keys as $key1 => $vals){

               
                    foreach($vals as $valu){

                        if(in_array($valu, $property)){

                            $result[] = $fill[$key1][$valu];
                        }
                    
                    }

                }
                
                if(isset($result)){

                    foreach ($result as  $res) {
                        foreach($res as $res1){
                            $product[] = $res1;
                        }
                    }
                }


                
                $number_key = count($keys);

                $number_product    = array_count_values($product);

            
                if(isset($number_product)){
                    $result_product = [];
                    foreach ($number_product as $key => $value) {
                        if($value == $number_key){
                            array_push($result_product, $key);
                        }

                    }

                    $product_search = product::whereIn('id', $result_product)->where('active', 1)->get();

                // return redirect('/'.$link.'/?filter= 1');

                    return response($product_search);
                } 

               

            }
            

        }  

      
            
    }
    
}
