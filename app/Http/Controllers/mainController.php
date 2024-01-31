<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\product;

class mainController extends Controller
{
    public function findProductByNameOrModel($data)
    {
        $clearData = trim($data);

        $data      = $clearData;

       $resultProduct = product::select('id', 'Name', 'Price', 'Link', 'Image')->where('Name','LIKE', '%'. $data .'%')->OrWhere('ProductSku', 'LIKE', '%' . $data . '%')->get();

       

        return $resultProduct;


    }
}
