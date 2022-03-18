@extends('layouts.home')

@section('content')
<main id="blog-page">
    <!-- ****___________________________________body content  starts here  -->



    <div class="containerCenter">
        <div class="contentBlock" id="blogs-container">
<h1 class='blog-page__title source_700'>Blogs & Articles <br>
</h1>



<section >
<div id="left-section">

<div id="featured-blog-card">
<div class="featured-blog-card__img-container">

    <img src="https://media.istockphoto.com/photos/bloggingblog-concepts-ideas-with-worktable-picture-id922745190?k=20&m=922745190&s=612x612&w=0&h=TqsA7NeMPYXmK1TY5dsbdIsczaUK0OgguehHWdSUqL8=" alt="" />
</div>                   
                    <h4>january 1,2021</h4>
                    <h2>Featured Post Title</h2>
                    <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      Nisi voluptate molestias reiciendis numquam vitae. Soluta
                      repellendus qui, dolorum, laudantium sint quas quo optio
                      sequi atque libero ad obcaecati, velit temporibus eos ab
                      cum earum accusamus accusantium culpa iste corporis
                      nostrum maxime perspiciatis architecto. In aperiam illum
                      ut iste, rem iure.
                    </p>
                    <a href="./blog.html">
                      <button>Read more</button>
                    </a>
                  </div>
</div>

            

                @if ($featured)
                <div id="featured-blog-card">
                    <img src="{{ Storage::url('images/'. $featured->image) }}" alt="" />
                    <h4>{{ $featured->created_at->format('d M, Y') }}</h4>
                    <h2>{{ $featured->title }}</h2>
                    <p>
                        {{ $featured->description }}
                    </p>
                    <a href="{{ route('blog-detail', ['id'=>$featured->id]) }}">
                        <button>Read more</button>
                    </a>
                </div>

                @endif

                <div id="blog-card-container">
                    @foreach ($blogs as $blog)
                    <div class="blog-cards">
                        <img src="{{ Storage::url('images/'. $blog->image) }}" alt="" />
                        <h4>{{ $blog->created_at->format('d M, Y') }}</h4>
                        <h2>{{ $blog->title }}</h2>
                        <p>
                            {{ $blog->description }}
                        </p>
                        <a href="{{ route('blogs.show', ['id'=>$blog->id]) }}">
                            <button>Read more</button>
                        </a>
                    </div>
                    @endforeach
                </div>
            </section>
            {{-- <section id="right-section">
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
            </section> --}}
        </div>
    </div>

    <!-- ****___________________________________body content   ends here -->
</main>
@endsection