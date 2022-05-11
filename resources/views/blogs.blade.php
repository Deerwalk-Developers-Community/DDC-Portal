@extends('layouts.home')

@section('content')
<main id="blog-page">
    <!-- ****___________________________________body content  starts here  -->



    <div class="containerCenter">
        <div class="contentBlock" id="blogs-container">
            <h1 class='blog-page__title source_700'>Blogs & Articles <br>
            </h1>



            <section id='blog-page-section'>
                <div id="left-section">

                    <div id="featured-blog-card">
                        <div class="featured-blog-card__img-container">

                            <img src="https://laxmanbaralblog.com/wp-content/uploads/2021/01/blogging-1.jpg" alt="" />
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
                    <img src="{{ '/storage/images/'. $featured->image }}" alt="" />
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
                        <img src="{{ '/storage/images/'. $blog->image }}" alt="" />
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
        </div>
    </div>

    <!-- ****___________________________________body content   ends here -->
</main>
@endsection