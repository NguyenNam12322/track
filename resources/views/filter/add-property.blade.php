
@extends('layouts.app')

@section('content')

<div class="paddings">
    <h2 id="title">Cập nhật thuộc tính Sản phẩm</h2>
    <form method="post" action="" name="formproduct" enctype="multipart/form-data">
        <div id="action-links">
            <ul>
                <li id="new-std-lbl"><a href="/admin/?opt=product&amp;view=attribute-add">Thêm thuộc tính mới</a></li>
                
            </ul>
        </div>
        <input type="hidden" name="info[id]" value="68">
        <input type="hidden" name="action" value="update">
        <div class="group">
            <div class="group-fields">
                <dl>
                    <dt class="top"><label>Tên thuộc tính</label></dt>
                    <dd><input type="text" size="60" name="info[name]" id="name" value="HÃNG SẢN XUẤT"></dd>
                    <dt><label>Mã nhận dạng cho quản trị</label></dt>
                    <dd><input type="text" size="40" name="info[attribute_code]" id="attr_code" onchange="check_attr_code('68', this.value)" value="maygiat_01"> <span id="check_code"></span>v.d. kich_thuoc_quan (không có dấu cách, không viết dấu của tiếng Việt)</dd>
                    <dt><label>Mô tả tóm tắt</label> <span class="note" style="font-weight:normal">(nếu muốn hiển thị và giải thích ý nghĩa cho khách hàng)</span></dt>
                    <dd style="margin-bottom: 0">
                        <textarea name="info[comment]" class="rich-textarea" style="padding: 5px 1%; width: 98%"></textarea>
                    </dd>
                    <dt><label>Lựa chọn áp dụng</label></dt>
                    <dd>
                      
                        <label><input type="checkbox" value="1" name="info[isSearch]" checked="checked"> Dùng lọc Sản phẩm ở danh mục</label><br>
                        <label><input type="checkbox" value="1" name="info[in_summary]"> Hiển thị ở thông tin tóm tắt Sản phẩm</label><br>
                        <label><input type="checkbox" value="1" name="info[isDisplay]" checked="checked"> Hiển thị ở bảng thông số kỹ thuật</label><br>
             
                    </dd>
                    <dt><label>Phân loại</label></dt>
                    <dd>
                        <label><input type="radio" value="0" name="info[scope]" checked="checked">Local - Chỉ áp dụng cho một số loại Sản phẩm</label> <br>
                       <!--  <label><input type="radio" value="1" name="info[scope]">Global - Áp dụng cho tất cả Sản phẩm (v.d: Xuất xứ, Màu sắc, Bảo hành)</label><br> -->
                    </dd>
                    <dt><label>Thứ tự xuất hiện</label></dt>
                    <dd><input type="text" size="10" name="info[ordering]" id="ordering" value="100"> (cao xếp trước)</dd>
                    <dt><label>Quản lý các giá trị</label></dt>
                    <dd>
                        <a name="attr_value"></a>
                        <div id="list_attr_value">
                            <table border="1" bordercolor="#CCCCCC" id="tb_padding" style="background-color:#FFF">
                                <tbody>
                                    <tr bgcolor="#EEEEEE">
                                        <td>STT</td>
                                        <td>ID</td>
                                        <td width="200px">Giá trị</td>
                                        <td width="200px">Mô tả</td>
                                        <!--<td width='200px'>Key</td>-->
                                        <!--<td width='200px'>Giá trị dùng sắp xếp</td>-->
                                        <td>Thứ tự hiển thị</td>
                                        <td>Lựa chọn</td>
                                    </tr>
                                    <tr id="row_393">
                                        <td>1</td>
                                        <td>393</td>
                                        <td><span id="value_393">Máy giặt LG</span></td>
                                        <td><span id="description_393"></span>
                                            <input type="hidden" id="description_full_393" value="">
                                        </td>
                                        <!--<td><span id='api_key_393'>0</span></td>-->
                                        <!--<td><span id='value_sort_393'>0</span></td>-->
                                        <td><span id="order_393">10</span></td>
                                        <td><span id="button_393"><a href="javascript:show_update_attr_value(393, 68)">Sửa</a> | <a href="javascript:remove_attr_value(393, 68)">Xóa</a></span></td>
                                    </tr>
                                    <tr id="row_396">
                                        <td>2</td>
                                        <td>396</td>
                                        <td><span id="value_396">Máy giặt Electrolux</span></td>
                                        <td><span id="description_396"></span>
                                            <input type="hidden" id="description_full_396" value="">
                                        </td>
                                        <!--<td><span id='api_key_396'>0</span></td>-->
                                        <!--<td><span id='value_sort_396'>0</span></td>-->
                                        <td><span id="order_396">9</span></td>
                                        <td><span id="button_396"><a href="javascript:show_update_attr_value(396, 68)">Sửa</a> | <a href="javascript:remove_attr_value(396, 68)">Xóa</a></span></td>
                                    </tr>
                                    <tr id="row_398">
                                        <td>3</td>
                                        <td>398</td>
                                        <td><span id="value_398">Máy giặt Samsung</span></td>
                                        <td><span id="description_398"></span>
                                            <input type="hidden" id="description_full_398" value="">
                                        </td>
                                        <!--<td><span id='api_key_398'>0</span></td>-->
                                        <!--<td><span id='value_sort_398'>0</span></td>-->
                                        <td><span id="order_398">8</span></td>
                                        <td><span id="button_398"><a href="javascript:show_update_attr_value(398, 68)">Sửa</a> | <a href="javascript:remove_attr_value(398, 68)">Xóa</a></span></td>
                                    </tr>
                                    <tr id="row_394">
                                        <td>4</td>
                                        <td>394</td>
                                        <td><span id="value_394">Máy giặt Toshiba</span></td>
                                        <td><span id="description_394"></span>
                                            <input type="hidden" id="description_full_394" value="">
                                        </td>
                                        <!--<td><span id='api_key_394'>0</span></td>-->
                                        <!--<td><span id='value_sort_394'>0</span></td>-->
                                        <td><span id="order_394">7</span></td>
                                        <td><span id="button_394"><a href="javascript:show_update_attr_value(394, 68)">Sửa</a> | <a href="javascript:remove_attr_value(394, 68)">Xóa</a></span></td>
                                    </tr>
                                    <tr id="row_395">
                                        <td>5</td>
                                        <td>395</td>
                                        <td><span id="value_395">Máy giặt Panasonic</span></td>
                                        <td><span id="description_395"></span>
                                            <input type="hidden" id="description_full_395" value="">
                                        </td>
                                        <!--<td><span id='api_key_395'>0</span></td>-->
                                        <!--<td><span id='value_sort_395'>0</span></td>-->
                                        <td><span id="order_395">6</span></td>
                                        <td><span id="button_395"><a href="javascript:show_update_attr_value(395, 68)">Sửa</a> | <a href="javascript:remove_attr_value(395, 68)">Xóa</a></span></td>
                                    </tr>
                                    <tr id="row_681">
                                        <td>6</td>
                                        <td>681</td>
                                        <td><span id="value_681">Máy giặt Sharp</span></td>
                                        <td><span id="description_681"></span>
                                            <input type="hidden" id="description_full_681" value="">
                                        </td>
                                        <!--<td><span id='api_key_681'>may-giat-sharp</span></td>-->
                                        <!--<td><span id='value_sort_681'>0</span></td>-->
                                        <td><span id="order_681">5</span></td>
                                        <td><span id="button_681"><a href="javascript:show_update_attr_value(681, 68)">Sửa</a> | <a href="javascript:remove_attr_value(681, 68)">Xóa</a></span></td>
                                    </tr>
                                    <tr id="row_397">
                                        <td>7</td>
                                        <td>397</td>
                                        <td><span id="value_397">Máy giặt Aqua</span></td>
                                        <td><span id="description_397"></span>
                                            <input type="hidden" id="description_full_397" value="">
                                        </td>
                                        <!--<td><span id='api_key_397'>may-giat-aqua</span></td>-->
                                        <!--<td><span id='value_sort_397'>0</span></td>-->
                                        <td><span id="order_397">4</span></td>
                                        <td><span id="button_397"><a href="javascript:show_update_attr_value(397, 68)">Sửa</a> | <a href="javascript:remove_attr_value(397, 68)">Xóa</a></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <div><b style="color:red">Thêm giá trị mới</b>: Tên (*) <input type="text" size="30" id="add_attr_value"> Giá trị sắp xếp (**) <input type="text" value="0" size="20" id="add_attr_value_sort">  STT <input type="text" size="5" id="add_attr_value_order" value="0"> <input type="button" value="Thêm mới" onclick="add_new_attr_value('68', '0')"> <span id="wait_icon"></span></div>
                        <div>(**) Dùng để sắp xếp Sản phẩm theo thuộc tính khi cần (v.d. theo dung lượng ổ cứng laptop giảm dần)</div>
                    </dd>
                </dl>
            </div>
            <!-- .group-fields -->
            <div class="group-actions">
                <input type="hidden" name="l" value="vn">
                <input class="btn" id="submit-collection-btn" name="commit" type="submit" value="Cập nhật">
            </div>
            <!-- .group-actions -->
        </div>
    </form>
    <script>
        function fetch_attr_value(attr_id, store_id){
            show_wait_icon("list_attr_value");
        
            $.post("/admin/ajax/update_attribute.php"
                , {
                    action : "fetch-attr-value"
                    , attr_id : attr_id
                    , store_id : store_id
                }
                , function(data) {
                    $("#list_attr_value").html(data);
                }
            );
        }
        
        function add_new_attr_value(attr_id, store_id){
            show_wait_icon("wait_icon");
            var test_value = $("#add_attr_value").val();
            var value_en = ($("#add_attr_value_en").length > 0) ? $("#add_attr_value_en").val() : '';
            if(test_value.length > 0){
                $.post("/admin/ajax/update_attribute.php"
                    , {
                        action : "add-attr-value"
                        , attr_id : attr_id
                        , store_id : store_id
                        , value : test_value
                        , value_en : value_en
                        , value_sort : $("#add_attr_value_sort").val()
                        , order : $("#add_attr_value_order").val()
                    }
                    , function(data) {
                        console.log(data);
                        //var current_value = $("#list_attr_value").html();
                        //$("#list_attr_value").append(data);
                        hide_wait_icon("wait_icon");
                        fetch_attr_value(attr_id, store_id);
                    }
                );
            }else{
                hide_wait_icon("wait_icon");
                alert("Vui lòng nhập giá trị");
            }
        }
        
        
        function check_attr_code(attr_id, code){
            $.post("/admin/ajax/manage_product.php", {
                action	: 'check-attribute-code',
                attr_id : attr_id,
                code	: code
            }, function(data) { $('#check_code').html(data); } );
        }
        
        function addValue(attId){
            var va = document.getElementById('attributeValueName_'+ attId).value;
            if(va.length > 1){
                document.getElementById('attAddValue').value = attId;
                document.getElementById('update').value = 'no';
                document.formproduct.submit();
            }else{
                alert('Giá trị quá ngắn');
            }
            //alert(document.getElementById('attributeInput').value);
        }
        function deleteThis(attId,valueId){
            document.getElementById('changeAtt_'+ attId +'_'+valueId).style.background = '#FF3300';
            if(confirm('Chắc chắn xóa ?')){
                document.getElementById('deleteAttValue').value = attId +'_'+valueId;
                document.getElementById('update').value = 'no';
                document.formproduct.submit();
            }else{
                document.getElementById('changeAtt_'+ attId +'_'+valueId).style.background = '#FFFFFF';
            }
        }
        
        function changeAtt(attributeId,valueId,valueName,ordering){
            open_box(attributeId);
            document.getElementById('add_box_' + attributeId).innerHTML =  '<b>Giá trị</b>:<input type=text name=cAtt_'+valueId + ' id=cAtt_'+valueId + ' value="'+ valueName + '" size=20> Order:<input type=text name=ordering_'+valueId + ' id=ordering_'+valueId + ' value="'+ ordering + '" size=3><br><input type=button value=change onclick="changeAttValue(' + valueId +')">';
        }
        
        function changeAttValue(valueId){
            document.getElementById('attValueChange').value = valueId;
            document.getElementById('attValueChangeValue').value = document.getElementById('cAtt_' + valueId ).value
            document.getElementById('update').value = 'no'; //dont need to update the whole product
            document.formproduct.submit();
        }
        
        $(function () {
            fetch_attr_value('68', '0');
        })
    </script>
</div>
@endsection