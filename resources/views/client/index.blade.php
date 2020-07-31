@extends('layouts.mainapp')

@section('content')



    <!-- ##### Hero Area Start ##### -->
    <div class="hero-area">
        <div class="hero-slideshow owl-carousel">

            <!-- Single Slide -->
            <div class="single-slide bg-img">
                <!-- Background Image-->
                <div class="slide-bg-img bg-img bg-overlay" style="background-image: url(assets/img/bg-img/1.jpg);"></div>
                <!-- Welcome Text -->
                <div class="container h-100">
                    <div class="row h-100 align-items-center justify-content-center">
                        <div class="col-12 col-lg-9">
                            <div class="welcome-text text-center">
                                {{-- <h6 data-animation="fadeInUp" data-delay="100ms">mount Chama</h6> --}}
                                <h2 data-animation="fadeInUp" data-delay="300ms"> Don’t hesitate Computerize your <span>merry-go-round</span> today. </h2>
                                <p data-animation="fadeInUp" data-delay="500ms"> TogetherGloballyUp unites you with focused peoble like you
                                    to add an extra coin in your pocket. We make sure we boost your investment goals to the next level.</p>
                                <a href="/about" class="btn credit-btn mt-50" data-animation="fadeInUp" data-delay="700ms">Discover</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide Duration Indicator -->
                <div class="slide-du-indicator"></div>
            </div>

            <!-- Single Slide -->
            <div class="single-slide bg-img">
                <!-- Background Image-->
                <div class="slide-bg-img bg-img bg-overlay" style="background-image: url(assets/img/bg-img/5.jpg);"></div>
                <!-- Welcome Text -->
                <div class="container h-100">
                    <div class="row h-100 align-items-center justify-content-center">
                        <div class="col-12 col-lg-9">
                            <div class="welcome-text text-center">
                                <h6 data-animation="fadeInDown" data-delay="100ms">Few steps remaining for you to achieve your goal.</h6>
                                <h2 data-animation="fadeInDown" data-delay="300ms">
                                    Don't wait!<span> Automate </span> your chama now!
                                <p data-animation="fadeInDown" data-delay="500ms" >
                                One Idea Can Change Your Life Forever.I don't know your dreams...but I know you have them! Your Dreams Inspire And Give You Strength
                                But You Will Never Know If You Are Strong Enough To Live Your Dreams
                                Unless You Try!</p>
                                <a href="/about class="btn credit-btn mt-50" data-animation="fadeInDown" data-delay="700ms">Discover</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide Duration Indicator -->
                <div class="slide-du-indicator"></div>
            </div>

            <!-- Single Slide -->
            {{-- <div class="single-slide bg-img">
                <!-- Background Image-->
                <div class="slide-bg-img bg-img bg-overlay" style="background-image: url(assets/img/bg-img/1.jpg);"></div>
                <!-- Welcome Text -->
                <div class="container h-100">
                    <div class="row h-100 align-items-center justify-content-center">
                        <div class="col-12 col-lg-9">
                            <div class="welcome-text text-center">
                                <h6 data-animation="fadeInUp" data-delay="100ms">2 years interest</h6>
                                <h2 data-animation="fadeInUp" data-delay="300ms">get your <span>loan</span> now</h2>
                                <p data-animation="fadeInUp" data-delay="500ms">Vestibulum eu vehicula elit, nec elementum orci. Praesent aliquet ves tibulum tempus. Pellentesque posuere pharetra turpis, eget finibus erat porta placerat.</p>
                                <a href="#" class="btn credit-btn mt-50" data-animation="fadeInUp" data-delay="700ms">Discover</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide Duration Indicator -->
                <div class="slide-du-indicator"></div>
            </div>

            <!-- Single Slide -->
            <div class="single-slide bg-img">
                <!-- Background Image-->
                <div class="slide-bg-img bg-img bg-overlay" style="background-image: url(assets/img/bg-img/5.jpg);"></div>
                <!-- Welcome Text -->
                <div class="container h-100">
                    <div class="row h-100 align-items-center justify-content-center">
                        <div class="col-12 col-lg-9">
                            <div class="welcome-text text-center">
                                <h6 data-animation="fadeInDown" data-delay="100ms">2 years interest</h6>
                                <h2 data-animation="fadeInDown" data-delay="300ms">get your <span>loan</span> now</h2>
                                <p data-animation="fadeInDown" data-delay="500ms">Vestibulum eu vehicula elit, nec elementum orci. Praesent aliquet ves tibulum tempus. Pellentesque posuere pharetra turpis, eget finibus erat porta placerat.</p>
                                <a href="#" class="btn credit-btn mt-50" data-animation="fadeInDown" data-delay="700ms">Discover</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide Duration Indicator -->
                <div class="slide-du-indicator"></div>
            </div> --}}

        </div>
    </div>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Features Area Start ###### -->
    {{-- <section class="features-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-features-area mb-100 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Section Heading -->
                        <div class="section-heading">
                            <div class="line"></div>
                            <p>Take look at our</p>
                            <h2>Our idea</h2>
                        </div>
                        <h6>
                            togetherglobally is a simple to use web application that enables you to join online merry-go-round groups to manage all  activities and communications.
                            The cloud based solution enables group administrators to easily and
                             efficiently track all contribution accounts within the group..
                            </h6>
                        <a href="#" class="btn credit-btn mt-50">Discover</a>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-features-area mb-100 wow fadeInUp" data-wow-delay="300ms">
                        <img src="assets/img/bg-img/2.jpg" alt="">
                        <h5>We take care of you</h5>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-features-area mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <img src="assets/img/bg-img/3.jpg" alt="">
                        <h5>No documents needed</h5>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-features-area mb-100 wow fadeInUp" data-wow-delay="700ms">
                        <img src="assets/img/bg-img/4.jpg" alt="">
                        <h5>Fast &amp; easy investment</h5>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ##### Features Area End ###### -->

    <!-- ##### Call To Action Start ###### -->
    <section class="cta-area d-flex flex-wrap">
        <!-- Cta Thumbnail -->
        <div class="cta-thumbnail bg-img jarallax"
         style="background-image: url(https://images.unsplash.com/photo-1588528022690-3d35ed25e4f9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60);"></div>

        <!-- Cta Content -->
        <div class="cta-content">
            <!-- Section Heading -->
            <div class="section-heading white">
                <div class="line"></div>
                <p>Bold design and beyond.</p>
                <h2>Helping small chamas like yours.</h2>
            </div>
            <h6>TogetherGloballyUp is a simple to use web application that enables you to join
                 online merry-go-round groups to manage all  activities and communications.
                The online based solution enables group administrators to easily and
                 efficiently track all contribution accounts within the group..</h6>
            <div class="d-flex flex-wrap mt-50">
                <!-- Single Skills Area -->
                <div class="single-skils-area mb-70 mr-5">
                    <div id="circle" class="circle" data-value="0.90">
                        <div class="skills-text">
                            <span>90%</span>
                        </div>
                    </div>
                    <p>Easy setup</p>
                </div>

                <!-- Single Skills Area -->
                <div class="single-skils-area mb-70 mr-5">
                    <div id="circle2" class="circle" data-value="1.00">
                        <div class="skills-text">
                            <span>100%</span>
                        </div>
                    </div>
                    <p>Availability</p>
                </div>

                <!-- Single Skills Area -->
                <div class="single-skils-area mb-70">
                    <div id="circle3" class="circle" data-value="0.97">
                        <div class="skills-text">
                            <span>97%</span>
                        </div>
                    </div>
                    <p>resource</p>
                </div>
            </div>
            <a href="/services" class="btn credit-btn box-shadow btn-2">Read More</a>
        </div>
    </section>
    <!-- ##### Call To Action End ###### -->

    <!-- ##### Call To Action Start ###### -->
    <section class="cta-2-area wow fadeInUp" data-wow-delay="100ms">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Cta Content -->
                    <div class="cta-content d-flex flex-wrap align-items-center justify-content-between">
                        <div class="cta-text">
                            <h4>Are you in need for a Help? Get in touch with us.</h4>
                        </div>
                        <div class="cta-btn">
                            <a href="/contact" class="btn credit-btn box-shadow">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Call To Action End ###### -->

    <!-- ##### Services Area Start ###### -->
    @include('includes.services')
    <!-- ##### Services Area End ###### -->

    <!-- ##### Miscellaneous Area Start ###### -->
    <section class="miscellaneous-area bg-gray section-padding-100-0">
        <div class="container">
            <div class="join mt-0 mb-15 border-bottom border-dark text text-bold  "  > <i class="fa fa-pencil" aria-hidden="true"></i> How to Join</div>
            <div class="row align-items-end justify-content-center ">
                <!-- Add Area -->

                <div class="col-12 col-md-6 col-lg-6 ">
                    <div class="add-area mb-100 wow fadeInUp row mt-0 " data-wow-delay="100ms">
                         <div class="card col-md-6 mt-0 ">
                             <div class="card-body">
                                 <h4 class="card-title"> <i class="fa fa-user-plus" aria-hidden="true"> Create Account </i> </h4>
                                 <h2 class="text text-capitalize text-center " style="background-color: rgb(41, 45, 49); color:white; " >New account</h2>
                                 <p class="card-text">
                                     <div>
                                         Sign up to get connected with the champions at Online Chama using the link provided below
                                     </div>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-warning mt-3 block justify-content-center "
                                     data-toggle="modal" data-target="#signup">
                                      SignUp
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="signup" tabindex="-1" role="dialog"
                                    aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Create new account</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('register') }}" method="post">
                                                        @csrf
                                                        @method("POST")

                                                        <div class="form-group row">

                                                            <div class="col-md-6">
                                                                <input id="firstName" type="text" placeholder="First Name" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName" autofocus>

                                                                @error('firstName')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6">
                                                                <input id="lastName" type="text" placeholder="Last Name" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>

                                                                @error('lastName')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>




                                                        <div class="form-group ">
                                                            <label for="email" class=" col-form-label ">{{ __('E-Mail Address') }}</label>


                                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Email"  autocomplete="email">

                                                                @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror

                                                        </div>


                                                        <div class="form-group ">
                                                            <label for="phone" class=" col-form-label ">{{ __('Phone Number') }}</label>


                                                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required placeholder="phone"  autocomplete="phone">

                                                                @error('phone')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror

                                                        </div>


                                                        <div class="form-group ">
                                                            <label for="password" class=" col-form-label ">{{ __('Password') }}</label>


                                                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                                @error('password')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror

                                                        </div>

                                                        <div class="form-group ">
                                                            <label for="password-confirm" class=" col-form-label ">{{ __('Confirm Password') }}</label>

                                                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                                        </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary text text-capitalize " data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary text text-capitalize ">Create Account</button>
                                                </div>
                                            </div>
                                         </form>
                                        </div>
                                    </div>
                                 </p>

                             </div>
                         </div>
                         <div class="card col-md-6 mt-0 ">
                            <div class="card-body">
                                <h4 class="card-title text-capitalize "> <i class="fa fa-sign-in" aria-hidden="true"></i> Login </i> </h4>
                                <h2 class="text text-capitalize text-center " style="background-color: rgb(41, 45, 49); color:white; " >Sign in to Account </h2>
                                <p class="card-text">
                                    <div>
                                        Login to your account by using the link below to access your dashboard Services.
                                    </div>

                                   <!-- Button trigger modal -->
                                   <button type="button" class="btn btn-sm btn-warning mt-3 block justify-content-center "
                                   data-toggle="modal" data-target="#signin">
                                    <i class="fa fa-sign-in" aria-hidden="true"></i> SignIn
                                   </button>

                                   <!-- Modal -->
                                   <div class="modal fade" id="signin" tabindex="-1" role="dialog"
                                    aria-labelledby="modelTitleId" aria-hidden="true">
                                       <div class="modal-dialog" role="document">
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <h5 class="modal-title">Sign in to access your account detials</h5>
                                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                           <span aria-hidden="true">&times;</span>
                                                       </button>
                                               </div>
                                               <div class="modal-body">
                                                   <form action="{{ route('login') }}" method="post">
                                                    @csrf
                                                   <div class="form-group">
                                                     <label for="email">Your Email</label>
                                                     <input type="email" class="form-control" name="email" id="email"  placeholder="Your email">

                                                   </div>
                                                   <div class="form-group">
                                                     <label for="password">Password</label>
                                                     <input type="password" class="form-control" name="password" id="password" placeholder="Your password">
                                                   </div>
                                               </div>
                                               <div class="modal-footer">
                                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                   <button type="submit" class="btn btn-primary">Login</button>
                                               </div>
                                            </form>
                                           </div>
                                       </div>
                                   </div>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 ">
                <div class="  add-area mb-100 wow fadeInUp" data-wow-delay="100ms" >
                    <div class="card" >
                         <div class="card-body">
                        <h4 class="card-title">Procedure you should follow</h4>
                        <p class="card-text">
                            Once the account has been created, a user will be logged in automatically,
                            showing a <span class="text text-danger" >red button </span>  on the dashboard <span class="text text-capitalize text-bold " >"Activate my account" </span> .
                             Click the red button. A payment popup that allows for <span class="text text-capitalize text-bold text-success ">M-PESA and PAYPAL </span>  payments will show.
                              Selecting M-PESA, a user will have to check his phone for a prompt which will require him / her
                               to confirm the purchase process by giving out <span class="text text-capitalize text-bold text-success "> Ksh. 100/= </span>. If Paypal option is selected,
                               a 0.11$ will be required for purchase. Once the purchase is done, the account will be
                                validated automatically.
                        </p>
                    </div>
                    </div>

                </div>
                </div>


            </div>
        </div>
    </section>
    <!-- ##### Miscellaneous Area End ###### -->

@endsection
