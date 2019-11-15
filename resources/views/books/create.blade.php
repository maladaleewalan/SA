@extends('layouts.master')
@section('content')

<div class="center">
    <div class="divtop">
        <span class="titlepage center mr-2 font"><i class="fas fa-mouse-pointer icontop"></i>&nbsp;booking block</span><br>
    </div>
</div>

<form action="{{route('books.storebookmarket',['id'=>$market->id])}}" method="post">
    @csrf
    <div class="divcenter" style="margin-top:30px">
        <div class="center">
            <img class="" src="/image/{{$market->picture}}" width="60%">
        </div>

        <div class="form">
            <span class="thaifont">เลือกโซน
            <select name="zone" class="custom-select inputdate">
                            @foreach($zones as $zone) 
                                <option value={{$zone->id}}
                                    @if ($zone->id == old('zone',$zone->name))
                                        selected="selected"
                                    @endif> {{$zone->name}}</option>
                            @endforeach
            </select>
        </div>

        <div class="form">
            <span class="thaifont">เลือกประเภทการขาย
            <select name="selltype" class="custom-select inputdate">
                        <option value="ของใช้"
                            @if ("ของใช้" == old('selltype',"ของใช้"))
                                selected="selected"
                            @endif> ของใช้</option>
                        <option value="เสื้อผ้า"
                            @if ("เสื้อผ้า" == old('selltype',"เสื้อผ้า"))
                                selected="selected"
                            @endif> เสื้อผ้า</option>
                        <option value="อาหาร"
                            @if ("อาหาร" == old('selltype',"อาหาร"))
                                selected="selected"
                            @endif> อาหาร</option>
                        
                        
            </select>
            </span>
        </div>

        <div class="form">
            <span class="thaifont">จำนวนล็อคที่จอง
            <select name="num" class="custom-select inputdate">
                        <option value="4"
                            @if ("4" == old('num',"4"))
                                selected="selected"
                            @endif> 4</option>
                        <option value="3"
                            @if ("3" == old('num',"3"))
                                selected="selected"
                            @endif> 3</option>
                        <option value="2"
                            @if ("2" == old('num',"2"))
                                selected="selected"
                            @endif> 2</option>
                        <option value="1"
                            @if ("1" == old('num',"1"))
                                selected="selected"
                              @endif> 1</option>           
            </select>
            </span> 
        </div>


    </div>

    <div class="divcenter">
        <button class="btn btn-success buttonsubmit floatright font" type="submit">Submit</button>
        <a class="btn btn-danger buttonsubmit floatleft font" style="color: white" href="{{route('home')}}">Back</a>
    </div>
</form>

@endsection