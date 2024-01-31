<section id="categoryPage" class="desktops" data-id="1942" data-name="Tivi" data-template="cate">
    <div class="box-sort ">
        @if(count($product_search)>0)
        <p class="sort-total"><b>{{ count($product_search)}}</b> Sản phẩm <strong class="manu-sort"></strong></p>
        @endif
        <div class="sort-select ">
            <label for="standard-select">Xếp theo</label>
            <div class="select">
                <select id="sort-by-option">
                    <option value="id"  {{ isset($action)&&$action == 'id'?'selected':'' }}>Nổi bật</option>
                    <option value="desc" {{ isset($action)&&$action == 'desc'?'selected':'' }}>Giá tăng dần</option>
                    <option value="asc" {{ isset($action)&&$action == 'asc'?'selected':'' }}>Giá giảm dần</option>
                </select>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="container-productbox">
        <!-- <div id="preloader">
            <div id="loader"></div>
            </div> -->
        <div class="row list-pro">
            @if(count($product_search)>0)
            <?php $arr_id_pro = []; ?>
            @foreach($product_search as $value)
            @if($value->active==1)
            <?php   
                $id_product = $value->id;
                array_push($arr_id_pro, $id_product);
                ?>
            <div class="col-md-3 col-6 lists">
                <div class="item  __cate_1942">
                    <a href='/{{ $value->Link }}' data-box="BoxCate" class="main-contain">
                        <div class="item-label">
                            <span class="lb-tragop">Trả góp 0%</span>
                        </div>
                        <div class="item-img item-img_1942">
                            <img class="lazyload thumb" data-src="{{ asset($value->Image) }}" alt="{{ asset($value->Name) }}" style="width:100%"> 
                        </div>
                        <div class="items-title">
                           <!--  <p class='result-label temp1'><img width='20' height='20' class='lazyload' alt='Giảm Sốc' data-src=''><span>Giảm Sốc</span></p> -->
                            <h3 >
                                {{ $value->Name  }}
                            </h3>
                            <div class="item-compare">
                                <span>55 inch</span>
                                <span>4K</span>
                            </div>
                            <!-- <div class="box-p">
                                <p class="price-old black">20.900.000&#x20AB;</p>
                                </div> -->
                            <strong class="price">{{ number_format($value->Price , 0, ',', '.')}}</strong>
                            <!-- <p class="item-gift">Quà <b>1.500.000₫</b></p> -->
                            <div class="item-rating">
                                <p>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                </p>
                                <!--  <p class="item-rating-total">56</p> -->
                            </div>
                        </div>
                    </a>
                    <div class="item-bottom">
                        <a href="#" class="shiping"></a>
                    </div>
                    <!--  <a href="javascript:void(0)" class="item-ss">
                        <i></i>
                        So sánh
                        </a> -->
                </div>
            </div>
            @endif
            @endforeach
            <span class="lists-id">{{ json_encode($arr_id_pro) }}</span>
            @else
            <h2>Không tìm thấy sản phẩm</h2>
            @endif
        </div>
        <!-- <div class="view-more ">
            <a href="javascript:;">Xem thêm <span class="remain">133</span> Tivi</a>
            </div> -->
    </div>

    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        
        
        $( "#sort-by-option" ).bind( "change", function() {


                $.ajax({
       
                type: 'POST',
                    url: "{{ route('filter-option') }}",
                    data: {
                        json_id_product: $('.lists-id').text(),
                        action:$(this).val(),
                        
                    },
                    success: function(result){

                        $('#categoryPage').html('');

                        $('#categoryPage').html(result);

                       
                        

                    }
                });

            });

    </script>


    <div class="errorcompare" style="display:none;"></div>
    <!--  <div class="block__banner banner__topzone">
        <a data-cate="0" data-place="1919" href="https://www.topzone.vn/" onclick="jQuery.ajax({ url: '/bannertracking?bid=48557&r='+ (new Date).getTime(), async: true, cache: false });"><img style="cursor:pointer" src="https://cdn.tgdd.vn/2021/12/banner/Frame4879-1200x120.jpg" alt="Promote Topzone" width="1200" height="120"></a>
        </div> -->
    <div class="watched"></div>
    <div class="overlay"></div>
</section>



