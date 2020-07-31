@extends('layouts.mainapp')

@section('content')


    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(assets/img/bg-img/13.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Services</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Services</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Services Area Start ###### -->
    @include('includes.services')
    <!-- ##### Services Area End ###### -->

    <!-- ##### Special Feature Area Start ###### -->
    <section class="special-feature-area d-flex flex-wrap">
        <!-- Special Feature Content -->
        <div class="special-feature-content section-padding-100">
            <div class="feature-text">
                <!-- Section Heading -->
                <div class="section-heading white mb-50">
                    <div class=""></div>

                    <h2>Easy and Fast access</h2>
                </div>
                <h6>TogetherGloballyUp provides a web-based platform that is easy for chamas to register and use. It comes with a mobile friendly version where you can access the platform at any time and in a more convinient manner. It is a platform that is fast and readily available at just a click of a button.</h6>
                <a href="register" class="btn credit-btn btn-2 box-shadow">Register Today</a>
            </div>
        </div>
        <!-- Special Feature Thumbnail -->
        <div class="special-feature-thumbnail bg-img jarallax" style="background-image: url(assets/img/bg-img/20.jpg);"></div>
    </section>
    <!-- ##### Special Feature Area End ###### -->

    <!-- ##### Special Feature Area Start ###### -->
    <section class="special-feature-area style-2 d-flex flex-wrap">
        <!-- Special Feature Thumbnail -->
        <div class="special-feature-thumbnail bg-img jarallax" style="background-image: url(assets/img/bg-img/21.jpg);"></div>
        <!-- Special Feature Content -->
        <div class="special-feature-content section-padding-100">
            <div class="feature-text">
                <!-- Section Heading -->
                <div class="section-heading white mb-50">
                    <div class=""></div>
                    {{-- <p>Bold desing and beyound</p> --}}
                    <h2>Chamas</h2>
                </div>
                <h6>TogetherGloballyUP helps chamas transition to online platforms where they can do thier operations online. It is an easier to use platform and secure. At TogetherGloballyUp we help small chamas to venture into an online platform that will ensure the growth of the chama.</h6>
                <a href="about" class="btn credit-btn box-shadow">Read More</a>
            </div>
        </div>
    </section>
    <!-- ##### Special Feature Area End ###### -->

    <!-- ##### FAQ Area Start ###### -->
    {{-- <section class="credit-faq-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- FAQ Area -->
                <div class="col-12 col-lg-12">

                    <div class="accordions mb-100" id="accordion" role="tablist" aria-multiselectable="true">
                        <!-- single accordian area -->
                        <div class="panel single-accordion">
                            <h6><a role="button" class="" aria-expanded="true" aria-controls="collapseOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Morbi ut dapibus dui. Sed ut iaculis elit, quis varius
                                    <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                    <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                    </a></h6>
                            <div id="collapseOne" class="accordion-content collapse show">
                                <p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis egestas sem. Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis egestas sem. </p>
                            </div>
                        </div>
                        <!-- single accordian area -->
                        <div class="panel single-accordion">
                            <h6>
                                <a role="button" class="collapsed" aria-expanded="true" aria-controls="collapseTwo" data-parent="#accordion" data-toggle="collapse" href="#collapseTwo">Ert dapibus dui. Sed ut iaculis elit, quis vgyu
                                        <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                        <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                        </a>
                            </h6>
                            <div id="collapseTwo" class="accordion-content collapse">
                                <p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis egestas sem. Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis egestas sem. </p>
                            </div>
                        </div>
                        <!-- single accordian area -->
                        <div class="panel single-accordion">
                            <h6>
                                <a role="button" aria-expanded="true" aria-controls="collapseThree" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseThree">Ert dapibus dui. Sed ut iaculis elit, quis vgyu
                                        <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                        <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                    </a>
                            </h6>
                            <div id="collapseThree" class="accordion-content collapse">
                                <p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis egestas sem. Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis egestas sem. </p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section> --}}
    <!-- ##### FAQ Area End ###### -->

@endsection
