<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $metaSeo->id }}</p>
</div>

<!-- Meta Title Field -->
<div class="col-sm-12">
    {!! Form::label('meta_title', 'Meta Title:') !!}
    <p>{{ $metaSeo->meta_title }}</p>
</div>

<!-- Meta Content Field -->
<div class="col-sm-12">
    {!! Form::label('meta_content', 'Meta Content:') !!}
    <p>{{ $metaSeo->meta_content }}</p>
</div>

<!-- Meta Og Title Field -->
<div class="col-sm-12">
    {!! Form::label('meta_og_title', 'Meta Og Title:') !!}
    <p>{{ $metaSeo->meta_og_title }}</p>
</div>

<!-- Meta Og Content Field -->
<div class="col-sm-12">
    {!! Form::label('meta_og_content', 'Meta Og Content:') !!}
    <p>{{ $metaSeo->meta_og_content }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $metaSeo->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $metaSeo->updated_at }}</p>
</div>

