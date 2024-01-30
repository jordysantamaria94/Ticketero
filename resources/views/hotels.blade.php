@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="POST" action="/search-hotel/{{ $search['destination']['latitude'] }}/{{ $search['destination']['longitude'] }}/{{ $search['destination']['radius'] }}/{{ $search['destination']['city'] }}">
            @csrf
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-md-4">
                    <label class="form-label">Start Date</label>
                    <input type="date" class="form-control shadow-none sh" name="start" autocomplete="off" value="{{ $search['startDate'] }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">End Date</label>
                    <input type="date" class="form-control shadow-none sh" name="end" autocomplete="off" value="{{ $search['endDate'] }}">
                </div>
            </div>
            <div class="row d-flex justify-content-center align-items-end mt-3">
                <div class="col-md-2">
                    <label class="form-label">Rooms</label>
                    <input type="number" class="form-control shadow-none sh" name="rooms" placeholder="Rooms" autocomplete="off" value="{{ $search['occupancies'][0]['rooms'] }}">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Adults</label>
                    <input type="number" class="form-control shadow-none sh" name="adults" placeholder="Adults" autocomplete="off" value="{{ $search['occupancies'][0]['adults'] }}">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Children</label>
                    <input type="number" class="form-control shadow-none sh" name="children" placeholder="Children" autocomplete="off" value="{{ $search['occupancies'][0]['children'] }}">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-ticketero shadow-none w-100 mt-3" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
        </form>
        @if (count($hotels) > 0)
        <div class="row mt-3 mb-3">
            <div class="col-12">
                <label>
                    Hotels in: 
                    <span class="p-semibold">{{ $search['destination']['city'] }}</span>
                </label>
            </div>
        </div>
        <div class="row">
            @foreach ($hotels as $hotel)
                <div class="col-12 col-sm-12 col-md-4 mt-3">
                    <div class="card">
                        <div class="card-img-top" style="background: url({{ $hotel['image'] }})"></div>
                        <div class="card-body">
                            <span>{{ $hotel['location']['city_name'] }} - {{ $hotel['location']['zone_name'] }}</span>
                            <h5 class="card-title">{{ $hotel['hotel_name'] }}</h5>
                            <p class="card-text">
                                @for ($i = 0; $i < $hotel['hotel_stars']; $i++)
                                    <i class="fa-solid fa-star" style="color: #FDD835 !important;"></i>
                                @endfor
                            </p>
                            <p class="card-text">Average: <strong>${{ $hotel['prices']['averagePrice'] }} {{ $hotel['prices']['currency'] }}</strong> / {{ $hotel['nights'] }} Night(s)</p>
                            <div class="row d-flex justify-content-end">
                                <div class="col-3 col-sm-12 col-md-5">
                                    <a class="btn btn-ticketero w-100" href="/reserve-room/{{ $hotel['hotel_name'] }}/{{ $hotel['location']['city_name'] }}/{{ $hotel['location']['zone_name'] }}/{{ $hotel['prices']['averagePrice'] }}/{{ $hotel['nights'] }}">Reserve</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @else
        <div class="row">
            <div class="col-12">
                <h4>No results found</h4>
            </div>
        </div>
        @endif
    </div>
@endsection