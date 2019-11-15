@extends('layouts.master')

@section('content')
<div class="center">
    <div class="divtop">
        <span class="titlepage center mr-2 thaifont"><i class="fas fa-search-location icontop"></i>&nbsp;เลือกวันที่ขาย</span><br>
    </div>
</div>

@if ($markets->first() == null) 
<div class="divcenter center thaifont divnodata">
    <i class="fas fa-exclamation-circle"></i><br>
    ยังไม่มีการเปิดการจอง
</div>

@else 

@foreach($markets as $market)
<div class="divcenter center thaifont divinpage">
    <img class="" src="image/{{$market->picture}}" width="60%">
<br>
    <span>วันตลาดเปิด: &nbsp;{{$market->datesale}}</span>
    <br>
    @if(Auth::user()->role == "admin")
    
    @else
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
    @endif


</div>


@endforeach

@endif
@endsection