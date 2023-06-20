<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>megacourse</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    
</head>
<style>
.nav-edit{
    
}
.header-edit{
    background:#4b4344;
}
.tittle-edit{
    color:white;
}
</style>
<body class="trans-t h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="header-edit py-6 ">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="/course" class="tittle-edit text-lg font-bold  no-underline">
                        megacourse
                    </a>
                </div>
                <nav class="nav-edit space-x-4 text-black-500  text-sm sm:text-base">
                @auth
                <a class="tittle-edit no-underline hover:underline" href="/course">Course</a>
                <a class="tittle-edit no-underline hover:underline" href="/profile">Profile</a>
                @endauth    
                @guest
                        <a class="tittle-edit no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        
                        @if (Route::has('register'))
                            <a class="tittle-edit no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                        
                    @else
                        <span class="tittle-edit">{{ Auth::user()->name }}</span>

                        <a href="{{ route('logout') }}"
                           class="tittle-edit no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class=" hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header>

        @yield('content')
    </div>
</body>
</html>
