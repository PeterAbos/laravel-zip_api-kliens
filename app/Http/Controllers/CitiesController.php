<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = "/cities";

        $response = Http::api()->get($url);

        if ($response->failed()) {
            return redirect()
                ->route('cities.index')
                ->with('error', "Hiba történt az adatok lekérdezése során.");
        }

        $cities = $this->getCities($response);

        return view('cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function getCities($response)
    {
        $body = json_decode($response->body(), false);
        return $body->cities ?? [];
    }

    private function getCity($response)
    {
        $body = json_decode($response->body(), false);
        return $body ?? null;
    }
}
