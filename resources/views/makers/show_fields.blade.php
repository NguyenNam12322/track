<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $maker->id }}</p>
</div>

<!-- Maker Field -->
<div class="col-sm-12">
    {!! Form::label('maker', 'Maker:') !!}
    <p>{{ $maker->maker }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $maker->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $maker->updated_at }}</p>
</div>

