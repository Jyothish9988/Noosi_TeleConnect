@include('user.header');


<main>
    <!--? slider Area Start-->
    <div class="slider-area position-relative">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-9 col-md-8 col-sm-9">
                            <div class="hero__caption">
                                <span>Committed to success</span>
                                <h1 class="cd-headline letters scale">We care about your 
                                    <strong class="cd-words-wrapper">
                                        <b class="is-visible">health</b>
                                        <b>sushi</b>
                                        <b>steak</b>
                                    </strong>
                                </h1>
                                <p data-animation="fadeInLeft" data-delay="0.1s">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi uquip ex ea commodo consequat is aute irure.</p>
                                <a href="#" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s">Appointment <i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>          
            </div>
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-9 col-md-8 col-sm-9">
                            <div class="hero__caption">
                                <span>Committed to success</span>
                                <h1 class="cd-headline letters scale">We care about your 
                                    <strong class="cd-words-wrapper">
                                        <b class="is-visible">health</b>
                                        <b>sushi</b>
                                        <b>steak</b>
                                    </strong>
                                </h1>
                                <p data-animation="fadeInLeft" data-delay="0.1s">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi uquip ex ea commodo consequat is aute irure.</p>
                                <a href="#" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s">Join Us <i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>          
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!--? About Start-->
    <div class="about-area section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-10">
                    <div class="about-caption mb-50">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle2 mb-35">
                            <span>About Our Company</span>
                            <h2>Welcome To Our Hospital</h2>
                        </div>
                        <p>There arge many variations ohf pacgssages of sorem gpsum ilable, but the majority have suffered alteration in some form, by ected humour, or randomised words whi.</p>
                        <div class="about-btn1 mb-30">
                            <a href="{{ url('doctor') }}" class="btn about-btn">Doctors<i class="ti-arrow-right"></i></a>
                        </div>
                        <div class="about-btn1 mb-30">
                            <a href="{{ route('login') }}" class="btn about-btn2">Login<i class="ti-arrow-right"></i></a>
                        </div>
                        <div class="about-btn1 mb-30">
                            <a href="{{ url('contact') }}" class="btn about-btn2">Contact <i class="ti-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <!-- about-img -->
                    <div class="about-img ">
                        <div class="about-font-img d-none d-lg-block">
                            <img src="user/assets/img/gallery/about2.png" alt="">
                        </div>
                        <div class="about-back-img ">
                            <img src="user/assets/img/gallery/about1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About  End-->
    <!--? department_area_start  -->
    
    <!-- depertment area end  -->


     <!--? Team Start -->
     <div class="team-area section-padding30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-tittle text-center mb-100">
                        <span>Our Doctors</span>
                        <h2>Our Specialist</h2>
                    </div>
                </div>
            </div>

           
            <div class="row">
                <!-- single Tem -->
                @foreach($dr as $d)
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="uploads/{{$d->image}}" heigh="150px" width="150px"  alt="">
                        </div>
                        <div class="team-caption">
                            <h3><a href="#">Dr.{{$d->name}}</a></h3>
                            <span>{{$d->category_name}}</span>
                            <!-- Team social -->
                            <div class="team-social">
                                <!-- <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a> -->
                            </div>
                            <!-- <p><a href="{{ url('book_now',$d->id) }}" class="btn btn-primary">Book now</a></p> -->
                        </div>
                    </div>
                </div>
                @endforeach



          
            </div>
        </div>
    </div>
    <!-- Team End -->
     <!--? Contact form Start -->
     
    <!-- Contact form End -->
    <!--? gallery Products Start -->
    <div class="gallery-area fix">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(user/assets/img/gallery/gallery1.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(user/assets/img/gallery/gallery2.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(user/assets/img/gallery/gallery3.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(user/assets/img/gallery/gallery4.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                             <div class="gallery-img " style="background-image: url(user/assets/img/gallery/gallery5.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(user/assets/img/gallery/gallery6.png);"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- gallery Products End -->
    <!--? Blog start -->


    <!-- <div class="home_blog-area section-padding30">
        <div class="container">
            <div class="row justify-content-sm-center">
                <div class="cl-xl-7 col-lg-8 col-md-10">
                   
                    <div class="section-tittle text-center mb-70">
                        <span>Oure recent news</span>
                        <h2>OurNews From Blog</h2>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-blogs mb-30">
                        <div class="blog-img">
                            <img src="user/assets/img/gallery/blog1.png" alt="">
                        </div>
                        <div class="blogs-cap">
                            <div class="date-info">
                                <span>Health</span>
                                <p>Nov 30, 2020</p>
                            </div>
                            <h4><a href="blog_details.html">Amazing Places To Visit In Summer</a></h4>
                            <a href="blog_details.html" class="read-more1">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-blogs mb-30">
                        <div class="blog-img">
                            <img src="user/assets/img/gallery/blog2.png" alt="">
                        </div>
                        <div class="blogs-cap">
                            <div class="date-info">
                                <span>Checkup</span>
                                <p>Nov 30, 2020</p>
                            </div>
                            <h4><a href="blog_details.html">Developing Creativithout Losing Visual</a></h4>
                            <a href="blog_details.html" class="read-more1">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-blogs mb-30">
                        <div class="blog-img">
                            <img src="user/assets/img/gallery/blog3.png" alt="">
                        </div>
                        <div class="blogs-cap">
                            <div class="date-info">
                                <span>Operation</span>
                                <p>Nov 30, 2020</p>
                            </div>
                            <h4><a href="blog_details.html">Winter Photography Tips from Glenn</a></h4>
                            <a href="blog_details.html" class="read-more1">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->






    <!-- Blog End -->
    </main>
   @include('user.footer');