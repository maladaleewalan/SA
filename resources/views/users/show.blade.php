<?php use App\Zone; ?>
@extends('layouts.master')
@section('content')

<div class="center">
    <div class="divtop">
        <span class="titlepage center mr-2 thaifont"><i class="fas fa-user-circle icontop"></i>&nbsp;Profile</span><br>
    </div>
</div>

<div class="divcenter font divprofile">
    <i class="fas fa-user-alt"></i>&nbsp;username:&nbsp;&nbsp;{{$user->username}}<br>
    <i class="fas fa-address-card"></i>&nbsp;name:&nbsp;&nbsp;{{$user->firstname}}&nbsp;{{$user->lastname}}<br>
    <i class="fas fa-envelope"></i>&nbsp;email:&nbsp;&nbsp;{{$user->email}}<br>
    <i class="fas fa-mobile-alt"></i>&nbsp;tel:&nbsp;&nbsp;{{$user->tel}}<br>
</div>

<div class="wordleft thaifont titlepage shadowfont"><i class="fas fa-exclamation pinkdark"></i>&nbsp;
    <span class="pinkdark">รายการจอง</span>
</div>

@if ($books->first() == null) 
<div class="divcenter center thaifont divnodata">
    <i class="fas fa-exclamation-circle"></i><br>
    ยังไม่มีการจอง
</div>
@else

    @foreach ($books as $book)
    <div class="divcenter thaifont divinpage">
        <div class="row">
            <div class="col-8 col-md-6">
                <img class="" src="/image/{{$book->market->picture}}" width="100%">
            </div>
            <div class="col-10 col-md-6">
                วันที่ขาย:&nbsp;{{$book->market->datesale}}<br>
                <?php $zone = Zone::find($book->zone_id); ?>
                โซนที่จอง:&nbsp;{{$zone->name}}<br>
                ประเภทการขาย:&nbsp;{{$book->selltype}}<br>
                วันที่จอง:&nbsp;{{$book->bookingdate}}<br>

                @if ($book->status == 0)
                    <span class="red">สถานะ:&nbsp;ยังไม่ชำระเงิน</span><br>
                @elseif ($book->status == 1) 
                    <span class="blue">สถานะ:&nbsp;ชำระเงินแล้ว</span><br>
                @else
                    <span class="green">สถานะ:&nbsp;ยืนยันการชำระเงินแล้ว</span><br>
                @endif

                @if($book->market->startbooking <= date('Y-m-d') && $book->market->endbooking >= date('Y-m-d') && $book->status == 0)
                    <form action="{{route('books.destroy', ['book' => $book->id])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Are You Sure to cancle this booking?')" class="red cancle" type="submit"><i class="fas fa-arrow-circle-right"></i>&nbsp;ยกเลิกการจอง</button>
                </form>
                @endif
            </div>
        </div>
    </div>
    @endforeach
@endif



@endsection