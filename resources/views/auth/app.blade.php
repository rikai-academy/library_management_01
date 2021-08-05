<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('auth.head')
<body>
    <div id="app">
        @include('auth.menu')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
