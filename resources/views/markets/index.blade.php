@extends('layouts.master')

@section('content')

@foreach($markets as $market)
<div>{{$market->datesale}}</div>
@endforeach
@endsection