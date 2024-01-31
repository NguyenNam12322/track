<url>
	<url>
		<loc>https://dienmaynguoiviet.vn</loc>
	</url>
	@if(isset($product))
    @foreach($product as $products)
	<loc>{{ $products->Link }}</loc>
	@endforeach    
    @endif
</url>