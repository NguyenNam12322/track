<title>Product List and Grid View</title>
<meta name"viewport" content="width=device-width, user-scalable=no, initial=scale=1.0, maximun-scale=1.0, minimun-scale=1.0" >

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<style type="text/css">
    *{
  margin:0px;
  padding:0px;
}

h1{
  text-align: center;
  margin-top: 30px;
  font-family: 'Source Serif Pro', serif;
}

.buttons{
    font-size: 22px;
    margin-top: 2%;
    margin-left: 4.2%;
}

.fa:hover{
    color: darkcyan;
}

.container{
  display: flex;
  flex-flow: column nowrap;
}
/*CSS Grid*/
.section-grid{
   display: flex; 
   padding-left: 25px;
   padding-right: 25px;
}
.grid-prod{
  flex: 1 1 auto;
  display: flex; 
  flex-flow: row wrap;  
}
.prod-grid{
  flex: 1 1 25%;
  margin:2%;
  padding:12px;
  border: 2px solid #000;
}

.prod-grid img{
  width:100%;
}
h3, p{
  text-align: center;
  line-height: 1.5;
  letter-spacing: 1px;
}

.btn{
    background: darkcyan;
    border: 1px solid darkcyan;
    border-radius: 6px;
    color: white;
    font-size: 22px;
    width: 200px;
    height: 40px;
    position: right;
    margin: 10px; 
    letter-spacing: 1px;
    display: inline-block;
}
.btn:hover{
    background: white;
    border: 2px solid darkcyan;
    border-radius: 6px;
    color: darkcyan;
    font-size: 22px;
    width: 200px;
    height: 40px;
    position: right;
    margin: 10px; 
    letter-spacing: 1px;
    font-weight: bold;
    display: inline-block;
}
button{
  float: right;
}

/*CSS List*/
.section-list{
   display: flex; 
   padding: 2% 4%; 
}
table {
  width: 100%;
  margin: 10px 10px;
  border:2px solid #000;
  border-collapse: collapse;
  border-spacing: 0;
}
table tr td {
  padding: 10px;
  border-top: 2px solid #000;
}
tr td img{
  width:100%;
}
.btn-list{
    background: darkcyan;
    border: 1px solid darkcyan;
    border-radius: 6px;
    color: white;
    font-size: 22px;
    width: 200px;
    height: 40px;
    position: right;
    margin: 10px; 
    margin-top: 10%;
    letter-spacing: 1px;
    display: inline-block;
    
}
.btn-list:hover{
    background: white;
    border: 2px solid darkcyan;
    
    color: darkcyan;

    margin: 10%; 

}
button{
  float: right;
}

.card-body .icon .fa{
    margin-top:10px;
}

@media (min-width : 320px) and (max-width : 480px) { 
  .section-list, .buttons{
    display: none;
  }
}
</style>

 <style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');body{background-color: #eeeeee;font-family: 'Open Sans',serif}.container{margin-top:50px;margin-bottom: 50px}.card{position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-orient: vertical;-webkit-box-direction: normal;-ms-flex-direction: column;flex-direction: column;min-width: 0;word-wrap: break-word;background-color: #fff;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.1);border-radius: 0.10rem}.card-header:first-child{border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0}.card-header{padding: 0.75rem 1.25rem;margin-bottom: 0;background-color: #fff;border-bottom: 1px solid rgba(0, 0, 0, 0.1)}.track{position: relative;background-color: #ddd;height: 7px;display: -webkit-box;display: -ms-flexbox;display: flex;margin-bottom: 60px;margin-top: 50px}.track .step{-webkit-box-flex: 1;-ms-flex-positive: 1;flex-grow: 1;width: 25%;margin-top: -18px;text-align: center;position: relative}.track .step.active:before{background: #FF5722}.track .step::before{height: 7px;position: absolute;content: "";width: 100%;left: 0;top: 18px}.track .step.active .icon{background: #ee5435;color: #fff}.track .icon{display: inline-block;width: 40px;height: 40px;line-height: 40px;position: relative;border-radius: 100%;background: #ddd}.track .step.active .text{font-weight: 400;color: #000}.track .text{display: block;margin-top: 7px}.itemside{position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;width: 100%}.itemside .aside{position: relative;-ms-flex-negative: 0;flex-shrink: 0}.img-sm{width: 80px;height: 80px;padding: 7px}ul.row, ul.row-sm{list-style: none;padding: 0}.itemside .info{padding-left: 15px;padding-right: 7px}.itemside .title{display: block;margin-bottom: 5px;color: #212529}p{margin-top: 0;margin-bottom: 1rem}.btn-warning{color: #ffffff;background-color: #ee5435;border-color: #ee5435;border-radius: 1px}.btn-warning:hover{color: #ffffff;background-color: #ff2b00;border-color: #ff2b00;border-radius: 1px}
