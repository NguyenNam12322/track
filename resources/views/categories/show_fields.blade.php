<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $category->id }}</p>
</div>

<!-- Namecategory Field -->
<div class="col-sm-12">
    {!! Form::label('namecategory', 'Namecategory:') !!}
    <p>{{ $category->namecategory }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $category->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $category->updated_at }}</p>
</div>

