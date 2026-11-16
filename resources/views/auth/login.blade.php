@extends('layout')

@section('content')
    

<h2>{{ __('messages.login') }}</h2>

<form action="{{ route('login') }}" method="post">
    @csrf
    <fieldset>
        <label for="email">{{ __('auth.email') }}</label>
        <input type="text" name="email" id="email">
    </fieldset>
    <fieldset>
        <label for="password">{{ __('auth.password') }}</label>
        <input type="text" name="password" id="password">
    </fieldset>
    <button type="submit">{{ __('auth.submit') }}</button>
</form>

@endsection