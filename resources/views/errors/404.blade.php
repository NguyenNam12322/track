<?php 

    $page = '404';

   

   
?>

@extends('frontend.layouts.apps')

@section('content') 



 @push('style')
        <link rel="stylesheet" type="text/css" href="{{ asset('css/category.css') }}"> 

        <link rel="stylesheet" type="text/css" href="{{ asset('css/categories.css') }}"> 
         <link rel="stylesheet" type="text/css" href="{{ asset('css/dienmay.css') }}"> 

        <style type="text/css">
            
            .box-filter .form-control{
                width: 100%;
            }
            .block-manu{
                width: 150px;
            }
        </style>

    
    @endpush

<section id="categoryPage" class="desktops" data-id="1942" data-name="Tivi" data-template="cate">

    <div class="container-productbox">


    	<div style="margin-left: 20px;">
            <h2><b>Không tìm thấy link</b></h2>
        </div>
        <hr>

        


        <?php 
            $deal = App\Models\deal::get();

            $now  = Carbon\Carbon::now();

            if(!empty($deal)&count($deal)>0){

                $timeDeal_star = $deal[0]->start;

                $timeDeal_star =  \Carbon\Carbon::create($timeDeal_star);

                $timeDeal_end = $deal[0]->end;

                $timeDeal_end =  \Carbon\Carbon::create($timeDeal_end);

                $timestamp = $now->diffInSeconds($timeDeal_end);
        
            }


        ?>

       
       
    </div>


  
    <div class="errorcompare" style="display:none;"></div>
   <!--  <div class="block__banner banner__topzone">
        <a data-cate="0" data-place="1919" href="https://www.topzone.vn/" onclick="jQuery.ajax({ url: '/bannertracking?bid=48557&r='+ (new Date).getTime(), async: true, cache: false });"><img style="cursor:pointer" src="https://cdn.tgdd.vn/2021/12/banner/Frame4879-1200x120.jpg" alt="Promote Topzone" width="1200" height="120"></a>
    </div> -->
    <div class="watched"></div>
    <div class="overlay"></div>

   
   
</section>

@endsection