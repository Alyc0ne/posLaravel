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
    <script src="js/system/design.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/design.css">
    <link rel="stylesheet" href="css/extensions/content/site.css">
    <link rel="stylesheet" href="css/extensions/font-awesome/all.min.css">
</head>
<body>
<div class='window-overlay'>
    <div class="lds-ripple">
        <div></div>
        <div></div>
    </div>
</div>
<div class="alertNotification">
    @extends('Shared.Alert')
</div>
<header class="navbar navbar-header navbar-expand-sm js-navbar" data-qa-selector="navbar">
    <a class="sr-only gl-accessibility" href="#content-body" tabindex="1">Skip to content</a>
    <div class="container-fluid">
        <div class="header-content">
            <div class="title-container">
                <div class='title'>
                        <svg width="30px" height="41px" viewBox="0 0 40 41" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <!-- Generator: Sketch 41 (35326) - http://www.bohemiancoding.com/sketch -->
                            <title>Logo small</title>
                            <desc>Created with Sketch.</desc>
                            <defs></defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="API-landing-Copy" transform="translate(-20.000000, -15.000000)" fill="#FFFFFF">
                                    <g id="Navbar">
                                        <g id="Logo-small" transform="translate(20.000000, 15.000000)">
                                            <path d="M8.85313433,19.9629851 C8.74447761,20.5038806 8.68477612,21.0597015 8.68477612,21.6256716 C8.68477612,26.9474627 13.6710448,31.2591045 19.8226866,31.2591045 C25.9743284,31.2591045 30.960597,26.9474627 30.960597,21.6256716 C30.960597,21.0602985 30.9002985,20.5038806 30.7916418,19.9629851 C28.48,17.5928358 24.4328358,16.0173134 19.8226866,16.0173134 C15.2119403,16.0173134 11.1647761,17.5928358 8.85313433,19.9629851 L8.85313433,19.9629851 Z M25.0985075,22.4662687 C25.0985075,25.3808955 22.7367164,27.7414925 19.8226866,27.7414925 C16.9092537,27.7414925 14.5468657,25.3808955 14.5468657,22.4662687 C14.5468657,21.7361194 14.6949254,21.041194 14.9635821,20.4083582 C15.2632836,21.2668657 16.078806,21.88 17.038209,21.88 C18.2531343,21.88 19.2364179,20.8973134 19.2364179,19.681791 C19.2364179,18.7223881 18.6220896,17.9068657 17.7653731,17.6065672 C18.3976119,17.3391045 19.0931343,17.1898507 19.8226866,17.1898507 C22.7361194,17.1898507 25.0985075,19.5528358 25.0985075,22.4662687 L25.0985075,22.4662687 Z" id="Shape"></path>
                                            <path d="M19.8226866,0 C7.11940299,4.64477612 -1.97671642,19.1337313 0.369552239,33.7677612 C0.369552239,33.7677612 7.96119403,40.5970149 19.8220896,40.5970149 C31.6835821,40.5970149 39.2746269,33.7677612 39.2746269,33.7677612 C41.6208955,19.1337313 32.5259701,4.64477612 19.8226866,0 L19.8226866,0 Z M36.5761194,32.1385075 C36.5761194,32.1385075 33.7916418,34.5008955 29.5910448,35.8131343 C29.4310448,35.8638806 29.2447761,35.8674627 29.0770149,35.7695522 C28.8322388,35.6268657 28.7659701,35.3391045 28.9116418,35.0871642 C28.9355224,35.0465672 29.0035821,34.9647761 29.0692537,34.9110448 C30.0776119,34.081791 30.921194,33.0489552 31.6125373,31.8513433 C32.8501493,29.7068657 33.3032836,27.3271642 33.0608955,25.039403 L33.0585075,25.0346269 C32.3402985,28.7325373 30.0829851,32.1104478 26.5647761,34.1426866 C19.0853731,38.4597015 9.65910448,37.3253731 3.07044776,32.1397015 C3.07044776,32.1397015 2.4161194,28.5462687 3.37970149,24.2525373 C3.4161194,24.0895522 3.50626866,23.9253731 3.67522388,23.8304478 C3.92179104,23.6883582 4.20298507,23.7743284 4.3480597,24.0274627 C4.37253731,24.0680597 4.40895522,24.1683582 4.42268657,24.2513433 C4.6358209,25.5385075 5.1080597,26.7850746 5.8,27.9838806 C7.03820896,30.1277612 8.87343284,31.7098507 10.9743284,32.6441791 C9.87641791,31.6895522 8.91462687,30.5391045 8.14626866,29.2071642 C6.85074627,26.9635821 6.27462687,24.5038806 6.3438806,22.0913433 C6.50567164,13.6107463 12.1486567,6.18925373 19.8220896,3.12119403 C19.8220896,3.12119403 23.2608955,4.35223881 26.4979104,7.33253731 C26.6214925,7.44656716 26.7170149,7.60716418 26.7164179,7.80059701 C26.7146269,8.08477612 26.5002985,8.28537313 26.2083582,8.28537313 C26.160597,8.28537313 26.0555224,8.26686567 25.9761194,8.23820896 C24.7540299,7.77850746 23.438806,7.56358209 22.0555224,7.56358209 C19.5797015,7.56358209 17.2913433,8.36238806 15.4328358,9.7158209 L15.4304478,9.71820896 C19.321791,8.3719403 23.558806,8.91223881 26.9498507,11.0185075 C34.1707463,15.4101493 37.7528358,23.9832836 36.5761194,32.1385075 L36.5761194,32.1385075 Z" id="Shape"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                </div>
            </div>
            <div class="navbar-collapse collapse">
                <div class="dropdown">
                    <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="p_r5">
                                {{ Auth::user()->name }} 
                            </div>
                            <i class="fas fa-caret-down"></i>
                    </button>
                    <div class="dropdown-menu dropdown-Profile" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item disabled" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>

