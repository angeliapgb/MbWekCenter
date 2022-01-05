@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Insert Product') }}</div>

                    <div class="card-body">
                        {{-- @foreach ($users as $user) --}}
                        <form method="POST" action="{{ route('insertProduct') }}">
                            @csrf

                            {{-- <div class="row mb-3 form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                <label for="gender" class="col-md-4 control-label text-md-right" style="margin-top: 1%">Gender</label>

                                <div class="col-md-6">
                                <select class="form-control" name="gender">
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                                </select>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div> --}}

                            <div class="row mb-3">
                                <label for="category" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Category') }}
                                </label>

                                <div class="col-md-6">
                                    <select class="form-control" name="category">
                                        @foreach ($categories as $category)
                                            <option id="category" value='{{ $category->id}}'>{{ $category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
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
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control" required autofocus></textarea>
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
                                    <input id="image" type="file" name="image" required autofocus>
                                </div>
                            </div>

                            {{-- <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}

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