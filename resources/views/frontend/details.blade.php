@extends('frontend.layouts.apps')
@section('content') 
<style type="text/css">
    div.stars {
    width: auto !important;
    }   
    .installment-purchase .but-tra-gop {
        text-decoration: none;
        color: #333;
        font-size: 14px;
        padding: 8px 5px;
        line-height: 18px;
        width: 49%;
        border-radius: 5px;
        display: inline-block;
        text-align: center;
        cursor: pointer;
        background: #ffde00;
    } 
    @media screen and (max-width: 776px){
        .header__top {
            background-color: #187A43;
            }   
        } 

        .installment-purchase .but-1-gop {
            text-decoration: none;
            color: #333;
            font-size: 12px;
            padding: 8px 5px;
            line-height: 18px;
            width: 49%;
            border-radius: 5px;
            display: inline-block;
            text-align: center;
            cursor: pointer;
            background: #ffde00;
        }   
         
        @media screen and (min-width: 777px){

            #thongso td{
                height: 30px !important;
            }
            .pdetail-installment table{
                width: 440px !important;
                overflow: hidden;
            }
            .pdetail-installment{
                height: 400px;
                width: 440px;
                overflow: hidden;
            }
            .pdetail-installment td{
                padding-left: 5px;
            }
            .Salient_Features td{
                padding: 0 15px;
            }
            .view-all {
                position: absolute;
                width: 440px;
                /*left: 0;*/
                bottom: 0;
                padding: 6px 0;
                font-weight: 300;
                cursor: pointer;
                text-align: center;
                font-size: 14px;
                color: #288ad6;
                background: #fff;
                border: 1px solid #288ad6;
                border-radius: 4px;
                transition: 0.6s ease-out;
            }
            .modal-body table td{
                padding:  0 15px !important;
            }
            .pdetail-installment td{
                height: 30px;
            }
        
        } 
</style>
<?php  
    $check_deal = App\Models\deal::select('deal_price')->where('product_id', $data->id)->where('active', 1)->first();
    
    if(!empty($check_deal) && !empty(!empty($check_deal->deal_price))){
    
        $data->Price = $check_deal->deal_price;
    
    }
    
    
    ?>
@push('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/detailsfe.css') }}">
@endpush
<div class="locationbox__overlay"></div>
<div class="locationbox">
    <div class="locationbox__item locationbox__item--right" onclick="OpenLocation()">
        <p>Chọn địa chỉ nhận hàng</p>
        <a class="cls-location" href="javascript:void(0)">Đóng</a>
    </div>
    <div class="locationbox__item" id="lc_title"><i class="icondetail-address-white"></i><span> Vui lòng đợi trong giây lát...</span></div>
    <div class="locationbox__popup" id="lc_pop--choose">
        <div class="locationbox__popup--cnt locationbox__popup--choose">
            <div class="locationbox__popup--chooseDefault">
                <div class="lds-ellipsis">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
    <b id="h-provincename" style="display:none!important" data-provinceid="3">Hồ Chí Minh</b>
