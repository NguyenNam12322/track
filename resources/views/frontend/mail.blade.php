<div marginwidth="0" marginheight="0" style="padding:0">
    <div id="m_-6466602755413826958m_2352472156645643125wrapper" dir="ltr" style="background-color:#f7f7f7;margin:0;padding:70px 0;width:100%">
        <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
            <tbody>
                <tr>
                    <td align="center" valign="top">
                        <div id="m_-6466602755413826958m_2352472156645643125template_header_image">
                        </div>
                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="m_-6466602755413826958m_2352472156645643125template_container" style="background-color:#ffffff;border:1px solid #dedede;border-radius:3px">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" id="m_-6466602755413826958m_2352472156645643125template_header" style="background-color:#96588a;color:#ffffff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;border-radius:3px 3px 0 0">
                                            <tbody>
                                                <tr>
                                                    <td id="m_-6466602755413826958m_2352472156645643125header_wrapper" style="padding:36px 48px;display:block">
                                                        <h1 style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align:left;color:#ffffff;background-color:inherit">Đơn hàng mới: {{ @$orderId }}</h1>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top">
                                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="m_-6466602755413826958m_2352472156645643125template_body">
                                            <tbody>
                                                <tr>
                                                    <td valign="top" id="m_-6466602755413826958m_2352472156645643125body_content" style="background-color:#ffffff">
                                                        <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td valign="top" style="padding:48px 48px 32px">
                                                                        <div id="m_-6466602755413826958m_2352472156645643125body_content_inner" style="color:#636363;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left">
                                                                            <p style="margin:0 0 16px">Bạn vừa order được đơn hàng từ dienmaynguoiviet.vn. Đơn hàng như sau:</p>
                                                                            <h2 style="color:#96588a;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">
                                                                                <a href="https://thegioimaygiat.vn/wp-admin/post.php?post=6240&amp;action=edit" style="font-weight:normal;text-decoration:underline;color:#96588a" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://thegioimaygiat.vn/wp-admin/post.php?post%3D6240%26action%3Dedit&amp;source=gmail&amp;ust=1645154028402000&amp;usg=AOvVaw2hEf1ZG2hjiCCjVfpR_etV">[Đơn hàng {{ @$orderId }}]</a> ({{ date("d/m/Y") }})
                                                                            </h2>
                                                                            <div style="margin-bottom:40px">
                                                                                <table cellspacing="0" cellpadding="6" border="1" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;width:100%;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Sản phẩm</th>
                                                                                            <th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Số lượng</th>
                                                                                            <th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Giá</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            @if(isset($product))
                                                                                            @foreach($product as $value)
                                                                                            <td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;word-wrap:break-word">
                                                                                               {{ @$value['name'] }}  
                                                                                            </td>
                                                                                            <td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif">
                                                                                                {{ @$value['qty'] }}     
                                                                                            </td>
                                                                                            <td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif">
                                                                                                <span>{{  @str_replace(',' ,'.', number_format($value['price']))  }}<span>₫</span></span>        
                                                                                            </td>
                                                                                            @endforeach
                                                                                            @endif
                                                                                            
                                                                                        </tr>
                                                                                    </tbody>
                                                                                    <tfoot>
                                                                                        <tr>
                                                                                            <th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px">Tổng số phụ:</th>
                                                                                            <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px"></span></span></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Phương thức thanh toán:</th>
                                                                                            <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Trả tiền mặt khi nhận hàng</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Tổng cộng:</th>
                                                                                            <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"><span>{{  @str_replace(',' ,'.', number_format($total_price[0]))  }}<span>₫</span></span></td>
                                                                                        </tr>
                                                                                    </tfoot>
                                                                                </table>
                                                                            </div>
                                                                            <table id="m_-6466602755413826958m_2352472156645643125addresses" cellspacing="0" cellpadding="0" border="0" style="width:100%;vertical-align:top;margin-bottom:40px;padding:0">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td valign="top" width="50%" style="text-align:left;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;border:0;padding:0">
                                                                                            <h2 style="color:#96588a;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">Địa chỉ thanh toán</h2>
                                                                                            <address style="padding:12px;color:#636363;border:1px solid #e5e5e5">

                                                                                                {{ @$address  }}
                                                                                                <br>
                                                                                                Số điện thoại: <a href="tel:{{ $phone_number }}" style="color:#96588a;font-weight:normal;text-decoration:underline" target="_blank">{{ @$phone_number }}</a>                                                  <br>
                                                                                                Email:
                                                                                                <a href="{{ @$email }}" target="_blank">{{ @$email }}</a>                            
                                                                                            </address>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="top">
                        <table border="0" cellpadding="10" cellspacing="0" width="600" id="m_-6466602755413826958m_2352472156645643125template_footer">
                            <tbody>
                                <tr>
                                    <td valign="top" style="padding:0;border-radius:6px">
                                        <table border="0" cellpadding="10" cellspacing="0" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2" valign="middle" id="m_-6466602755413826958m_2352472156645643125credit" style="border-radius:6px;border:0;color:#8a8a8a;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:12px;line-height:150%;text-align:center;padding:24px 0">
                                                        <p style="margin:0 0 16px">Thế giới máy giặt — Built with <a href="https://woocommerce.com" style="color:#96588a;font-weight:normal;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://woocommerce.com&amp;source=gmail&amp;ust=1645154028402000&amp;usg=AOvVaw0aNSa4lBwSVF8--jyUpnfz">WooCommerce</a></p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="yj6qo"></div>
        <div class="adL">
        </div>
    </div>
    <div class="adL">
    </div>
</div>