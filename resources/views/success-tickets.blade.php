@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mt-5 d-flex justify-content-center">
            <div class="col-md-5 text-center">
                <h2 class="p-semibold">¡Congratulations, you already have your tickets!</h2>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-5 mb-5">
            <div class="col-md-5 ticket text-center">
                <h1 class="p-bold">{{ $event['event_name'] }}</h1>
                <p>{{ $event['venue_name'] }}</p>
                <h5 class="p-semibold">Date: <span class="tag-info">{{ $event['event_datetext'] }}</span></h5>
                <h5 class="p-semibold">Time: <span class="tag-info">{{ $event['event_time'] }}</span></h5>
                <h5 class="p-semibold">Tickets: <span class="tag-info">{{ $quantity }}</span></h5>
                <img class="img-fluid w-50 mt-3" src="https://borealtech.com/wp-content/uploads/2018/10/codigo-qr-1024x1024-1.jpg" />
            </div>
        </div>
    </div>
@endsection