@extends('layout')

@section('content')
    
<h1>{{ __('texts.create-city') }}</h1>

<a href="{{ route('cities.index') }}">{{ __('buttons.back') }}</a>

<form action="{{ route('cities.store') }}" method="post" class="form-style">
    @csrf
    <fieldset>
        <label for="name">{{ __('cities.city') }}</label>
        <input type="text" name="name" id="name">
    </fieldset>
    <fieldset>
        <label for="zip_code">{{ __('cities.zip_code') }}</label>
        <input type="number" name="zip_code" id="zip_code" min="1000" max="9999">
    </fieldset>
    <fieldset>
        <label for="population">{{ __("cities.population") }}</label>
        <input type="number" name="population" id="population">
    </fieldset>
    <fieldset>
        <label for="county_id">{{ __("counties.name") }}</label>
        <select name="county_id" id="county_id">
            @foreach ($counties as $county)
                <option value="{{ $county->id }}">{{ $county->name }}</option>
            @endforeach
        </select>
    </fieldset>

    <button type="submit">{{ __('buttons.save') }}</button>
</form>

@endsection