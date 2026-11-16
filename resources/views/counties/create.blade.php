@extends('layout')

@section('content')
    
<h1>{{ __('texts.create-county') }}</h1>

<a href="{{ route('counties.index') }}">{{ __('buttons.back') }}</a>

<form action="{{ route('counties.store') }}" method="post" class="form-style">
    @csrf
    <fieldset>
        <label for="name">{{ __('counties.name') }}</label>
        <input type="text" name="name" id="name">
    </fieldset>
    <fieldset>
        <label for="badge_url">{{ __('counties.badge') }} url</label>
        <input type="text" name="badge_url" id="badge_url">
    </fieldset>

    <button type="submit">{{ __('buttons.save') }}</button>
</form>

@endsection