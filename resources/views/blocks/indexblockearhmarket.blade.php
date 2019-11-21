<?php use App\Zone; ?>
@extends('layouts.master')
@section('content')
<div class="center">
    <div class="divtop">
        <span class="titlepage center mr-2 thaifont"><i class="fas fa-map-marker-alt icontop"></i>&nbsp;รายงานตำแหน่งแผงร้านค้า</span><br>
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
  @foreach ($markets as $market)
    @if($market->id == $markett->id)
        <option selected value="{{route('blocks.indexblockeachmarket',['id'=>$market->id])}}">{{$market->datesale}}</option>       
    @else
        <option value="{{route('blocks.indexblockeachmarket',['id'=>$market->id])}}">{{$market->datesale}}</option>       
    @endif                         
  @endforeach   
                 
</select>
<div class="report thaifont shadowfont pinkdark divcenter" style="width:70%">
<span style="margin-left:5%;">วันที่เปิดขาย:&nbsp;{{$markett->datesale}}</span><br>
<table class="table table-active fonttable" style="text-shadow:none">
  <thead>
    <tr>
    <th scope="col" width="15%">ลำดับที่</th>
      <th scope="col" width="25%">ชื่อ</th>
      <th scope="col" width="23%">ประเภทการขาย</th>
      <th scope="col" width="17%">โซน</th>
      <th scope="col" width="20%">ล็อคที่ได้</th>
    </tr>
  </thead>

  <?php $i = 1;$have = false; ?>
  @foreach ($blocks as $block)
    <tbody>
        <tr>
            @if($block->book->market_id == $markett->id)
                <?php $have = true;?>
                <th scope="row">{{$i}}</th>
                <td>{{$block->book->user->firstname}}&nbsp;&nbsp;{{$block->book->user->lastname}}</td>
                <td>{{$block->book->selltype}}</td>
                <?php $zone = Zone::find($block->book->zone_id); ?>
                <td>{{$zone->name}}</td>
                <td>{{$block->name}}</td>

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

@endif

</tbody>
</table>
</div>

@endif


@endsection