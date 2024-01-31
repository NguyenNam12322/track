@extends('layouts.app')

@section('content')

<style type="text/css">
        
    body{margin-top:20px;}


    /* USER LIST TABLE */
    .user-list tbody td > img {
        position: relative;
        max-width: 50px;
        float: left;
        margin-right: 15px;
    }
    .user-list tbody td .user-link {
        display: block;
        font-size: 1.25em;
        padding-top: 3px;
        margin-left: 60px;
    }
    .user-list tbody td .user-subhead {
        font-size: 0.875em;
        font-style: italic;
    }

    /* TABLES */
    .table {
        border-collapse: separate;
    }
    .table-hover > tbody > tr:hover > td,
    .table-hover > tbody > tr:hover > th {
        background-color: #eee;
    }
    .table thead > tr > th {
        border-bottom: 1px solid #C2C2C2;
        padding-bottom: 0;
    }
    .table tbody > tr > td {
        font-size: 0.875em;
        background: #f5f5f5;
        /*border-top: 10px solid #fff;*/
        vertical-align: middle;
        padding: 12px 8px;
        border: 1px solid #ddd;
    }
    .table tbody > tr > td:first-child,
    .table thead > tr > th:first-child {
        padding-left: 20px;
    }
    .table thead > tr > th span {
        border-bottom: 2px solid #C2C2C2;
        display: inline-block;
        padding: 0 5px;
        padding-bottom: 5px;
        font-weight: normal;
    }
    .table thead > tr > th > a span {
        color: #344644;
    }
    .table thead > tr > th > a span:after {
        content: "\f0dc";
        font-family: FontAwesome;
        font-style: normal;
        font-weight: normal;
        text-decoration: inherit;
        margin-left: 5px;
        font-size: 0.75em;
    }
    .table thead > tr > th > a.asc span:after {
        content: "\f0dd";
    }
    .table thead > tr > th > a.desc span:after {
        content: "\f0de";
    }
    .table thead > tr > th > a:hover span {
        text-decoration: none;
        color: #2bb6a3;
        border-color: #2bb6a3;
    }
    .table.table-hover tbody > tr > td {
        -webkit-transition: background-color 0.15s ease-in-out 0s;
        transition: background-color 0.15s ease-in-out 0s;
    }
    .table tbody tr td .call-type {
        display: block;
        font-size: 0.75em;
        text-align: center;
    }
    .table tbody tr td .first-line {
        line-height: 1.5;
        font-weight: 400;
        font-size: 1.125em;
    }
    .table tbody tr td .first-line span {
        font-size: 0.875em;
        color: #969696;
        font-weight: 300;
    }
    .table tbody tr td .second-line {
        font-size: 0.875em;
        line-height: 1.2;
    }
    .table a.table-link {
        margin: 0 5px;
        font-size: 1.125em;
    }
    .table a.table-link:hover {
        text-decoration: none;
        color: #2aa493;
    }
    .table a.table-link.danger {
        color: #fe635f;
    }
    .table a.table-link.danger:hover {
        color: #dd504c;
    }

    .table-products tbody > tr > td {
        background: none;
        border: none;
        border-bottom: 1px solid #ebebeb;
        -webkit-transition: background-color 0.15s ease-in-out 0s;
        transition: background-color 0.15s ease-in-out 0s;
        position: relative;
    }
    .table-products tbody > tr:hover > td {
        text-decoration: none;
        background-color: #f6f6f6;
    }
    .table-products .name {
        display: block;
        font-weight: 600;
        padding-bottom: 7px;
    }
    .table-products .price {
        display: block;
        text-decoration: none;
        width: 50%;
        float: left;
        font-size: 0.875em;
    }
    .table-products .price > i {
        color: #8dc859;
    }
    .table-products .warranty {
        display: block;
        text-decoration: none;
        width: 50%;
        float: left;
        font-size: 0.875em;
    }
    .table-products .warranty > i {
        color: #f1c40f;
    }
    .table tbody > tr.table-line-fb > td {
        background-color: #9daccb;
        color: #262525;
    }
    .table tbody > tr.table-line-twitter > td {
        background-color: #9fccff;
        color: #262525;
    }
    .table tbody > tr.table-line-plus > td {
        background-color: #eea59c;
        color: #262525;
    }
    .table-stats .status-social-icon {
        font-size: 1.9em;
        vertical-align: bottom;
    }
    .table-stats .table-line-fb .status-social-icon {
        color: #556484;
    }
    .table-stats .table-line-twitter .status-social-icon {
        color: #5885b8;
    }
    .table-stats .table-line-plus .status-social-icon {
        color: #a75d54;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">

                <select id="solving">
                                <option value="0" {{ ($order_accept == 0)?'selected':'' }}>chưa xử lý</option>
                                <option value="1" {{ ($order_accept == 1)?'selected':'' }}>xác nhận</option>
                                <option value="2" {{ ($order_accept == 2)?'selected':'' }}>bỏ qua</option>
                              
                            </select>

                            <?php
                                $active  = config('constants.active');
                            ?>

                            {{ !empty($user)?'bởi':''}} {{ @$user }}
                <div class="table-responsive">
                    <table class="table user-list">
                        <thead>
                            <tr>
                                <th><span>Tên khách hàng</span></th>
                                <th><span>Email</span></th>
                                <th><span>số điện thoại</span></th>
                                <th class="text-center"><span>Địa chỉ</span></th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                   {{ $order->name }}
                                </td>
                                <td>
                                    {{ @$order->mail }}
                                </td>
                                <td class="text-center">
                                    {{ @$order->phone_number  }}
                                </td>
                                <td>
                                    {{ @$order->address  }}
                                </td>
                            </tr>
                        </tbody>
                    </table>



                    <table class="table user-list">
                        <thead>
                            <tr>
                                <th><span>Sản phẩm</span></th>
                                <th><span>Số lượng</span></th>
                                <th><span>Giá</span></th>
                                <th class="text-center"><span>model</span></th>
                                
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>

                        	@if(count($data_product)>0)
                        	@foreach($data_product as $data)
                            <tr>
                                <td>
                                    <img src="{{ asset(@$data->image) }}" alt="">
                                    <span class="user-link"><a href="/{{ $data->link }}">{{ @$data->name }}</a>  </span>
                                    <!-- <span class="user-subhead">Admin</span> -->
                                </td>
                                <td>
                                    {{ @$data->qty }}
                                </td>
                                <td class="text-center">
                                    <span class="label label-default">{{  str_replace(',' ,'.', number_format($data->price))  }}đ</span>
                                </td>
                                <td>
                                	{{ @$data->model }}
                                </td>
                            </tr>
                            @endforeach
                            @endif

                            
                           
                            
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

	$('#solving').on('change', function() {

		value = this.value;

		id    = {{ $id }}
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: "{{ route('add-active-confirm') }}",
            data: {
                value: value,
                id:id,
                   
            },
            success: function(result){
              
                
                window.location.href = window.location.href;
            }
        });
    })           
           
	
</script>


@endsection