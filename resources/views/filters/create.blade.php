@extends('layouts.app')

@section('content')
    <?php  

        $groupProduct = $_GET['groupid'];
       

    ?>

    <style type="text/css">
        
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }

        tr:nth-child(even) {
          background-color: #dddddd;
        }
    </style>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Tạo thuộc tính</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'filters.store']) !!}

            <input type="hidden" name="group_product_id" value="{{ $_GET['groupid']  }}">

           

            <div class="card-body">

                <div class="row">
                    @include('filters.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('groupProducts.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

    <h2>Danh sách thuộc tính của nhóm</h2>

    <table>
        <tr>
            <th>Danh sách</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <?php  

            $list = App\Models\filter::where('group_product_id', $groupProduct)->get();
        ?>

        @if(isset($list))
        @foreach($list as $value)
        <tr>
            <td>{{ $value->name }}</td>
            
            <td><a href="{{ route('filters.edit', [$value->id]) }}">Sửa</a></td>
            <td>
                {!! Form::open(['route' => ['filters.destroy', $value->id], 'method' => 'delete']) !!}
                       
                    {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
        @endif
       
    </table>

    <h2>Danh sách thuộc tính con của nhóm</h2>
    <a href="{{ route('filter-property') }}?group-product={{ $groupProduct }}&productId=0">xem thuộc tính</a>
@endsection