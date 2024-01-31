<div class="table-responsive">
    <table class="table" id="filters-table">
        <thead>
        <tr>
            <th>Name</th>
        <th>Code</th>
        <th>Group Product Id</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($filters as $filter)
            <tr>
                <td>{{ $filter->name }}</td>
            <td>{{ $filter->code }}</td>
            <td>{{ $filter->group_product_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['filters.destroy', $filter->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('filters.show', [$filter->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('filters.edit', [$filter->id]) }}"
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
