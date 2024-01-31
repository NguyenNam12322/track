<div class="table-responsive">
    <table class="table" id="makers-table">
        <thead>
        <tr>
            <th>Maker</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($makers as $maker)
            <tr>
                <td>{{ $maker->maker }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['makers.destroy', $maker->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('makers.show', [$maker->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('makers.edit', [$maker->id]) }}"
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
