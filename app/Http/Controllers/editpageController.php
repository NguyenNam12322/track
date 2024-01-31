<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class editpageController extends Controller
{
    public function show($id)
    {
        $page =['home', 'benhly', 'blog', 'chinhnha', 'khachhang', 'lienhe', 'niengrang', 'rang-su-tham-my', 'trongrang', 'vewinsmile'];

        $path = $page[$id].'.html';

        $data = file_get_contents(public_path('html/winsmile/'.$path));

        
         
        return view('editpage/editpage', compact('data', 'path'));
    }
    public function post_template(Request $request)
    {
        $data = $request->description;

        $path = $request->path;

        print_r($data);

        // $result = file_put_contents(public_path('html/winsmile/'.$path.'-1.html'), $data);

        // echo "success!";
      
    }
}
