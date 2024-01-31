@extends('frontend.layouts.apps')

@section('content')

<style type="text/css">
    
    .loprong {
        max-width: 1200px;
        margin: 0 auto;
    }

    .bocuc_170 {
        display: block;
        vertical-align: top;
    }

    .bocuc_170 > .loprong {
        text-align: center;
        margin: 0 auto;
    }
    .bang_sanpham_giohang_daydu .header_giohang .header_anh {
        width: 20%;
    }

    .bang_sanpham_giohang_daydu .ten {
        display: inline-block;
        width: 30%;
        vertical-align: top;
    }

    .bang_sanpham_giohang_daydu .gia {
        display: inline-block;
        width: 20%;
        vertical-align: top;
        text-align: right;
        white-space: nowrap;
    }
    .bang_sanpham_giohang_daydu .soluong {
    display: inline-block;
    width: 20%;
    vertical-align: top;
    text-align: right;
}
.bang_sanpham_giohang_daydu .thanhtien {
    display: inline-block;
    font-weight: bold;
    text-align: right;
    width: 10%;
    text-align: right;
}

.bang_sanpham_giohang_daydu .xoa {
    text-align: right;
    border-bottom: 1px dotted #ccc;
    padding: 10px 0;
    margin-bottom: 20px;
}
.bang_sanpham_giohang_daydu .header_giohang .header_tensanpham {
    width: 30%;
}

.bang_sanpham_giohang_daydu .header_giohang .header_gia {
    width: 20%;
    text-align: right;
}
.bang_sanpham_giohang_daydu .header_giohang .header_soluong {
    width: 20%;
    text-align: right;
}

.bang_sanpham_giohang_daydu .header_giohang .header_thanhtien {
    width: 10%;
    text-align: right;
}

.bang_sanpham_giohang_daydu .header_giohang .header_anh {
    width: 20%;
}

.header_giohang {
    padding: 20px 0px 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px dotted #ccc;
    font-weight: bold;
}
</style>


<div class="loprong">
    <h1 class="header"><span class="header_text">Giỏ hàng của bạn</span></h1>
    <div class="padding ">
        <div class="bang_sanpham_giohang_daydu giohang_xacnhan" id="giohang_daydu">
            <div class="header_giohang">
                <div class="anh"> </div>
                <div class="ten">Tên</div>
                <div class="gia">Đơn giá</div>
                <div class="soluong">Số lượng</div>
                <div class="thanhtien">Thành tiền</div>
            </div>

            <?php  

                $cartAdd =[];
                $i=0;

            ?>

            @foreach($data_cart as $cart)

            <?php  

                $cartAdd[$i]['name'] =$cart->name;

                $cartAdd[$i]['price_all'] =(int)$cart->price*$cart->qty;

                $cartAdd[$i]['price'] = $cart->price;

                $cartAdd[$i]['qty'] =$cart->qty;

                $i++;

                
            ?>
            <div class="giohang_bang_sanpham">

                <div class="anh"><a rel="nofollow" target="_blank" href="da-granite-cau-thang-id96.html"><img alt="" class="anh_sanpham_danhsach" src="files/sanpham/96/200_1/jpg/�_200x200.jpg"></a></div>
                <div class="ten">
                    <a rel="nofollow" target="_blank" href="da-granite-cau-thang-id96.html">{{ $cart->name  }} </a>
                    <p><span style="width:20%">Ghi chú:</span> </p>
                </div>
                <div class="gia">
                    <strong>{{ $cart->price }}</strong>
                    <div></div>
                </div>
                <div class="soluong">{{ $cart->qty }} </div>
                <div class="thanhtien">{{ (int)$cart->price*$cart->qty   }}</div>
                <div class="xoa"> <a href="{{ route('removeCart', $cart->rowId) }}">Xóa</a></div>
               
            </div>

            @endforeach

            <?php 

            
                $infoPrice = json_encode($cartAdd);

               
               
            ?>


            <div class="giohang_tinhtong"><span class="giohang_phuphi">
                Phụ phí khác <strong class="label_cot_tongcong">0</strong>
                </span>
                <br>
                <span class="giohang_tongcong">Tổng cộng: <strong class="label_cot_tongcong"> {{ $total  }} VND</strong></span>
              

            </div>
           
        </div>
        <style>.bocuc_170 .nhan{width:25%; padding-right:10px; display:inline-block; text-align:right}.bocuc_170 #thongbao{margin-left:25%;  display:inline-block; }.bocuc_170 .control input,.bocuc_170 .control textarea{width:40%; display:inline-block; }</style>
    </div>

    <h2>Thông tin</h2>


    <div class="" style="width: 100%; margin: 0 auto;">
        <div class="col-md-12">
            <form  method="post" id="form_lien_he" action="{{ route('send-order') }}">
                @csrf
                <table style="font-weight:bold" width="100%" border="0" cellpadding="4">
                    <tbody>
                        <tr>
                            <td scope="col" width="17%">Họ tên (*)</td>
                            <td scope="col"><input class="input_form_lienhe" id="name" type="text" required name="name"></td>
                        </tr>
                       
                        <tr>
                            <td>Địa chỉ</td>
                            <td><textarea id="address" class="input_form_lienhe" cols="" rows="" required name="address"></textarea></td>
                        </tr>
                        <tr>
                            <td>Điện thoại (*)</td>
                            <td><input class="input_form_lienhe" id="tel" type="text" required name="phone_number"></td>
                        </tr>
                        <tr>
                            <td>Email (*)</td>
                            <td><input class="input_form_lienhe" id="email" type="email" required name="mail"></td>
                        </tr>
                        <tr>
                            <td>Lời nhắn (*)</td>
                            <td>
                                <textarea style="height:100px" class="input_form_lienhe" id="request" cols="" rows="" required="" name="content"></textarea>
                                <div style="height:20px;"></div>
                                <button class="nut1" type="submit" name="step1button" id="button">Gửi thông tin</button>    
                            </td>
                        </tr>
                      
                        <input type="hidden"  name="product" value="{{  $infoPrice }}">

                        <input type="hidden"  name="total" value="{{ $total  }}">
                       
                    </tbody>
                </table>
            </form>
        </div>


    </div>
</div>    

@endsection 
