<head>
    @if(request()->is('/'))
        <title>{{ $site_name }}</title>
    @else
        <title>@yield('title') — {{ $site_name }}</title>
    @endif
    <meta charset="UTF-8"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="@yield('description')"/>
    <meta property="og:title" content="@yield('title')"/>
    <meta property="og:image" content="@yield('image')"/>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png"/>
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png"/>
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png"/>
    <link rel="manifest" href="/site.webmanifest"/>

    @vite('resources/js/app.js')
</head>
