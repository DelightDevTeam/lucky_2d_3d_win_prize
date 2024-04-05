@extends('user_layouts.master')

@section('content')
    <!-- Nav -->
    <div class="nav d-flex align-items-center py-3 px-3">
        <a href="{{ route('welcome') }}" class="me-3">
            <i class="fa-solid fa-arrow-left text-white"></i>
        </a>
        <h4 class="mt-1">2D Calendar</h4>
    </div>
<section class="py-4 px-2">
    <!-- Number Containers -->
    <div class="row text-center">
        @foreach ($dailyResults as $date => $results)
        @if($results->count() > 0)
        <div class="mb-3">
            <span class="text-center bg-dark text-white px-3 py-2 rounded">{{ $date }}</span>
        </div>
        @endif
        @foreach ($results as $result)
        <div class="numberContainer mb-4 col-6">
            <h4 class="time py-1 rounded-3">{{ $result->result }}</h4>
            <h4 class="num">{{ $result->session->name }}</h4>
        </div>
        @endforeach
        @endforeach
    </div>
</section>
@endsection