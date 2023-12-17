@extends('layouts.app')

@section('content')
    <h1>Sale Transaction History</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->product_name }}</td>
                    <td>${{ $sale->amount }}</td>
                    <td>{{ $sale->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $sales->links() }}
@endsection
