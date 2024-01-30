<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait API 
{
    private $base = "https://sandbox.ticketero.co/api/v2/";
    private $token = "14|ELCGEwTcPCH3ZfROWjKpFRinCswiZMFyssr1i6hb";

    private function headers() 
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.$this->token
        ];
    }

    private function getHttp($url, $body)
    {
        return Http::withHeaders($this->headers())->get($this->base.$url, $body);
    }

    private function postHttp($url, $body) 
    {
        return Http::withHeaders($this->headers())->post($this->base.$url, $body);
    }

    public function eventByDestinationPerformerVenue($body) 
    {
        $response = $this->getHttp("search/events", $body);
        return json_decode($response->body(), true);
    }

    public function getEventByID($body) 
    {
        $response = $this->getHttp("search/event", $body);
        return json_decode($response->body(), true);
    }

    public function ticketsForMap($body) 
    {
        $response = $this->getHttp("search/ticketsMap", $body);
        return json_decode($response->body(), true);
    }

    public function getMap($body) 
    {
        $response = $this->getHttp("search/map", $body);
        return json_decode($response->body(), true);
    }

    public function getTickets($body) 
    {
        $response = $this->getHttp("search/tickets", $body);
        return json_decode($response->body(), true);
    }

    public function getTicket($body) 
    {
        $response = $this->getHttp("search/ticket", $body);
        return json_decode($response->body(), true);
    }

    public function getPurchasableQtyByTg($bitMap) 
    {
        $response = $this->getHttp("splits/".$bitMap, []);
        return json_decode($response->body(), true);
    }

    public function searchHotelsByDestination($body) 
    {
        $response = $this->getHttp("search/hotels", $body);
        return json_decode($response->body(), true);
    }

    public function getHotel($body) 
    {
        $response = $this->getHttp("search/hotel", $body);
        return json_decode($response->body(), true);
    }

    public function getRoom($body) 
    {
        $response = $this->getHttp("search/room", $body);
        return json_decode($response->body(), true);
    }

    public function getAirportSuggest($body) 
    {
        $response = $this->getHttp("airports/suggest", $body);
        return json_decode($response->body(), true);
    }

    public function getAirportByID($id, $body) 
    {
        $response = $this->getHttp("airport/".$id, $body);
        return json_decode($response->body(), true);
    }

    public function performersSuggest($body) 
    {
        $response = $this->getHttp("performers/suggest", $body);
        return json_decode($response->body(), true);
    }

    public function venuesSuggest($body) 
    {
        $response = $this->getHttp("venues/suggest", $body);
        return json_decode($response->body(), true);
    }

    public function createNewTicketOrderOrHotelOrder($body) 
    {
        $response = $this->postHttp("orders/create", $body);
        return json_decode($response->body(), true);
    }

    public function createLockTicket($body) 
    {
        $response = $this->postHttp("orders/lock", $body);
        return json_decode($response->body(), true);
    }

    public function cancelHotelOrder($body) 
    {
        $response = $this->postHttp("orders/cancel", $body);
        return json_decode($response->body(), true);
    }

    public function getCountries($body) 
    {
        $response = $this->getHttp("orders/countries", $body);
        return json_decode($response->body(), true);
    }

    public function getCitiesSuggest($body) 
    {
        $response = $this->getHttp("cities/suggest", $body);
        return json_decode($response->body(), true);
    }

    public function getCityByID($id, $body) 
    {
        $response = $this->getHttp("cities/".$id, $body);
        return json_decode($response->body(), true);
    }

    public function getUserInfo($body) 
    {
        $response = $this->getHttp("user", $body);
        return json_decode($response->body(), true);
    }

    public function searchAutocomplete($body) 
    {
        $response = $this->getHttp("search/autocomplete", $body);
        return json_decode($response->body(), true);
    }
}