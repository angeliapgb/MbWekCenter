@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div>
    <form action="/products" class="container-fluid">
        <div class="mb-5 d-flex justify-content-evenly">
            <label class="form-label" style="margin:0 5%;">Search:</label>
            <select class="form-control" name="category" style="width: 10%;">
                @foreach($category as $c)
                {{-- masih gabisa --}}
                <option value="{{ $c->category_name }}">
                    <a href="/products/category/{{ $c->id }}">{{ $c->category_name }}</a>
                </option>
                @endforeach
            </select>
            <input type="text" name="search_query" class="form-control" style="width: 50%; margin:0 2%;">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
</div>

<div class="d-flex justify-content-evenly flex-wrap">
    @foreach($products as $p)
    <div class="card mt-5" style="width: 20rem; margin-left: 5rem; margin-bottom: 2rem;">
        <img src="{{ $p->image }}" class="card-img-top" style="width: 20rem; height: 20rem;" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $p->title }}</h5>
          <p class="card-text">{{ $p->description }}</p>
            @if ( Auth::guest() )
                <a href="detailproduct/{{ $p['title'] }}" class="btn btn-primary" style="margin-top: 2%; padding: 2% 30%;">Product Detail</a>
            @else
                @if ( Auth::user()->name == 'Admin' )
                <a href="#" class="btn bg-danger text-white" style="padding: 2% 28%;">Update Product</a>
                @endif
                <a href="detailproduct/{{ $p['title'] }}" class="btn btn-primary" style="margin-top: 2%; padding: 2% 30%;">Product Detail</a>
            @endif
        </div>
    </div>
    @endforeach
</div>

@endsection
