@extends('layout.app')

@section('contenido')
 <body>
        <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('mytemplate/img/carousel-1.jpg')}}" alt="">
                <div class="carousel-inner">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h1 class="display-3 text-white animated slideInDown mb-4">Best CCTV & Security Solution For You</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                                <a href="" class="btn btn-primary rounded-pill py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                                <a href="" class="btn btn-light rounded-pill py-md-3 px-md-5 animated slideInRight">Free Quote</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset ('mytemplate/img/carousel-2.jpg')}}" alt="">
                <div class="carousel-inner">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h1 class="display-3 text-white animated slideInDown mb-4">Smart Security Solution For All Business</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                                <a href="" class="btn btn-primary rounded-pill py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                                <a href="" class="btn btn-light rounded-pill py-md-3 px-md-5 animated slideInRight">Free Quote</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('mytemplate/img/carousel-3.jpg')}}" alt="">
                <div class="carousel-inner">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h1 class="display-3 text-white animated slideInDown mb-4">Innovative Solution For Security System</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                                <a href="" class="btn btn-primary rounded-pill py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                                <a href="" class="btn btn-light rounded-pill py-md-3 px-md-5 animated slideInRight">Free Quote</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Facts Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="h-100 bg-dark p-4 p-xl-5">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="btn-square rounded-circle" style="width: 64px; height: 64px; background: #000000;">
                                <img class="img-fluid" src="{{ asset('mytemplate/img/icon/icon-3.png')}}" alt="Icon">
                            </div>
                            <h1 class="display-1 mb-0" style="color: #000000;">01</h1>
                        </div>
                        <h5 class="text-white">Home Security</h5>
                        <hr class="w-25">
                        <span>Vero elitr justo clita lorem ipsum dolor at sed stet sit diam rebum ipsum et diam justo clita et</span>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="h-100 bg-dark p-4 p-xl-5">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="btn-square rounded-circle" style="width: 64px; height: 64px; background: #000000;">
                                <img class="img-fluid" src="{{asset ('mytemplate/img/icon/icon-4.png')}}" alt="Icon">
                            </div>
                            <h1 class="display-1 mb-0" style="color: #000000;">02</h1>
                        </div>
                        <h5 class="text-white">Access Control</h5>
                        <hr class="w-25">
                        <span>Vero elitr justo clita lorem ipsum dolor at sed stet sit diam rebum ipsum et diam justo clita et</span>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="h-100 bg-dark p-4 p-xl-5">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="btn-square rounded-circle" style="width: 64px; height: 64px; background: #000000;">
                                <img class="img-fluid" src="{{asset ('mytemplate/img/icon/icon-2.png')}}" alt="Icon">
                            </div>
                            <h1 class="display-1 mb-0" style="color: #000000;">03</h1>
                        </div>
                        <h5 class="text-white">24/7 Support</h5>
                        <hr class="w-25">
                        <span>Vero elitr justo clita lorem ipsum dolor at sed stet sit diam rebum ipsum et diam justo clita et</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts Start -->


    <!-- About Start -->
    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
        <div class="container about px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 ps-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{asset('mytemplate/img/about.jpg')}}" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 pe-lg-0">
                        <div class="bg-primary mb-3" style="width: 60px; height: 2px;"></div>
                        <h1 class="display-5 mb-4">About Us</h1>
                        <p class="mb-4 pb-2">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo erat amet</p>
                        <div class="row g-4 mb-4 pb-3">
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                                <div class="d-flex align-items-center">
                                    <div class="btn-square bg-white rounded-circle" style="width: 64px; height: 64px;">
                                        <img class="img-fluid" src="{{asset('mytemplate/img/icon/icon-1.png')}}" alt="Icon">
                                    </div>
                                    <div class="ms-4">
                                        <h2 class="mb-1" data-toggle="counter-up">1234</h2>
                                        <p class="fw-medium text-primary mb-0">Happy Clients</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                                <div class="d-flex align-items-center">
                                    <div class="btn-square bg-white rounded-circle" style="width: 64px; height: 64px;">
                                        <img class="img-fluid" src="{{asset ('mytemplate/img/icon/icon-5.png')}}" alt="Icon">
                                    </div>
                                    <div class="ms-4">
                                        <h2 class="mb-1" data-toggle="counter-up">1234</h2>
                                        <p class="fw-medium text-primary mb-0">Projects Done</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="" class="btn btn-primary rounded-pill py-3 px-5">Explore More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center">
                <div class="bg-primary mb-3 mx-auto" style="width: 60px; height: 2px;"></div>
                <h1 class="display-5 mb-5">Our Services</h1>
            </div>
            <div class="row g-0 service-row">
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="service-item border h-100 p-5">
                        <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <img class="img-fluid" src="{{asset ('mytemplate/img/icon/icon-6.png')}}" alt="Icon">
                        </div>
                        <h4 class="mb-3">Commercial CCTV System</h4>
                        <p class="mb-4">Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem</p>
                        <a class="btn" href=""><i class="fa fa-arrow-right text-white me-3"></i>Read More</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                    <div class="service-item border h-100 p-5">
                        <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <img class="img-fluid" src="{{asset ('mytemplate/img/icon/icon-8.png')}}" alt="Icon">
                        </div>
                        <h4 class="mb-3">Finger Print Access</h4>
                        <p class="mb-4">Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem</p>
                        <a class="btn" href=""><i class="fa fa-arrow-right text-white me-3"></i>Read More</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                    <div class="service-item border h-100 p-5">
                        <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <img class="img-fluid" src="{{asset ('mytemplate/img/icon/icon-9.png')}}" alt="Icon">
                        </div>
                        <h4 class="mb-3">Fire Detection And Safety</h4>
                        <p class="mb-4">Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem</p>
                        <a class="btn" href=""><i class="fa fa-arrow-right text-white me-3"></i>Read More</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                    <div class="service-item border h-100 p-5">
                        <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <img class="img-fluid" src="{{asset ('mytemplate/img/icon/icon-3.png')}}" alt="Icon">
                        </div>
                        <h4 class="mb-3">Smart Home Security</h4>
                        <p class="mb-4">Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem</p>
                        <a class="btn" href=""><i class="fa fa-arrow-right text-white me-3"></i>Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Feature Start -->
    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
        <div class="container feature px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 feature-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 ps-lg-0">
                        <div class="bg-primary mb-3" style="width: 60px; height: 2px;"></div>
                        <h1 class="display-5 mb-5">Why Choose Us</h1>
                        <p class="mb-4 pb-2">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo erat amet</p>
                        <div class="row g-4">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="btn-square bg-white rounded-circle" style="width: 64px; height: 64px;">
                                        <img class="img-fluid" src="{{asset('mytemplate/img/icon/icon-7.png')}}" alt="Icon">
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-primary mb-2">Trusted</p>
                                        <h5 class="mb-0">Security</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="btn-square bg-white rounded-circle" style="width: 64px; height: 64px;">
                                        <img class="img-fluid" src="{{asset('mytemplate/img/icon/icon-10.png')}}" alt="Icon">
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-primary mb-2">Quality</p>
                                        <h5 class="mb-0">Services</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="btn-square bg-white rounded-circle" style="width: 64px; height: 64px;">
                                        <img class="img-fluid" src="{{asset('mytemplate/img/icon/icon-3.png')}}" alt="Icon">
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-primary mb-2">Smart</p>
                                        <h5 class="mb-0">Systems</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="btn-square bg-white rounded-circle" style="width: 64px; height: 64px;">
                                        <img class="img-fluid" src="{{asset('mytemplate/img/icon/icon-2.png')}}" alt="Icon">
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-primary mb-2">24/7 Hours</p>
                                        <h5 class="mb-0">Support</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{asset('mytemplate/img/feature.jpg')}}" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


    <!-- Projects Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-primary mb-3 mx-auto" style="width: 60px; height: 2px;"></div>
                <h1 class="display-5 mb-5">Our Projects</h1>
            </div>
            <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-12 text-center">
                    <ul class="list-inline mb-5" id="portfolio-flters">
                        <li class="mx-2 active" data-filter="*">All</li>
                        <li class="mx-2" data-filter=".first">Complete Projects</li>
                        <li class="mx-2" data-filter=".second">Ongoing Projects</li>
                    </ul>
                </div>
            </div>
            <div class="row g-4 portfolio-container">
                <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                    <div class="portfolio-inner">
                        <img class="img-fluid w-100" src="{{asset ('mytemplate/img/portfolio-1.jpg')}}" alt="">
                        <div class="text-center p-4">
                            <p class="text-primary mb-2">Business Security</p>
                            <h5 class="lh-base mb-0">Smart CCTV Security Systems That Fits Your Business</h5>
                        </div>
                        <div class="portfolio-text text-center bg-white p-4">
                            <p class="text-primary mb-2">Business Security</p>
                            <h5 class="lh-base mb-3">Smart CCTV Security Systems That Fits Your Business</h5>
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href="img/portfolio-1.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item second wow fadeInUp" data-wow-delay="0.3s">
                    <div class="portfolio-inner">
                        <img class="img-fluid w-100" src="{{asset ('mytemplate/img/portfolio-2.jpg')}}" alt="">
                        <div class="text-center p-4">
                            <p class="text-primary mb-2">Fire Detection</p>
                            <h5 class="lh-base mb-0">Smart CCTV Security Systems That Fits Your Business</h5>
                        </div>
                        <div class="portfolio-text text-center bg-white p-4">
                            <p class="text-primary mb-2">Fire Detection</p>
                            <h5 class="lh-base mb-3">Smart CCTV Security Systems That Fits Your Business</h5>
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href="img/portfolio-2.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.5s">
                    <div class="portfolio-inner">
                        <img class="img-fluid w-100" src="{{asset ('mytemplate/img/portfolio-3.jpg')}}" alt="">
                        <div class="text-center p-4">
                            <p class="text-primary mb-2">Access Control</p>
                            <h5 class="lh-base mb-0">Smart CCTV Security Systems That Fits Your Business</h5>
                        </div>
                        <div class="portfolio-text text-center bg-white p-4">
                            <p class="text-primary mb-2">Access Control</p>
                            <h5 class="lh-base mb-3">Smart CCTV Security Systems That Fits Your Business</h5>
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href="img/portfolio-3.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item second wow fadeInUp" data-wow-delay="0.1s">
                    <div class="portfolio-inner">
                        <img class="img-fluid w-100" src="{{asset ('mytemplate/img/portfolio-4.jpg')}}" alt="">
                        <div class="text-center p-4">
                            <p class="text-primary mb-2">Alarm Systems</p>
                            <h5 class="lh-base mb-0">Smart CCTV Security Systems That Fits Your Business</h5>
                        </div>
                        <div class="portfolio-text text-center bg-white p-4">
                            <p class="text-primary mb-2">Alarm Systems</p>
                            <h5 class="lh-base mb-3">Smart CCTV Security Systems That Fits Your Business</h5>
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href="img/portfolio-4.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.3s">
                    <div class="portfolio-inner">
                        <img class="img-fluid w-100" src="{{asset ('mytemplate/img/portfolio-5.jpg')}}" alt="">
                        <div class="text-center p-4">
                            <p class="text-primary mb-2">CCTV & Video</p>
                            <h5 class="lh-base mb-0">Smart CCTV Security Systems That Fits Your Business</h5>
                        </div>
                        <div class="portfolio-text text-center bg-white p-4">
                            <p class="text-primary mb-2">CCTV & Video</p>
                            <h5 class="lh-base mb-3">Smart CCTV Security Systems That Fits Your Business</h5>
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href="img/portfolio-5.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item second wow fadeInUp" data-wow-delay="0.5s">
                    <div class="portfolio-inner">
                        <img class="img-fluid w-100" src="{{asset ('mytemplate/img/portfolio-6.jpg')}}" alt="">
                        <div class="text-center p-4">
                            <p class="text-primary mb-2">Smart Home</p>
                            <h5 class="lh-base mb-0">Smart CCTV Security Systems That Fits Your Business</h5>
                        </div>
                        <div class="portfolio-text text-center bg-white p-4">
                            <p class="text-primary mb-2">Smart Home</p>
                            <h5 class="lh-base mb-3">Smart CCTV Security Systems That Fits Your Business</h5>
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href="img/portfolio-6.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Projects End -->


    <!-- Quote Start -->
    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
        <div class="container quote px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 ps-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{asset ('mytemplate/img/quote.jpg')}}" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 quote-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 pe-lg-0">
                        <div class="bg-primary mb-3" style="width: 60px; height: 2px;"></div>
                        <h1 class="display-5 mb-5">Free Quote</h1>
                        <p class="mb-4 pb-2">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo erat amet</p>
                        <form>
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control border-0" placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" placeholder="Your Mobile" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select class="form-select border-0" style="height: 55px;">
                                        <option selected>Select A Service</option>
                                        <option value="1">Service 1</option>
                                        <option value="2">Service 2</option>
                                        <option value="3">Service 3</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control border-0" placeholder="Special Note"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Get A Free Quote</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-primary mb-3 mx-auto" style="width: 60px; height: 2px;"></div>
                <h1 class="display-5 mb-5">Team Members</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative">
                            <img class="img-fluid" src="{{asset('mytemplate/img/team-1.jpg')}}" alt="">
                            <div class="team-social">
                                <a class="btn btn-square btn-dark rounded-circle m-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle m-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle m-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Full Name</h5>
                            <span class="text-primary">Designation</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative">
                            <img class="img-fluid" src="{{asset('mytemplate/img/team-2.jpg')}}" alt="">
                            <div class="team-social">
                                <a class="btn btn-square btn-dark rounded-circle m-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle m-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle m-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Full Name</h5>
                            <span class="text-primary">Designation</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative">
                            <img class="img-fluid" src="{{asset('mytemplate/img/team-3.jpg')}}" alt="">
                            <div class="team-social">
                                <a class="btn btn-square btn-dark rounded-circle m-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle m-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle m-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Full Name</h5>
                            <span class="text-primary">Designation</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative">
                            <img class="img-fluid" src="{{asset('mytemplate/img/team-4.jpg')}}" alt="">
                            <div class="team-social">
                                <a class="btn btn-square btn-dark rounded-circle m-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle m-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle m-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Full Name</h5>
                            <span class="text-primary">Designation</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-primary mb-3 mx-auto" style="width: 60px; height: 2px;"></div>
                <h1 class="display-5 mb-5">Testimonial</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item text-center" data-dot="<img class='img-fluid' src='{{asset ('mytemplate/img/testimonial-1.jpg')}}' alt=''>">
                    <p class="fs-5">Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</p>
                    <h4>Client Name</h4>
                    <span class="text-primary">Profession</span>
                </div>
                <div class="testimonial-item text-center" data-dot="<img class='img-fluid' src='{{asset ('mytemplate/img/testimonial-2.jpg')}}' alt=''>">
                    <p class="fs-5">Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</p>
                    <h4>Client Name</h4>
                    <span class="text-primary">Profession</span>
                </div>
                <div class="testimonial-item text-center" data-dot="<img class='img-fluid' src='{{asset ('mytemplate/img/testimonial-3.jpg')}}' alt=''>">
                    <p class="fs-5">Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</p>
                    <h4>Client Name</h4>
                    <span class="text-primary">Profession</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

  <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset ('mytemplate/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset ('mytemplate/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset ('mytemplate/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset ('mytemplate/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset ('mytemplate/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset ('mytemplate/lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset ('mytemplate/lib/lightbox/js/lightbox.min.js') }}"></script>

 </body>
 @endsection