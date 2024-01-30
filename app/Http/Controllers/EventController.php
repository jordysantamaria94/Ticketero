<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\API;

class EventController extends Controller
{
    use API;

    public function index($type, $id) 
    {
        $response = $this->eventByDestinationPerformerVenue([
            "searchType" => "performer",
            "performerId" => $id,
            "withPerformers" => false
        ]);

        return view('event', [
            'type' => $type,
            'events' => $response['data']['results']
        ]);
    }

    public function destination($id, $name, $lat, $lng, $radius) 
    {
        $start = \Carbon\Carbon::now()->format('Y-m-d');
        $end = \Carbon\Carbon::now()->addDays(7)->format('Y-m-d');

        $body = [
            "startDate" => $start,
            "endDate" => $end,
            "searchType" => "destination",
            "withPerformers" => false,
            "destination" => [
                "latitude" => $lat,
                "longitude" => $lng,
                "radius" => $radius,
                "city" => $name
            ]
        ];

        $response = $this->eventByDestinationPerformerVenue($body);

        return view('event', [
            'type' => 'destination',
            'cityInfo' => $body,
            'events' => $response['data']['results']
        ]);
    }

    public function searchTickets($id) 
    {
        $response = $this->getTickets([
            "eventId" => $id
        ]);

        return view('show-tickets', [
            'id' => $id,
            'eventDetails' => $response['data']['event'],
            'tickets' => $response['data']['results']
        ]);
    }

    public function searchHotel($start, $end, $lat, $lng, $radius, $city, $rooms, $adults, $children)
    {
        $body = [
            "startDate" => $start,
            "endDate" => $end,
            "destination" => [
                "latitude" => $lat,
                "longitude" => $lng,
                "radius" => $radius,
                "city" => $city
            ],
            "occupancies" => [
                [
                    "rooms" => $rooms,
                    "adults" => $adults,
                    "children" => $children
                ]
            ]
        ];

        $response = $this->searchHotelsByDestination($body);

        return view('hotels', [
            'search' => $body,
            'hotels' => $response['data']['results']
        ]);
    }

    public function redirectSearchHotel(Request $request, $lat, $lng, $radius, $city) 
    {
        return \Redirect::action([EventController::class, 'searchHotel'], [
            'start' => $request->start, 
            'end' => $request->end, 
            'lat' => $lat, 
            'lng' => $lng, 
            'radius' => $radius, 
            'city' => $city, 
            'rooms' => $request->rooms, 
            'adults' => $request->adults, 
            'children' => $request->children
        ]);
    }

    public function buyTickets(Request $request, $idTicket, $idEvent) 
    {
        $response = $this->getTickets([
            "eventId" => $idEvent
        ]);

        return view('success-tickets', [
            'event' => $response['data']['event'],
            'quantity' => $request->quantity,
            'idTicket' => $idTicket,
            'idEvent' => $idEvent
        ]);
    }

    public function reserveRoom($name, $city, $area, $cost, $nights)
    {
        return view('success-reservation', [
            'name' => $name,
            'city' => $city,
            'area' => $area,
            'cost' => $cost,
            'nights' => $nights
        ]);
    }
}