</div>
<section data-id="235791" data-cate-id="1942" class="detail ">
    <ul class="breadcrumb">
        <?php  
            $groupProduct = App\Models\groupProduct::select('name', 'link', 'product_id')->where('level', 0)->get();

            foreach($groupProduct as $groupProducts ){

                if(!empty(json_decode($groupProducts->product_id))){

                    if(in_array($data['id'],json_decode($groupProducts->product_id))){

                        $groupName = $groupProducts->name;

                        $groupLink = $groupProducts->link;
                    }
                }
            }

            ?>
        <li>
            <a href="{{route('homeFe')}}">Trang chủ</a>
            <meta property="position" content="1">
        </li>
        @if(!empty($groupLink))
        <li>
            <span>›</span>
            <a href="{{ route('details', $groupLink??'') }}">{{ @$groupName }}</a>
            <meta property="position" content="2">
        </li>
        @endif
        <!-- <li>
            <span>›</span>
            <a href="/tivi?g=smart-tivi">Smart Tivi</a>
            <meta property="position" content="3">
            </li> -->
        <li>
            <span>›</span>
            <a href="{{ route('details',$data->Link) }}">{{ $data->Name }}</a>
            <meta property="position" content="4">
        </li>
    </ul>
    <h1>{{ $data->Name }}</h1>
    <div class="box02">
        <div class="box02__left">
            <div class="detail-rate">
                <p>
                    <i class="icondetail-star"></i>
                    <i class="icondetail-star"></i>
                    <i class="icondetail-star"></i>
                    <i class="icondetail-star"></i>
                    <i class="icondetail-star-dark"></i>
                </p>
            </div>
        </div>
    </div>
    <!--<div class="like-fanpage" data-url="http://www.dienmayxanh.com/tivi/led-4k-samsung-ua50au8100"></div>-->
    <div class="box_main">
        <div class="box_left">
            <div class="box01">
                <div class="box01__show">
                    <div class="owl-carousel detail-slider" id="carousel">
                        <div class="item">
                            <img src="{{ asset($data->Image) }}">
                        </div>
                        @isset($images)
                        @foreach($images as $image)
                        <div class="item">
                            <img src="{{ asset($image->image) }}">
                        </div>
                        @endforeach
                        @endisset
                    </div>
                </div>
            </div>
            <div class="pay mobile">
                <div class="col-12 pdetail-des">
                    <div class="clearfix"></div>
                    <div>
                        <div class="pdetail-info">
                            <p>Model: <b>{{ @$data->ProductSku  }}</b></p>
                            <!-- <p>Bảo hành: <b>24 Tháng, 1 đổi 1 trong vòng 1 tháng</b></p> -->
                        </div>
                        <div class="scroll-box">
                            <div class="boxbanner-32">
                                <div class="banner-list">
                                    <div class="item banner-item banner-item-1">
                                        <a target="&quot;_blank&quot;" href="#" data-id="1022">
                                            <picture>
                                                <img src="https://thegioidohoacom.s3.ap-southeast-1.amazonaws.com/wp-content/uploads/2019/01/10040348/X4iNCOp-1024x454.jpg" alt="Tết Lớn Khuyến Mại Lớn" width="&quot;640&quot;" height="&quot;150&quot;">
                                            </picture>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="pdetail-price">
                                <div class="pdetail-price-box">
                                    <h3>{{ str_replace(',' ,'.', number_format($data->Price)) }}₫ </h3>
                                </div>
                                <!-- <div class="pdetail-promotion">
                                    <div class="pdetail-promotion-body">
                                        <ul>
                                            Tặng máy đánh trứng đa năng Roler RHM-1002 trị giá 790,000đ
                                            <li>Tặng eVoucher trị giá 200,000đ mua phụ kiện IT, phụ kiện Mobile (có giá trị sử dụng trong 07 ngày). Chi tiết xem <a href="https://mediamart.vn/tin-khuyen-mai/tang-voucher-tri-gia-200-000vnd-mua-cac-san-pham-phu-kien" target="_blank">tại đây</a>.</li>
                                            <li>TÀI TRỢ TRẢ GÓP 0% LÃI SUẤT (*)</li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    </div> -->
                            </div>
                            <div class="pdetail-status">
                                <div class="pdetail-stockavailable">
                                    <?php
                                        if($data->Quantily==0){
                                            $status ='Tạm hết hàng';
                                        
                                        }
                                        elseif($data->Quantily==-1){
                                            $status ='Ngừng kinh doanh';
                                        }
                                        else{
                                            $status = 'Còn hàng';
                                        }


                                        
                                        ?>
                                    <span>{{ $status }}</span>
                                </div>

                                <!-- mobile -->
                                @if($data->Quantily>0)
                                <div class="pdetail-add-to-cart add-to-cart">
                                    <div class="inline">
                                        <input type="hidden" name="productId" value="{{ $data->id }}">
                                        <!-- <div class="product-quantity">
                                            <input type="text" class="quantity-field" readonly="readonly" name="qty" value="1">
                                            </div> -->
                                        <button type="button" class="btn btn-lg btn-add-cart btn-add-cart redirectCart" onclick="addToCart({{ $data->id }})">MUA NGAY <br>(Giao hàng tận nơi - Giá tốt - An toàn)</button>
                                    </div>
                                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Launch demo modal
                                        </button> -->
                                </div>
                                <div class="clearfix"></div>
                                <div class="installment-purchase pdetail-installment">
                                    <a target="_blank"  href="{{ route('details', $data->Link)  }}?show=tra-gop" admicro-data-event="101725" admicro-data-auto="1" admicro-data-order="false" class="but-1-gop">
                                    <strong>TRẢ GÓP</strong>
                                    <br>
                                    (Công ty tài chính)
                                    </a>
                                    <a target="_blank"  href="{{ route('details', $data->Link)  }}?show=tra-gop" admicro-data-event="101725" admicro-data-auto="1" admicro-data-order="false" class="but-1-gop">
                                    <strong>TRẢ GÓP QUA THẺ</strong>
                                    <br>
                                    (Visa, Master, JCB)
                                    </a>
                                </div>

                                @else

                                <div class="pdetail-add-to-cart add-to-cart">
                                    <div class="inline">
                                       
                                      
                                        <button type="button" class="btn btn-lg btn-add-cart btn-add-cart redirectCart">Liên hệ</button>
                                    </div>
                                   
                                </div>
                                @endif
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="total-imgslider">
                <a id="show-popup-featured-images-gallery" style="display: block" href="javascript:void(0)"  data-color-id="0" data-toggle="modal" data-target="#Salient_Features">Xem tất cả điểm nổi bật</a>
            </div>
            <div class="scrolling_inner">
                <div class="box01__tab scrolling">
                    <div id="thumb-featured-images-gallery-0" class="item itemTab active " data-gallery-id="featured-images-gallery" data-color-id="0" data-is-full-spec="False" data-color-order-id="0" data-isfeatureimage="True" data-toggle="modal" data-target="#Salient_Features" class="read-full" data-gallery-id="featured-images-gallery">
                        <div class="item-border">
                            <i class="icondetail-noibat"></i>
                        </div>
                        <p>Điểm nổi bật</p>
                    </div>
                    <div id="thumb-specification-gallery-0" class="item itemTab  is-show-popup" data-gallery-id="specification-gallery" data-color-id="0" data-is-full-spec="True" data-color-order-id="0" data-isfeatureimage="True">
                        <div class="item-border">
                            <i class="icondetail-thongso"></i>
                        </div>
                        <p data-toggle="modal" data-target="#specifications">Thông số kỹ thuật</p>
                    </div>
                    <div id="thumb-article-gallery-0" class="item itemTab  is-show-popup" data-gallery-id="article-gallery" data-color-id="0" data-is-full-spec="False" data-color-order-id="0" data-isfeatureimage="True">
                        <div class="item-border">
                            <i class="icondetail-danhgia"></i>
                        </div>
                        <p>Thông tin sản phẩm</p>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="Salient_Features" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Đặc điểm nổi bật</h5>
                        </div>
                        <div class="modal-body" style="padding:0 15px">
                            {!!  $data->Salient_Features  !!} 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="specifications" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Thông số kỹ thuật</h5>
                        </div>
                        <div class="modal-body" id="thong-so">
                            {!!  $data->Specifications  !!} 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-tab">
                <div class="bt-overlay"></div>
                <ul class="block-tab-top">
                    <li id="tab-featured-images-gallery-0"
                        class="tab-item active"
                        data-is-360-gallery="False"
                        data-gallery-id="featured-images-gallery"
                        data-color-id="0"
                        data-thump-name="&#x110;i&#x1EC3;m n&#x1ED5;i b&#x1EAD;t">
                        &#x110;i&#x1EC3;m n&#x1ED5;i b&#x1EAD;t
                    </li>
                    <li id="tab-color-images-gallery-11"
                        class="tab-item "
                        data-is-360-gallery="False"
                        data-gallery-id="color-images-gallery"
                        data-color-id="11"
                        data-thump-name="&#x110;en">
                        &#x110;en
                    </li>
                    <li id="tab-specification-gallery-0"
                        class="tab-item "
                        data-is-360-gallery="False"
                        data-gallery-id="specification-gallery"
                        data-color-id="0"
                        data-thump-name="Th&#xF4;ng s&#x1ED1; k&#x1EF9; thu&#x1EAD;t">
                        Th&#xF4;ng s&#x1ED1; k&#x1EF9; thu&#x1EAD;t
                    </li>
                    <li id="tab-article-gallery-0"
                        class="tab-item "
                        data-is-360-gallery="False"
                        data-gallery-id="article-gallery"
                        data-color-id="0"
                        data-thump-name="Th&#xF4;ng tin s&#x1EA3;n ph&#x1EA9;m">
                        Th&#xF4;ng tin s&#x1EA3;n ph&#x1EA9;m
                    </li>
                </ul>
                <div class="block-tab-content">
                    <div class="content-t active not-load-content" id="tab-content-featured-images-gallery-0">
                    </div>
                    <div class="content-t  not-load-content" id="tab-content-color-images-gallery-11">
                    </div>
                    <div class="content-t  not-load-content" id="tab-content-specification-gallery-0">
                    </div>
                    <div class="content-t  not-load-content" id="tab-content-article-gallery-0">
                    </div>
                </div>
            </div>
            <div class="wrap_wrtp hide" id="popup-materialsfee">
                <div class="pop">
                </div>
            </div>
            <div class="content">
                {!! $data->Detail !!}
            </div>
            <div class="show-more">
                <span>Đọc thêm</span>
            </div>
            <div class="border7"></div>
        </div>
        <div class="box_right desktop">
            <div class="col-12 pdetail-des">
                <div class="clearfix"></div>
                <div>
                    <div class="pdetail-info">
                        <p>Model: <b>{{ @$data->ProductSku  }}</b></p>
                        <!-- <p>Bảo hành: <b>24 Tháng, 1 đổi 1 trong vòng 1 tháng</b></p> -->
                    </div>
                    <div class="scroll-box">
                        <!-- <div class="boxbanner-32">
                            <div class="banner-list">
                                <div class="item banner-item banner-item-1">
                                    <a target="#" data-id="1022">
                                        <picture>
                                           
                                            <img src="https://thegioidohoacom.s3.ap-southeast-1.amazonaws.com/wp-content/uploads/2019/01/10040348/X4iNCOp-1024x454.jpg" alt="Tết Lớn Khuyến Mại Lớn" width="&quot;640&quot;" height="&quot;150&quot;">
                                        </picture>
                                    </a>
                                </div>
                            </div>
                            </div> -->
                        <div class="pdetail-price">
                            <div class="pdetail-price-box">
                                <h3>
                                    {{str_replace(',' ,'.', number_format($data->Price))  }}₫
                                </h3>
                            </div>
                            <!-- <div class="pdetail-promotion">
                                <div class="pdetail-promotion-body">
                                    <ul>
                                        Tặng máy đánh trứng đa năng Roler RHM-1002 trị giá 790,000đ
                                        <li>Tặng eVoucher trị giá 200,000đ mua phụ kiện IT, phụ kiện Mobile (có giá trị sử dụng trong 07 ngày). Chi tiết xem <a href="https://mediamart.vn/tin-khuyen-mai/tang-voucher-tri-gia-200-000vnd-mua-cac-san-pham-phu-kien" target="_blank">tại đây</a>.</li>
                                        <li>TÀI TRỢ TRẢ GÓP 0% LÃI SUẤT (*)</li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                </div> -->
                        </div>
                        <div class="pdetail-status">
                            <div class="pdetail-stockavailable">
                                <span>{{ $status }} </span>
                            </div>


                            @if($data['Quantily']>0)
                            <div class="pdetail-add-to-cart add-to-cart">
                                <form class="inline">
                                    <input type="hidden" name="productId" value="19439">
                                    <!-- <div class="product-quantity">
                                        <input type="text" class="quantity-field" readonly="readonly" name="qty" value="1">
                                        </div> -->
                                    @if((int)$data['Price']>0)
                                    <button type="button" class="btn btn-lg btn-add-cart btn-add-cart redirectCart" onclick="addToCart({{ $data->id }})">MUA NGAY <br>(Giao hàng tận nơi - Giá tốt - An toàn)</button>
                                    @else
                                    <button type="button" class="btn btn-lg btn-add-cart btn-add-cart redirectCart">LIÊN HỆ <br></button>
                                    @endif
                                </form>
                                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Launch demo modal
                                    </button> -->
                            </div>
                            <div class="clearfix"></div>
                            <div class="installment-purchase pdetail-installment">
                                @if((int)$data['Price']>3000000)
                                <a target="_blank" class="but-tra-gop" href="{{ route('details', $data->Link)  }}?show=tra-gop" admicro-data-event="101725" admicro-data-auto="1" admicro-data-order="false">
                                <strong>TRẢ GÓP</strong>
                                <br>
                                (Công ty tài chính)
                                </a>
                                <a target="_blank" class="but-tra-gop" href="{{ route('details', $data->Link)  }}?show=tra-gop" admicro-data-event="101725" admicro-data-auto="1" admicro-data-order="false">
                                <strong>TRẢ GÓP QUA THẺ</strong>
                                <br>
                                (Visa, Master, JCB)
                                </a>
                                @endif
                                <br><br>
                                {!!  $data->Specifications  !!} 
                            </div>
                            @else

                            <div class="pdetail-add-to-cart add-to-cart">
                                <div class="inline">
                                   
                                  
                                    <button type="button" class="btn btn-lg btn-add-cart btn-add-cart redirectCart">Liên hệ</button>
                                </div>
                               
                            </div>
                           
                            @endif

                        </div>
                        <div class="clearfix"></div>
                         <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#specifications">Xem chi tiết thông số kỹ thuật</button>
                       
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="border7"></div>
        <div class="clearfix"></div>
        <div class="related view-more-related viewer-product">
        </div>
        <div class="col-md-8 clearfix" id="comment_pro">
            <article id="article-comment-2131" itemprop="comment" itemscope="" itemtype="https://schema.org/Comment">
                <?php 
                    $comment = App\Models\rate::where('product_id', $data->id)->Where('active', 1)->get();
                    ?>
                @if(isset($comment))
                @foreach($comment as $comments)
                <header class="comment-header">
                    <p class="comment-author" itemprop="author" itemscope="" itemtype="https://schema.org/Person">
                        <img alt="" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPyGNr2qL63Sfugk2Z1-KBEwMGOfycBribew&usqp=CAU" height="30px" width="30px">
                        <span class="comment-author-name" itemprop="name">
                        <a href="#" class="comment-author-link" rel="external nofollow" itemprop="url">{{ $comments->name }}</a>
                        </span> 
                    <p class="comment-meta"><time class="comment-time" itemprop="datePublished"><a class="comment-time-link" href="https://nguyenhung.net/comment-trong-html.html#comment-2131" itemprop="url">{{ $comments->created_at->format('d/m/Y, H:i' )  }}</a></time></p>
                </header>
                <div class="comment-content" itemprop="text">
                    <p>{!!  $comments->content  !!}</p>
                </div>
                @endforeach
                @endif
            </article>
            <div class="rate-text">
                <!-- <h3 style="margin-bottom: 0;margin-top: 40px;"> Đánh giá  {{ $data->Name }}</h3> -->
                <p style="background: #f3f3f3;padding: 10px;border-radius: 3px;margin: 10px 0;">Đánh giá sản phẩm nhận Coupon 20.000đ dành cho khách mua hàng tại Điện máy người việt.</p>
            </div>
            <div class="p-comment">
                <form class="comment-form" name="rate-form" id="rate-form" role="form">
                    <div class="rate_view">
                        Chọn đánh giá của bạn:
                        <div class="stars">
                            <div>
                                <input class="star star-click star-5" id="star-5" type="radio" name="star"/>
                                <label class="star star-5" for="star-5"></label>
                                <input class="star star-click star-4" id="star-4" type="radio" name="star"/>
                                <label class="star star-4" for="star-4"></label>
                                <input class="star star-click star-3" id="star-3" type="radio" name="star"/>
                                <label class="star star-3" for="star-3"></label>
                                <input class="star star-click star-2" id="star-2" type="radio" name="star"/>
                                <label class="star star-2" for="star-2"></label>
                                <input class="star star-click star-1" id="star-1" type="radio" name="star"/>
                                <label class="star star-1" for="star-1"></label>
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="left">
                            <textarea style="padding: 10px;border-radius: 3px; width: 100%;" name="content" placeholder="Nhập đánh giá về sản phẩm " id="content0"></textarea>
                        </div>
                        <div class="left">
                            <div class="form-input">
                                <table style="width:100%;" class="tbl-common">
                                    <tbody>
                                        <tr>
                                            <td style="padding-right: 5px;">
                                                <input style="border-radius: 3px;height: 43px;" type="text" id="name0" name="name" class="inputText" placeholder="Họ tên" value="">
                                            </td>
                                            <td style="padding-left: 5px;">
                                                <input style="border-radius: 3px;height: 43px;" type="text" id="email0" name="email" class="inputText" placeholder="Email" value="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input style="margin-top: 15px;width: calc(100% - 6px);border-radius: 3px;" type="submit" value="Gửi bình luận" class="btn btn-red comments-rate" ></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--form-input-->
                        </div>
                    </div>
                </form>
                <input type="hidden" name="star" id="star_number" value="5">
                <!--comment-form-->
            </div>
        </div>
        <!-- end đánh giá -->
        <div class="related view-more-related">
            <p class="related__ttl">Xem thêm sản phẩm khác</p>
            @if(isset($other_product))
            <div class="listproduct slider-promo owl-carousel">
                @foreach($other_product as  $value)
                @if($value->active==1 && $value->id != $data->id)
                <div class="item">
                    <a href='{{ route('details', $value->Link) }}' class=" main-contain">
                    <div class="item-label">
                    </div>
                    <div class="item-img">
                        <img data-src="{{ asset($value->Image) }}" class="lazyload" alt="{{ $value->Name }}" width=210 height=210>
                    </div>
                    <!--  <p class='result-label temp1'><img width='20' height='20' class='lazyload' alt='Giảm Sốc' data-src='https://cdn.tgdd.vn/2020/10/content/icon1-50x50.png'><span>Giảm Sốc</span></p> -->
                    <h3>{{ $value->Name }}</h3>
                    <strong class="price">{{  str_replace(',' ,'.', number_format($value->Price))  }}&#x20AB;</strong>
                    </a>
                </div>
                @endif
                @endforeach
            </div>
            @endif
        </div>
        <!-- <div class="scrolling_inner">
            <div class="box03 box03--nopadd scrolling">
                <a href="/tivi-samsung" class="box03__item addradius">
                <img class="lazyload" data-src="//cdn.tgdd.vn/Brand/2/Samsung1942-b_51.png" />
                </a>
                <a href="/tivi?p=tu-15tr-20tr" class="box03__item addradius">
                T&#x1EEB; 15tr - 20tr                        </a>
                <a href="/tivi-crystal-uhd" class="box03__item addradius">
                Crystal UHD                        </a>
                <a href="/tivi?g=smart-tivi" class="box03__item addradius">
                Smart Tivi                        </a>
                <a href="/tivi?g=50-inch" class="box03__item addradius">
                50 inch                        </a>
                <a href="/tivi?g=ultra-hd-4k" class="box03__item addradius">
                4K                        </a>
                <a href="/tivi-tro-ly-ao-google-assistant" class="box03__item addradius">
                Tr&#x1EE3; l&#xFD; &#x1EA3;o Google Assistant                        </a>
                <a href="/tivi-choi-game" class="box03__item addradius">
                Ch&#x1A1;i game tr&#xEA;n tivi                        </a>
            </div>
            </div> -->
    </div>
    <div class="border7"></div>
    <div class="watched"></div>
    </div>
    <div class="errorcompare" style="display:none;"></div>
    <!--#endregion-->
    <!--#region BreadcrumbList-->
    <!--#endregion-->
    <!--#region Organization-->
    <!--#endregion-->
