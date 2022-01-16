@extends('layouts.home')

@section('content')
<main>
    <!-- ****___________________________________body content  starts here  -->
    <div class="containerCenter">
        <div class="contentBlock" id="about-us-page">
            <section id="hero-section">
                <div class="left-division">
                    <h1>
                        Hello, We're <br />
                        Community For <br />
                        Developers
                    </h1>
                </div>
                <div class="right-division">
                    <img src="./assets/images/illustrator/running-girl.png" alt="" />
                </div>
            </section>

            <section id="history-section">
                <h3>History</h3>
                <div class="line-container">
                    <hr />
                </div>
                <div id="article-container">
                    <article id="left-division">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Dolores nobis quae cum. Ipsam, deserunt. Nulla iusto
                        aliquam debitis vero, reiciendis placeat odio. Quas, quis
                        excepturi. Eligendi velit ad incidunt sunt soluta voluptas
                        aperiam, maxime amet? Earum veniam quaerat assumenda
                        numquam autem cumque minus quibusdam eligendi id provident
                        eveniet repellat tenetur, quod ipsa magnam obcaecati ex
                        ad! Aliquam facere perspiciatis, atque odit ducimus
                        delectus est quas consequuntur necessitatibus quod
                        temporibus dolorem quidem quae velit provident a, omnis
                        optio molestiae amet cupiditate ipsam cum eius facilis.
                        Explicabo suscipit commodi vel voluptatem ipsum natus
                        molestiae beatae atque iste ratione. Asperiores, assumenda
                        incidunt, fuga facilis doloribus repellat aliquam dolor
                        maxime eveniet eaque neque. Voluptatem quo qui quae earum
                        perferendis at, odit amet iusto aspernatur laudantium
                        cumque vel delectus asperiores quibusdam debitis culpa sed
                        possimus. Molestiae aperiam laboriosam suscipit doloribus
                        assumenda reprehenderit, unde exercitationem voluptas ex
                        odit nemo enim, a non praesentium earum, eaque iure.
                    </article>
                    <article id="right-division">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                        Velit blanditiis voluptate nam, deleniti reiciendis eius
                        fugit dicta obcaecati autem maiores exercitationem,
                        accusantium ab quaerat soluta, non aspernatur dignissimos
                        reprehenderit illo quibusdam quod et repellat quas esse?
                        Ratione nostrum minus deleniti! Impedit fugit odio a
                        accusantium expedita perspiciatis ab. Distinctio
                        architecto voluptates nisi itaque magni veniam iure
                        explicabo? Ex, aliquid voluptates qui a excepturi fuga
                        numquam id nulla possimus. Excepturi iste vitae possimus
                        nemo in ex hic voluptas magnam, maxime expedita eius porro
                        nisi vero aliquid debitis ipsa dolorem amet. Libero
                        corrupti, quo vitae dolorum error accusamus eligendi
                        distinctio magnam molestiae molestias veniam, eum earum,
                        cumque at nulla placeat unde. Excepturi dolorum vitae
                        quam, aliquam, optio neque illum quos sunt quibusdam atque
                        ad iure dignissimos praesentium tenetur, in beatae odio
                        non consectetur quo nesciunt voluptatibus consequatur
                        possimus ullam adipisci. Iusto cumque commodi, minus atque
                        natus recusandae pariatur temporibus dolores incidunt
                        veritatis.
                    </article>
                </div>
            </section>

            <section id="story-section">
                <h3>Our Story</h3>
                <div class="line-container">
                    <hr />
                </div>
                <div id="story-section-container">
                    <div id="left-division">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Illum assumenda delectus perspiciatis laborum quos iusto
                            numquam deleniti, natus odio voluptas earum fuga
                            corporis minima neque, molestiae architecto! Fugiat
                            fugit obcaecati commodi voluptas ea, animi perspiciatis
                            rerum dolorum optio ullam officia magnam eius autem
                            doloremque laborum aliquid mollitia distinctio libero
                            excepturi cupiditate aspernatur numquam! Tenetur ratione
                            nesciunt non nemo velit, eligendi blanditiis quas
                            repellendus id harum commodi tempora sed reiciendis,
                            laboriosam placeat sint, facere soluta doloribus
                            voluptas veritatis est dolores consectetur?
                        </p>
                    </div>
                    <div id="right-division">
                        <img src="./assets/images/illustrator/girl-meditating.png" alt="" />
                    </div>
                </div>
            </section>
            <section id="team-section">
                <h3>Meet Our Team</h3>
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
                <h3>Frequently Asked Questions</h3>
                <div class="line-container">
                    <hr />
                </div>

                <div class="row">
                    <div class="col">
                        <div class="tabs">
                            <div class="tab">
                                <input type="checkbox" id="chck1" />
                                <label class="tab-label" for="chck1">what are the steps do i need to contribute?</label>
                                <div class="tab-content">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing
                                    elit. Ipsum, reiciendis!
                                </div>
                            </div>
                            <div class="tab">
                                <input type="checkbox" id="chck2" />
                                <label class="tab-label" for="chck2">what is the main obstacles of ddc ?</label>
                                <div class="tab-content">
                                    Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. A, in!
                                </div>
                            </div>
                            <div class="tab">
                                <input type="checkbox" id="chck3" />
                                <label class="tab-label" for="chck3">lorem ipsum retro spectocularit vacubullary
                                    opsticius?</label>
                                <div class="tab-content">
                                    Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. A, in!
                                </div>
                            </div>
                            <div class="tab">
                                <input type="checkbox" id="chck4" />
                                <label class="tab-label" for="chck4">how to be part of deerwalk developer
                                    community?</label>
                                <div class="tab-content">
                                    Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. A, in!
                                </div>
                            </div>
                            <div class="tab">
                                <input type="checkbox" id="chck5" />
                                <label class="tab-label" for="chck5"> what is the motto of our community ? ?</label>
                                <div class="tab-content">
                                    Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. A, in!
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