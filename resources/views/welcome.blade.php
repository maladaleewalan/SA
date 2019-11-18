@extends('layouts.master')
@section('content')
<div class="center">
<img class="picfirstpage" src="{{url('image/treebox-35.jpg')}}" width="50%">

<div class="row menu divcenter">
    <div class="col colornav eachmenu thaifont center pinkdark shadowfont">
        <span style="font-size:35px;"><i class="fas fa-map-marker-alt red"></i>&nbsp;ตลาดนัดสัญจร<br></span>
        ที่อยู่:&nbsp;บ.โคกวัฒนา อ.โพนทอง จ.ร้อยเอ็ด<br>
        เวลาเปิด - ปิด:&nbsp;15.00 น. - 20.00 น.<br>
        <i class="fas fa-mobile-alt black"></i>&nbsp;ติดต่อ:&nbsp;089-2777177


    </div>
    <div class="col colornav eachmenu thaifont center pinkdark shadowfont">
        <span style="font-size:35px;"><i class="far fa-calendar-check green"></i>&nbsp;การจอง<br></span>
        โซน:&nbsp;หน้า/หลัง<br>
        ประเภทการขาย:&nbsp;อาหาร เสื้อผ้า ของใช้<br>
        ราคาร:&nbsp;โซนหน้า&nbsp;<i class="fas fa-caret-right red"></i>&nbsp;100&nbsp;บาท&nbsp;/&nbsp;โซนหลัง&nbsp;<i class="fas fa-caret-right red"></i>&nbsp;80&nbsp;บาท<br>


    </div>
  </div>
</div>

@endsection
