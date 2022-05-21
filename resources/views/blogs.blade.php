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

                    @if ($featured)
                    <div id="featured-blog-card">
                        <div class="featured-blog-card__img-container">

                            <img src="{{ 'storage/images/'. $featured->image }}" alt="" />
                        </div>
                        <h4>{{ $featured->created_at->format('d M, Y') }}</h4>
                        <h2>{{ $featured->title }}</h2>
                        <p>
                            {{ Illuminate\Support\Str::words($featured->description, 100, $end='...') }}
                        </p>
                        <a href="{{ route('blogs.show', ['id'=>$featured->id]) }}">
                            <button>Read more</button>
                        </a>
                    </div>

                    @endif
                </div>




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