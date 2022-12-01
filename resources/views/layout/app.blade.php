<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layout.head')

<body>
<div class="wrapper">

    @include('layout.header')

    @yield('content')

    @include('layout.footer')

</div>
</body>

</html>