</section>
<div class="prod-info txt_555 fix">
    <span class="name-scroll"> {{ $data->Name }} </span>
    <div class="vote" id="vote_avg">
        <div class="fl" style="padding:0 5px 0 0;">
            Model: <span class="value txt_blue">{{ $data->ProductSku }}</span> | 
            Tình trạng: <span class="value txt_blue">{{ $status }}</span> | 
        </div>
        <a id="btn-vote" class="txt_555 fl" href="javascript:;" onclick="go_comm()"> Đánh giá: </a>
        <div class=" totalRate " id="js-total-rating" style="display: inline-block;"><i class="icons icon-star star"><span></span></i></div>
        (<span class="reviewCount">0</span>)
    </div>
    <div class="prod-info-left fl">          
        <span class="robot txt_green txt_b txt_20">{{  str_replace(',' ,'.', number_format($data->Price))  }} &#x20AB;</span>
    </div>
    <div class="clear space3px"></div>
    <div class="clear space10px"></div>
    <?php
        $now = Carbon\Carbon::now();
        
        $promotion = DB::table('promotion')->where('id_product', $data->id)->get()->first();
        
        if(!empty($promotion)){
            $gifts     = DB::table('group_gift')->where('id', $promotion->id_group_gift)->first();
        
            $gifts_ar = [$gifts->gift1, $gifts->gift2];
        
            $gift = DB::table('gifts')->whereIn('id',  $gifts_ar)->get()->toArray();  
        
        }
         
        
        ?>
    @if(!empty($promotion ))      
    <div class="promo line_h19">
        <div class="txt_b">Khuyến mại: {{ $gifts->type ==1?'Lựa chọn 1 trong 2 sản phẩm sau':'' }}</div>
        <div style="display: flex;">
            <img src="{{ @asset($gift1->image) }}" height="30px" width="30px">
            <p>{{ @$gift1->name??'' }}</p>
            <br>
            @if(!empty($gift2->name))
            <img src="{{ asset($gift2->image) }}" height="30px" width="30px">
            <p>{{ ($gift2->name)??'' }}</p>
            @endif
        </div>
    </div>
    @endif
    <div class="buy-group">
        @if($data->Quantily>0) 
        @if((int)$data->Price>0)
        <div class="clear space10px in">
            <a class="btn-buy txt_center cor5px buy-nows-popup" onclick="addToShoppingCart('pro','3036',document.getElementById('s_quantity').value,'{{ $data->Price}}');" href="javascript:;">
            <i class="fa fa-shopping-cart"></i> <span class="txt_15" onclick="addToCart({{ $data->id }})">Mua ngay</span>
            </a>
        </div>
        @endif
        @if((int)$data->Price>3000000)
        <div class="clear space10px credit">
            <a class="btn-buy txt_center cor5px but-1-gop"  href="{{ route('details', $data->Link)  }}?show=tra-gop" style="background: #ffde00; border-bottom: 0;" >
            <i class="fa fa-shopping-cart"></i> <span class="txt_15">Trả góp</span>
            </a>
            <a class="btn-buy txt_center cor5px"  href="{{ route('details', $data->Link)  }}?show=tra-gop" style="background: #ffde00; border-bottom: 0;">
            <i class="fa fa-shopping-cart"></i> <span class="txt_15" >Trả góp qua thẻ</span>
            </a>
        </div>
        @endif
        @endif
        Gọi đặt mua:  <span class="txt_b txt_red"><a href="tel:0967025111">098 361 2828</a></span> (sau 17h)<br>
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span class="txt_b txt_red"> <a href="tel:02438615111">091 301 1888</a></span> (sau 17h)
    </div>
    <div class="clear"></div>

    <div class="prod-info-right fr">
        <h4 class="format txt_13">
            <p class="format txt_b">Yên tâm mua sắm:</p>
        </h4>
        <h5 class="format txt_13 txt_n">
            <p><i class="fa fa-check"></i> Bảo hành tại nhà</p>
        </h5>
        <h5 class="format txt_13 txt_n">
            <p><i class="fa fa-check"></i> Gọi đặt mua: <span class="txt_b txt_red">02473036336</span> (cả dịp Lễ, Tết)</p>
        </h5>
        <h5 class="format txt_13 txt_n">
            <p><i class="fa fa-check"></i> Giao hàng miễn phí 20km</p>
        </h5>
        <h5 class="format txt_13 txt_n">
            <p><i class="fa fa-check"></i> Lắp đặt miễn phí
                (Trừ điều hòa, bình nước nóng)
            </p>
        </h5>
        <h5 class="format txt_13 txt_n">
            <p><i class="fa fa-check"></i> Thanh toán tại nhà</p>
        </h5>
        <h5 class="format txt_13 txt_n">
            <p><i class="fa fa-check"></i> Giá cạnh tranh nhất thị trường</p>
        </h5>
        <h5 class="format txt_13 txt_n">
            <p><i class="fa fa-check"></i> Đổi mới 100% trong 7 ngày đầu
                ( Trừ Sanaky, Sony chỉ bảo hành tại nhà )
            </p>
        </h5>
        <div class="clear"></div>
    </div>
    <!--right-->
    <div class="clear"></div>
    </div>
    <!--//prod-info-left -->

