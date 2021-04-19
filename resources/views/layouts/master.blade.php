<!doctype html>
<html class="fixed">

<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>True Coffee - APP</title>
    <meta name="keywords" content="True Coffee, Nguyen chat" />
    <meta name="description" content="True Coffee APP">
    <meta name="author" content="L5 Admin Template" />
    <meta name="description" content="True Coffee">
    <!-- Favicons -->
    <link href="{{asset('resources/assets/images/true-coffee.ico')}}" rel="icon">
    <link href="{{asset('resources/assets/images/true-coffee.png')}}" rel="true-coffee-icon">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{URL::asset('resources/assets/vendor/bootstrap/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('resources/assets/vendor/font-awesome/css/font-awesome.css')}}" />
    <link rel="stylesheet" href="{{asset('resources/assets/vendor/magnific-popup/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('resources/assets/vendor/bootstrap-datepicker/css/datepicker3.css')}}" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{asset('resources/assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css')}}" />
    <link rel="stylesheet" href="{{asset('resources/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}" />
    <link rel="stylesheet" href="{{asset('resources/assets/vendor/morris/morris.css')}}" />
    <link rel="stylesheet" href="{{asset('resources/assets/vendor/pnotify/pnotify.custom.css')}}" />
    <link rel="stylesheet" href="{{asset('resources/assets/vendor/select2/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('resources/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('resources/assets/stylesheets/theme.css')}}" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{asset('resources/assets/stylesheets/skins/default.css')}}" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{asset('resources/assets/stylesheets/theme-custom.css')}}">

    <!-- Head Libs -->
    <script src="{{asset('resources/assets/vendor/modernizr/modernizr.js')}}"></script>

    <style>
        a:hover{
            text-decoration: none;
        }

        a:link{
            text-decoration: none;
        }

        .btn-float-bottom-right{
            position: fixed !important;
            right: 10px;
            bottom: 10px;
            border-radius: 50%;
            float: left !important;
            
        }

        .table > tbody > tr > td{
            vertical-align: middle;
        }

        /* --------- Loader --------- */
        #site-loader {
        position: fixed;
        width: 96px;
        height: 96px;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        background-color: rgba(255, 255, 255, 0.9);
        -webkit-box-shadow: 0px 24px 64px rgba(0, 0, 0, 0.24);
        box-shadow: 0px 24px 64px rgba(0, 0, 0, 0.24);
        border-radius: 16px;
        opacity: 0;
        visibility: hidden;
        -webkit-transition: opacity 0.2s ease-out, visibility 0s linear 0.2s;
        -o-transition: opacity 0.2s ease-out, visibility 0s linear 0.2s;
        transition: opacity 0.2s ease-out, visibility 0s linear 0.2s;
        z-index: 1000;
        }

        #site-loader.fullscreen {
        padding: 0;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            -webkit-transform: none;
            -ms-transform: none;
            transform: none;
            background-color: #fff;
            border-radius: 0;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        #site-loader.show {
            -webkit-transition: opacity 0.4s ease-out, visibility 0s linear 0s;
            -o-transition: opacity 0.4s ease-out, visibility 0s linear 0s;
            transition: opacity 0.4s ease-out, visibility 0s linear 0s;
            visibility: visible;
            opacity: 1;
        }

        #site-loader .circular {
            -webkit-animation: loader-rotate 2s linear infinite;
            animation: loader-rotate 2s linear infinite;
            position: absolute;
            left: calc(50% - 24px);
            top: calc(50% - 24px);
            display: block;
            -webkit-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        #site-loader .path {
            stroke-dasharray: 1, 200;
            stroke-dashoffset: 0;
            -webkit-animation: loader-dash 1.5s ease-in-out infinite;
            animation: loader-dash 1.5s ease-in-out infinite;
            stroke-linecap: round;
        }

        @-webkit-keyframes loader-rotate {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes loader-rotate {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @-webkit-keyframes loader-dash {
            0% {
                stroke-dasharray: 1, 200;
                stroke-dashoffset: 0;
            }

            50% {
                stroke-dasharray: 89, 200;
                stroke-dashoffset: -35px;
            }

            100% {
                stroke-dasharray: 89, 200;
                stroke-dashoffset: -136px;
            }
        }

        @keyframes loader-dash {
            0% {
                stroke-dasharray: 1, 200;
                stroke-dashoffset: 0;
            }

            50% {
                stroke-dasharray: 89, 200;
                stroke-dashoffset: -35px;
            }

            100% {
                stroke-dasharray: 89, 200;
                stroke-dashoffset: -136px;
            }
        }
        /* --------- End Loader --------- */
        
    </style>

</head>

<body>
    <!-- loader -->
    <div id="site-loader" class="fullscreen siteloader" style="background-color: rgba(0, 0, 0, 0.7);"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
    </div>

    <section class="body">
        <!-- start: header -->
        <header class="header">
            <div class="logo-container">
                <a href="{{route('admin.index')}}" class="logo">
                    <img src="{{asset('resources/assets/images/truecoffee.png')}}" height="35" alt="VBC-NET" /> <strong> TRUE COFFEE </strong>
                </a>
                <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            <!-- start: search & user box -->
            <div class="header-right">

                <form action="pages-search-results.html" class="search nav-form">
                    <div class="input-group input-search">
                        <input type="text" class="form-control" name="q" id="q" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>

                <span class="separator"></span>
                @php
                    $orderList = App\Models\Order::where('status', 0)->orderBy('status', 'asc')->orderBy('deliverydate', 'asc')->orderBy('id', 'desc')->get();
                    $countOrder = count($orderList ?? []);
                @endphp
                @if($countOrder)
                <ul class="notifications">
                    <li>
                        <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                            <i class="fa fa-bell"></i>
                            <span class="badge"> {{$countOrder}} </span>
                        </a>

                        <div class="dropdown-menu notification-menu">
                            <div class="notification-title">
                                <span class="pull-right label label-default"> {{$countOrder}} </span> Orders
                            </div>

                            <div class="content">
                                <ul>
                                    @foreach($orderList ?? [] as $order)
                                    <li>
                                        <a href="{{route('admin.order.index')}}" class="clearfix">
                                            <div class="image">
                                                <i class="fa fa-shopping-cart bg-primary"></i>
                                            </div>
                                            <span class="title"> {{$order->customer->name ?? "###"}} </span>
                                            <span class="message"> Delivery {{ $order->deliverydate ? date('d/m/Y', strtotime($order->deliverydate)) : "###"}} </span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                             
                            </div>
                        </div>
                    </li>
                </ul>
                @endif

                <span class="separator"></span>
                @if (Route::has('login'))
                    <div id="userbox" class="userbox">
                        @auth
                            <a href="#" data-toggle="dropdown">
                                <figure class="profile-picture">
                                    <img src="{{asset('resources/assets/images/!logged-user.jpg')}}" alt="TRUE COFFEE" class="img-circle" data-lock-picture="{{asset('resources/assets/images/!happy-face.png')}}" />
                                </figure>
                                <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
                                    <span class="name"> <strong> {{ Auth::user()->name ?? '' }} </strong></span>
                                    <span class="role"> {{Cookie::get('user_role') ?? ''}} </span>
                                </div>

                                <i class="fa custom-caret"></i>
                            </a>

                            <div class="dropdown-menu">
                                <ul class="list-unstyled">
                                    <li class="divider"></li>
                                    <li>
                                        <a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fa fa-user"></i> My Profile</a>
                                    </li>
                                    <li>
                                        <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="#" role="menuitem" tabindex="-1" onclick="event.preventDefault();
                                                this.closest('form').submit();"><i class="fa fa-sign-out"></i> Logout </a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <a role="menuitem" tabindex="-1" href="{{route('login')}}"> <strong> <i class="fa fa-sign-in"></i> Login </strong> </a>
                        @endauth
                    </div>
                @endif
            </div>
            <!-- end: search & user box -->
        </header>
        <!-- end: header -->
        @yield('contents')
    </section>

    <!-- Vendor -->
    <script src="{{asset('resources/assets/vendor/jquery/jquery.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/nanoscroller/nanoscroller.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/magnific-popup/magnific-popup.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>

    <!-- Specific Page Vendor -->
    <script src="{{asset('resources/assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jquery-appear/jquery.appear.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jquery-easypiechart/jquery.easypiechart.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/flot-tooltip/jquery.flot.tooltip.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/flot/jquery.flot.categories.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jquery-sparkline/jquery.sparkline.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/raphael/raphael.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/morris/morris.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/gauge/gauge.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/snap-svg/snap.svg.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/liquid-meter/liquid.meter.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jqvmap/jquery.vmap.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jqvmap/data/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jqvmap/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js')}}"></script>

    <script src="{{asset('resources/assets/vendor/jquery-validation/jquery.validate.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/pnotify/pnotify.custom.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="{{asset('resources/assets/javascripts/theme.js')}}"></script>

    <!-- Theme Custom -->
    <script src="{{asset('resources/assets/javascripts/theme.custom.js')}}"></script>

    <!-- Theme Initialization Files -->
    <script src="{{asset('resources/assets/javascripts/theme.init.js')}}"></script>


    <!-- Examples -->
    <script src="{{asset('resources/assets/javascripts/dashboard/examples.dashboard.js')}}"></script>
    <script src="{{asset('resources/assets/javascripts/ui-elements/examples.modals.js')}}"></script>
    <script src="{{asset('resources/assets/javascripts/forms/examples.wizard.js')}}"></script>
    <script src="{{asset('resources/assets/javascripts/forms/examples.wizard.js')}}"></script>
    <script src="{{asset('resources/assets/vendor/select2/select2.js')}}"></script>
    <script src="{{asset('resources/assets/javascripts/tables/examples.datatables.default.js')}}"></script>
    <script src="{{asset('resources/assets/javascripts/tables/examples.datatables.row.with.details.js')}}"></script>
    <script src="{{asset('resources/assets/javascripts/tables/examples.datatables.tabletools.js')}}"></script>
    <script src="{{asset('resources/assets/javascripts/ui-elements/examples.charts.js')}}"></script>
    <script src="https://sp.zalo.me/plugins/sdk.js"></script>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <script>
        $('.data-table').dataTable();

        @if(session('message'))
            var type = "{{ session('type') }}";
            var message = "{{ session('message') }}";
            Notify(type, message);
		@endif

		function Notify(type, message) {
            new PNotify({
                title: 'Notice',
                text: message,
                type: 'custom',
                addclass: 'notification-' + type,
                icon: 'fa fa-coffee'
            });
        }

    function Loading() {
        $('#site-loader').removeClass('hide');
        $('#site-loader').addClass('show');
    }

    function StopLoading() {
        $('#site-loader').removeClass('show');
        $('#site-loader').addClass('hide');
    }

    </script>

    @yield('javascript')
</body>

</html>