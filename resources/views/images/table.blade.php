<div class="table-responsive">
    <table class="table" id="images-table">
        <thead>
        <tr>
            <th>Image</th>
        <th>Link</th>
        <th>Product Id</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($images as $image)
            <tr>
                <td>{{ $image->image }}</td>
            <td>{{ $image->link }}</td>
            <td>{{ $image->product_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['images.destroy', $image->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('images.show', [$image->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('images.edit', [$image->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
