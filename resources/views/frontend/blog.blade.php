

    @extends('frontend.layouts.apps')

    @section('content') 
    <link rel="stylesheet" type="text/css" href="{{asset('css/dienmay.css')}}"> 
    <link rel="stylesheet" href="https://dienmaynguoiviet.vn/template/dienmaynguoiviet/script/owl.carousel.min.css">
    <link rel="stylesheet" href="https://dienmaynguoiviet.vn/template/dienmaynguoiviet/script/styles.css?v=8881288.8883.151">
    <link rel="stylesheet" href="https://dienmaynguoiviet.vn/template/dienmaynguoiviet/script/customs.css?v=245754.75.52928">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css?v=1" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&subset=vietnamese" rel="stylesheet">
    
    
    <!-- end header -->
    <!-- begin main -->
    <main class="bg-fff">
        <!-- Begin menu blog -->
        <div class="menu_blog">
            <ul class="dm_container">
                <li>
                    <a href="/tu-van-tivi/">
                    <img src="/template/dienmaynguoiviet/images/tivi.png" alt="">
                    <span>Tư vấn
                    <br> tivi</span>
                    </a>
                </li>
                <li>
                    <a href="/tu-van-tu-lanh/">
                    <img src="/template/dienmaynguoiviet/images/tu-lanh.png" alt="">
                    <span>Tư vấn
                    <br> tủ lạnh</span>
                    </a>
                </li>
                <li>
                    <a href="/tu-van-may-giat/">
                    <img src="/template/dienmaynguoiviet/images/may-giat.png" alt="">
                    <span> Tư vấn
                    <br> máy giặt</span>
                    </a>
                </li>
                <li>
                    <a href="/tu-van-dieu-hoa/">
                    <img src="/template/dienmaynguoiviet/images/dieu-hoa.png" alt="">
                    <span>Tư vấn
                    <br> điều hòa</span>
                    </a>
                </li>
                <li>
                    <a href="/tu-van-gia-dung/">
                    <img src="/template/dienmaynguoiviet/images/gia-dung.png" alt="">
                    <span>Tư vấn
                    <br> gia dụng</span>
                    </a>
                </li>
                <li>
                    <a href="/tu-van-mua-sam/">
                    <img src="/template/dienmaynguoiviet/images/mua-sam.png" alt="">
                    <span>Tư vấn
                    <br> mua sắm</span>
                    </a>
                </li>
                <li>
                    <a href="/meo-vat-gia-dinh/">
                    <img src="/template/dienmaynguoiviet/images/meo-vat.png" alt="">
                    <span>Mẹo vặt
                    <br> gia đình</span>
                    </a>
                </li>
                <li>
                    <a href="/tin-khuyen-mai/">
                    <img src="/template/dienmaynguoiviet/images/khuyen-mai.png" alt="">
                    <span>Tin
                    <br> Khuyến Mại</span>
                    </a>
                </li>
                <li>
                    <a href="">
                    <img src="/template/dienmaynguoiviet/images/video.png" alt="">
                    <span>Video
                    <br>clip</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End menu blog -->
        <div class="blog-list dm_container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="sidebar-left">
                        <figure>
                            <img src="" alt="">
                        </figure>
                        <ul class="ulcatemenu">
                            <li class="active"><a>Tư vấn mua sắm</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="main-blog-list">
                        <div style="width:100%; height: 50px;">
                            <h1 class="title">Tư vấn mua sắm</h1>
                        </div>
                        
                        @isset($data)
                        @foreach($data as $value)
                        
                        <div class="blog-list-item">
                            <a href="{{ route('details', $value->link) }}" class="img">
                            <img src="{{ asset($value->image) }}" data-src ="{{ asset($value->image) }}" alt="{{ $value->title }}">
                            </a>
                            <div class="blog-flex">
                                <a href="{{ route('details', $value->link) }}" class="name">{{ $value->title }}</a>
                                
                                
                                <a href="{{ route('details', $value->link) }}" class="linkview">Xem chi tiết ›</a>
                            </div>
                        </div>
                        @endforeach
                        @endisset
                        
                        {{ $data->links() }}

                       <!--  <div class="bloglist-page">
                            <table cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="pagingIntact"><a>Xem trang</a></td>
                                    <td class="pagingSpace"></td>
                                    <td class="pagingViewed">1</td>
                                    <td class="pagingSpace"></td>
                                    <td class="pagingIntact"><a href="/tu-van-mua-sam/?page=2">2</a></td>
                                    <td class="pagingSpace"></td>
                                    <td class="pagingIntact"><a href="/tu-van-mua-sam/?page=3">3</a></td>
                                    <td class="pagingSpace"></td>
                                    <td class="pagingIntact"><a href="/tu-van-mua-sam/?page=4">4</a></td>
                                    <td class="pagingSpace"></td>
                                    <td class="pagingIntact"><a href="/tu-van-mua-sam/?page=5">5</a></td>
                                    <td class="pagingSpace"></td>
                                    <td class="pagingIntact"><a href="/tu-van-mua-sam/?page=6">6</a></td>
                                    <td class="pagingSpace"></td>
                                    <td class="pagingIntact"><a href="/tu-van-mua-sam/?page=7">7</a></td>
                                    <td class="pagingSpace"></td>
                                    <td class="pagingFarSide" align="center">...</td>
                                    <td class="pagingIntact"><a href="/tu-van-mua-sam/?page=2">Tiếp theo</a></td>
                                </tr>
                            </table>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="banner-blog">
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- end main -->
    <!--<hr>-->
    <!-- begin footer -->

    @endsection
   
    


<!-- Load time: 0.126 seconds  / 4 mb-->
<!-- Powered by HuraStore 7.4.4, Released: 12-Aug-2018 / Website: www.hurasoft.vn -->