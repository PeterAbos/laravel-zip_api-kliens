@extends('layout')

@section('content')

<h1>Városok</h1>

@if (session('error'))
    <div class="error-message">{{ session('error') }}</div>
@endif

@if (session('success'))
    <div class="success-message">{{ session('success') }}</div>
@endif

<a href="{{ route('cities.create') }}">{{ __('texts.create-city') }}</a>

<div class="search-bar">
    <form method="get" action="{{ route('cities.index') }}" class="search-form">
      <select name="county" id="county">
        <option value="" {{ request('county') ? "" : "selected" }}> --- </option>
        @foreach ($counties as $county)
            <option value="{{ $county->id }}" {{ $county->id == request('county') ? "selected" : "" }}>{{ $county->name }}</option>
        @endforeach
      </select>
      <input type="search" name="search" value="{{ request('search') }}" placeholder="Keresés">
      <button type="submit" title="Keres">Keres</button>
    </form>
</div>

<table class="table-datas">
    <tr>
        <th>#</th>
        <th>{{ __('cities.city') }}</th>
        <th>{{ __('cities.zip_code') }}</th>
        <th>{{ __('cities.population') }}</th>
        <th>{{ __('counties.name') }}</th>
        <th colspan="3">{{ __('buttons.tools') }}</th>
    </tr>
    @foreach ($cities as $city)
        <tr>
            <td>{{ $city->id }}</td>
            <td>{{ $city->name }}</td>
            <td>{{ $city->zip_code }}</td>
            <td>{{ $city->population }}</td>
            <td>{{ $city->county->name }}</td>
            <td><a href="{{ route('cities.edit', $city->id) }}">{{ __('buttons.edit') }}</a></td>
            <td><a href="{{ route('cities.show', $city->id) }}">{{ __('buttons.show') }}</a></td>
            <td>
                <form action="{{ route('cities.destroy', $city->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit">{{ __('buttons.delete') }}</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
    
@endsection