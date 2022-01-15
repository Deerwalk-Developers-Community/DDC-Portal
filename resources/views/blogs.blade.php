@extends('layouts.home')

@section('content')
<main id="blog-page">
    <!-- ****___________________________________body content  starts here  -->

    <div class="containerCenter">
        <div class="contentBlock" id="blogs-container">
            <section id="left-section">
                <div id="featured-blog-card">
                    <img src="./assets/images/background/blog-bg.jpg" alt="" />
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

                <div id="blog-card-container">
                    <div class="blog-cards">
                        <img src="./assets/images/background/blog-bg.jpg" alt="" />
                        <h4>january 1,2021</h4>
                        <h2>Featured Post Title</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Nisi voluptate molestias reiciendis numquam vitae.
                            Soluta repellendus qui, dolorum, laudantium sint quas
                            quo optio
                        </p>
                        <a href="./blog.html">
                            <button>Read more</button>
                        </a>
                    </div>
                    <div class="blog-cards">
                        <img src="./assets/images/background/blog-bg.jpg" alt="" />
                        <h4>january 1,2021</h4>
                        <h2>Featured Post Title</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Nisi voluptate molestias reiciendis numquam vitae.
                            Soluta repellendus qui, dolorum, laudantium sint quas
                            quo optio
                        </p>
                        <a href="./blog.html">
                            <button>Read more</button>
                        </a>
                    </div>
                    <div class="blog-cards">
                        <img src="./assets/images/background/blog-bg.jpg" alt="" />
                        <h4>january 1,2021</h4>
                        <h2>Featured Post Title</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Nisi voluptate molestias reiciendis numquam vitae.
                            Soluta repellendus qui, dolorum, laudantium sint quas
                            quo optio
                        </p>
                        <a href="./blog.html">
                            <button>Read more</button>
                        </a>
                    </div>
                    <div class="blog-cards">
                        <img src="./assets/images/background/blog-bg.jpg" alt="" />
                        <h4>january 1,2021</h4>
                        <h2>Featured Post Title</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Nisi voluptate molestias reiciendis numquam vitae.
                            Soluta repellendus qui, dolorum, laudantium sint quas
                            quo optio
                        </p>
                        <a href="./blog.html">
                            <button>Read more</button>
                        </a>
                    </div>
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