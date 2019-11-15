@extends('layouts.master')
@section('content')

<div class="center">
    <div class="divtop">
        <span class="titlepage center mr-2 thaifont"><i class="fas fa-hand-holding-usd icontop"></i>&nbsp;แจ้งโอนเงิน</span><br>
    </div>
</div>

<form action="{{route('bills.storebillforbook',['id'=>$book->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="divcenter" style="margin-top:30px">
        
        <div class="form">
            <span class="thaifont">ธนาคารที่โอน
                <select name="bank" class="custom-select inputdate">
                        @foreach($banks as $bank) 
                            <option value={{$bank}}
                                @if ($bank == old('bank',$bank))
                                    selected="selected"
                                @endif> {{$bank}}</option>
                        @endforeach
                        <option selected>เลือกธนาคารที่โอน</option>

                </select>
            </span>
        </div>

        <div class="form">
            <span class="thaifont">เลขบัญชี
            <input type="text" class="form-control @error('bankaccount') is-invalid @enderror input inline" name="bankaccount" value="{{ old('bankaccount') }}">

                @error('bankaccount')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </span>
        </div>

        <div class="form">
            <span class="thaifont">รูปหลักฐานการโอน
            <input type="file" name="picture" class="form-control-file" ></span>
            
                @error('picture')
                    <div class="red thaifont">{{$message}}</div>
                @enderror
        </div>

       


    </div>

    <div class="divcenter">
        <button class="btn btn-success buttonsubmit floatright font" type="submit">Submit</button>
        <a class="btn btn-danger buttonsubmit floatleft font" style="color: white" href="{{route('users.show',['user'=>Auth::user()])}}">Back</a>
    </div>
</form>
@endsection