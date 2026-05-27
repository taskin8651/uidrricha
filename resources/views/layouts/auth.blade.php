<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@php
    try {
        $websiteSetting = \App\Models\WebsiteSetting::with('media')->first();
    } catch (\Throwable $exception) {
        $websiteSetting = null;
    }

    $siteName = $websiteSetting->site_name ?? trans('panel.site_title');
    $faviconUrl = $websiteSetting?->getFirstMediaUrl('site_favicon') ?: asset('favicon.ico');
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title', $siteName . ' Admin')</title>
    <link rel="icon" href="{{ $faviconUrl }}">

    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Manrope', sans-serif;
            background: #fffbff;
        }
    </style>

    @yield('styles')
</head>

<body>
    @yield('content')
    @yield('scripts')
</body>
</html>
