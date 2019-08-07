<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">

    <meta property="og:site_name" content="{{ $websiteTitle }}">
    <meta property="og:title" content="@yield('ogTitle')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ URL::full() }}">
    <meta property="og:image" content="@yield('image')">

    <link href="{{ App::environment('production') ? mix('css/public.css') : asset('css/public.css') }}" rel="stylesheet">

    @include('core::public._feed-links')

    @stack('css')

    @if (app()->environment('production') and config('typicms.google_analytics_code'))

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('typicms.google_analytics_code') }}"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '{{ config('typicms.google_analytics_code') }}');
    </script>

    @endif

</head>

<body ontouchstart="" class="body-{{ $lang }} @yield('bodyClass') @if ($navbar)has-navbar @endif">

    @include('core::public._google_tag_manager_code')

    @section('skip-links')
    <a href="#main" class="skip-to-content">@lang('db.Skip to content')</a>
    <a href="#site-nav" class="d-block d-md-none btn-offcanvas" data-toggle="offcanvas" title="@lang('db.Open navigation')" aria-label="@lang('db.Open navigation')" role="button" aria-controls="navigation" aria-expanded="false"><span class="fa fa-bars fa-fw" aria-hidden="true"></span></a>
    @show

{{--    @include('core::_navbar')--}}

    <section class="navbar navbar-expand-md navbar-dark bg-dark justify-content-between sticky-top m-b-3">
        <div class="container">
            <div class="navbar-brand">
                @section('site-title')
                    <div class="site-title">@include('core::public._site-title')</div>
                @show
            </div>
            <div class="pull-xs-right">
                @section('site-nav')
                    <nav class="site-nav" id="site-nav">
                        @menu('main')
                    </nav>
                @show
            </div>
        </div>
    </section>

    @section('site-header')
        <header class="site-header">
            <div class="container">
                <div class="container text-center">
                    <h1 class="display-3">Bootstrap 4</h1>
                    <p class="lead">This is a simple Bootstrap 4 template for TypiCMS</p>
                    <p>It supports several useful features right out of the box. All you have to do is to put it to work</p>
                </div>
                <p class="site-baseline">{{ TypiCMS::baseline() }}</p>
            </div>
        </header>
    @show

    <div class="site-container">
        <div class="sidebar-offcanvas">

            <button class="d-block d-md-none btn-offcanvas btn-offcanvas-close" data-toggle="offcanvas" title="@lang('db.Close navigation')" aria-label="@lang('db.Close navigation')"><span class="fa fa-close fa-fw" aria-hidden="true"></span></button>

            @section('lang-switcher')
                @include('core::public._lang-switcher')
            @show

        </div>

        <main class="main" id="main">
            @yield('content')
        </main>

        @section('site-footer')
        <footer class="site-footer">
            <nav class="social-nav">
                @menu('social')
            </nav>
            <nav class="footer-nav">
                @menu('footer')
            </nav>
        </footer>
        @show

    </div>

    <script src="{{ App::environment('production') ? mix('js/public.js') : asset('js/public.js') }}"></script>
    @if (request('preview'))
    <script src="{{ asset('js/previewmode.js') }}"></script>
    @endif

    @stack('js')

</body>

</html>
