<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script>var base_url = "{{ url('/') }}";</script>

    <script src="js/extensions/jquery.min.js"></script>
    <script src="js/system/apps.js"></script>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/site.css">
    <link rel="stylesheet" href="css/extensions/content/site.css">
</head>
<body>
<header class="navbar navbar-header navbar-expand-sm js-navbar" data-qa-selector="navbar">
    <a class="sr-only gl-accessibility" href="#content-body" tabindex="1">Skip to content</a>
    <div class="container-fluid">
        <div class="header-content">
            <div class="title-container">

    
            </div>
            <div class="navbar-collapse collapse">

            </div>

        </div>
    </div>
</header>

<div class="layout-page page-with-contextual-sidebar">
    <div class="nav-sidebar">
        <div class="nav-sidebar-inner-scroll">
            <ul class="sidebar-top-level-items">
                <li class="active">
                    <a href="{{ route('dashboard') }}">Dashboard</a> 
                    {{-- {{ route('Dashboard') }}
                    {{ route('Unit') }}
                    {{ route('Goods') }} --}}
                </li>
                <li>
                    <a href="{{ route('pos') }}">POS</a>
                </li>
                <li>
                    <a href="#" aria-expanded='false'>123456</a>
                    <ul style="display: none;">
                        <li>
                            <a href="">Unit</a>
                        </li>
                        <li>
                            <a href="">Goods</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
        
    <div class="content-wrapper">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>