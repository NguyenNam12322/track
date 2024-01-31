@extends('layouts.app')
@section('content')

<style type="text/css">
    
    body {
      font-family: Arial, sans-serif;
      font-size: 14px;
      line-height: 20px;
      color: #333333;
    }

    table, th, td {
      border: solid 1px #000;
      padding: 10px;
    }

    table {
        border-collapse:collapse;
        caption-side:bottom;
    }

    caption {
      font-size: 16px;
      font-weight: bold;
      padding-top: 5px;
    }
</style>

<table>
    
    <thead>
      <tr>
        <th>Tên </th>
        <th>Email</th>
        <th>Số Điện thoại</th>
        <th>Lời nhắn</th>
        <th>Địa chỉ</th>
      </tr>
  </thead>
  <tbody>
      <?php 

        $data = DB::table('order')->OrderBy('id', 'desc')->paginate(10);
    ?>
    @if(isset($data))
    @foreach($data as $val)
      <tr>
        <td>{{ $val->name }}</td>
        <td>{{ $val->mail }}</td>
        <td>{{ $val->phone_number }}</td>
        <td>{{ $val->content }}</td>
        <td>{{ $val->address }}</td>
       
      </tr>
    @endforeach 
    @endif 
    
  </tbody>

</table>

@endsection