</div>
@push('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/details.css?v=1') }}">
@endpush
@push('script')
<script type="text/javascript">
    $( document ).ready(function() {
    
        $('.star-click').bind('click',function(){
            id_star = $(this).attr('id');    
            number_star = id_star.substr(5, 6);
            $('#star_number').val(number_star);
            // console.log(number_star);
           
        });
    
        $("#rate-form").validate({
            rules: {
                name: "required",
                content: "required",
                email: {
                    required: true,
                    email: true
                },
               
            },
             messages: {
                name: "vui lòng nhập tên",
                content: "vui lòng nhập đánh giá",
               
                email: {
                    required: "vui lòng nhập địa chỉ email",
                    email: "vui lòng nhập đúng định dạng email"
                },
              
            },
            submitHandler: function(form) {
                
              postComment();
    
            }
           
    
        }); 
    
    });  
    
    
    function postComment() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $.ajax({
            type: 'POST',
            url: "{{ route('rate-form') }}",
            data: {
                product_id: {{ $data->id }},
                email:$('#email0').val(),
                name:$('#name0').val(),
                content:$('#content0').val(),
                star:$('#star_number').val(),
                   
            },
            success: function(result){
    
                $('.comments-rate').text('Đã gửi bình luận');
                $('.comments-rate').val('Đã gửi bình luận');
    
                $('#email0').val('');
                $('#name0').val('');
                $('#content0').val('');
              
              alert(result);
            }
        });
    
    }  
    
    
    // chức năng sản phẩm đã xem
    
    
    function toUniqueArray(a){
        var newArr = [];
        for (var i = 0; i < a.length; i++) {
            if (newArr.indexOf(a[i]) === -1) {
                newArr.push(a[i]);
            }
        }
      return newArr;
    }
    
    product_id_item_viewer = [];
    
    const item_local_store =  JSON.parse(localStorage.getItem('viewed_product'));
    
    if(item_local_store !=null){
    
        product_id_item_viewer = item_local_store;
    }
    
    product_id_item_viewer.push('{{ $data->id }}');
    
    product_id_item_viewer = toUniqueArray(product_id_item_viewer);
    
    
    
    localStorage.setItem('viewed_product', JSON.stringify(product_id_item_viewer));
    
    view_product_id = localStorage.getItem('viewed_product');
    
    button_buy_height = $('.scroll-box').offset().top;
    view_more_height  = ($('.view-more-related').offset().top);
    
     $(".prod-info").hide();
                
    $(".show-more span").bind("click", function(){
        $('.content').css({'height':'auto', 'overflow':'auto' });
        $(this).hide();
        view_more_height  = $('.view-more-related').offset().top-100;
    });
    
    $(function(){
        $(window).scroll(function(){
            const scroll_result = $('.total-imgslider').offset().top
            const scroll_browser = $(this).scrollTop();
    
            if(scroll_browser>= scroll_result &&scroll_browser <= view_more_height){
    
                $(".prod-info").show();
                
            }
            else{
                $(".prod-info").hide();
            }
    
        });
    });
    
