@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-4 col-sm-12">
            <form method="POST" action="/">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control input-ticket shadow-none" name="search" placeholder="Search Performers, Venues and Destinations" autocomplete="off" value="{{ $search }}">
                    <button class="btn btn-ticket shadow-none" type="submit" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        </div>
    </div>
    @if (count($response) > 0)
    <div class="row mt-4">
        <label>
            Results: 
            <span class="p-semibold">{{ $search }}</span>
        </label>
    </div>
    <ul class="nav nav-pills justify-content-center mt-4" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-events-tab" data-bs-toggle="pill" data-bs-target="#pills-events" type="button" role="tab" aria-controls="pills-events" aria-selected="true">Performers</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-venues-tab" data-bs-toggle="pill" data-bs-target="#pills-venues" type="button" role="tab" aria-controls="pills-venues" aria-selected="false">Venues</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-destination-tab" data-bs-toggle="pill" data-bs-target="#pills-destination" type="button" role="tab" aria-controls="pills-destination" aria-selected="false">Destinations</button>
        </li>
    </ul>
    <div class="tab-content mt-3" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-events" role="tabpanel" aria-labelledby="pills-events-tab" tabindex="0">
            @if (count($response['performers']) > 0)
            <div class="row mt-4">
                @foreach ($response['performers'] as $performer)
                    <a class="col-12 col-md-4 col-sm-12 mt-3" href="event/{{ $performer['typeSearch'] }}/{{ $performer['id'] }}">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ $performer['name'] }}</h4>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            @endif
        </div>
        <div class="tab-pane fade" id="pills-venues" role="tabpanel" aria-labelledby="pills-venues-tab" tabindex="0">
            @if (count($response['venues']) > 0)
            <div class="row mt-4">
                @foreach ($response['venues'] as $venue)
                    <a class="col-12 col-md-4 col-sm-12 mt-3" href="event/{{ $venue['typeSearch'] }}/{{ $venue['id'] }}">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ $venue['name'] }}</h4>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            @endif
        </div>
        <div class="tab-pane fade" id="pills-destination" role="tabpanel" aria-labelledby="pills-destination-tab" tabindex="0">
            @if (count($response['destinations']) > 0)
            <div class="row mt-4">
                @foreach ($response['destinations'] as $destination)
                    <a class="col-12 col-md-4 col-sm-12 mt-3" href="event/{{ $destination['typeSearch'] }}/{{ $destination['id'] }}/{{ $destination['name'] }}/{{ $destination['lat'] }}/{{ $destination['lng'] }}/{{ $destination['radius'] }}">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ $destination['name'] }}</h4>
                                <p class="card-text mb-2">{{ $destination['country'] }}</p>
                                <p class="card-text"><span class="p-bold">Airport:</span> {{ $destination['airport'] }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            @endif
        </div>
    </div>
    @endif
</div>
@endsection