<!DOCTYPE html>
<html lang="en">
<head>
    @include('Frontend.Layouts.head')
</head>
<body>
    @include('Frontend.Layouts.header')
    @yield('main-content')
    @include('Frontend.Layouts.footer')
</body>
</html>