<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layout.head')

<body>
<div class="preloader">
    <div class="preloader__row">
        <div class="preloader__item"></div>
        <div class="preloader__item"></div>
    </div>
</div>
<div class="wrapper">

    @include('layout.header')

    @yield('content')

    @include('layout.footer')

    @include('layout.modal')

</div>
</body>
</html>
