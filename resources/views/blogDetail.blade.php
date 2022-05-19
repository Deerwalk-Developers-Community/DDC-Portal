@extends('layouts.home')

@section('content')
<main id="blog-page-detail">
    <!-- ****___________________________________body content  starts here  -->

    <div class="containerCenter">
        <div class="contentBlock" id="blogs-container">
            <section id="left-section">
                <article id="blog-content">


                    <div class="header_container">


                        <div class="header_left">

                            <h1>{{ $blog->title }}</h1>
                            <div class="line-container">
                                <hr />
                            </div>
                            <h4>Posted on {{ $blog->created_at->format('d M, Y') }} by {{ $blog->user->name }}</h4>
                            <div class="tag-container">
                                @if (strlen($blog->tags) > 0)
                                @foreach (explode(' ', $blog->tags) as $tag)
                                <span class="tags"> {{ $tag }} </span>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        {{-- Not needed in blog --}}
                        {{-- <div class="header_right">
                            <h3 class='inter_regular'>Event Date: <span>
                                    Saturday, March 19, 2022

                                </span> </h3>

                        </div> --}}


                    </div>

                    <img src="{{ '/storage/images/'. $blog->image}}" alt="" />
                    <p>
                        {!! $blog->content !!}
                    </p>
                </article>

            </section>

        </div>
    </div>

</main>

@endsection