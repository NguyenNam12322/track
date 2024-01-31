
<?php  

    $i = 0
?>
@if(isset($products))

@foreach($products as $val)

<?php 

    $i++;
?>

<tr id="row_{{$val->id}}" class="row-hover">
    <td>{{ $i }}</td>
    <td>
        <b><a href="{{ route('details', $val->Link) }}" class="pop-up">{{ $val->Name }}</a></b> <br>
       
        <input type="hidden" id="pro_name_{{ $val->id }}" value="{{ $val->id }}">
    </td>
    <td>
       {{ number_format($val->Price , 0, ',', '.')}}
    </td>

    
    <td>
        1
    </td>
    <td>
        24 Tháng
    </td>
    <td>
        <input type="button" value="Chọn sản phẩm" class="update-bt-all" onclick="select_product_to_table('{{$val->id}}')"><span id="update_bt_5814"></span>
    </td>
</tr>

@endforeach
@endif