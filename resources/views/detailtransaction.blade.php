@extends('layouts.app')

@section('content')

<div class="container">
    <div class="cart">
        <h2>Transaction Detail</h2>
        <table class="table">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Item Name</td>
                    <td>Item Detail</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Sub Total</td>
                </tr>
            </thead>
            <tbody>
                <?php $sum = 0; ?>
                @forelse ($data as $data) 
                    <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->description }}</td>
                            <td>{{ $data->price }}</td>
                            <td>{{ $data->quantity }}</td>
                            <td>{{ $data->price*$data->quantity }}</td>
                            <input type="hidden" value="{{ $sum+=$data->price*$data->quantity }}">
                    </tr>
                    @empty
                @endforelse
            </tbody>
        </table>
        <p>Grand Total {{ $sum }},-</p>
        
    </div>
</div>

@endsection