<div class="layout-page page-with-contextual-sidebar">
    <div class="nav-sidebar">
        <div class="nav-sidebar-inner-scroll">
            <ul class="sidebar-top-level-items">
                <li>
                    <a href="{{ route('dashboard') }}">Dashboard</a> 
                </li>
                <li>
                    <a href="{{ route('pos') }}">POS</a>
                </li>
                <li>
                    <a href="{{ route('unit') }}">Unit</a>
                </li>
                <li>
                    <a href="{{ route('goods') }}">Goods</a>
                </li>
            </ul>
        </div>
    </div>
        
    <div class="content-wrapper">
        <div class="mobile-overlay"></div>
        <div class="container-fluid">
            <div class='block-menu'>
                <div class='row'>
                    <div class="col-md-12 col-lg-6 d-flex">
                        <button name="button" type="button" class="toggle-mobile-nav"><span class="sr-only">Open sidebar</span>
                            <i aria-hidden="true" data-hidden="true" class="fa fa-bars"></i>
                        </button> 
                    </div>
                    <div class="col-md-12 col-lg-6 d-inline-flex flex-wrap justify-content-lg-end" id='menuRight'>
                        
                    </div>
                </div>
                {{-- <button name="button" type="button" class="toggle-mobile-nav"><span class="sr-only">Open sidebar</span>
                    <i aria-hidden="true" data-hidden="true" class="fa fa-bars"></i>
                </button>
                <button type="button" class="btn btn-success" onclick="javascript:ShowModalGoods();">New Goods</button> --}}
            </div>
            @yield('content')
        </div>
    </div>
</div>
<div class='ExtendsModal'>
    @extends('Shared.Modal.Goods.AddGoods')
    @extends('Shared.Modal.Unit.AddUnit')
</div>

</body>
</html>

<script>
$(document).ready(function() {
    $('.unitGoods').select2();
});
</script>