</script>
<script type="text/javascript">
    $('.bar-top-left').hide();
    
    
    $.ajax({
        type: 'GET',
        url: "{{ route('show-viewed-product') }}",
        data: {
            product_id: view_product_id,
               
        },
        success: function(result){
    
            console.log($("#number-product-cart").text());
          
           // numberCart = result.find($("#number-product-cart").text());
           $('.viewer-product').append(result);
    
           
            
        }
    });    
    
    function addToCart(id) {
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $.ajax({
            type: 'POST',
            url: "{{ route('cart') }}",
            data: {
                product_id: id,
                   
            },
            success: function(result){
    
               //  numberProductCart = $(".number-cart").text();
    
               //  console.log(numberProductCart);
               
               // numberCart = result.find(numberProductCart);
    
                $('#tbl_list_carts').append(result);
    
                const numberCart = $('#number-product-cart').text();
    
                $('.number-cart').text(numberCart);
    
                $('#exampleModal').modal('show'); 
                
            }
        });
        
    }
    
    $('#carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        autoplay:true,
        dots:true,
       
        responsive:{
            0:{
                items:1
    
            },
            600:{
                items:1
            },
            
            1000:{
                items:1
            }
        }
    });
    
    
    
    
    $('.listproduct').owlCarousel({
        loop:false,
    
        margin:10,
        nav:false,
        responsive:{
            0:{
                items:1.5
            },
            600:{
                items:1.5
            },
            1000:{
                items:5
            }
        }
    });
</script>
@endpush
@endsection