
 {{ count($product) }}       

@if(isset($product))

@foreach($product as $products){


<tr>
    <td style="vertical-align:top">
    	<a href="/android-tivi-tcl-55p615-55-inch-4k/">
	    	<img src="/media/product/120_6000_android_tivi_tcl_50p615_50_inch_4k_org.jpg" width="50" style="margin-right:10px;">
	    </a>
    </td>
    <td style="vertical-align:top; color:red; line-height:18px;"><a class="suggest_link" href="{{ asset($products->Link) }}">{{ $products->Name }}</a><br>Giá:10.200.000vnđ‘</td>
</tr>

@endforeach

@endif
