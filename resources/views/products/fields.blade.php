<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Category Field -->
<div class="form-group col-sm-6">
    <?php 

        $category = App\Models\category::select('id', 'namecategory')->Where('parent_id', 1)->get();

        $new_category = [];
        if(isset($category)){
            foreach ($category as  $value) {
               $new_category[$value->id] = $value->namecategory;
            }
        }

    
    ?>
    {!! Form::label('category', 'Category:') !!}
    {!! Form::select('category', $new_category, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>

<!-- Images Field -->
<div class="form-group col-sm-6">
    {!! Form::label('images', 'Images:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('images', ['class' => 'custom-file-input']) !!}
            {!! Form::label('images', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>


<!-- Quatity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quatity', 'Quatity:') !!}
    {!! Form::text('quatity', null, ['class' => 'form-control']) !!}
</div>


<?php  $url_domain =  Config::get('app.url') ?>

<script type="text/javascript">
    
     CKEDITOR.replace( 'content', {
        filebrowserBrowseUrl: '{{ $url_domain }}/ckfinder.html',
        filebrowserImageBrowseUrl: '{{ $url_domain }}/ckfinder.html?Type=Images',
        filebrowserUploadUrl: '{{ $url_domain }}/js/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: '{{ $url_domain }}/js/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserWindowWidth : '1000',
        filebrowserWindowHeight : '700'
    } );

</script>