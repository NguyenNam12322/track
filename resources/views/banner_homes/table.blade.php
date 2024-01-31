<div class="table-responsive">
    <table class="table" id="bannerHomes-table">
        <thead>
        <tr>
            <th>Banner</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bannerHomes as $bannerHome)
            <tr>
                <td>{{ $bannerHome->banner }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['bannerHomes.destroy', $bannerHome->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('bannerHomes.show', [$bannerHome->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('bannerHomes.edit', [$bannerHome->id]) }}"
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
