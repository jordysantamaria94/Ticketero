<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Traits\API;

class HomeController extends Controller
{
    use API;

    public function index() 
    {
        return View('welcome', [
            'search' => '',
            'response' => []
        ]);
    }

    public function search(Request $request) 
    {
        $response = $this->searchAutocomplete([
            "q" => $request->search,
            "limit" => "10"
        ]);

        $searchResults = [];

        if ($response['success']) 
        {
            $searchResults = $response["data"]["results"];
        }

        return View('welcome', [
            'search' => $request->search,
            'response' => $searchResults
        ]);
    }
}
