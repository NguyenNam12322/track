<div class="table-responsive">
    <table class="table" id="gifts-table">
        <thead>
        <tr>
            <th>Name</th>
        <th>Image</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($gifts as $gift)
            <tr>
                <td>{{ $gift->name }}</td>
            <td><img src="{{ env('APP_URL') }}/{{ $gift->image }}" width="150px" height="150px"></td>
                <td width="120">
                    {!! Form::open(['route' => ['gifts.destroy', $gift->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('gifts.show', [$gift->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('gifts.edit', [$gift->id]) }}"
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
