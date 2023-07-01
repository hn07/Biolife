<!DOCTYPE html>
<html lang="en">
<head>
    @include('Frontend.Layouts.head')
</head>
<body onload="time()">
    @include('Frontend.Layouts.header')
    @yield('main-content')
    @include('Frontend.Layouts.footer')
    @yield('scripts')
</body>
</html>