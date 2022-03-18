@extends('layouts.home')

@section('content')
<main>
    <!-- ****___________________________________body content  starts here  -->
    <div class="containerCenter">
        <div class="contentBlock" id="about-us-page">
            <section id="hero-section">
                <div class="left-division source_700">
                    <h1 >
                        Hello, We're <br />
                        Deerwalk Developers <br/>
                        Community
                    </h1>
                </div>
                <div class="right-division">
                    <img src="{{ asset('images/home/aboutus/running-girl.png') }}" alt="" />
                </div>
            </section>

            <section id="history-section">
                <h3 class='source_700'>History</h3>
                <div class="line-container">
                    <hr />
                </div>
                <div id="article-container">
                    <article id="left-division">
                                             <img src="{{ asset('images/home/aboutus/girl-history.png') }}" alt="" />
                
                    </article>
                    <article id="right-division">
                        With all these productive events, the community had a pretty good start even for its first year.
                        Finally on
                        august of 2021, the tenure for the community ended then through a selective process, DDC
                        selected and finalized the list of its 12 members for the new tenure with Aakash Bhandari as
                        President, Raman Lamichhane as Vice-President and Deena Sitikhu as Treasurer for DDC.
                    </article>
                </div>
            </section>

            <section id="story-section">
                <h3 class='source_700'>WHAT WE PLAN</h3>
                <div class="line-container">
                    <hr />
                </div>
                <div id="story-section-container">
                    <div id="left-division">
                        <p>
                            Deerwalk Developers Community is a platform at DWIT for students having the same interest to
                            team up together and learn from each other through projects. During the first year of DDC,
                            different events were conducted the community plans to conduct the same events in upcoming
                            future. For the new tenure, the Deerwalk Developers Community plans to build the community
                            to be more like an Open Source Developers Community. DDC will be conducting similar events
                            like last year but this time it will be focused more on developing and maintaining open
                            source projects. DDC also plans to introduce other new programs which are suitable for
                            students to develop their overall skills.
                        </p>
                    </div>
                    <div id="right-division">
                        <img src="{{ asset('images/home/aboutus/girl-meditating.png') }}" alt="" />
                    </div>
                </div>
            </section>
            <section id="team-section">
                <h3 class='source_700'>Meet Our Team</h3>
                <div class="line-container">
                    <hr />
                </div>

                <div id="member-container">
                    @foreach ($members as $member)
                    <div class="member-cards">
                        <div class="left">
                            <img src="{{ Storage::url('images/'. $member->image) }}" alt="" />
                        </div>
                        <div class="right">
                            <h2>{{ $member->name }}</h2>
                            <h4>{{ $member->role }}</h4>
                            <ul class='meet-our-team-social'>
                                <li><a class="hover-target" href=""><i class="fab fa-facebook-f"></i></a></li>
                                <li><a class="hover-target" href=""><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a class="hover-target" href=""><i class="fab fa-github"></i></a></li>
                            </ul>
                            {{-- <p>
                                Lorem, ipsum dolor sit amet consectetur adipisicing
                            </p> --}}

                            <div class="social-links-container">
                                <a href=""><img src="./assets/images/icons/facebook.png" alt="" /></a <a href=""><img
                                    src="./assets/images/icons/linkedin.png" alt="" /></a <a href=""><img
                                    src="./assets/images/icons/insta.png" alt="" /></a </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
            </section>

            <section id="faq-section">
                <h3 class='source_700'>Frequently Asked Questions</h3>
                <div class="line-container">
                    <hr />
                </div>

                <div class="row">
                    <div class="col">
                        <div class="tabs">
                            <div class="tab">
                                <input type="checkbox" id="chck1" />
                                <label class="tab-label" for="chck1">What is the motto of our community?</label>
                                <div class="tab-content">
                                    The motto of DDC is to provide students a platform to learn through projects.
                                </div>
                            </div>
                            <div class="tab">
                                <input type="checkbox" id="chck2" />
                                <label class="tab-label" for="chck2">How can I contribute?</label>
                                <div class="tab-content">
                                    DDC is actively conducting different events. If you wish to be a part of any event
                                    or to contribute, contact us and keep checking the community’s Facebook page
                                    facebook.com/ddevcommunity.
                                </div>
                            </div>
                            <div class="tab">
                                <input type="checkbox" id="chck3" />
                                <label class="tab-label" for="chck3">How can I be a part on an upcoming event?</label>
                                <div class="tab-content">
                                    All the details about the events are kept on the events section of this website or
                                    you can also check the community’s Facebook page.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- ****___________________________________body content   ends here -->



</main>

@endsection