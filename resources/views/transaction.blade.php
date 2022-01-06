@extends('layouts.app')

@section('content')

<div class="container">
    <div class="cart">
        <h2>Transaction</h2>
        <table class="table">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Transaction Time</td>
                    <td>Detail Transaction</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $data) 
                    <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>
                                    <a href="detailtransaction/{{ $data->id }}">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Check Detail') }}
                                        </button>
                                    </a>
                            </td>
                    </tr>
                    @empty
                        <td id="datanotfound" colspan="6">Your transaction history is empty ...</td>
                @endforelse
            </tbody>
        </table>
        
    </div>
</div>

@endsection