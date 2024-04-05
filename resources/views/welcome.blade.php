@extends('user_layouts.master')

@section('content')
    <!-- Nav -->
    <div class="nav d-flex align-items-center justify-content-between py-3 px-3">
        <h4 class="mt-1">Gold Lucky 2D</h4>
        <a href="{{ route('calendar') }}" class="text-white">
            <i class="fa-solid fa-calendar-days"></i>
        </a>
        
    </div>
<section class="py-4 px-2">
    <!-- Number Section -->
    <div class="numberSection d-flex align-items-center justify-content-between">
        <div class="text-center">
            <h4 class="fw-bolder">SET</h4>
            <h4 class="fw-bolder">19623.003</h4>
        </div>
        <div class="text-center">
            <h1 class="number">{{ $latest_result->result ?? "--" }}</h1>
        </div>
        <div class="text-center">
            <h4 class="fw-bolder">VALUE</h4>
            <h4 class="fw-bolder">19623.003</h4>
        </div>
    </div>
    <!-- Updated Section -->
    <div class=" d-flex align-items-center gap-1 ">
        <input type="checkbox" checked>
        @php
            $today = Carbon\Carbon::today();

        @endphp
        <h5 class="fw-bolder mt-2">Updated at : {{ $today->format('d/m/Y') }} {{ $latest_result->session->name}}</h5>
    </div>
    <!-- Number Containers -->
    <div class="row text-center my-4">
        @foreach ($sessions as $session)
        <div class="numberContainer mb-4 col-6">
            <h4 class="time py-1 rounded-3">{{ $session->name }}</h4>
            <h4 class="num">{{ $session->results[0]->result ?? "--" }}</h4>
        </div>
        @endforeach
    </div>

    <h4 class="text-center mt-2 fw-bolder text-danger">Every MONDAY is our off day!</h4>
</section>
@endsection