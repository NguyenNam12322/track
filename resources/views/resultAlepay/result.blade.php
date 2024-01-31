<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/lib/cart-result.min.css') }}">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            function modal_show() {
            
                $("#modal-products").modal('show');
            }
            
             
        </script>
        <!-- Compiled and minified JavaScript -->
        <link rel="stylesheet" href="style/style.css">
        <title>Show Data</title>
        <style type="text/css">
            .modal-content{
            background: #00b09b;
            background: -webkit-linear-gradient(to right, #00b09b, #96c93d);
            background: linear-gradient(to right, #00b09b, #96c93d);
            min-height: 100vh;
            }
            .text-gray {
            color: #aaa;
            }
        </style>

    

            <?php

            require(public_path().'/lib_pay/alepay-v3/config.php');

            $errorCode = isset($_GET['errorCode']) ? $_GET['errorCode'] : '';
            $transactionCode = isset($_GET['transactionCode']) ? $_GET['transactionCode'] : '';
            $alepay = new Alepay($config);
            $utils = new AlepayUtils();
            ?>
        
    </head>
    <body>
        <div id="container">
            <div class="row">
                <div class="center" style="margin:0 auto;">
                    
                    <ul class="collection col-md-8">
                        <li class="collection-item">
                            <div>

                                <?php 

                                    $data = $alepay->Get_Transaction_data($transactionCode);
                                   
                                ?>
                                <?php if ($errorCode == '000' || $errorCode == '155') {  ?>

                                     

                                    @if($data->message=="Thành công")

                                    <?php  

                                        $data_installment  = App\Models\installment::where('email', $data->buyerEmail)->where('phone', $data->buyerPhone)->get()->last();
                                    ?>
                                    
                                    <section>
                                        <div class="middleCart">
                                            <!---->
                                            <div class="alertsuccess-new"><i class="new-cartnew-success"></i><strong>Đặt hàng thành công</strong></div>
                                            <div class="ordercontent">
                                                <p>Cảm ơn Anh <b>{{ @$data_installment->name }}</b> đã cho Điện Máy Người Việt cơ hội được phục vụ.</p>
                                                <!---->
                                                <div>
                                                    <!---->
                                                    <div class="info-order" style="">
                                                        <div class="info-order-header">
                                                            <h4>Đơn hàng: <span>#{{ $transactionCode }}</span></h4>
                                                            <div class="header-right">
                                                                <a href="javascript:void(0)" onclick="modal_show()">Quản lý đơn hàng</a>
                                                                
                                                            </div>
                                                        </div>
                                                        <label>
                                                            <span class="">
                                                                <i class="info-order__dot-icon"></i><span><strong>Người nhận hàng: </strong>{{ @$data_installment->name }}, {{ @$data_installment->phone }}</span><!---->
                                                            </span>
                                                        </label>
                                                        <label>
                                                            <span class="">
                                                                <i class="info-order__dot-icon"></i><span><strong>Giao đến: </strong>{{ @$data_installment->address }}.</span><!---->
                                                            </span>
                                                        </label>
                                                        <label>
                                                            <span class="">
                                                                <i class="info-order__dot-icon"></i><span><strong>Tổng tiền: </strong><b>
                                                                    {{ @str_replace(',' ,'.', number_format($data_installment->price)) }}₫</b></span><!---->
                                                            </span>
                                                        </label>
                                                        <!----><!----><!----><!---->
                                                    </div>
                                                </div>
                                                <!---->

                                                <?php 

                                                    $product = App\Models\product::find($data_installment->product_id);

                                                    
                                                ?>

                                                <div class="timetakegoods">
                                                <h4>Thời gian nhận hàng</h4>
                                                    <div class="box-order">
                                                        

                                                        <?php 

                                                            $today = date("Y-m-d, H:i");
                                                            $another_date = date("Y-m-d").', 16:30';
                                                            if (strtotime($today) > strtotime($another_date)) {
                                                                $trade = "Đơn hàng sẽ được giao vào ngày mai";
                                                            } else {
                                                                $trade = "Đơn hàng sẽ được giao trước 16h30 hôm nay";
                                                            }
                                                           

                                                        ?>   
                                                        <!----><!--fragment#178842422f1#head-->
                                                        <div fragment="178842422f1" class="rowtime"><span>{{ $trade }}</span></div>
                                                        <!----><!--fragment#178842422f1#tail-->
                                                        <ul>
                                                            <li>
                                                                <a href="{{ @$product->Link }}" target="_blank" class="img-order">
                                                                    <img data-src="{{ asset(@$product->Image) }}" src="{{ asset(@$product->Image) }}" loading="lazy" class=" ls-is-cached lazyloaded">
                                                                </a>

                                                               &nbsp &nbsp &nbsp &nbsp

                                                                <div class="text-order">
                                                                    <a href="{{ @$product->Link }}" target="_blank" class="text-order__product-name">{{ @$product->Name  }}</a>
                                                                  
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <!--fragment#d16d94e98a#head-->
                                                        <div fragment="d16d94e98a" class="lastrow">
                                                            <!---->
                                                        </div>
                                                        <!----><!--fragment#d16d94e98a#tail-->
                                                    </div>
                                                   
                                                </div>
                                               
                                               
                                               
                                            </div>
                                        </div>



                                    </section>


                                    <div class="modal fade" id="modal-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Sản phẩm trả góp</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                     <div class="container py-5">
                                                        <div class="row text-center text-white mb-5">
                                                            <div class="col-lg-12 mx-auto">
                                                                <h5 class="display-4">Danh Sách Sản Phẩm</h5>
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="row">
                                                            <div class="col-lg-12 mx-auto">
                                                                <ul class="list-group shadow">
                                                                    <li class="list-group-item">
                                                                        <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                                                            <div class="media-body order-2 order-lg-1">
                                                                                <h5 class="mt-0 font-weight-bold mb-2">Sản Phẩm </h5>
                                                                                <p class="font-italic text-muted mb-0 small">{{ @$product->Name  }}</p>
                                                                                <div class="d-flex align-items-center justify-content-between mt-1">
                                                                                    <h6 class="font-weight-bold my-2"> {{ @str_replace(',' ,'.', number_format($data_installment->price)) }}</h6>
                                                                                    <ul class="list-inline small">
                                                                                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                                                                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                                                                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                                                                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                                                                        <li class="list-inline-item m-0"><i class="fa fa-star-o text-gray"></i></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <img src="{{ asset(@$product->Image) }}" alt="{{ @$product->Name }}" width="200" class="ml-lg-5 order-1 order-lg-2">
                                                                        </div>
                                                                    </li>
                                                                   
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <script type="text/javascript">
                                        
                                        function modal_show() {
                                            $('#modal-product').modal('show');
                                        }
                                    </script>

                                    @endif

                                <?php     
                                } else {
                                    echo "Giao Dịch Thất Bại!";
                                } ?>
                            </div>
                        </li>
                       
                    </ul>
                    <ul class="collection col-md-8">
                        <li class="collection-item">
                            <div>
                                <a href="/">Nhấn Vào Đây Nếu Bạn Muốn Mua Tiếp</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>