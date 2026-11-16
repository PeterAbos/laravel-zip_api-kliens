<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CountiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = '/counties';

        $response = Http::api()->get($url);

        if ($response->failed()) {
            return redirect()
                ->route('counties.index')
                ->with('error', 'Hiba történt az adatok lekérdezése során.');
        }

        $counties = $this->getCounties($response);

        return view('counties.index', compact('counties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('counties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $url = "/counties";

        $response = Http::api()
            ->withToken(session('api_token'))
            ->post($url, $request->all());

        if ($response->failed()) {
            return redirect()->route('counties.index');
        }

        return redirect()->route('counties.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $url = "/counties/$id";

        $response = Http::api()->get($url);

        if ($response->failed()) {
            return redirect()
                ->route('counties.index')
                ->with('error', 'Hiba történt az adatok lekérdezése során.');
        }

        $county = $this->getCounty($response);

        return view('counties.show', compact('county'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $url = "/counties/$id";

        $response = Http::api()->get($url);

        if ($response->failed()) {
            return redirect()
                ->route('counties.index')
                ->with('error', "Hiba történt az adatok lekérdezése során.");
        }

        $county = $this->getCounty($response);

        return view('counties.edit', compact('county'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $url = "/counties/$id";

        $response = Http::api()
            ->withToken(session('api_token'))
            ->put($url, $request->all());

        if ($response->failed()) {
            return redirect()->route('counties.index');
        }
        
        return redirect()->route('counties.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $url = "/counties/$id";

        $response = Http::api()
            ->withToken(session('api_token'))
            ->delete($url);

        if ($response->failed()) {
            return redirect()->route('counties.index')->with('delete-error');
        }

        return redirect()->route('counties.index')->with('delete-success');
    }

    private function getCounties($response)
    {
        $body = json_decode($response->body(), false);
        return $body->counties ?? [];
    }

    private function getCounty($response)
    {
        $body = json_decode($response->body(), false);
        return $body->county ?? null;
    }
}
