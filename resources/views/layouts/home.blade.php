<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://kit.fontawesome.com/40c4f25596.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:wght@700&display=swap" rel="stylesheet">



    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deerwalk Developers Community</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo/logo.png') }}">


    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

</head>

<body>
    <div id="st-container" class="st-container">
        <nav class="st-menu st-effect-1" id="menu-11">
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
                    <a class="icon icon-study hvr-underline-from-center" href="{{ route('register') }}">SignUp</a>
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
                            <button id="hamburger-container-btn" data-effect="st-effect-1">
                                <div class="line"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                            </button>
                        </div>
                    </div>
                </div>


                <!-- //!jpt -->
                <!-- header  starts here-->
                <div class="containerCenter">
                    <div class="contentBlock">
                        <header id="public-header">
                            <nav>
                                <ul id="left-nav">
                                    <li>
                                        <a class="link inter_regular " style="padding:1rem;" href="{{ route('home') }}">
                                            <img id="logo" src="{{ asset('images/logo/logo.png') }}" alt="" />
                                        </a>
                                    </li>
                                </ul>
                                <ul id="center-nav">
                                    <li>
                                        <a class="inter_regular hvr-underline-from-center" style="padding:1.25rem;"
                                            href="{{ route('home') }}"> Home </a>
                                    </li>
                                    <li>
                                        <a class="inter_regular hvr-underline-from-center" style="padding:1.25rem;"
                                            href="{{ route('event') }}"> Events </a>
                                    </li>
                                    <li>
                                        <a class="inter_regular hvr-underline-from-center" style="padding:1.25rem;"
                                            href="{{ route('blogs') }}">
                                            Blogs
                                        </a>
                                    </li>
                                    <li>
                                        <a class="inter_regular hvr-underline-from-center" style="padding:1.25rem;"
                                            href="{{ route('aboutus') }}">
                                            About Us
                                        </a>
                                    </li>
                                </ul>
                                <ul id="right-nav">
                                    <li style="padding:1rem;">
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
                                    @guest
                                    <li style="padding:1rem;">
                                        


                                        <a href="{{ route('register') }}">
                                            <button type="submit" class="inter_regular">
                                                Sign Up
                                            </button>
                                        </a>

                                    </li>
                                    @endguest
                                </ul>
                            </nav>
                        </header>
                    </div>
                </div>
                <!-- header  ends here-->


                @yield('content')

                <!-- footer starts here  -->

                <div id="footer-secondary">

                    <section class="contact-area" id="contact">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 offset-lg-3">
                                    <div class="contact-content text-center">
                                        <a href="#">


                                            <img src="{{ asset('images/logo/logo.png') }}" alt="" />
                                        </a>

                                        <div class="hr"></div>
                                        <h6>1120 Lorem ipsum dolor sit amet, KC 179050, DDC Place.</h6>
                                        <h6>+01 2345 6789 12<span>|</span>+01 2345 6789 12</h6>
                                        <div class="contact-social">
                                            <ul>
                                                <li><a class="hover-target" href=""><i
                                                            class="fab fa-facebook-f"></i></a></li>
                                                <li><a class="hover-target" href=""><i
                                                            class="fab fa-linkedin-in"></i></a></li>
                                                <li><a class="hover-target" href=""><i class="fab fa-github"></i></a>
                                                </li>
                                                <li><a class="hover-target" href=""><i class="fab fa-behance"></i></a>
                                                </li>
                                                <li><a class="hover-target" href=""><i
                                                            class="fab fa-pinterest-p"></i></a></li>
                                            </ul>
                                            <p>Copyright &copy; 2019 All Rights Reserved.</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
                    <!-- =============== 1.9 Contact Area End ====================-->
                    <!-- =============== 1.9 Footer Area Start ====================-->


                </div>


                <!-- footer ends here  -->

            </div>
        </div>
    </div>

    <script src="{{ asset('js/home.js') }}" defer="true"></script>

    @yield('scripts')

</body>

</html>