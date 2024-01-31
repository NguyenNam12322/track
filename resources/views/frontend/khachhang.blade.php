@extends('frontend.layouts.app')

@section('content')
<div class="box_breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">Trang chủ</a></li>
            <li><a href="/cam-nhan-khach-hang" title="Khách hàng nói gì về D'media?">Khách hàng nói gì về D'media?</a></li>
        </ul>
    </div>
</div>
<div class="wrapper">
    <div class="container">
        <div class="box_module">
            <div class="box_title hidden">
                <h1 class="title"><a href="/cam-nhan-khach-hang" title="Khách hàng nói gì về D'media?">Khách hàng nói gì về D'media?</a></h1>
            </div>
            <div class="box_content" style="padding: 30px 0;">
                <div class="layout_category_feedback">
                    <div class="row">
                        <?php 

                    		$feedback = App\Models\post::where('category', 23)->take(5)->get();
                    	?>
                    	@if(count($feedback)>0)
                    	@foreach($feedback as $newss)
                        <div class="col-sm-4 col-xs-6">
                            <div class="item">
                                <div class="image">
                                    <a href="{{ route('single', @$newss['link']) }}" title="{{ @$newss['title'] }}"><img src="{{  @url($newss['image']) }}" alt="{{ @$newss['title'] }}"><span>Xem thêm</span></a>
                                </div>
                                <div class="info">
                                    <h3 class="title"><a href="{{ route('single', @$newss['link']) }}" title="{{ @$newss['title'] }}">{{ @$newss['title'] }}</a></h3>
                                    <div class="location">Diễn viên <span></span></div>
                                    <div class="desc">{!! @$newss['content'] !!} <a href="{{ route('single', @$newss['link']) }}">Xem thêm</a></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>
<div class="box_productCategoryHome bg_gray">
    <div class="container">
        <div class="box_title">
            <h2 class="title"><a href="/rang-su-tham-my" title="Răng sứ thẩm mỹ">Răng sứ thẩm mỹ</a></h2>
            <a href="/rang-su-tham-my" class="view_all">Xem tất cả</a>
        </div>
        <div class="box_desc">D'media tập trung cung cấp các dịch vụ nha khoa thẩm mỹ trong môi trường nhẹ nhàng, chu đáo, chuyên nghiệp. Đảm bảo mọi khách hàng tới D'media đều có những trải nhiệm nha khoa đẳng cấp, ưng ý nhất cho đường cười của chính mình. </div>
        <div class="box_content">
            <div class="row productGrid">
                 <?php 

                		$feedback = App\Models\post::where('category', 6)->take(6)->get();
                	?>
                	@if(count($feedback)>0)
                	@foreach($feedback as $newss)
                <div class="col-sm-3 col-xs-6">
                    <div class="item">
                        <div class="image">
                            <a href="{{ route('single', @$newss['link']) }}" title="{{ @$newss['title'] }}"><img src="{{  @url($newss['image']) }}" alt="{{ @$newss['title'] }}"></a>
                        </div>
                        <div class="info">
                            <h3 class="title"><a href="{{ route('single', @$newss['link']) }}" title="{{ @$newss['title'] }}">{{ @$newss['title'] }}</a></h3>
                            <div class="price">Giá: <span class="value">Liên hệ</span></div>
                        </div>
                        <div class="control">
                            <a href="{{ route('single', @$newss['link']) }}" class="add_card"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Đặt hàng</a>
                        </div>
                    </div>
                </div>
                
                @endforeach
                @endif
            </div>
        </div>
       <!--  <div class="control"><a href="/rang-su-tham-my" class="btn_yellow">Xem tất cả dịch vụ thẩm mỹ răng tại D'media</a></div> -->
    </div>
</div>
@endsection