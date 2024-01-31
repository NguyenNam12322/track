<div class="table-responsive">
    <table class="table" id="properties-table">
        <thead>
        <tr>
            <th>Name</th>
        <th>Filterid</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($properties as $property)
            <tr>
                <td>{{ $property->name }}</td>
            <td>{{ $property->filterId }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['properties.destroy', $property->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('properties.show', [$property->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('properties.edit', [$property->id]) }}"
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
