@extends('layout')

@section('content')

<a href="{{ route('cities.index') }}">{{ __('buttons.back') }}</a>

<h1>{{ $city->name }}</h1>

<table class="table-datas">
    <tr>
        <th>ID</th>
        <td>{{ $city->id }}</td>
    </tr>
    <tr>
        <th>{{ __('cities.city') }}</th>
        <td>{{ $city->name }}</td>
    </tr>
    <tr>
        <th>{{ __('cities.zip_code') }}</th>
        <td>{{ $city->zip_code }}</td>
    </tr>
    <tr>
        <th>{{ __('cities.population') }}</th>
        <td>{{ $city->population }}</td>
    </tr>
</table>

<h3>{{ $city->county->name }} {{ __('counties.name') }}</h3>

<table class="table-datas">
    <tr>
        <th>ID</th>
        <td>{{ $city->county->id }}</td>
    </tr>
    <tr>
        <th>{{ __('counties.name') }}</th>
        <td>{{ $city->county->name }}</td>
    </tr>
    <tr>
        <th>{{ __('counties.badge') }} url</th>
        <td>{{ $city->county->badge_url }}</td>
    </tr>
    <tr>
        <th rowspan="2">{{ __('counties.badge') }}</th>
    </tr>
    <tr>
        <td rowspan="2">
            <img src="{{ $city->county->badge_url }}" alt="{{ $city->county->name }} {{ __('counties.badge') }}" width="50px">
        </td>
    </tr>
</table>
    
@endsection