</style>
<h1>Danh sách đơn hàng đã đặt</h1>
<!--Buttons of grid and list-->

<div class="container">
    <!--Product Grid-->

    @if(!empty($result))
    <div id="div1">
        <section class="section-grid">
            <div class="grid-prod">

                @if(isset($result))
                @foreach($result as $value)
                <?php

                    $ar_pd = []; 
                ?>
                <?php 

                    $number_pro = count($value['chi_tiet']);

                    for ($i=0; $i < $number_pro; $i++) { 
                        
                        $ar_pd[$i] = $value['chi_tiet'][$i]['ten_sp'];
                    }

                ?>
                <div class="prod-grid">
                    
                    <h3>Tên khách hàng: {{  @$value['khach_hang'] }} </h3>
                    <p>Địa chỉ giao hàng: {{   !empty($value['dia_chi_giao_hang'])?$value['dia_chi_giao_hang']:$value['dia_chi']   }} </p>
                    <p>Trạng thái đơn hàng:  {{ $value['trang_thai'] }}</p>
                    <p>Ngày mua:  {{ $value['ngay_ky'] }}</p>
                    <p>Sản Phẩm: {{ implode(',', $ar_pd) }}</p>

                </div>

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

                            if(!empty($value['nhan_vien_giao_nhan'])){

                                $info_forwarding_staff = explode('-', $value['nhan_vien_giao_nhan']);
                            }
                           
                        ?>

                        <tr>
                            <td>1</td>
                            <td>{{ $value['trang_thai'] }}</td>
                            <td>{{ $value['khach_hang'] }}</td>
                            <td>{{ $value['dien_thoai'] }}</td>

                            <td>{{   !empty($value['dia_chi_giao_hang'])?$value['dia_chi_giao_hang']:$value['dia_chi']   }}</td>

                            <td>{{ $info_forwarding_staff[0]??'' }}</td>

                            <td>{{ $info_forwarding_staff[1]??'' }}</td>
                        </tr>

                       
                        
                           
                    </tbody>
                </table>
                
                
                <article class="card" style="width: 100%;">
                
                    <div class="card-body">
                    
                    
                        <div class="track">
                            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Tạo đơn hàng</span> </div>
        
                            <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Chờ giao hàng</span> </div>
                            <div class="step {{ $value['trang_thai']=='Hoàn thành'|| $value['trang_thai']=='Đang giao hàng'?'active':'' }}"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Đang giao hàng </span> </div>
                            <div class="step {{ $value['trang_thai']=='Hoàn thành'?'active':'' }}"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Giao hàng thành công</span> </div>
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
                        <a href="http://dienmaynguoiviet.vn/" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to order</a>
                    </div>
                </article>
                @endforeach
                @endif
                
                
               
                
            </div>
        </section>
    </div>
    <!--Product List-->         
    <div id="div2" style="display:none;">
        <section class="section-list">
            <table>

                @if(isset($result))
                @foreach($result as $value)
                <tr>
                    
                    <td>
                         <h3>Tên khách hàng: {{  @$value['khach_hang'] }} </h3>
                        <p>Địa chỉ giao hàng: {{   !empty($value['dia_chi_giao_hang'])?$value['dia_chi_giao_hang']:$value['dia_chi']   }} </p>
                        <p>Trạng thái đơn hàng:  {{ $value['trang_thai'] }} </p>
                        <p>Ngày mua:  {{ $value['ngay_ky'] }}</p>
                    </td>
                </tr>
                @endforeach
                @endif
               
               
            </table>
        </section>
    </div>

   

    @else
    <h2>Không tìm thấy đơn hàng nào</h2>
    @endif
    
    
</div>

<script
  src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
  crossorigin="anonymous"></script>

<script type="text/javascript">
    $(function() {
        $('#showdiv1').click(function() {
            $('div[id^=div]').hide();
            $('#div1').show();
        });
        $('#showdiv2').click(function() {
            $('div[id^=div]').hide();
            $('#div2').show();
        });

    })
</script>