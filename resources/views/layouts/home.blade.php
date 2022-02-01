<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deerwalk Developers Community</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo/logo.png') }}">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>
    <div id="st-container" class="st-container">
        <nav class="st-menu st-effect-11" id="menu-11">
            <div id="st-logo" class="icon icon-lab">
                <img src="{{ asset('images/logo/logo.png') }}" alt="" />
            </div>
            <ul id="menu-list">
                <li>
                    <a class="icon icon-data hvr-underline-from-center" href="{{ route('home') }}">Home</a>
                </li>
                <li>
                    <a class="icon icon-location hvr-underline-from-center" href="{{ route('event') }}">Event</a>
                </li>
                <li>
                    <a class="icon icon-study hvr-underline-from-center" href="{{ route('blogs') }}">Blogs</a>
                </li>
                <li>
                    <a class="icon icon-photo hvr-underline-from-center" href="{{ route('aboutus') }}">About Us</a>
                </li>
                @auth
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
                @endauth
                @guest
                <li>
                    <a class="icon icon-wallet hvr-underline-from-center" href="{{ route('login') }}">Login</a>
                </li>
                @endguest
            </ul>
        </nav>

        <!-- content push wrapper -->
        <div class="st-pusher">
            <div class="st-content">
                <!-- this is the wrapper for the content -->
                <div class="st-content-inner">
                    <!-- extra div for emulating position:fixed of the menu -->
                    <!-- Top Navigation -->

                    <div class="main clearfix">
                        <div id="st-trigger-effects" class="">
                            <button id="hamburger-container-btn" data-effect="st-effect-11">
                                <div class="line"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- header  starts here-->
                <div class="containerCenter">
                    <div class="contentBlock">
                        <header id="public-header">
                            <nav>
                                <ul id="left-nav">
                                    <li>
                                        <a class="link inter_regular" href="{{ route('home') }}">
                                            <img id="logo" src="{{ asset('images/logo/logo.png') }}" alt="" />
                                        </a>
                                    </li>
                                </ul>
                                <ul id="center-nav">
                                    <li>
                                        <a class="inter_regular" href="{{ route('home') }}"> Home </a>
                                    </li>
                                    <li>
                                        <a class="inter_regular" href="{{ route('event') }}"> Events </a>
                                    </li>
                                    <li>
                                        <a class="inter_regular" href="{{ route('blogs') }}">
                                            Blogs
                                        </a>
                                    </li>
                                    <li>
                                        <a class="inter_regular" href="{{ route('aboutus') }}">
                                            About Us
                                        </a>
                                    </li>
                                </ul>
                                <ul id="right-nav">
                                    <li>
                                        @auth
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button type="submit" class="inter_regular">
                                                Logout
                                            </button>
                                        </form>
                                        @endauth

                                        @guest
                                        <button class="inter_regular">
                                            <a href="{{ route('login') }}"> Login </a>
                                        </button>
                                        @endguest
                                    </li>
                                </ul>
                            </nav>
                        </header>
                    </div>
                </div>
                <!-- header  ends here-->
                /*

                @yield('content')

                <!-- footer starts here  -->
                */
                <div class="containerCenter footer__wrapper">
                    <div class="contentBlock">
                        <footer>
                            <div class="inter_regular">
                                <ul>
                                    <li>
                                        <a href=""> Product </a>
                                    </li>
                                    <li>
                                        <a href=""> Product </a>
                                    </li>
                                    <li>
                                        <a href=""> Product </a>
                                    </li>
                                    <li>
                                        <a href=""> Product </a>
                                    </li>
                                </ul>

                                <ul>
                                    <li>
                                        <a href=""> Product </a>
                                    </li>
                                    <li>
                                        <a href=""> Product </a>
                                    </li>
                                    <li>
                                        <a href=""> Product </a>
                                    </li>
                                    <li>
                                        <a href=""> Product </a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <ul>
                                    <li>
                                        <a href=""> Product </a>
                                    </li>
                                    <li>
                                        <a href=""> Product </a>
                                    </li>
                                    <li>
                                        <a href=""> Product </a>
                                    </li>
                                    <li>
                                        <a href=""> Product </a>
                                    </li>
                                </ul>

                                <ul>
                                    <li>
                                        <a href=""> Product </a>
                                    </li>
                                    <li>
                                        <a href=""> Product </a>
                                    </li>
                                    <li>
                                        <a href=""> Product </a>
                                    </li>
                                    <li>
                                        <a href=""> Product </a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <ul>
                                    <li>
                                        <a href=""> Product </a>
                                    </li>
                                    <li>
                                        <a href=""> Product </a>
                                    </li>
                                    <li>
                                        <a href=""> Product </a>
                                    </li>
                                    <li>
                                        <a href=""> Product </a>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <a href=""> Product </a>
                                    </li>
                                    <li>
                                        <a href=""> Product </a>
                                    </li>
                                    <li>
                                        <a href=""> Product </a>
                                    </li>
                                    <li>
                                        <a href=""> Product </a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <ul>
                                    <li>
                                        <a href=""> Product </a>
                                    </li>
                                    <li>
                                        <a href=""> Product </a>
                                    </li>
                                    <li>
                                        <a href=""> Product </a>
                                    </li>
                                </ul>
                            </div>
                        </footer>
                        <!-- <div class="cursor"></div>
                        <div class="cursor2"></div> -->
                    </div>
                </div>
                /*
                <!-- footer ends here  -->
                */
            </div>
        </div>
    </div>

    <script src="{{ asset('js/home.js') }}" defer="true"></script>

    @yield('scripts')

</body>

</html>