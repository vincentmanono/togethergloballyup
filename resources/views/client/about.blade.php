@extends('layouts.mainapp')

@section('content')


    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image:  url(assets/img/bg-img/13.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>About us</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">About Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### About Area Start ###### -->
    <section class="about-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <div class="about-content mb-100">
                        <!-- Section Heading -->
                        <div class="section-heading">
                            <div class=""></div>
                            {{-- <p>Take look at our</p> --}}
                            <h2>About our company</h2>
                        </div>
                        <h6 class="mb-4">
                            TogetherGloballyUp is a simple to use web application that enables investment groups to
                             manage all their group activities and communications </h6>
                        <p class="mb-0">
                            This online based solution enables group administrators
                             to easily and efficiently track all contribution accounts within the group.
                             These payments include contributions payments, penalty payments, customer payments, supplier payments, special deposits,
                              member loan payments, bank loan payments. These payments are handled by the group administrators.
                            </p>
                        <a href="/about" class="btn credit-btn mt-50">Discover</a>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="about-thumbnail mb-100">
                        <img src="assets/img/bg-img/14.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Area End ###### -->

    <!-- ##### Call To Action Start ###### -->
    <section class="cta-area d-flex flex-wrap">
        <!-- Cta Content -->
        <div class="cta-content">
            <!-- Section Heading -->
            <div class="section-heading white">
                <div class=" "></div>
                {{-- <p>Bold desing and beyound</p> --}}
                <h2>Groups Management</h2>
            </div>
            <h6 class="mb-0">
                When it comes to managing your groups finances, one needs to choose tools
that ease the work load, are accurate and accessible.We automates the operations of investment
 groups, eliminating the need for complex spreadsheets and bulky write up, making the work of
  financial book keeping within the group easier.

            </h6>

            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <!-- Single Cool Facts -->
                <div class="single-cool-fact white d-flex align-items-center mt-50">
                    <div class="scf-icon mr-15">
                        <i class="icon-piggy-bank"></i>
                    </div>
                    <div class="scf-text">
                        <h2><span class="counter">710</span></h2>
                        <p>Clients</p>
                    </div>
                </div>
                <!-- Single Cool Facts -->
                <div class="single-cool-fact white d-flex align-items-center mt-50">
                    <div class="scf-icon mr-15">
                        <i class="icon-coin"></i>
                    </div>
                    <div class="scf-text">
                        <h2><span class="counter">35</span></h2>
                        <p>Creditors</p>
                    </div>
                </div>
                <!-- Single Cool Facts -->
                <div class="single-cool-fact white d-flex align-items-center mt-50">
                    <div class="scf-icon mr-15">
                        <i class="icon-diamond"></i>
                    </div>
                    <div class="scf-text">
                        <h2><span class="counter">12</span></h2>
                        <p>awards</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cta Thumbnail -->
        <div class="cta-thumbnail bg-img jarallax" style="background-image:  url(assets/img/bg-img/19.jpg);"></div>
    </section>
    <!-- ##### Call To Action End ###### -->

    <!-- ##### Call To Action Start ###### -->
    <section class="cta-2-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Cta Content -->
                    <div class="cta-content d-flex flex-wrap align-items-center justify-content-between">
                        <div class="cta-text">
                            <h4>Are you in need for investment? Get in touch with us.</h4>
                            <p>This online based solution enables group administrators to easily and efficiently track all contribution accounts within the group.

                            </p>
                        </div>
                        <div class="cta-btn">
                            <a href="/contact" class="btn credit-btn box-shadow">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Call To Action End ###### -->

    <!-- ##### Team Member Area Start ##### -->
    {{-- <section class="team-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center mb-100">
                        <div class="line"></div>
                        <p>Take look at our</p>
                        <h2>Our team</h2>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Single Team Member Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-team-member-area mb-100">
                        <div class="team-thumb">
                            <img src="assets/img/bg-img/15.jpg" alt="">
                            <!-- View More -->
                            <div class="view-more">
                                <a href="#">+</a>
                            </div>
                        </div>
                        <div class="team-info">
                            <h5>Abraham</h5>
                            <h6>System Manager</h6>
                        </div>
                    </div>
                </div>

                <!-- Single Team Member Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-team-member-area mb-100">
                        <div class="team-thumb">
                            <img src="assets/img/bg-img/16.jpg" alt="">
                            <!-- View More -->
                            <div class="view-more">
                                <a href="#">+</a>
                            </div>
                        </div>
                        <div class="team-info">
                            <h5>Michael Smith</h5>
                            <h6>Loan Manager</h6>
                        </div>
                    </div>
                </div>

                <!-- Single Team Member Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-team-member-area mb-100">
                        <div class="team-thumb">
                            <img src="assets/img/bg-img/17.jpg" alt="">
                            <!-- View More -->
                            <div class="view-more">
                                <a href="#">+</a>
                            </div>
                        </div>
                        <div class="team-info">
                            <h5>Jessica Williams</h5>
                            <h6>Loan Manager</h6>
                        </div>
                    </div>
                </div>

                <!-- Single Team Member Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-team-member-area mb-100">
                        <div class="team-thumb">
                            <img src="assets/img/bg-img/18.jpg" alt="">
                            <!-- View More -->
                            <div class="view-more">
                                <a href="#">+</a>
                            </div>
                        </div>
                        <div class="team-info">
                            <h5>James Smith</h5>
                            <h6>Loan Manager</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section> --}}
    <!-- ##### Team Member Area End ##### -->

@endsection
