@extends('frontend.layouts.apps')

@section('content')
<div class="row align-middle align-center" id="row-737035537">
    <div id="col-389293124" class="col medium-{{ $data->category==9?6:12}} small-12 large-{{ $data->category==9?6:12}}" data-animate="fadeInLeft" data-animated="true">
        <div class="col-inner">


           {!! $data->content !!}
            <div id="gap-904642984" class="gap-element clearfix" style="display:block; height:auto;">
                <style>
                    #gap-904642984 {
                    padding-top: 50px;
                    }
                </style>
            </div>
           
        </div>
    </div>

    @if($data->category==9)
    <div id="col-1696383734" class="col medium-6 small-12 large-6" data-animate="fadeInRight" data-animated="true">
        <div class="col-inner">
            <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_925534575">
                <div class="img-inner dark">
                    <img width="572" height="499" src="{{ asset($data->image) }}" class="attachment-large size-large" alt="" loading="lazy" srcset="{{ asset($data->image) }}" sizes="(max-width: 572px) 100vw, 572px">                      
                </div>
                <style>
                    #image_925534575 {
                    width: 100%;
                    }
                </style>
            </div>
        </div>
        <br>
         <a rel="noopener noreferrer" href="https://homeplace.vn/gioi-thieu/" target="_blank" class="button primary lowercase">
            <span>Thêm Giỏ hàng</span>
            </a>
    </div>

    @endif


</div>

@endsection 
