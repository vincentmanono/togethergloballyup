@extends('layouts.mainapp')

@section('content')


    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(assets/img/bg-img/13.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Contact</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Single Contact Area -->
                <div class="col-12 col-lg-6">
                    <div class="single-contact-area mb-100">
                        <!-- Logo -->
                        <a href="#" class="d-block mb-50"><img src="assets/img/core-img/logo.png" alt=""></a>
                        <p>Over the years, Chamasoft has proven to be helpful to financial investment groups,
                            locally known as Chamas, by enhancing transparency and confidence among the members
                            , allowing these groups to focus on investment rather than
                            administration therefore saving time, and also facilitating structured investment
                             group management.</p>
                    </div>
                </div>

                <!-- Single Contact Area -->
                <div class="col-12 col-lg-6">
                    <div class="single-contact-area mb-100">
                        <div class="contact-advisor">
                            <h5>Contact an advisor</h5>
                            <!-- Single Advisor -->
                            <div class="single-advisor d-flex align-items-center">
                                <div class="advisor-img">
                                    <img src=https://previews.123rf.com/images/kritchanut/kritchanut1410/kritchanut141000121/32814147-male-silhouette-icon-with-question-mark-sign-on-the-face-suspect-concept.jpg" alt="">
                                </div>
                                <div class="advisor-info">
                                Full Name here</h6>
                                    <span>Advisor</span>
                                    <p>++245 70 432 5455</p>
                                </div>
                            </div>
                            <!-- Single Advisor -->
                            <div class="single-advisor d-flex align-items-center">
                                <div class="advisor-img">
                                    <img src="https://previews.123rf.com/images/kritchanut/kritchanut1410/kritchanut141000121/32814147-male-silhouette-icon-with-question-mark-sign-on-the-face-suspect-concept.jpg" alt="">
                                </div>
                                <div class="advisor-info">
                                    <h6>Full Name here</h6>
                                    <span>Advisor</span>
                                    <p>+245 70 432 5455</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Contact Area -->
                {{-- <div class="col-12 col-lg-4">
                    <div class="single-contact-area mb-100">
                        <div class="contact--area contact-page">
                            <!-- Contact Content -->
                            <div class="contact-content">
                                <h5>Get in touch</h5>

                                <!-- Single Contact Content -->
                                <div class="single-contact-content d-flex align-items-center">
                                    <div class="icon">
                                        <img src="assets/img/core-img/location.png" alt="">
                                    </div>
                                    <div class="text">
                                        <p>3007 Sarah Drive <br> Franklin, LA 70538</p>
                                    </div>
                                </div>
                                <!-- Single Contact Content -->
                                <div class="single-contact-content d-flex align-items-center">
                                    <div class="icon">
                                        <img src="assets/img/core-img/call.png" alt="">
                                    </div>
                                    <div class="text">
                                        <p>337-413-9538</p>
                                        <span>mon-fri , 08.am - 17.pm</span>
                                    </div>
                                </div>
                                <!-- Single Contact Content -->
                                <div class="single-contact-content d-flex align-items-center">
                                    <div class="icon">
                                        <img src="assets/img/core-img/message2.png" alt="">
                                    </div>
                                    <div class="text">
                                        <p>contact@yourbusiness.com</p>
                                        <span>we reply in 24 hrs</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>


        <!-- ##### Google Maps ##### -->
        <div class="map-area">
            <iframe src="3d3o4Ka_aw!5e0!3m2!1sbn!2sbd!4v1532328708137" allowfullscreen></iframe>
            <!-- Contact Area -->
            <div class="contact---area">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <!-- Contact Area -->
                            <div class="contact-form-area contact-page">
                                <h4 class="mb-50">Send a message</h4>

                                <form action="#" method="post">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="name" placeholder="Your Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control" id="email" placeholder="Your E-mail">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="subject" placeholder="Your Subject">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Your Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn credit-btn mt-30" type="submit">Send</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->

@endsection
