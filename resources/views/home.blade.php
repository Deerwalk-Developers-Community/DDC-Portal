@extends('layouts.home')

@section('content')
<main id="home-page">
    <!-- herosection starts here  -->
    <!-- <div class="containerCenter" id="vanta-canvas"> -->
    <div class="containerCenter" >
        <div class="contentBlock" id="hero-section">
            <div class="left-division">
                <div class="tag-block-wrapper">
                    Deerwalk Developers Community
                    {{-- <div class="dart-circle">⬤</div>
                    <a class="link" href="#"> read post
                        <BsArrowRight />
                    </a> --}}
                </div>

                <h1 class="title-heading source_700">
                    Introduction to <br> Deerwalk Developers <br> Community
                </h1>

                <p class="inter_regular title-paragraph">
                    Deerwalk Developers Community is a platform at DWIT (Deerwalk Institute of Technology) for students
                    having the same interest to team up together and learn from each other through projects.
                </p>
                {{-- <button class="gradientBtn ripple">
                    Start now
                    <BsArrowRight />
                </button> --}}
            </div>
            <div class="right-division">
               
                                                  
                                                  
                                          <div class="register-box">
                                          
                                          
                                          <form action="">
                                          
                                          <h3 class='register-box-title source_700'>Register & Join Us</h3>
                                              <input placeholder='Enter your Full Name' type="text">
                                          
                                          <input placeholder='Enter Your email'  type="email">
                                          <input placeholder='Enter Your password'  type="password">
                                          <button class='register-box-btn'>Register</button>
                                          </form>
                                          
                                          </div>
                                                      
        </div>
        </div>
    </div>

    

    
</main>

<!-- subscribe to news lettersecction start herer -->
<div class="containerCenter">

<div class="contentBlock">



<section id="newsLetterSection">
    <section class="news-letter" id="News-letter">
    <div class="news ">
      <div class="container">
        <h1 class="news-heading source_700">Subscribe To Get The Latest <br> News About Us</h1>
        <p class="des how-de">Get the Latest news about ddc <br> email below to
          get daliy update about us</p>

        <form action="https://formspree.io/f/mlezlorj" method="post">
          <input name="Email" id='email' type="email"  maxlength="50" required placeholder="Enter your email address">
          <button type='submit' class="bt">Subscribe</button>



        </form>
      </div>
    </div>

  </section>
</section>
</div>

</div>


<!-- subscribe to news lettersecction start herer -->


<!-- our team -->
<div class="containerCenter">
  
<div class="contentBlock">
<!-- sart  -->

</div>
</div>
<!-- our team -->



@endsection







@section('scripts')
@endsection