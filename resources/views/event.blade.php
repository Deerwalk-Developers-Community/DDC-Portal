@extends('layouts.home')


@section('content')
<main id="event-page">
    <!-- ***********************************BODY  CONTENT STARTS HERE-->
    <hr />
    <div class="containerCenter">
        <div class="contentBlock">
            {{-- <section id="filter-event-section">
                <ul>
                    <li class="filter-menu"><button>Popular</button></li>
                    <li class="filter-menu"><button>Popular</button></li>
                    <li class="filter-menu"><button>Popular</button></li>
                    <li class="filter-menu"><button>Popular</button></li>
                    <li id="search-event-field">
                        <label>
                            <input type="text" placeholder="type and Enter ..." id="txt" />
                            <button>Explore</button>
                        </label>
                    </li>
                </ul>
            </section> --}}
        </div>
    </div>

    <div class="containerCenter">
        <div class="contentBlock">
            <div id="hash-tag-division">
                {{-- <ul id="hash-list">
                    <li><a href="">#hashtag</a></li>
                    <li><a href="">#hashtag</a></li>
                    <li><a href="">#hashtag</a></li>
                    <li><a href="">#hashtag</a></li>
                    <li><a href="">#hashtag</a></li>
                    <li><a href="">#hashtag</a></li>
                </ul> --}}
                <ul id="list"></ul>
            </div>
        </div>
    </div>


    <h1 class='event-page__title source_700'>Events & WorkShops <br> </h1>







    {{-- featured card start --}}
    <div class="featured_events">


        <div class='featured_events-img-container'>
            <img src="
            https://laxmanbaralblog.com/wp-content/uploads/2021/01/blogging-1.jpg            " alt="">

        </div>
        <div class="featured_events-footer">


            <h2 class='consolas_regular'>Event Name</h2>
            <span id='featured_event-date'>17 Mar,2022</span>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deserunt fugiat nesciunt unde eius quidem
                aliquid
                excepturi repellendus dolorem perspiciatis magnam?</p>

            <button>
                <a href="">Read More</a>
            </button>
        </div>

    </div>

    {{-- featured card finish --}}




    <h2 id='past-event_title'>Past Events</h2>

    <div class="containerCenter">

        <div id="event-section_content-block">

            <section id="event-card-section">
                @foreach ($events as $event)
                <a href="https://google.com">

                    <div class="event-card">
                        <div class="workshop-avatar-ico">
                            @if ($event->image)

                            <img src="{{ Storage::url('images/' . $event->image) }}" alt="" />

                            @endif
                        </div>
                        <h2 class="consolas_regular">
                            {{ $event->title }}
                        </h2>
                        <h4>{{ $event->created_at->format('d M, Y') }}</h4>
                        @if ($event->image)

                        <img src="{{ Storage::url('images/' . $event->image) }}" alt="" />

                        @endif

                        <div class="event-card-footer">
                            <ul>
                                {{-- <li>
                                    <button class="vote-btn">
                                        <i class="fa fa-arrow-up"></i>
                                        <span class="vote-no">0</span>
                                    </button>
                                </li> --}}
                                <li class="aeonik_bold"><a href="{{ route('events.show', ['id'=>$event->id]) }}">
                                        Explore </a></li>
                            </ul>
                        </div>
                    </div>
                </a>

                @endforeach
            </section>
        </div>
    </div>
    {{-- <div class="containerCenter">
        <div class="contentBlock">
            <nav data-pagination>
                <a href="#" disabled><i class="fa fa-angle-left"></i></a>
                <ul>
                    <li class="current"><a href="#1">1</a></li>
                    <li><a href="#2">2</a></li>
                    <li><a href="#3">3</a></li>
                    <li><a href="#4">4</a></li>
                    <li><a href="#5">5</a></li>
                    <li><a href="#6">6</a></li>
                    <li><a href="#7">7</a></li>
                    <li><a href="#8">8</a></li>
                    <li><a href="#9">9</a></li>
                    <li><a href="#10">…</a></li>
                    <li><a href="#41">41</a></li>
                </ul>

                <a href="#2"><i class="fa fa-angle-right"></i></a>
            </nav>
        </div>
    </div> --}}
</main>
@endsection