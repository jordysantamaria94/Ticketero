@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mt-5 d-flex justify-content-center">
            <div class="col-md-5 text-center">
                <h2 class="p-semibold">¡Congratulations, you already have your reservation!</h2>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-5 mb-5">
            <div class="col-md-5 ticket text-center">
                <h1 class="p-bold">{{ $name }}</h1>
                <p>{{ $city }} - {{ $area }}</p>
                <h5 class="p-semibold">$<span class="tag-info">{{ $cost }} USD / {{ $nights }} Night(s)</span></h5>
                <img class="img-fluid w-50 mt-3" src="https://borealtech.com/wp-content/uploads/2018/10/codigo-qr-1024x1024-1.jpg" />
            </div>
        </div>
    </div>
@endsection