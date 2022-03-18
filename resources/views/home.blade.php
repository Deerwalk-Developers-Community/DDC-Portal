@extends('layouts.home')

@section('content')
<main id="home-page">
  <!-- herosection starts here  -->
  <!-- <div class="containerCenter" id="vanta-canvas"> -->
  <div class="containerCenter">
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

            <input placeholder='Enter Your email' type="email">
            <input placeholder='Enter Your password' type="password">
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
              <input name="Email" id='email' type="email" maxlength="50" required
                placeholder="Enter your email address">
              <button type='submit' class="bt">Subscribe</button>



            </form>
          </div>
        </div>

      </section>
    </section>
  </div>

</div>


<!-- subscribe to news lettersecction start herer -->


<!-- video section start -->
<div class="containerCenter">

  <div class="contentBlock">



    <section class="video_section">

      <div class="left-division">

        <iframe width="500" height="415"
          src="https://rr1---sn-h5576nsl.c.drive.google.com/videoplayback?expire=1647618417&ei=MXE0YuClB5OArvIP0OakwAE&ip=103.225.244.158&cp=QVRJWUdfV1RPSFhPOjZDblpCamdINjBuRzJIbC1fQ1JSdEtEODNSVnhfUWcxdVpYSi12T0UyMGg&id=625945077dbe2725&itag=18&source=webdrive&requiressl=yes&mh=cG&mm=32&mn=sn-h5576nsl&ms=su&mv=m&mvi=1&pl=24&ttl=transient&susc=dr&driveid=15VNqk9NP2icRvJ68sBcDCYIV3meD5VDa&app=explorer&mime=video/mp4&vprv=1&prv=1&dur=180.628&lmt=1641220956664908&mt=1647603622&subapp=DRIVE_WEB_FILE_VIEWER&txp=0011224&sparams=expire,ei,ip,cp,id,itag,source,requiressl,ttl,susc,driveid,app,mime,vprv,prv,dur,lmt&sig=AOq0QJ8wRQIhAPvabIQg4lpBLpKE7sDtTcjWUFTicJBcXcZPmJzLyE67AiBdISh9NUO-cuXr7OQmpaRwUBTpGjYi0tmcUOYNaWB_Nw==&lsparams=mh,mm,mn,ms,mv,mvi,pl&lsig=AG3C_xAwRgIhAKdFyxNzOmwoO1KdzVANVuni4gAFVnb-mllc-_JJGT9YAiEAwm_5dBNax-0z3AF3L8AoQVW0sLVvS6vaV_baIFu0Cpo=&cpn=8cU-amh4d1btrF_T&c=WEB_EMBEDDED_PLAYER&cver=1.20220316.01.00">
        </iframe>


      </div>
      <div class="right-division">
        <u>
          Check out our video
        </u>
        <h3 class="source_700">
          Watch our video
        </h3>
        <button>Watch Now</button>

      </div>



    </section>

  </div>
</div>
<!-- video section end -->



@endsection







@section('scripts')
<!-- **vanta cdn starts here  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r120/three.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanta/0.5.21/vanta.birds.min.js"
  integrity="sha512-bP14TXFcd8A4oGg1S37dzXTOSUiNl6/6e2sPbkUzuPgU4lDAcrKLIs8mKLfp6OJg4K+EPn5oL6CVd2wKtuNcrg=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- **vanta cdn ends here  -->

<!-- ?vanta js config script start here  -->
<script type="text/javascript">
  VANTA.BIRDS({
      el: '#vanta-canvas',
      mouseControls: true,
      touchControls: true,
      gyroControls: false,
      minHeight: 600.0,
      minWidth: 600.0,
      scale: 1.0,
      scaleMobile: 1.0,
      backgroundColor: 0x0,
      color1: 0xa8e,
      color2: 0xffffff,
      birdSize: 1.5,
      cohesion: 94.0,
      quantity: 3.0,
    });
</script>
<!-- ?vanta js config script start ends here  -->

<!-- carousel cdn import -->
<!-- <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script> -->
@endsection