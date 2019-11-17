<?php use App\Block; use App\Zone; ?>
@extends('layouts.master')
@section('content')


<div class="center">
    <div class="divtop">
        <span class="titlepage center mr-2 thaifont"><i class="fas fa-search-dollar icontop"></i>&nbsp;รายงานการแจ้งชำระเงิน</span><br>
    </div>
</div>

<?php $total = false; ?>

    @foreach($bills as $bill)
        @if($bill->book->market_id == $marketid)

        <div class="divpayment divcenter center thaifont">

            <div class="row">
                <div class="col-8 col-md-6 center">
                    <img class="" src="/image/{{$bill->picture}}" width="80%">
                </div>
                <div class="col-10 col-md-6" style="font-size:25px">
                <br>
                    <span class="pinkdark shadowfont">ข้อมูลการจอง</span><br>

                    <span>ชื่อผู้ชำระเงิน:&nbsp;{{$bill->book->user->firstname}}&nbsp;{{$bill->book->user->lastname}}</span><br>
                    <span>Username:&nbsp;<i class="fas fa-hand-point-right"></i>&nbsp;<a href="{{route('users.show',['user'=>$bill->book->user])}}">{{$bill->book->user->username}}</a></span><br>
                    <span>Email:&nbsp;{{$bill->book->user->email}}</span><br>
                    <span>เบอร์โทร:&nbsp;{{$bill->book->user->tel}}</span><br>
                    วันที่ขาย:&nbsp;{{$bill->book->market->datesale}}<br>
                    <?php $zone = Zone::find($bill->book->zone_id); ?>
                    โซนที่จอง:&nbsp;{{$zone->name}}<br>
                    จำนวนล็อคที่จอง:&nbsp;{{$bill->book->amountblock}}<br>
                    ประเภทการขาย:&nbsp;{{$bill->book->selltype}}<br>
                    วันที่จอง:&nbsp;{{$bill->book->bookingdate}}<br>
                    ราคา:&nbsp;{{$bill->book->pay}}<br>
                <br>
                    <span class="pinkdark shadowfont">ข้อมูลการชำระเงิน</span><br>
                    
                    <span>ธนาคารที่โอน:&nbsp;{{$bill->bank}}</span><br>
                    <span>เลขบัญชี:&nbsp;{{$bill->bankaccount}}</span><br>

                    @if($bill->confirm == true)
                        <span class="green shadowfont">สถานะการชำระเงิน:</span><br>
                            @if($bill->book->status == 2)
                                <span class="green shadowfont">หลักฐานการชำระเงินถูกต้อง&nbsp;<i class="far fa-check-circle"></i></span>

                                <?php $block = Block::where('book_id',$bill->book_id)->get()->first() ?>
                                @if($block != null)
                            
                                <br><span class="green shadowfont"><i class="fas fa-map-marker-alt red shadowfont"></i>&nbsp;ล็อคที่ได้:&nbsp;{{$block->name}}</span>
                                @else
                                <div class="divcenter center">
                                    <form action="{{route('blocks.createforbook',['id'=>$bill->book_id])}}" method="post">
                                        @csrf
                                        <span class="pinkdark shadowfont">จัดตำแหน่ง</span><br>

                                        <span class="thaifont">ล็อคที่:&nbsp;</span>
                                        <input type="text" class="form-control @error('block') is-invalid @enderror input enterblock inline" name="block" value="{{ old('block') }}">
                                            @error('block')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <button class="green cancle"type="submit"><i class="fas fa-check-circle"></i></button>
                                    </form>
                                </div>
                                @endif
                            @else
                                <span class="red shadowfont">หลักฐานการชำระเงินไม่ถูกต้อง&nbsp;<i class="fas fa-exclamation"></i></span>
                            @endif
                        <br>
                       
                    @else
                        <span class="pinkdark shadowfont">ยืนยันการชำระเงิน</span><br>
                        <form action="{{route('books.confirm' ,['id'=>$bill->book_id])}}'" method="post">
                            @csrf
                            <select name="confirm" class="custom-select inputdate">
                                <option value="หลักฐานการชำระเงินไม่ถูกต้อง"
                                    @if ("หลักฐานการชำระเงินไม่ถูกต้อง" == old('num',"หลักฐานการชำระเงินไม่ถูกต้อง"))
                                        selected="selected"
                                    @endif> หลักฐานการชำระเงินไม่ถูกต้อง</option>
                                <option value="หลักฐานการชำระเงินถูกต้อง"
                                    @if ("หลักฐานการชำระเงินถูกต้อง" == old('num',"หลักฐานการชำระเงินถูกต้อง"))
                                        selected="selected"
                                    @endif> หลักฐานการชำระเงินถูกต้อง</option>           
                            </select>
                            <button class="green cancle"type="submit"><i class="fas fa-arrow-circle-right"></i>&nbsp;ยีนยันการชำระเงิน</button>
                        </form>
                    @endif
                </div>
            </div>
            <?php $total = true; ?>
        </div>
        @endif
    @endforeach

    <?php if ($total == false) { ?>
        <div class="divcenter center thaifont divnodata">
            <i class="fas fa-exclamation-circle"></i><br>
            ยังไม่มีการแจ้งชำระเงิน
        </div>
    <?php } ?>

@endsection