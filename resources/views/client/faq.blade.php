@extends('layouts.mainapp')

@section('content')
 <!-- ##### Breadcrumb Area Start ##### -->
 <section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(assets/img/bg-img/13.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>FRequently Asked Questions</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="/faq">FAQ</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Breadcrumb Area End ##### -->
   <!-- ##### FAQ Area Start ###### -->
   <section class="credit-faq-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <!-- FAQ Area -->
            <div class="col-12 col-lg-6">

                <div class="accordions mb-100" id="accordion" role="tablist" aria-multiselectable="true">
                    <!-- single accordian area -->
                    <div class="panel single-accordion">
                        <h6><a role="button" class="" aria-expanded="true" aria-controls="collapseOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">How does the online merry-go-round work?
                                <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                </a></h6>
                        <div id="collapseOne" class="accordion-content collapse ">
                            <p>TogetherGloballyUp offers you with a platform where you can join an online merry-go-round chama. The first thing you are supposed to do is to signup then from there you will be in a position to view
                                 the available chamas that contribute different amounts. Select the chama of your choice then you will be prompted to pay a registration fee which will allow you to now join a chama-group and view members and contribution activities taking place and how it operates. </p>
                        </div>
                    </div>
                    <!-- single accordian area -->
                    <div class="panel single-accordion">
                        <h6>
                            <a role="button" class="collapsed" aria-expanded="true" aria-controls="collapseTwo" data-parent="#accordion" data-toggle="collapse" href="#collapseTwo">What are the benefits of joining the online merry-go-round?
                                    <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                    <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                    </a>
                        </h6>
                        <div id="collapseTwo" class="accordion-content collapse">
                            <p>One of the benefits is that you can  be in a chama and transact securely wherever you are. It is convinient for record keeping as this shall be done by the
                                 system and all the details are backed up. </p>
                        </div>
                    </div>
                    <!-- single accordian area -->
                    <div class="panel single-accordion">
                        <h6>
                            <a role="button" aria-expanded="true" aria-controls="collapseThree" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseThree">What is the mode of payment?"
                                    <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                    <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                </a>
                        </h6>
                        <div id="collapseThree" class="accordion-content collapse">
                            <p>Our mode of payment at the moment is through MPESA. </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Area -->
            <div class="col-12 col-lg-6">

                <div class="accordions mb-100" id="accordion" role="tablist" aria-multiselectable="true">
                    <!-- single accordian area -->
                    <div class="panel single-accordion">
                        <h6><a role="button" class="" aria-expanded="true" aria-controls="collapseFour" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">What do i need to register?
                                <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                </a></h6>
                        <div id="collapseFour" class="accordion-content collapse ">
                            <p>You just need to provide your personal details as per the registration form and a membership payment of Ksh. 100/=. </p>
                        </div>
                    </div>
                    <!-- single accordian area -->
                    <div class="panel single-accordion">
                        <h6>
                            <a role="button" class="collapsed" aria-expanded="true" aria-controls="collapseFive" data-parent="#accordion" data-toggle="collapse" href="#collapseFive">What are the qualifications for one to join a merry-go-round?
                                    <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                    <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                    </a>
                        </h6>
                        <div id="collapseFive" class="accordion-content collapse">
                            <p>You have to be 18 years and above. Should have a valid Identification Card </p>
                        </div>
                    </div>
                    <!-- single accordian area -->
                    <div class="panel single-accordion">
                        <h6>
                            <a role="button" aria-expanded="true" aria-controls="collapseSix" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseSix">How much does one pay for registration?
                                    <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                    <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                </a>
                        </h6>
                        <div id="collapseSix" class="accordion-content collapse">
                            <p>The registration fee is Ksh 100/= which is paid during the process of joining a chama where you will be prompted via mpesa to pay the amount. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### FAQ Area End ###### -->

@endsection
