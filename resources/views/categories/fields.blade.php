
<?php  $parent = ['không chọn','Sản phẩm', 'Dự án'] ?>
<!-- Namecategory Field -->
<div class="form-group col-sm-6">
    {!! Form::label('namecategory', 'Namecategory:') !!}
    {!! Form::text('namecategory', null, ['class' => 'form-control']) !!}
</div>
<!-- image Field -->
<div class="form-group col-sm-6">
    <label for="image">image:</label>
    <div class="input-group">
        <div class="custom-file">
            <input class="custom-file-input" name="image" type="file" id="image">
            <label for="image" class="custom-file-label">Choose file</label>
        </div>
    </div>
</div>

<!-- parent_id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent', 'Danh mục cha:') !!}
    {!! Form::select('parent_id', $parent, @$category->parent_id, ['class' => 'form-control custom-select']) !!}
</div>