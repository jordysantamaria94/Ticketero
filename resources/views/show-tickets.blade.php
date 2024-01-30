@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-12 text-center">
                <h1 class="p-bold">{{ $eventDetails['event_name'] }}</h1>
                <p class="p-semibold">{{ $eventDetails['event_datetext'] }} - {{ $eventDetails['event_time'] }}</p>
                <p>{{ $eventDetails['venue_name'] }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <img src="{{ $eventDetails['map'] }}" class="img-fluid w-100">
            </div>
            <div class="col-6">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    @foreach ($tickets as $ind => $ticket)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $ind }}" aria-expanded="false" aria-controls="flush-collapse{{ $ind }}">
                                {{ $ticket['ticket_name'] }}
                            </button>
                        </h2>
                        <div id="flush-collapse{{ $ind }}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <p>{{ $ticket['ticket_description'] }}</p>
                                <p class="card-text"><span class="p-semibold">${{ $ticket['ticket_price'] }} {{ $ticket['ticket_currency'] }}</span> / Ticket</p>
                                <form method="POST" class="row" action="/buy-tickets/{{ $ticket['ticket_id'] }}/{{ $id }}">
                                    @csrf
                                    <div class="col-6">
                                        <select class="form-control shadow-none" name="quantity">
                                            @foreach ($ticket['purchasableQuantities'] as $quantity)
                                                <option value="{{ $quantity }}">{{ $quantity }} Ticket(s)</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-ticketero shadow-none w-100">Buy</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection