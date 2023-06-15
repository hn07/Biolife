<!DOCTYPE html>
<html lang="en">
<head>
    @include('Frontend.Layouts.head_Admin')
</head>
<body onload="time()" class="app sidebar-mini rtl">
    @include('Frontend.Layouts.header_Admin')
    @yield('main-content')
    @include('Frontend.Layouts.footer_Admin')
</body>
</html>