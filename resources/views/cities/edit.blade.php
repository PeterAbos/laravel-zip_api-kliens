@extends('layout')

@section('content')
    
<h1>{{ $city->name }} {{ __('texts.edit') }}</h1>

<a href="{{ route('cities.index') }}">{{ __('buttons.back') }}</a>

<form action="{{ route('cities.store') }}" method="post" class="form-style">
    @csrf
    @method('PUT')
    <fieldset>
        <label for="name">{{ __('cities.city') }}</label>
        <input type="text" name="name" id="name" value="{{ old( 'name', $city->name ) }}">
    </fieldset>
    <fieldset>
        <label for="zip_code">{{ __('cities.zip_code') }}</label>
        <input type="number" name="zip_code" id="zip_code" min="1000" max="9999" value="{{ old( 'zip_code', $city->zip_code ) }}">
    </fieldset>
    <fieldset>
        <label for="population">{{ __("cities.population") }}</label>
        <input type="number" name="population" id="population" value="{{ old( 'population', $city->population ) }}">
    </fieldset>
    <fieldset>
        <label for="county_id">{{ __("counties.name") }}</label>
        <select name="county_id" id="county_id">
            @foreach ($counties as $county)
                <option value="{{ $county->id }}" {{ $county->id == $city->county_id ? "selected" : ""}}>{{ $county->name }}</option>
            @endforeach
        </select>
    </fieldset>

    <button type="submit">{{ __('buttons.save') }}</button>
</form>

@endsection