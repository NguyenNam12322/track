<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $bannerHome->id }}</p>
</div>

<!-- Banner Field -->
<div class="col-sm-12">
    {!! Form::label('banner', 'Banner:') !!}
    <p>{{ $bannerHome->banner }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $bannerHome->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $bannerHome->updated_at }}</p>
</div>

