@extends('layouts.app')

@section('title', 'Update Product')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update Product') }}</div>

                    <div class="card-body">
                        {{-- @foreach ($users as $user) --}}
                        <form method="POST" action="/profile/{id}">
                            @csrf

                            <div class="row mb-3">
                                @foreach($category as $c)
                                {{-- masih gabisa --}}
                                <option value="{{ $c->category_name }}">
                                    <a href="/products/category/{{ $c->id }}">{{ $c->category_name }}</a>
                                </option>
                                @endforeach
                            </div>

                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" required autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="description" cols="30"></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                                <div class="col-md-6">
                                    <input id="price" type="text" class="form-control" name="price" required autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="stock" class="col-md-4 col-form-label text-md-right">{{ __('Stock') }}</label>

                                <div class="col-md-6">
                                    <input id="stock" type="text" class="form-control" name="stock" required autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                                <div class="col-md-6">
                                    <input type="file" name="file">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        {{-- @endforeach --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
