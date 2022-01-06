@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="d-flex justify-content-evenly flex-wrap">
    @foreach($products as $p)
    <div class="card mt-5" style="width: 20rem; margin-left: 5rem; margin-bottom: 2rem;">
        @if($p->image)
            <img src="{{ $p->image }}" class="card-img-top" style="width: 20rem; height: 20rem;" alt="...">
        @else
            <img src="{{asset('/storage/images/').$p->image}}" class="card-img-top" style="width: 20rem; height: 20rem;" alt="...">
        @endif
        
        <div class="card-body">
          <h5 class="card-title">{{ $p->title }}</h5>
          <p class="card-text">{{ $p->description }}</p>
            @if ( Auth::guest() )
                <a href="detailproduct/{{ $p['title'] }}" class="btn btn-primary" style="margin-top: 2%; padding: 2% 30%;">Product Detail</a>
            @else
                @if ( Auth::user()->name == 'Admin' )
                <a href="{{ route('update', $p->title) }}" class="btn bg-danger text-white" style="padding: 2% 28%;">Update Product</a>
                @endif
                <a href="detailproduct/{{ $p['title'] }}" class="btn btn-primary" style="margin-top: 2%; padding: 2% 30%;">Product Detail</a>
            @endif
        </div>
    </div>
    @endforeach
</div>

@endsection
