<?php use App\Bill; ?>
@extends('layouts.master')
@section('content')

<div class="center">
    <div class="divtop">
        <span class="titlepage center mr-2 thaifont"><i class="fas fa-hand-holding-usd icontop"></i>&nbsp;รายงานสถานะการแจ้งชำระเงิน</span><br>
    </div>
</div>

@if($markets->first() == null) 
<div class="divcenter center thaifont divnodata">
    <i class="fas fa-exclamation-circle"></i><br>
    ยังไม่มีการเปิดการจอง
</div>
@else
<br>
<select class="custom-select inputdate floatright" style="margin-right:100px" onchange="location = this.value;">
  <option>เลือกวันที่</option>
  @foreach ($markets as $market)
    <option value="{{route('bills.indexreporteachmarket',['id'=>$market->id])}}">{{$market->datesale}}</option>
                                     
  @endforeach   
                 
</select>

@foreach ($markets as $market)
<div class="report thaifont shadowfont pinkdark divcenter">
<span style="margin-left:5%;">วันที่เปิดขาย:&nbsp;{{$market->datesale}}</span><br>
<table class="table table-active fonttable" style="text-shadow:none">
  <thead>
    <tr>
      <th scope="col" width="8%">ลำดับที่</th>
      <th scope="col" width="17%">ชื่อผู้จอง</th>
      <th scope="col" width="10%">จำนวนเงิน</th>
      <th scope="col" width="14%">วันที่แจ้งชำระเงิน</th>
      <th scope="col" width="18%">ธนาคาร</th>
      <th scope="col" width="13%">เลขบัญชี</th>
      <th scope="col" width="30%">สถานะ</th>
    </tr>
  </thead>

  <?php $i = 1;$have = false; ?>
  @foreach ($books as $book)
    <tbody>
        <tr>
            @if($book->market_id == $market->id)
                <?php $have = true;?>
                <th scope="row">{{$i}}</th>
                <td>{{$book->user->firstname}}&nbsp;&nbsp;{{$book->user->lastname}}</td>
                <td>{{$book->pay}}&nbsp;บาท</td>

                <?php $bill = Bill::where('book_id',$book->id)->get()->first();?>
                @if($bill == null)
                <td>-</td>
                <td>-</td>
                <td>-</td>
                @else
                <td>{{$bill->datebill}}</td>
                <td>{{$bill->bank}}</td>
                <td>{{$bill->bankaccount}}</td>
                @endif


                @if($book->status == 0)
                <td class="red shadowfont">ยังไม่แจ้งการชำระเงิน</td>
                @elseif($book->status == 1)
                <td class="blue shadowfont">แจ้งการชำระเงินแล้ว</td>
                @else
                <td class="green shadowfont">ยืนยันการชำระเงินแล้ว</td>
                @endif

            @endif
        </tr>
  
      


           <?php $i++;?>
  @endforeach

@if($have == false)
  <td>-</td>
  <td>-</td>
  <td>-</td> 
  <td>-</td>
  <td>-</td>
  <td>-</td>
  <td>-</td>
@endif

</tbody>
</table>
</div>
@endforeach

@endif
@endsection