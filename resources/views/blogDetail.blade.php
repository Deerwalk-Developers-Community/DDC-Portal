@extends('layouts.home')

@section('content')
<main id="blog-page-detail">
    <!-- ****___________________________________body content  starts here  -->

    <div class="containerCenter">
        <div class="contentBlock" id="blogs-container">
            <section id="left-section">
                <article id="blog-content">
                    <h1>{{ $blog->title }}</h1>
                    <div class="line-container">
                        <hr />
                    </div>
                    <h4>Posted on {{ $blog->created_at->format('d M, Y') }} by {{ $blog->user->name }}</h4>
                    <div class="tag-container">
                        @foreach (explode(' ', $blog->tags) as $tag)
                        <span class="tags"> {{ $tag }} </span>
                        @endforeach
                    </div>

                    <img src="{{ Storage::url('images/'. $blog->image) }}" alt="" />
                    <p>
                        {!! $blog->content !!}
                    </p>
                </article>

                {{-- <section id="comment-section">
                    <textarea placeholder="Join the discussion and leave a comment" rows="4" name="" id="" cols="30"
                        rows="10"></textarea>

                    <div class="comments">
                        <img src="./assets/images/avatar/avatar-placeholder.jpg" alt="" class="avatar" />

                        <div class="comment-details">
                            <h4 class="user-name">Kp Oli</h4>
                            <p class="user-comment">
                                nice blog , thanks for sharing such wonderful info.
                            </p>
                        </div>
                    </div>
                    <div class="comments">
                        <img src="./assets/images/avatar/avatar-placeholder.jpg" alt="" class="avatar" />

                        <div class="comment-details">
                            <h4 class="user-name">Trump</h4>
                            <p class="user-comment">
                                Appreciate your writing effort.
                            </p>
                        </div>
                    </div>
                    <div class="comments">
                        <img src="./assets/images/avatar/avatar-placeholder.jpg" alt="" class="avatar" />

                        <div class="comment-details">
                            <h4 class="user-name">Bidya Devi Bhandari</h4>
                            <p class="user-comment">This blog is pretty handy</p>
                        </div>
                    </div>
                </section> --}}
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

</main>

@endsection