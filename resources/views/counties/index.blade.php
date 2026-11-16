@extends('layout')

@section('content')

<h1>{{ __('counties.title') }}</h1>

@if (session('edit-error'))
    <div class="error-message">{{  __('messages.edit-error') }}</div>
@endif

@if (session('edit-success'))
    <div class="success-message">{{  __('messages.edit-success') }}</div>
@endif

@if (session('delete-error'))
    <div class="error-message">{{  __('messages.delete-error') }}</div>
@endif

@if (session('delete-success'))
    <div class="success-message">{{  __('messages.delete-success') }}</div>
@endif

<a href="{{ route('counties.create') }}">{{ __('texts.create-county') }}</a>
<table class="table-datas">
    <tr>
        <th>#</th>
        <th>{{ __('counties.name') }}</th>
        <th>{{ __('counties.badge') }}</th>
        <th colspan="3">{{ __('buttons.tools') }}</th>
    </tr>
    @foreach ($counties as $county)
        <tr>
            <td>{{ $county->id }}</td>
            <td>{{ $county->name }}</td>
            <td><img src="{{$county->badge_url}}" alt="{{$county->name}} {{ __('counties.badge') }}" width="20px"></td>
            <td><a href="{{ route('counties.edit', $county->id) }}">{{ __('buttons.edit') }}</a></td>
            <td><a href="{{ route('counties.show', $county->id) }}">{{ __('buttons.show') }}</a></td>
            <td>
                <form action="{{ route('counties.destroy', $county->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit">{{ __('buttons.delete') }}</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
    
@endsection