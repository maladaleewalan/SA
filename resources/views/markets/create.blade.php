@extends('layouts.master')
@section('content')

<div class="center">
    <div class="divtop">
        <span class="titlepage center mr-2 thaifont"><i class="fas fa-search-location icontop"></i>&nbsp;วางผังตลาด</span><br>
    </div>
</div>

<form action="{{route('markets.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="divcenter" style="margin-top:30px">
        <div class="form">
            <span class="thaifont">รูปผังตลาด
            <input type="file" name="picture" class="form-control-file" ></span>
            
                @error('picture')
                    <div class="red thaifont">{{$message}}</div>
                @enderror
        </div>

        <div class="form">
            <span class="thaifont">วันที่ตลาดเปิด&nbsp;
                <input type="date" name="datesale" value="{{old('datesale')}}" class="form-control inputdate">  
            </span>
            @error('datesale')
                <div class="red thaifont">{{$message}}</div>
            @enderror
        </div>

        <div class="form">
            <span class="thaifont">วันที่เปิดให้จอง
                <input type="date" name="startbooking" value="{{old('startbooking')}}" class="form-control inputdate"> 
            </span>
            @error('startbooking')
                    <div class="red thaifont">{{$message}}</div>
            @enderror
        </div>

        <div class="form">
            <span class="thaifont">วันที่ปิดการจอง
                <input type="date" name="endbooking" value="{{old('endbooking')}}" class="form-control inputdate"> 
            </span>
            @error('endbooking')
                    <div class="red thaifont">{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="divcenter">
        <button class="btn btn-success buttonsubmit floatright font" type="submit">Submit</button>
        <a class="btn btn-danger buttonsubmit floatleft font" style="color: white" href="{{route('home')}}">Back</a>
    </div>
</form>


@endsection