@extends('layouts.app')

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

@section('content')

    <?php 
     $user = DB::table('users')->select('name', 'permision')->get(); 
     $permision = ['chưa cấp quyền','admin', 'sale', 'content'];

    ?>

    
    <h2>Danh sách người dùng</h2>

    <ul></ul>
   <table>
        <tbody><tr>
            <th>Danh sách</th>
            <th>Quyền hạn </th>
            <th>Xóa</th>
        </tr>

        @foreach($user as $users)
        
        <tr>
            <td>{{ $users->name }}</td>
            
            <td><a href="http://localhost/pj2/admins/filters/1/edit">{{ $permision[@$users->permision] }}</a></td>
            <td>
                <a href="">Xóa</a>
            </td>
        </tr>
        @endforeach
       
                       
    </tbody></table>
@endsection