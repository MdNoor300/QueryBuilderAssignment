@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>

    <div class="card-deck">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Today's Sales</h5>
                <p class="card-text">${{ $todaySales }}</p>
            </div>
        </div>
        <!-- Repeat the above structure for yesterday, this month, and last month -->
    </div>
@endsection
