@extends('layouts.app')

@section('content')

<style type="text/css">
    
    .paren1 span{
        cursor: pointer;
    }
</style>


<?php 

    $name_product = App\Models\product::find($id);
?>

<h2>Sửa danh mục cho sản phẩm {{ $name_product->Name }}</h2>


<?php 

    function get_child_of_Parent($parent){

        $count_child   = App\Models\groupProduct::where('parent_id', $parent)->get();

        $ar_child = [];

        if(count($count_child)>0){

            for ($i=0; $i < count($count_child); $i++) { 

                $find = $i==0?$parent:$childs->id;
                
                $childs = App\Models\groupProduct::where('parent_id',  $find)->first();

                $ar_child[$i] = $childs->id;

            }

            return $ar_child;

        }

    }



?>


<div class="table-responsive">
   <!--  <div>
        <button class="groupProduct">Xem toàn bộ danh mục liên quan</button>

    </div> -->

    <?php  

         $groupProductss = App\Models\groupProduct::select('id', 'name', 'level','product_id')->get();

         $data_actives = [];


         foreach ($groupProductss as $key => $value) {

             if(!empty(json_decode($value->product_id))&&in_array($id, json_decode($value->product_id))){

                array_push($data_actives, $value->id);

            }
            
         }

         print_r($data_actives);


        function recursiveMenu($id, $data, $parent_id=0, $sub=true, $level=0){

            $product_id =  $id;

            $data_active = [];


            if(isset($data)){

                foreach ($data as $value) {

                    if(!empty(json_decode($value->product_id))&&in_array($product_id, json_decode($value->product_id))){

                        array_push($data_active, $value->id);

                    }
                    
                }

            }




            if($level==0||$level==1||$level==2){
                 $levelcheck = $parent_id;

            }
            else{
                 $levelcheck ='';
            }
            echo $sub ? '<ul>':'<ul class="sub-menu sub'.$levelcheck.'">';
            foreach ($data as $key => $item) {
                
                
                $all_prent = App\Models\groupProduct::where('parent_id', $item['id'])->get();
                if($item['group_product_id'] == $parent_id){
                    unset($data[$key]);
                ?>    
            <li class="paren1">

              <input type="checkbox" id="select{{ $item['id'] }}" name="sale" onclick="selected({{ $item['id'] }})" {{ in_array($item['id'], $data_active)?'checked':''}}><a href="javascript:void(0)"  class="click1" data-id="{{ $item['id'] }}"><?php echo $item['name']?></a>  @if($item['level']<count($all_prent))<span class="clicks{{ $item['id'] }}" onclick="showChild('sub{{ $item['id'] }}', 'clicks{{ $item['id'] }}', '{{ $id }}')">+</span>@endif
              
              <?php recursiveMenu($id, $data, $item['id'], false, $item['level'], $data_active); ?>
             </li>
                <?php }} 
             echo "</ul>";
        }
        
    ?>

    <?php recursiveMenu($id, $groupProductss);  ?>


    


    <div class="modal fade" id="info-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa danh mục</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    

                     <a href="" class="sua">Sửa</a>
                     <br>
                     

                </div>
                
            </div>
        </div>
    </div>

   

    <script type="text/javascript">
        $('.groupProduct').click(function () {
           
           $('#modals-product').modal('show');

        })

        $('.sub-menu').hide();

        $('.click1').dblclick(function(){

            dataId = $(this).attr('data-id');

            $('.sua').attr('href', '{{env("APP_URL")}}/admins/groupProducts/'+dataId+'/edit');

            $('#info-modal').modal('show');


        })

        function showChild(id, classs, product_id) {

            if($('.'+id).is(":visible") ){
                 $('.'+id).hide();
                 $('.'+classs).text('+');

            }
            else{
                

                $.ajax({
                    type: 'GET',
                    url: "{{ route('filter-child-click') }}",
                    data: {
                        id: id,
                        product_id: product_id
                       
                    },
                   
                    success: function(result){

                        console.log(result);

                        if($('.'+id).text()==''){

                             $('.'+id).append(result);

                        }

                        
                       
                       
                       
                    }
                });
                $('.'+id).show();
                $('.'+classs).text('-');
            }

        
        }

        function selected(id) {

             var checked = $('#select'+id).is(':checked'); 


            var active = 0;

            if(checked == true){
                active = 1;
            }

            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('add-group-product') }}",
                data: {
                    id: id,
                    product_id:{{ $id }},
                    active:active,
                },
               
                success: function(result){

                    console.log(result);
                   
                }
            });

        }

    </script>
</div>

@endsection
