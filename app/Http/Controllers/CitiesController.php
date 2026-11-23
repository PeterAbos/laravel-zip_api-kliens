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
                ->with('error', __('messages.load-error'));
        }

        $cities = $this->getCities($response);

        return view('cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $url = "/counties";

        $response = Http::api()->get($url);

        if ($response->failed()) {
            return redirect()
                ->route('cities.index')
                ->with('error', __('messages.load-error'));
        }

        $counties = $this->getCounties($response);

        return view('cities.create', compact('counties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $url = "/cities";

        $response = Http::api()
            ->withToken(session('api_token'))
            ->post($url, $request->all());

        if ($response->failed()) {
            return redirect()->route('cities.index')->with('error', __('messages.create-error'));
        }

        return redirect()->route('cities.index')->with('success', __('messages.create-success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $url = "/cities/$id";

        $response = Http::api()->get($url);

        if ($response->failed()) {
            return redirect()
                ->route('cities.index')
                ->with('error', __('messages.load-error'));
        }

        $city = $this->getCity($response);

        return view('cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $url = "/cities/$id";

        $response = Http::api()->get($url);

        if ($response->failed()) {
            return redirect()
                ->route('cities.index')
                ->with('error', __('messages.load-error'));
        }

        $city = $this->getCity($response);

        $url = "/counties";

        $response = Http::api()->get($url);

        if ($response->failed()) {
            return redirect()
                ->route('cities.index')
                ->with('error', __('messages.load-error'));
        }

        $counties = $this->getCounties($response);

        return view('cities.edit', compact('city', 'counties'));
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

    private function getCounties($response)
    {
        $body = json_decode($response->body(), false);
        return $body->counties ?? [];
    }
}
