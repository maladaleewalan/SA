@extends('layouts.master')

@section('content')
<div class="center">
    <div class="divtop">
        <span class="titlepage center mr-2 thaifont"><i class="fas fa-search-location icontop"></i>&nbsp;วันที่ตลาดเปิด</span><br>
    </div>
</div>

@if ($markets->first() == null) 
<div class="divcenter center thaifont divnodata">
    <i class="fas fa-exclamation-circle"></i><br>
    ยังไม่มีการเปิดการจอง
</div>

@else 
<br>
<select class="custom-select inputdate floatright" style="margin-right:100px" onchange="location = this.value;">    
    <option>เลือกวันที่</option>
  @foreach ($markets as $market)
        <option value="{{route('markets.show',['market'=>$market])}}">{{$market->datesale}}</option>
    
                       
  @endforeach   
                  
</select>
<br><br>

@foreach($markets as $market)
<div class="divcenter center thaifont divinpage">
    <img class="" src="image/{{$market->picture}}" width="60%">
<br>
    <span>วันตลาดเปิด: &nbsp;{{date('d-m-Y', strtotime($market->datesale))}}</span>
    <br>
    @if(Auth::user() == null || Auth::user()->role != "admin")
        @if ($market->startbooking <= date('Y-m-d') && $market->endbooking >= date('Y-m-d'))
        <span class="green">status: เปิดรับการจอง</span>
        @auth
        <br><a class="btn btn-success buttonsubmit thaifont shadowbox" style="color: white;text-shadow:none" href="{{route('books.createbookmarket', ['id'=>$market->id])}}">จอง</a>
        @endauth
        @elseif ($market->startbooking > date('Y-m-d'))
            <span class="red">status:ยังไม่ถึงเวลาจอง</span>
        @else
            <span class="red">status: หมดเขตการจอง</span>

        @endif
    
    @else 
    <a class="red shadowfont" href="{{route('bills.indexeachmarket', ['id'=>$market->id])}}"><i class="fas fa-arrow-circle-right"></i>&nbsp;ดูรายงานการแจ้งชำระเงิน</a>
    @endif



</div>


@endforeach

@endif
@endsection