@extends('layouts.master')
@section('content')

<div class="center">
    <div class="divtop">
        <span class="titlepage center mr-2 thaifont"><i class="fas fa-search-location icontop"></i>&nbsp;วางผังตลาด</span><br>
    </div>
</div>

<form action="{{route('markets.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="divcenter">
        <div class="form">
            <span class="thaifont">รูปผังตลาด
            <input type="file" name="picture" class="form-control-file" ></span>
            
                @error('picture')
                    <div class="red thaifont">{{$message}}</div>
                @enderror
        </div>

        <div class="form">
            <span class="thaifont">วันที่ตลาดเปิด
                <input type="date" name="datesale" value="{{old('datesale')}}">  
            </span>
            @error('datesale')
                <div class="red thaifont">{{$message}}</div>
            @enderror
        </div>

        <div class="form">
            <span class="thaifont">วันที่เปิดให้จอง
                <input type="date" name="startbooking" value="{{old('startbooking')}}"> 
            </span>
            @error('startbooking')
                    <div class="red thaifont">{{$message}}</div>
            @enderror
        </div>

        <div class="form">
            <span class="thaifont">วันที่ปิดการจอง
                <input type="date" name="endbooking" value="{{old('endbooking')}}"> 
            </span>
            @error('endbooking')
                    <div class="red thaifont">{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="center">
        <button class="btn btn-success buttonsignup floatright" type="submit">Submit</button>
        <a class="btn btn-danger buttonsignup floatleft" style="margin-left:60px;">Back</a>
    </div>
</form>


@endsection