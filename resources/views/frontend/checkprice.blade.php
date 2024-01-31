<style type="text/css">
    .step .fa{
        margin-top: 12px;
    }

   
</style>

<div style="display:block; padding: 0 45px; width: 68%; margin: 0 auto;" id="content_1">

    <form  method="get" action="{{ route('search-model') }}">
        <label for="fname">Nhập số điện thoại:</label><br>
        <input type="text" id="fname" name="number"><br>
        <br>
        <button type="submit">submit</button>
      
    </form> 
    @if(!empty($data)  && count($data)>0)    
                            
    <table cellpadding="5" id="tb_padding" border="1" bordercolor="#CCCCCC" style="border-collapse:collapse;">
        <tbody>
            <tr bgcolor="#EEEEEE" style="font-weight:bold;">
                <td>STT</td>
                <td>Trạng thái</td>

                <td>Tên khách hàng</td>

                <td>Số điện thoại khách hàng</td>

                <td>Địa chỉ giao nhận</td>

                <td>Tên nhân viên giao hàng</td>

                <td>Số điện thoại nhân viên giao hàng</td>
                

            </tr>
                                 

            <?php 

                if(!empty($data['nhan_vien_giao_nhan'])){

                    $info_forwarding_staff = explode('-', $data['nhan_vien_giao_nhan']);
                }
               
            ?>
            <tr>
                <td>1</td>
                <td>{{ $data['trang_thai'] }}</td>
                <td>{{ $data['khach_hang'] }}</td>
                <td>{{ $data['dien_thoai'] }}</td>

                <td>{{ !empty($data['dia_chi_giao_hang'])?$data['dia_chi_giao_hang']:$data['dia_chi'] }}</td>

                <td>{{ $info_forwarding_staff[0]??'' }}</td>

                <td>{{ $info_forwarding_staff[1]??'' }}</td>
            </tr>


            
               
        </tbody>
    </table>


    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiểm tra thông tin đơn hàng</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');body{background-color: #eeeeee;font-family: 'Open Sans',serif}.container{margin-top:50px;margin-bottom: 50px}.card{position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-orient: vertical;-webkit-box-direction: normal;-ms-flex-direction: column;flex-direction: column;min-width: 0;word-wrap: break-word;background-color: #fff;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.1);border-radius: 0.10rem}.card-header:first-child{border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0}.card-header{padding: 0.75rem 1.25rem;margin-bottom: 0;background-color: #fff;border-bottom: 1px solid rgba(0, 0, 0, 0.1)}.track{position: relative;background-color: #ddd;height: 7px;display: -webkit-box;display: -ms-flexbox;display: flex;margin-bottom: 60px;margin-top: 50px}.track .step{-webkit-box-flex: 1;-ms-flex-positive: 1;flex-grow: 1;width: 25%;margin-top: -18px;text-align: center;position: relative}.track .step.active:before{background: #FF5722}.track .step::before{height: 7px;position: absolute;content: "";width: 100%;left: 0;top: 18px}.track .step.active .icon{background: #ee5435;color: #fff}.track .icon{display: inline-block;width: 40px;height: 40px;line-height: 40px;position: relative;border-radius: 100%;background: #ddd}.track .step.active .text{font-weight: 400;color: #000}.track .text{display: block;margin-top: 7px}.itemside{position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;width: 100%}.itemside .aside{position: relative;-ms-flex-negative: 0;flex-shrink: 0}.img-sm{width: 80px;height: 80px;padding: 7px}ul.row, ul.row-sm{list-style: none;padding: 0}.itemside .info{padding-left: 15px;padding-right: 7px}.itemside .title{display: block;margin-bottom: 5px;color: #212529}p{margin-top: 0;margin-bottom: 1rem}.btn-warning{color: #ffffff;background-color: #ee5435;border-color: #ee5435;border-radius: 1px}.btn-warning:hover{color: #ffffff;background-color: #ff2b00;border-color: #ff2b00;border-radius: 1px}
    </style>

</head>
<body>


    <div class="container">
        <article class="card">
            <header class="card-header"> Đơn hàng của bạn </header>
            <div class="card-body">
                
                <article class="card">
                    <div class="card-body row">
                        <div class="col"> <strong>Ngày đặt hàng:</strong> <br>{{ $data['ngay_ky'] }} </div>
                        <div class="col"> <strong>Người giao hàng:</strong> <br> {{ $info_forwarding_staff[0]??'' }},  | <i class="fa fa-phone"></i> {{ $info_forwarding_staff[1]??'' }} </div>
                        <div class="col"> <strong>Trạng thái:</strong> <br> {{ $data['trang_thai'] }} </div>
                       
                    </div>
                </article>
                <div class="track">
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Tạo đơn hàng</span> </div>

                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Chờ giao hàng</span> </div>
                    <div class="step {{ $key==4||$key==1||$key==2?'active':'' }}"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Đang vận chuyển </span> </div>
                    <div class="step {{ $key==1||$key==2?'active':'' }}"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Giao hàng thành công</span> </div>
                </div>
                <hr>
                <!-- <ul class="row">
                    <li class="col-md-4">
                        <figure class="itemside mb-3">
                            <div class="aside"><img src="https://i.imgur.com/iDwDQ4o.png" class="img-sm border"></div>
                            <figcaption class="info align-self-center">
                                <p class="title">Dell Laptop with 500GB HDD <br> 8GB RAM</p> <span class="text-muted">$950 </span>
                            </figcaption>
                        </figure>
                    </li>
                    <li class="col-md-4">
                        <figure class="itemside mb-3">
                            <div class="aside"><img src="https://i.imgur.com/tVBy5Q0.png" class="img-sm border"></div>
                            <figcaption class="info align-self-center">
                                <p class="title">HP Laptop with 500GB HDD <br> 8GB RAM</p> <span class="text-muted">$850 </span>
                            </figcaption>
                        </figure>
                    </li>
                    <li class="col-md-4">
                        <figure class="itemside mb-3">
                            <div class="aside"><img src="https://i.imgur.com/Bd56jKH.png" class="img-sm border"></div>
                            <figcaption class="info align-self-center">
                                <p class="title">ACER Laptop with 500GB HDD <br> 8GB RAM</p> <span class="text-muted">$650 </span>
                            </figcaption>
                        </figure>
                    </li>
                </ul> -->
                <hr>
                <a href="https://dienmaynguoiviet.vn/" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
            </div>
        </article>
    </div>
        
    </body>
    </html>

 
    @endif 


  
</div>