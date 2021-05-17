<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@php
    $source = \Request::get('utm_source');
    $medium = \Request::get('utm_medium');
    $campaign = \Request::get('utm_campaign');
    $content = \Request::get('utm_content');
    $term = \Request::get('utm_term');

    $source != null ? session('utm_source', $source) : null;
    $medium != null ? session('utm_medium', $medium) : null;
    $campaign != null ? session('utm_campaign', $campaign) : null;
    $content != null ? session('utm_content', $content) : null;
    $term != null ? session('utm_term', $term) : null;
@endphp

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="auth" content="{{ auth()->user() ? 'true' : 'false' }}">

    <title>{{ $title }}</title>

    <meta name="description" content="">
    <meta name="keywords" content="">

    @if (str_contains(url()->current(), 'admin'))
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
            integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    @endif

    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <link rel="shortcut icon" href="/favicon.png" type="image/png">
</head>

<body>
    @yield('content')

    <!-- Inputs -->
    <input type="hidden" name="referer" value="{{ \Request::server('HTTP_REFERER') }}">
    <input type="hidden" name="ref_url" value="{{ url()->current() }}">
    <input type="hidden" name="user_agent" value="{{ \Request::server('HTTP_USER_AGENT') }}">
    <input type="hidden" name="user_ip" value="{{ \Request::server('REMOTE_ADDR') }}">
    <input type="hidden" class="formname" name="formname" value="">
    <input type="hidden" name="lang_script" value="{{ str_replace('_', '-', app()->getLocale()) }}">
    <input type="hidden" name="source" value="{{ session('utm_source') }}">
    <input type="hidden" name="medium" value="{{ session('utm_medium') }}">
    <input type="hidden" name="campaign" value="{{ session('utm_campaign') }}">
    <input type="hidden" name="content" value="{{ session('utm_content') }}">
    <input type="hidden" name="term" value="{{ session('utm_term') }}">
    <!-- Inputs -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/uuid/8.1.0/uuidv4.min.js"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script type="text/javascript">
        (function(e,t,o,n,p,r,i){e.visitorGlobalObjectAlias=n;e[e.visitorGlobalObjectAlias]=e[e.visitorGlobalObjectAlias]||function(){(e[e.visitorGlobalObjectAlias].q=e[e.visitorGlobalObjectAlias].q||[]).push(arguments)};e[e.visitorGlobalObjectAlias].l=(new Date).getTime();r=t.createElement("script");r.src=o;r.async=true;i=t.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)})(window,document,"https://diffuser-cdn.app-us1.com/diffuser/diffuser.js","vgo");
        vgo('setAccount', '476727267');
        vgo('setTrackByDefault', true);
    
        vgo('process');
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-196309627-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-196309627-1');
    </script>

</body>

</html>
