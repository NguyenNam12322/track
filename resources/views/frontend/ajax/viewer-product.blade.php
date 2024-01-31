    @if(isset($product_viewer))
    <p class="related__ttl">Sản phẩm đã xem</p>

    

    <div class="listproduct slider-promo owl-carousel banner-sales" style="display: block;">

        @foreach($product_viewer as  $value)
        
        <div class="item">
            <a href='{{ route('details', $value->Link) }}' class=" main-contain">
                <div class="item-label">
                </div>
                <div class="item-img">
                    <img data-src="{{ asset($value->Image) }}" class="lazyload" alt="{{ @$value->Name }}" width=210 height=210>
                </div>
               <!--  <p class='result-label temp1'><img width='20' height='20' class='lazyload' alt='Giảm Sốc' data-src='https://cdn.tgdd.vn/2020/10/content/icon1-50x50.png'><span>Giảm Sốc</span></p> -->
                <h3>{{ @$value->Name }}</h3>
               
                <strong class="price">{{  str_replace(',' ,'.', number_format($value->Price))  }}&#x20AB;</strong>
            
            </a>
        </div>
        

        @endforeach
        
    </div>

    <script type="text/javascript">
        
        $('.banner-sales').owlCarousel({
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
    @endif