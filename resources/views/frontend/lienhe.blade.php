@extends('frontend.layouts.apps')

@section('content') 

<div class="" style="width: 70%; margin: 0 auto;">
    <div class="col-md-12">
        <form  method="post" id="form_lien_he" action="{{ route('send-lh') }}">
            @csrf
            <table style="font-weight:bold" width="100%" border="0" cellpadding="4">
                <tbody>
                    <tr>
                        <td scope="col" width="17%">Họ tên (*)</td>
                        <td scope="col"><input class="input_form_lienhe" id="name" type="text" required name="name"></td>
                    </tr>
                   
                    <tr>
                        <td>Địa chỉ</td>
                        <td><textarea id="address" class="input_form_lienhe" cols="" rows="" required name="address"></textarea></td>
                    </tr>
                    <tr>
                        <td>Điện thoại (*)</td>
                        <td><input class="input_form_lienhe" id="tel" type="text" required name="phone_number"></td>
                    </tr>
                    <tr>
                        <td>Email (*)</td>
                        <td><input class="input_form_lienhe" id="email" type="email" required name="mail"></td>
                    </tr>
                    <tr>
                        <td>Lời nhắn (*)</td>
                        <td>
                            <textarea style="height:100px" class="input_form_lienhe" id="request" cols="" rows="" required="" name="content"></textarea>
                            <div style="height:20px;"></div>
                            <button class="nut1" type="submit" name="step1button" id="button">Gửi liên hệ</button> <button class="nut2" type="reset">   Soạn lại</button>    
                        </td>
                    </tr>
                   
                </tbody>
            </table>
        </form>
    </div>


</div>



@endsection