<?php use App\Zone; 
use App\Bill; 
use App\Block; ?>

@extends('layouts.master')
@section('content')

<div class="center">
    <div class="divtop">
        <span class="titlepage center mr-2 thaifont"><i class="fas fa-user-circle icontop"></i>&nbsp;Profile</span><br>
    </div>
</div>

<div class="divcenter font divprofile">
    <i class="fas fa-user-alt"></i>&nbsp;username:&nbsp;&nbsp;{{$user->username}}<br>
    <i class="fas fa-address-card"></i>&nbsp;name:<span class="thaifont">&nbsp;&nbsp;{{$user->firstname}}&nbsp;{{$user->lastname}}</span><br>
    <i class="fas fa-envelope"></i>&nbsp;email:&nbsp;&nbsp;{{$user->email}}<br>
    <i class="fas fa-mobile-alt"></i>&nbsp;tel:&nbsp;&nbsp;{{$user->tel}}<br>
</div>

@if($user->role != "admin")
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
        <div class="divcenter thaifont divinpage" style="font-size:25px">
            <div class="row">
                <div class="col-8 col-md-6">
                    <img class="" src="/image/{{$book->market->picture}}" width="100%">
                </div>
                <div class="col-10 col-md-6">
                    วันที่ขาย:&nbsp;{{$book->market->datesale}}<br>
                    <?php $zone = Zone::find($book->zone_id); ?>
                    โซนที่จอง:&nbsp;{{$zone->name}}<br>
                    จำนวนล็อคที่จอง:&nbsp;{{$book->amountblock}}<br>
                    ประเภทการขาย:&nbsp;{{$book->selltype}}<br>
                    วันที่จอง:&nbsp;{{$book->bookingdate}}<br>
                    ราคา:&nbsp;{{$book->pay}}<br>


                    @if ($book->status == 0)
                        <span class="red">สถานะ:&nbsp;ยังไม่แจ้งการชำระเงิน</span><br>
                    @elseif ($book->status == 1) 
                        <span class="blue">สถานะ:&nbsp;แจ้งการชำระเงินแล้ว</span><br>
                    @else
                        <span class="green">สถานะ:&nbsp;ยืนยันการชำระเงินแล้ว</span><br>
                    @endif
                    <?php $block = Block::where('book_id',$book->id)->get()->first() ?> 
                    @if($block != null)
                        <span class="green"><i class="fas fa-map-marker-alt red shadowfont"></i>&nbsp;ล็อคที่ได้:&nbsp;{{$block->name}}</spam>
                    @else 
                        ล็อคที่ได้:&nbsp;<span class="red">ยังไม่แจ้ง</span><br>
                    @endif

                    @if($book->market->startbooking <= date('Y-m-d') && $book->market->endbooking >= date('Y-m-d') && Auth::user()->role != "admin")
                        @if($book->status == 0 || $book->status == 1)
                            
                        @endif

                        @if ($book->status == 0)
                            <button onclick="window.location.href='{{route('bills.createbillforbook' ,['id'=>$book->id])}}'" class="green cancle inline" type="submit"><i class="fas fa-arrow-circle-right"></i>&nbsp;แจ้งการชำระเงิน</button>
                            <form action="{{route('books.destroy', ['book' => $book->id])}}" method="post" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are You Sure to cancle this booking?')" class="red cancle" type="submit"><i class="fas fa-arrow-circle-right"></i>&nbsp;ยกเลิกการจอง</button>
                            </form>
                        @endif
                    
                    @endif
                </div>
                <?php $bills = Bill::where('book_id',$book->id)->get() ?>
                @if($bills->first() != null)
                    <div class="divcenter center" style="font-size:25px">
                        <span class="pinkdark shadowfont">การแจ้งการชำระเงิน</span><br>
                        @foreach ($bills as $bill)
                            <img class="" src="/image/{{$bill->picture}}" width="50%"><br>
                            @if($book->status != 2)
                            <button class="red cancle" style="font-size:20px;" onclick="window.location.href='{{route('bills.edit',['bill'=>$bill->id])}}'">
                                <i class="fas fa-edit"></i>แก้ไข
                            </button><br>
                            @endif
                            <span>ธนาคารที่โอน:&nbsp;{{$bill->bank}}</span><br>
                            <span>เลขบัญชี:&nbsp;{{$bill->bankaccount}}</span><br>

                            @if($bill->confirm == true)
                                <span class="green shadowfont">สถานะการชำระเงิน:</span><br>
                                    @if($book->status == 2)
                                        <span class="green shadowfont">หลักฐานการชำระเงินถูกต้อง&nbsp;<i class="far fa-check-circle"></i></span>
                          
                                    @else
                                        <span class="red shadowfont">หลักฐานการชำระเงินไม่ถูกต้อง&nbsp;<i class="fas fa-exclamation"></i></span>
                                    @endif
                                <br>
                            @endif
                        @endforeach

                        
                    </div>
                @endif
            </div>
        </div>
        @endforeach
    @endif


@endif

@endsection