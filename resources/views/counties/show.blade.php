@extends('layout')

@section('content')

<a href="{{ route('counties.index') }}">{{ __('buttons.back') }}</a>


<h1>{{ $county->name }}</h1>

<table class="table-datas">
    <tr>
        <th>ID</th>
        <td>{{ $county->id }}</td>
    </tr>
    <tr>
        <th>{{ __('counties.name') }}</th>
        <td>{{ $county->name }}</td>
    </tr>
    <tr>
        <th>{{ __('counties.badge') }} url</th>
        <td>{{ $county->badge_url }}</td>
    </tr>
    <tr>
        <th rowspan="2">{{ __('counties.badge') }}</th>
    </tr>
    <tr>
        <td rowspan="2">
            <img src="{{ $county->badge_url }}" alt="{{ $county->name }} {{ __('counties.badge') }}" width="50px">
        </td>
    </tr>
</table>
    
@endsection