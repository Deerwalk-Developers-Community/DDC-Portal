@extends('layouts.home')

@section('content')
<main id="blog-page">
    <!-- ****___________________________________body content  starts here  -->

    <div class="containerCenter">
        <div class="contentBlock" id="blogs-container">
            <section id="left-section">
                @if ($featured)
                <div id="featured-blog-card">
                    <img src="{{ Storage::url('images/'. $featured->image) }}" alt="" />
                    <h4>{{ $featured->created_at }}</h4>
                    <h2>{{ $featured->title }}</h2>
                    <p>
                        {{ $featured->description }}
                    </p>
                    <a href="./blog.html">
                        <button>Read more</button>
                    </a>
                </div>

                @endif

                <div id="blog-card-container">
                    @foreach ($blogs as $blog)
                    <div class="blog-cards">
                        <img src="{{ Storage::url('images/'. $blog->image) }}" alt="" />
                        <h4>{{ $blog->created_at }}</h4>
                        <h2>{{ $blog->title }}</h2>
                        <p>
                            {{ $blog->description }}
                        </p>
                        <a href="./blog.html">
                            <button>Read more</button>
                        </a>
                    </div>
                    @endforeach
                </div>
            </section>
            <section id="right-section">
                <div class="panel">
                    <h5>Search</h5>
                    <div class="panel--content">
                        <input type="text" placeholder="enter text to search" />
                        <button>Go</button>
                    </div>
                </div>

                <div id="right-category-panel">
                    <div class="panel">
                        <h5>Category</h5>
                        <div class="panel--content">
                            <ul>
                                <li><a href="">web design</a></li>
                                <li><a href="">javascript</a></li>
                                <br />
                                <li><a href="">html</a></li>
                                <li><a href="">css</a></li>
                                <br />
                                <li><a href="">freebies</a></li>
                                <li><a href="">tutorial</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <h5>Side Widget</h5>
                    <div class="panel--content">
                        <p>
                            You can put anything you want inside of these side
                            <br />
                            widgets. They are easy to use, and feature the Bootstrap
                            <br />
                            5 card component!
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- ****___________________________________body content   ends here -->
</main>
@endsection