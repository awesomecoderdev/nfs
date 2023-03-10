<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="preload" href="{{ asset('js/jquery.min.js') }}" as="script" type="text/javascript" />

    {{-- css --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/normalize.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/fluidgrid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('css/milligram.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        .dienstplan-week-job-item-small {
            width: 21px;
        }

        .changeArrow {
            display: none;
        }

        @media screen and (max-width: 480px) {}

        @media screen and (max-width: 480px) {
            #dienstplan-tab-menu {
                float: none !important;
                padding: 0 !important;
                width: 250px !important;
                font-size: 8pt !important;
                position: relative !important;
                margin: 0px auto !important;
                overflow: hidden !important;
            }

            .dienstplan-week-item-time-small {
                height: 40px !important;
            }

            /* .swapItem.activeItem .dienstplan-week-maintime {
                width: 40px !important;
                } */
            .swapItem.activeItem .dienstplan-week-item-label {
                width: 100% !important;
            }

            .swapItem.activeItem .dienstplan-week-job-item-small {
                width: 30px !important;
            }

            .swapItem {
                display: none;
            }

            .swapItem.activeItem {
                display: block;
            }

            .swapItem.activeItem .dienstplan-week-item-label {
                width: 10rem;
                position: relative;
            }

            .swapItem.activeItem .dienstplan-week-maintime {
                /* width: 50px;
                height: 39px !important; */
                width: 47px;
                height: 18px !important;
            }

            .dienstplan-week-item-time-small {
                /* height: 40px;
                width: 50px; */
                height: 19px !important;
                /* height: 19.79px !important; */
                width: 50px;
            }

            .swapItem.activeItem .dienstplan-week-job {
                position: absolute;
                bottom: 7px;
            }

            .swapItem.activeItem .dienstplan-week-job-item-small {
                width: 50px;
            }

            .dienstplan-week-job-item {
                border: none;
            }

            .secondItem .dienstplan-week-timeslot-hour:last-child {
                display: none;
            }

            #dienstplan-week-navigation-days {
                float: none !important;
                display: flex !important;
                justify-content: center !important;
                margin: 28px 0 !important;
            }

            .changeArrow {
                position: absolute !important;
                top: 50% !important;
                height: 30px !important;
                width: 30px !important;
                background: #808080b5 !important;
                border-radius: 50% !important;
                color: white !important;
                padding: 3px !important;
                display: block !important;
                transform: translateY(-50%);
            }

            .changeArrow.leftArrow {
                left: 20px !important;
            }

            .changeArrow.rightArrow {
                right: 20px !important;
            }
        }

        b{
            cursor: pointer;
        }
    </style>



    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script>
        var isDarkMode = window.matchMedia && window.matchMedia("(prefers-color-scheme:dark)") && window.matchMedia(
            "(prefers-color-scheme:dark)").matches ? true : false;
        var breackdown = window.screen.width > 786 ? 'lg' : (window.screen.width > 640 ? 'md' : 'sm');
    </script>


    <!-- Node.js -->
    {{-- @viteReactRefresh --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
   {{-- @viteReactRefresh --}}
    @vite(['resources/js/app.js'])

    
    {{-- start::head --}} @yield('head') {{-- end::head --}}
</head>

<body @hasSection('bodyClass')
    class="@yield('bodyClass')"
    @endif>
    <header>
        <div class="blueline"></div>
        <div class="container prz">
            <div class="row headflex">

                <div class="col span_2 clr menu h54">
                    @auth
                        <nav id="cssmenuleft">
                            @include('navigation.intern')
                        </nav>
                    @endauth
                </div>
                <div class="col span_5 clr dada">
                    <span class="">Darmstadt &bull; Darmstadt-Dieburg</span>
                </div>
                <div class="col span_2 clr logo">
                    <a href="{{ route('index') }}" class="scale fle posrel z1000">
                        <img src="{{ asset('img/logo-nfs.png') }}" alt="ALTERNATIVTEXT"
                            class="scale fle posrel z1000" />
                    </a>
                </div>
                <div class="col span_5 clr odbe">
                    <span class="ple">Odenwaldkreis &bull; Bergstraße</span>
                </div>
                <div class="col span_2 clr menu h54">
                    <nav id="cssmenu">
                        @include('navigation.menu')
                    </nav>
                </div>

            </div>
        </div>
    </header>

    {{-- content --}}
    <div class="container ">
        <!-- <div class="row"> -->
            <div class="wrapper">
                <div class="col span_16 clr">
                    {{-- start::content --}}
                    {{ $slot }}
                    {{-- end::content --}}
                </div>
            </div>
        <!-- </div> -->
    </div>

    @hasSection('content')
        @yield('content')
    @endif

    {{-- footer --}}
    <footer>
        <div class="container ">
            <div class="row gutters">
                <div class="col span_6 clr">
                    Ev. Dekanat Darmstadt-Stadt<br>
                    Rheinstrasse 31<br>
                    64283 Darmstadt<br>
                    Telefon: 06151 / 1362424<br>
                    eMail: <a href="mailto:info@nfs-suedhessen.de">info@nfs-suedhessen.de</a>
                </div>
                <div class="col span_6 clr nodisp">
                    &nbsp;
                </div>
                <div class="col span_4 clr" style="text-align: right;">
                    <a href="/datenschutz/index">Datenschutz</a><br class="nodisp">
                    <a href="/impressum/index">Impressum</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.backstretch.min.js') }}"></script>
    <!-- starty custom script -->
    <script>
        $(document).ready(function() {
            var swapNowStart = 1;
            $("#rightArrow").click(function() {
                if (swapNowStart === 7) {
                    // console.log("Don't Have more item in right");
                } else {
                    console.log("Have more item in right");
                    $(".swapItem").removeClass("activeItem");
                    $(".swapNow" + (swapNowStart + 1)).addClass("activeItem");
                }
                // change item
                if (swapNowStart < 7) {
                    swapNowStart++;
                }
            });

            $("#leftArrow").click(function() {
                if (swapNowStart === 1) {
                    // console.log("Don't Have more item in left");
                } else {
                    // console.log("Have more item in left");
                    $(".swapItem").removeClass("activeItem");
                    $(".swapNow" + (swapNowStart - 1)).addClass("activeItem");
                }
                // change item
                if (swapNowStart > 1) {
                    swapNowStart--;
                }
            });

            $.fn.equalHeights = function(target) {
                var max_height = 0;
                $(target).each(function() {
                    max_height = Math.max($(target).height(), max_height);
                });
                $(target).each(function() {
                    $(target).height(max_height);
                });
            };

            $("#cssmenu").prepend('<div id="menu-button"></div>');
            $("#cssmenu #menu-button").click(function(e) {
                var menu = $(this).next("ul");
                if (menu.hasClass("open")) {
                    menu.removeClass("open");
                } else {
                    menu.addClass("open");
                }
            });

            $("#cssmenuleft").prepend('<div id="menu-button-left"></div>');
            $("#cssmenuleft #menu-button-left").click(function(e) {
                var menu = $(this).next("ul");
                if (menu.hasClass("open")) {
                    menu.removeClass("open");
                } else {
                    menu.addClass("open");
                }
            });

            /*Menu*/
            var url = window.location.href;

            $("#nav a, .meta nav a")
                .filter(function() {
                    return this.href == url;
                })
                .parent()
                .addClass("active");

            $(".sameheight").equalHeights();

            $(".slider").backstretch(
                [
                    "{{ asset('img/home-big1.jpg') }}",
                    "{{ asset('img/home-big4.jpg') }}",
                    "{{ asset('img/home-big3.jpg') }}",
                    "{{ asset('img/home-big2.jpg') }}",
                ], {
                    fade: 1000,
                    duration: 5000,
                }
            );
        });
    </script>
</body>

</html>
