@extends('layouts.app')

@section('title', 'Detail Product')

@section('content')
<div class="detail">
    @foreach ($details as $det)
        <img src="{{ $det->image }}" alt="">
        <h5 style="margin: 3vh 0">{{ $det->title }}</h5>
        <h5 style="margin: 0 0 3vh 0">Description: {{$det->description}}</h5>
        <h5 style="margin: 0 0 3vh 0">Stock: {{$det->stock}} piece(s)</h5>
        <h5 style="margin: 0 0 3vh 0">Price: Rp. {{$det->price}}</h5>
    @endforeach
</div>
@endsection
