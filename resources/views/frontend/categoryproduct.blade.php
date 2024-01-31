@extends('frontend.layouts.apps')

@section('content') 



 @if(!empty($datas[0]->name))


<div id="col-1929223833" class="col small-12 large-12">
    <div class="col-inner">
       
        <div id="gap-393529569" class="gap-element clearfix" style="display:block; height:auto;">
            <style>
                #gap-393529569 {
                padding-top: 30px;
                }
            </style>
        </div>
        
        <div class="row sanpham large-columns-3 medium-columns- small-columns-2 row-small slider row-slider slider-nav-simple slider-nav-outside slider-nav-push is-draggable flickity-enabled" data-flickity-options="{&quot;imagesLoaded&quot;: true, &quot;groupCells&quot;: &quot;100%&quot;, &quot;dragThreshold&quot; : 5, &quot;cellAlign&quot;: &quot;left&quot;,&quot;wrapAround&quot;: true,&quot;prevNextButtons&quot;: true,&quot;percentPosition&quot;: true,&quot;pageDots&quot;: false, &quot;rightToLeft&quot;: false, &quot;autoPlay&quot; : false}" tabindex="0">
            
            
           
           
            @foreach($datas as $data)
            <div class="product-small col has-hover product type-product post-380 status-publish instock product_cat-du-an-tieu-bieu product_cat-noi-that-biet-thu product_cat-thi-cong-biet-thu has-post-thumbnail shipping-taxable product-type-simple is-selected" aria-selected="true" style="position: absolute; left: 166.66%;">
                <div class="col-inner">
                    <div class="badge-container absolute left top z-1"></div>
                    <div class="product-small box ">
                        <div class="box-image">
                            <div class="image-fade_in_back">
                                <a href="{{  route('product-details', $data->link)}}">
                                <img width="247" height="247" src="{{ asset($data->images) }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy" srcset="{{ asset($data->images) }}" sizes="(max-width: 247px) 100vw, 247px">             </a>
                            </div>
                            <div class="image-tools is-small top right show-on-hover">
                            </div>
                            <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                            </div>
                            <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                            </div>
                        </div>
                        <div class="box-text box-text-products">
                            <div class="title-wrapper">
                                <p class="category uppercase is-smaller no-text-overflow product-cat op-7">
                                    {{ $data->name }}    
                                </p>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
           
           
           
        </div>
    </div><button class="flickity-button flickity-prev-next-button previous" type="button" aria-label="Previous"><svg class="flickity-button-icon" viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow"></path></svg></button><button class="flickity-button flickity-prev-next-button next" type="button" aria-label="Next"><svg class="flickity-button-icon" viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow" transform="translate(100, 100) rotate(180) "></path></svg></button></div>
    </div>
    
</div>
@else
<div style="text-align:center"><h2>Chưa có danh sách sản phẩm</h2></div>
 @endif
@endsection 

        