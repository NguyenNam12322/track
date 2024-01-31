@extends('layouts.app')

@section('content')

<div class="paddings">
    <script type="text/javascript" src="/includes/js/scw.js" language="javascript"></script>
    <style type="text/css">.scw           {padding:1px;vertical-align:middle;}iframe.scw     {position:absolute;z-index:1;top:0px;left:0px;visibility:hidden;width:1px;height:1px;}table.scw      {padding:0px;visibility:hidden;position:absolute;cursor:default;width:200px;top:0px;left:0px;z-index:2;text-align:center;}</style>
    <style type="text/css">/* IMPORTANT:  The SCW calendar script requires all                the classes defined here.*/table.scw      {padding:       1px;vertical-align:middle;border:        ridge 2px;font-size:     10pt;font-family:   Verdana,Arial,Helvetica,Sans-Serif;font-weight:   bold;}td.scwDrag,td.scwHead                 {padding:       0px 0px;text-align:    center;}td.scwDrag                 {font-size:     8pt;}select.scwHead             {margin:        3px 1px;text-align:    center;}input.scwHead              {height:        22px;width:         22px;vertical-align:middle;text-align:    center;margin:        2px 1px;font-weight:   bold;font-size:     10pt;font-family:   fixedSys;}td.scwWeekNumberHead,td.scwWeek                 {padding:       0px;text-align:    center;font-weight:   bold;}td.scwNow,td.scwNowHover,td.scwNow:hover,td.scwNowDisabled          {padding:       0px;text-align:    center;vertical-align:middle;font-weight:   normal;}table.scwCells             {text-align:    right;font-size:     8pt;width:         96%;}td.scwCells,td.scwCellsHover,td.scwCells:hover,td.scwCellsDisabled,td.scwCellsExMonth,td.scwCellsExMonthHover,td.scwCellsExMonth:hover,td.scwCellsExMonthDisabled,td.scwCellsWeekend,td.scwCellsWeekendHover,td.scwCellsWeekend:hover,td.scwCellsWeekendDisabled,td.scwInputDate,td.scwInputDateHover,td.scwInputDate:hover,td.scwInputDateDisabled,td.scwWeekNo,td.scwWeeks                {padding:           3px;width:             16px;height:            16px;border-width:      1px;border-style:      solid;font-weight:       bold;vertical-align:    middle;}/* Blend the colours into your page here...    *//* Calendar background */table.scw                  {background-color:  #6666CC;}/* Drag Handle */td.scwDrag                 {background-color:  #9999CC;color:             #CCCCFF;}/* Week number heading */td.scwWeekNumberHead       {color:             #6666CC;}/* Week day headings */td.scwWeek                 {color:             #CCCCCC;}/* Week numbers */td.scwWeekNo               {background-color:  #776677;color:             #CCCCCC;}/* Enabled Days *//* Week Day */td.scwCells                {background-color:  #CCCCCC;color:             #000000;}/* Day matching the input date */td.scwInputDate            {background-color:  #CC9999;color:             #FF0000;}/* Weekend Day */td.scwCellsWeekend         {background-color:  #CCCCCC;color:             #CC6666;}/* Day outside the current month */td.scwCellsExMonth         {background-color:  #CCCCCC;color:             #666666;}/* Today selector */td.scwNow                  {background-color:  #6666CC;color:             #FFFFFF;}/* Clear Button */td.scwClear                {padding:           0px;}input.scwClear             {padding:           0px;text-align:        center;font-size:         8pt;}/* MouseOver/Hover formatting        If you want to "turn off" any of the formatting        then just set to the same as the standard format       above.        Note: The reason that the following are       implemented using both a class and a :hover       pseudoclass is because Opera handles the rendering       involved in the class swap very poorly and IE6        (and below) only implements pseudoclasses on the       anchor tag.*//* Active cells */td.scwCells:hover,td.scwCellsHover           {background-color:  #FFFF00;cursor:            pointer;color:             #000000;}/* Day matching the input date */td.scwInputDate:hover,td.scwInputDateHover       {background-color:  #FFFF00;cursor:            pointer;color:             #000000;}/* Weekend cells */td.scwCellsWeekend:hover,td.scwCellsWeekendHover    {background-color:  #FFFF00;cursor:            pointer;color:             #000000;}/* Day outside the current month */td.scwCellsExMonth:hover,td.scwCellsExMonthHover    {background-color:  #FFFF00;cursor:            pointer;color:             #000000;}/* Today selector */td.scwNow:hover,td.scwNowHover             {color:             #FFFF00;cursor:            pointer;font-weight:       bold;}/* Disabled cells *//* Week Day *//* Day matching the input date */td.scwInputDateDisabled    {background-color:  #999999;color:             #000000;}td.scwCellsDisabled        {background-color:  #999999;color:             #000000;}/* Weekend Day */td.scwCellsWeekendDisabled {background-color:  #999999;color:             #CC6666;}/* Day outside the current month */td.scwCellsExMonthDisabled {background-color:  #999999;color:             #666666;}td.scwNowDisabled          {background-color:  #6666CC;color:             #FFFFFF;}</style>
    <!--[if IE]>
    <div id='scwIE'></div>
    <![endif]-->
    <!--[if lt IE 7]>
    <div id='scwIElt7'></div>
    <![endif]-->
    <iframe class="scw" id="scwIframe" name="scwIframe" frameborder="0"></iframe>
    <table id="scw" class="scw">
        <tbody>
            <tr class="scw">
                <td class="scw">
                    <table class="scwHead" id="scwHead" width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr id="scwDrag" style="display:none;">
                                <td colspan="4" class="scwDrag" onmousedown="scwBeginDrag(event);"><span id="scwDragText"></span></td>
                            </tr>
                            <tr class="scwHead">
                                <td class="scwHead"><input class="scwHead" id="scwHeadLeft" type="button" value="<" onclick="scwShowMonth(-1);"></td>
                                <td class="scwHead"><select id="scwMonths" class="scwHead" onchange="scwShowMonth(0);"></select></td>
                                <td class="scwHead"><select id="scwYears" class="scwHead" onchange="scwShowMonth(0);"></select></td>
                                <td class="scwHead"><input class="scwHead" id="scwHeadRight" type="button" value=">" onclick="scwShowMonth(1);"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr class="scw">
                <td class="scw">
                    <table class="scwCells" align="center">
                        <thead>
                            <tr>
                                <td class="scwWeekNumberHead" id="scwWeek_"></td>
                                <td class="scwWeek" id="scwWeekInit0"></td>
                                <td class="scwWeek" id="scwWeekInit1"></td>
                                <td class="scwWeek" id="scwWeekInit2"></td>
                                <td class="scwWeek" id="scwWeekInit3"></td>
                                <td class="scwWeek" id="scwWeekInit4"></td>
                                <td class="scwWeek" id="scwWeekInit5"></td>
                                <td class="scwWeek" id="scwWeekInit6"></td>
                            </tr>
                        </thead>
                        <tbody id="scwCells" onclick="scwStopPropagation(event);">
                            <tr>
                                <td class="scwWeekNo" id="scwWeek_0"></td>
                                <td class="scwCells" id="scwCell_0"></td>
                                <td class="scwCells" id="scwCell_1"></td>
                                <td class="scwCells" id="scwCell_2"></td>
                                <td class="scwCells" id="scwCell_3"></td>
                                <td class="scwCells" id="scwCell_4"></td>
                                <td class="scwCells" id="scwCell_5"></td>
                                <td class="scwCells" id="scwCell_6"></td>
                            </tr>
                            <tr>
                                <td class="scwWeekNo" id="scwWeek_1"></td>
                                <td class="scwCells" id="scwCell_7"></td>
                                <td class="scwCells" id="scwCell_8"></td>
                                <td class="scwCells" id="scwCell_9"></td>
                                <td class="scwCells" id="scwCell_10"></td>
                                <td class="scwCells" id="scwCell_11"></td>
                                <td class="scwCells" id="scwCell_12"></td>
                                <td class="scwCells" id="scwCell_13"></td>
                            </tr>
                            <tr>
                                <td class="scwWeekNo" id="scwWeek_2"></td>
                                <td class="scwCells" id="scwCell_14"></td>
                                <td class="scwCells" id="scwCell_15"></td>
                                <td class="scwCells" id="scwCell_16"></td>
                                <td class="scwCells" id="scwCell_17"></td>
                                <td class="scwCells" id="scwCell_18"></td>
                                <td class="scwCells" id="scwCell_19"></td>
                                <td class="scwCells" id="scwCell_20"></td>
                            </tr>
                            <tr>
                                <td class="scwWeekNo" id="scwWeek_3"></td>
                                <td class="scwCells" id="scwCell_21"></td>
                                <td class="scwCells" id="scwCell_22"></td>
                                <td class="scwCells" id="scwCell_23"></td>
                                <td class="scwCells" id="scwCell_24"></td>
                                <td class="scwCells" id="scwCell_25"></td>
                                <td class="scwCells" id="scwCell_26"></td>
                                <td class="scwCells" id="scwCell_27"></td>
                            </tr>
                            <tr>
                                <td class="scwWeekNo" id="scwWeek_4"></td>
                                <td class="scwCells" id="scwCell_28"></td>
                                <td class="scwCells" id="scwCell_29"></td>
                                <td class="scwCells" id="scwCell_30"></td>
                                <td class="scwCells" id="scwCell_31"></td>
                                <td class="scwCells" id="scwCell_32"></td>
                                <td class="scwCells" id="scwCell_33"></td>
                                <td class="scwCells" id="scwCell_34"></td>
                            </tr>
                            <tr>
                                <td class="scwWeekNo" id="scwWeek_5"></td>
                                <td class="scwCells" id="scwCell_35"></td>
                                <td class="scwCells" id="scwCell_36"></td>
                                <td class="scwCells" id="scwCell_37"></td>
                                <td class="scwCells" id="scwCell_38"></td>
                                <td class="scwCells" id="scwCell_39"></td>
                                <td class="scwCells" id="scwCell_40"></td>
                                <td class="scwCells" id="scwCell_41"></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr id="scwFoot">
                                <td colspan="8" style="padding:0px;">
                                    <table width="100%">
                                        <tbody>
                                            <tr>
                                                <td id="scwClear" class="scwClear"><input type="button" id="scwClearButton" class="scwClear" onclick="scwTargetEle.value = &quot;&quot;;scwHide();"></td>
                                                <td class="scwNow" id="scwNow"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
   <!--  <form method="get" action="" enctype="multipart/form-data" id="form-search">
        <input type="hidden" name="opt" value="order">
        <input type="hidden" name="view_status" id="view_status" value="0">
        <input type="hidden" name="update_by" id="update_by" value="">
        <input type="hidden" name="assign_to" id="assign_to" value="">
        <div id="table-filters" class="box2 sst">
            <div>
                Mã đơn hàng: <input type="text" name="orderCode" size="10" value="">
                hoặc
                Tìm người mua : <input type="text" name="q" size="30" value=""> (* tên, email, điện thoại)
                &nbsp;Từ ngày <input type="text" size="10" name="from_date" value="" onfocus="scwShow(this,event);" onclick="scwShow(this,event);"> đến ngày <input type="text" size="10" name="to_date" value="" onfocus="scwShow(this,event);" onclick="scwShow(this,event);">
                <input type="submit" value="Tìm kiếm">
            </div>
        </div>
    </form> -->
    <!-- <br> -->
<!--     <div style="margin-bottom:6px">Tổng số đơn hàng : <b>5.293</b> - Tổng giá trị : <b>72.172.174.600 VND</b> - 
        <a href="/print/admin.php?time=1644395228&amp;key=f0d7d03abcd8010e8f10d6d50355c43c&amp;item=orderlist&amp;view=order-list&amp;from_date=&amp;to_date=" target="_blank">In danh sách này</a>
        -
        <a href="/admin/ajax/excel_download.php?action=order-list&amp;from_date=&amp;to_date=&amp;view_status=0" target="_blank">Tải file excel danh sách dưới đây</a>
    </div> -->
    <table width="100%" id="tb_padding" border="1" bordercolor="#CCCCCC" style="border-collapse:collapse;">
        <tbody>
            <tr style="background-color:#DDD; font-weight:bold;">
                <td width="20px">STT</td>
                <td width="90px">Mã số</td>
                <td width="160px">Thời gian</td>
                <td>Tỉnh/TP</td>
                <td>Người mua</td>
                <td width="100px">Giá trị</td>
                <td width="140px">
                    Xem tình trạng                               
                </td>
               
                <td width="140px">
                    
                    Người thực hiện
                      
                </td>
                <td width="140px">Xem</td>
            </tr>
            <?php   
                $address = config('constants.address');
                $active  = config('constants.active');
            ?>

           
            @if(count($order)>0)
            <?php 
                 
                $page = isset($_GET['page'])?$_GET['page']:'';

                if($page ==1 || empty($page)){
                    $key = 0;
                }
                else{
                    $key = ((int)$page-1)*10;
                }

            ?>
            @foreach($order as $orders)
            <?php $key++; ?>

            <tr id="row_5471" onmouseover="this.className='row-hover'" onmouseout="this.className=''" class="">
                <td>{{ $key }}</td>
                <td><a href="?opt=order&amp;view=detail-new&amp;o=5471&amp;b=4370&amp;popup=1" class="pop-up cboxElement">{{ $orders->orderId  }}</a></td>
                <td>{{ @$orders->created_at->format('d-m-Y, H:i:s')  }}</td>

                <td>{{   @$address[$orders->province] }}</td>
                <td>

                    <a href="?opt=order&amp;cus_id=4370">{{ $orders->sex }}: {{ $orders->name  }}</a>
                </td>
                <td align="right"><b></b>{{  str_replace(',' ,'.', number_format($orders->total_price))  }}đ </td>
                <td style="text-align: center;">
                    {{ $active[$orders->active] }}                           
                </td>
                
                <td style="text-align: center;">
                   {{  @$users[$orders->user_active] }}
                </td>
                <td>
                    <a href="{{ route('order_list_view', $orders->id) }}">xem chi tiết</a>
                    
                   <!--  <a href="javascript:;" onclick="delete_order('5471')">Xóa</a> -->
                </td>
            </tr>
            @endforeach
            {!! $order->links() !!}
            @endif
            
        </tbody>
    </table>
    <br>
    
    <script>
        function setHiddenValue(id, value) {
            $("#"+id).val(value);
        }
        function runFilter() {
            $("#form-search").submit();
        }
        $(function(){
            $('.pop-up').colorbox({ iframe: true, fixed : true, width:'80%', height:'90%' });
        });
    </script>
</div>

@endsection