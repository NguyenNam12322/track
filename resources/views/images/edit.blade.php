@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Image</h1>
                </div>
            </div>
        </div>
    </section>

    <?php  
        $start = stripos($_SERVER['REQUEST_URI'],'?');
        
        $result = substr($_SERVER['REQUEST_URI'], $start);

        $product_id = str_replace('?', '', $result);

    ?>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($image, ['route' => ['images.update', $image->id], 'method' => 'patch', 'files' => true]) !!}

            <div class="card-body">
                <div class="row">
                    @include('images.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('images.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
