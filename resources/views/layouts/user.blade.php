<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DDC Portal - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo/logo.png') }}">
</head>

<body>
    <div class="flex flex-row">

        <!-- Navbar -->
        <nav class="bg-secondary h-screen p-2 text-white rounded-r-lg sticky top-0">
            <figure class="p-5 w-60">
                <a href="/admin">
                    <img src="{{ asset('images/logo/white.png') }}" alt="logo">
                </a>
            </figure>
            <ul class="mt-5">
                <li class="font-black p-2 ml-5">
                    <a href="{{ route('user.notifications') }}" class="flex gap-1">
                        <!-- icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                            fill="#FFFFFF">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path
                                d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6z" />
                        </svg>
                        Notifications
                    </a>
                </li>
                <li class="font-black p-2 ml-5">
                    <a href="{{ route('user.posts.pending') }}" class="flex gap-1">
                        <!-- icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px"
                            viewBox="0 0 24 24" width="24px" fill="#FFFFFF">
                            <g>
                                <rect fill="none" height="24" width="24" />
                            </g>
                            <g>
                                <g>
                                    <g>
                                        <path
                                            d="M17.5,4.5c-1.95,0-4.05,0.4-5.5,1.5c-1.45-1.1-3.55-1.5-5.5-1.5S2.45,4.9,1,6v14.65c0,0.65,0.73,0.45,0.75,0.45 C3.1,20.45,5.05,20,6.5,20c1.95,0,4.05,0.4,5.5,1.5c1.35-0.85,3.8-1.5,5.5-1.5c1.65,0,3.35,0.3,4.75,1.05 C22.66,21.26,23,20.86,23,20.6V6C21.51,4.88,19.37,4.5,17.5,4.5z M21,18.5c-1.1-0.35-2.3-0.5-3.5-0.5c-1.7,0-4.15,0.65-5.5,1.5V8 c1.35-0.85,3.8-1.5,5.5-1.5c1.2,0,2.4,0.15,3.5,0.5V18.5z" />
                                    </g>
                                </g>
                            </g>
                        </svg>
                        Posts
                    </a>
                </li>
                <div class="border-b border-stone-200 border-[#2d2d2d] p-2 ml-5"></div>
                <li class="font-black p-2 ml-5">
                    <a href="{{ route('user.posts.create') }}" class="flex gap-1">
                        <!-- icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                            fill="#FFFFFF">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path
                                d="M14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z" />
                        </svg>
                        Write
                    </a>
                </li>
            </ul>



            <ul class="absolute bottom-5">
                <li class="font-black p-2 ml-5">
                    <a href="/admin/settings.html" class="flex gap-1">
                        <!-- icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px"
                            viewBox="0 0 24 24" width="24px" fill="#FFFFFF">
                            <g>
                                <path d="M0,0h24v24H0V0z" fill="none" />
                                <path
                                    d="M19.14,12.94c0.04-0.3,0.06-0.61,0.06-0.94c0-0.32-0.02-0.64-0.07-0.94l2.03-1.58c0.18-0.14,0.23-0.41,0.12-0.61 l-1.92-3.32c-0.12-0.22-0.37-0.29-0.59-0.22l-2.39,0.96c-0.5-0.38-1.03-0.7-1.62-0.94L14.4,2.81c-0.04-0.24-0.24-0.41-0.48-0.41 h-3.84c-0.24,0-0.43,0.17-0.47,0.41L9.25,5.35C8.66,5.59,8.12,5.92,7.63,6.29L5.24,5.33c-0.22-0.08-0.47,0-0.59,0.22L2.74,8.87 C2.62,9.08,2.66,9.34,2.86,9.48l2.03,1.58C4.84,11.36,4.8,11.69,4.8,12s0.02,0.64,0.07,0.94l-2.03,1.58 c-0.18,0.14-0.23,0.41-0.12,0.61l1.92,3.32c0.12,0.22,0.37,0.29,0.59,0.22l2.39-0.96c0.5,0.38,1.03,0.7,1.62,0.94l0.36,2.54 c0.05,0.24,0.24,0.41,0.48,0.41h3.84c0.24,0,0.44-0.17,0.47-0.41l0.36-2.54c0.59-0.24,1.13-0.56,1.62-0.94l2.39,0.96 c0.22,0.08,0.47,0,0.59-0.22l1.92-3.32c0.12-0.22,0.07-0.47-0.12-0.61L19.14,12.94z M12,15.6c-1.98,0-3.6-1.62-3.6-3.6 s1.62-3.6,3.6-3.6s3.6,1.62,3.6,3.6S13.98,15.6,12,15.6z" />
                            </g>
                        </svg>
                        Settings
                    </a>
                </li>
                <li class="font-black p-2 ml-5">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="flex gap-1 font-black">

                            <!-- icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                                fill="#FFFFFF">
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z" />
                            </svg>
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- End Navbar -->

        <!-- Page Section -->
        <div class="p-5 flex-1">
            <div class="w-full">

                <!-- User profile  -->
                <div class="flex flex-row justify-end items-center">
                    <span class="font-bold text-2xl">{{ auth()->user()->name }}</span>
                    <span class="w-10 h-10 block rounded-full bg-gray-400 ml-3"></span>
                </div>

                <div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    {{-- Confirmation Dialog --}}
    <div class="fixed w-full h-full bg-black/50 inset-0 grid place-content-center hidden" id="dialog">
        <div class="bg-white p-5 rounded divide-y divide-solid divide-zinc-400">
            <section id="dialog-header" class="text-black font-bold text-center py-2"></section>
            <section id="dialog-body" class="text-black py-2"></section>
            <section id="dialog-footer" class="flex justify-end py-2 gap-2">
                <form action="" method="post" id="dialog-confirm">
                    @csrf
                    @method('delete')
                    <button class="px-4 py-3 font-bold bg-red-600 text-white rounded-lg" type="submit"
                        id="dialog-confirm-button"></button>
                </form>
                <button id="dialog-cancel" class="px-4 py-3 font-bold bg-primary text-white rounded-lg">Cancel</button>

            </section>
        </div>
    </div>

    @yield('script')
    <script>
        (function() {
            var dialogCancel = document.getElementById('dialog-cancel');
            var dialog = document.getElementById('dialog');
            
            dialogCancel.addEventListener('click', function() {
                dialog.classList.add('hidden');
            });
        })()
    </script>
</body>

</html>