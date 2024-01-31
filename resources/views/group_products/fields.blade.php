<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 1000]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('link', 'Link:') !!}
    {!! Form::text('link', null, ['class' => 'form-control','maxlength' => 10000]) !!}
</div>




<?php  

    

    $groupProducts = App\Models\groupProduct::select('id', 'name', 'group_product_id')->get()->toArray();

    function data_tree($data, $parent_id = 0, $level = 0){
        $result = [];
        foreach($data as $item){
            if($item['group_product_id'] == $parent_id){
                $item['level'] = $level;

                $item['parent_id'] = $item['id'];
                $result[] = $item;
                unset($data[$item['id']]);
                $child = data_tree($data, $item['id'], $level + 1 );
                $result = array_merge($result, $child);
            }
        }
        return $result;
    }


    $list_cat = data_tree($groupProducts, 0);

    $arr_new_list_cat = [];

    if(isset($list_cat)){

        $arr_new_list_cat[0] = 'Không chọn';

        foreach($list_cat as $value){
            $arr_new_list_cat[$value['id']] = str_repeat(html_entity_decode('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'), $value['level']).' - '.$value['name'];
        }  

    }  

?>

<!-- Group_id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Group', 'Danh mục') !!}
    {!! Form::select('group_product_id', $arr_new_list_cat, @$groupProduct->group_product_id, ['class' => 'form-control custom-select' ]) !!}
   
</div>




<input type="hidden" name="data_value" value="{{ json_encode($list_cat) }}" id="data_value">

<input type="hidden" name="level" id="level" value="{{ @$groupProduct->level }}">

<input type="hidden" name="parent_id" id="parent_id" value="{{ @$groupProduct->parent_id }}">



<script>
    let ar = '{{ json_encode($list_cat) }}';
    $('.custom-select').change(function(){
        id = $(this).val();

        console.log(id);

        if(parseInt(id)==0){
            level = 0

            parent_id = 0;
        }
        else{
            data_value = $('#data_value').val();

            data_value = JSON.parse($('#data_value').val());

            filter = data_value.filter(data => data.id ==  id);

            level  = parseInt(filter[0].level)+1;

            parent_id = filter[0].parent_id;

        }

        $('#level').val(parseInt(filter[0].level)+1);

        $('#parent_id').val(filter[0].parent_id);
            
    })

</script>




