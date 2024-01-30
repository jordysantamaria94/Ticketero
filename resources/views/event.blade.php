@extends('layouts.app')
@section('content')
    <div class="container">
        @if (count($events) > 0)
        <div class="row">
            @foreach ($events as $event)
                <div class="col-4 mt-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="card-title pt-4">{{ $event['event_name'] }}</h4>
                            <p class="card-text p-medium mb-2">{{ $event['event_datetext'] }}</p>
                            <p class="card-text mb-2">{{ $event['venue_name'] }}</p>
                            <div class="row d-flex justify-content-center mt-4 pb-3">
                                <div class="col-md-4">
                                    <a class="btn btn-sm btn-ticketero shadow-none w-100" href="/search-tickets/{{ $event['event_id'] }}">Buy tickets</a>
                                </div>
                                @if ($type == 'destination')
                                <div class="col-md-5">
                                    <a class="btn btn-sm btn-ticketero shadow-none w-100" href="/search-hotel/{{ $cityInfo['startDate'] }}/{{ $cityInfo['endDate'] }}/{{ $cityInfo['destination']['latitude'] }}/{{ $cityInfo['destination']['longitude'] }}/{{ $cityInfo['destination']['radius'] }}/{{ $cityInfo['destination']['city'] }}/1/1/0">Search hotels</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @else
        <div class="row">
            <div class="col-12">
                <h4>No se encontraron resultados</h4>
            </div>
        </div>
        @endif
    </div>
@endsection