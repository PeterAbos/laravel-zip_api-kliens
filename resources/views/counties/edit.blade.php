@extends('layout')

@section('content')
    
<h1>{{ $county->name }} {{ __('texts.edit') }}</h1>

<a href="{{ route('counties.index') }}">{{ __('buttons.back') }}</a>

<form action="{{ route('counties.update', $county->id) }}" method="get" class="form-style">
    @csrf
    @method('PUT')
    <fieldset>
        <label for="name">{{ __('counties.name') }}</label>
        <input type="text" name="name" id="name" value="{{ old( 'name', $county->name ) }}">
    </fieldset>
    <fieldset>
        <label for="badge_url">{{ __('counties.badge') }} url</label>
        <input type="text" name="badge_url" id="badge_url" value="{{ old( 'badge_url', $county->badge_url ) }}">
    </fieldset>

    <button type="submit">{{ __('buttons.save') }}</button>
</form>

@endsection