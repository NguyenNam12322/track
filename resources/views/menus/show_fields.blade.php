<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $menu->id }}</p>
</div>

<!-- Menu Name Field -->
<div class="col-sm-12">
    {!! Form::label('menu_name', 'Menu Name:') !!}
    <p>{{ $menu->menu_name }}</p>
</div>

<!-- Menu Link Field -->
<div class="col-sm-12">
    {!! Form::label('menu_link', 'Menu Link:') !!}
    <p>{{ $menu->menu_link }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $menu->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $menu->updated_at }}</p>
</div>

