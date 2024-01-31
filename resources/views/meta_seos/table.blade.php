<div class="table-responsive">
    <table class="table" id="metaSeos-table">
        <thead>
        <tr>
            <th>Meta Title</th>
        <th>Meta Content</th>
        <th>Meta Og Title</th>
        <th>Meta Og Content</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($metaSeos as $metaSeo)
            <tr>
                <td>{{ $metaSeo->meta_title }}</td>
            <td>{{ $metaSeo->meta_content }}</td>
            <td>{{ $metaSeo->meta_og_title }}</td>
            <td>{{ $metaSeo->meta_og_content }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['metaSeos.destroy', $metaSeo->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('metaSeos.show', [$metaSeo->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('metaSeos.edit', [$metaSeo->id]) }}"
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
