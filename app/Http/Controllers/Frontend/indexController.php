<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\banners;



class indexController extends Controller
{
    public function index()
    {

        $banners = banners::get();
        return view('frontend.index', compact('banners'));
    }

    public function readFile(){
        $link = base_path().'/public/css/category.css';
        $fp = fopen($link, "r");//mở file ở chế độ đọc
        while (! feof ($fp)) {
            $c = fgetc($fp);
            if ($c == "\n") {
                echo "<br>";
            } else {
                echo $c;
            }
        }
        fclose($fp);
    }
   
}
