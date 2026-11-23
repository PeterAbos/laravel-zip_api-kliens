<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>API KLIENS</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <select id="lang-switcher">
            <option value="hu" {{ session('locale') == 'hu' ? 'selected' : '' }}>HU</option>
            <option value="en" {{ session('locale') == 'en' ? 'selected' : '' }}>EN</option>
        </select>
        <a href="{{  route('/') }}" class="nav-buttons">{{ __('headers.home') }}</a>
        <a href="{{ route('counties.index') }}" class="nav-buttons">{{ __('counties.title') }}</a>
        <a href="{{ route('cities.index') }}" class="nav-buttons">{{ __('cities.title') }}</a>

        @if (session('api_token'))
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="nav-buttons">{{ __('messages.logout') }}</button>
            </form>
        @else
            <a href="{{ route('login') }}"><button class="nav-buttons">{{ __('messages.login') }}</button></a>
        @endif

    </header>
    <main>
        @yield('content')
    </main>
    <footer></footer>
</body>
<script src="js/language.js"></script>
</html>