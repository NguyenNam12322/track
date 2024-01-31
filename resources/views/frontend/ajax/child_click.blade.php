

@if(isset($data))
     

    @foreach($data as $datas)

        <?php 

       
            $child_pa = App\Models\groupProduct::where('parent_id',  $datas->id)->where('level', $datas->level+1)->get()->toArray();

           

        ?>

                  
        <li class="paren1">
            <input type="checkbox" id="select{{ $datas->id }}" name="sale" onclick="selected('{{ $datas->id }}')" {{ !empty(json_decode($datas->product_id))&&in_array($product_id, json_decode($datas->product_id))?'checked':''}}><a href="javascript:void(0)" class="click1" data-id="{{ $datas->id }}">{{ $datas->name }}</a>  @if($datas->level<3)<span class="clicks{{ $datas->id }}" onclick="showChild('sub{{ $datas->id }}', 'clicks{{ $datas->id }}')">+</span>@endif            
            
        </li>
        <ul class="sub-menu sub{{ $datas->id }}" style="display: none;"></ul>
    
    @endforeach
   
@endif   

