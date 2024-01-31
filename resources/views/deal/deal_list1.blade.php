
@isset($products)
@foreach($products as $val)
<tr id="row_1208">
    <td>1</td>
    <td align="center">
        <img src="{{ asset($val['Image']) }}" width="70">
        <!--<div><a style="color:green" href="javascript:;" onclick="delete_special(1208)">Xóa bỏ</a></div>-->
    </td>
    <td>
        <div><a href="{{ route('details', $val['Link']) }}" target="_blank"><b>{{ $val['Name'] }}</b></a></div>
        <div>Giá deal : <b style="color:red;">{{  $val['price_deal'] }}</b> vnd - Giá thường: <b style="color:red;">{{  $val['Price'] }}</b> </div>
        <div>Số lượng : <b style="color:red;">0</b> - Số tối thiểu cho 1 đơn hàng: <b style="color:red;">0</b></div>
        <div>Thời gian : Từ <b style="color:red;">28-03-2022, 12:00 am</b> đến <b style="color:red;">03-04-2022, 11:30 pm</b> 
            (
            Đang bắt đầu
            )
        </div>
        <div>Tạo lúc: 28-03-2022, 3:07 pm, cập nhật: 01-04-2022, 8:18 am</div>
    </td>
    <td>
        <div>Số đơn hàng : <b style="color:red;">0</b></div>
        <div>Số Sản phẩm đặt mua: <b style="color:red;">0</b></div>
        <div>Lượt xem: <b style="color:red;">0</b></div>
    </td>
    <td>
        <div><a href="?opt=deal&amp;view=deal-add&amp;id=1208">Sửa lại</a></div>
        <div id="is_feature_1208">
            <span><a href="javascript:set_feature('1208','on')">Chọn nổi bật</a></span>
        </div>
        <div><a href="javascript:;" onclick="delete_deal('{{ $val->id }}')">xóa</a></div>
    </td>
</tr>
@endforeach

@endisset