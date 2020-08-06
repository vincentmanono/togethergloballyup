@extends('layouts.mainapp')

@section('content')


 <!-- ##### Breadcrumb Area Start ##### -->
 <section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(assets/img/bg-img/13.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>Testimonials</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="/testimonial">Testimonials</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Breadcrumb Area End ##### -->

 <!-- ##### Services Area Start ###### -->
 <section class="services-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading text-center mb-100">
                    <div class="line"></div>
                    <p>Take look at our clients Testimonials</p>
                    <h2>Testimonials</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Single Service Area -->

                @if ($testimonies->count() > 0)
                @foreach ($testimonies as $testimony)
                                  <!-- Single Service Area -->
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="single-service-area d-flex mb-100">
                                    <div class="icon">
                                        <i class="icon-coin"></i>
                                    </div>
                                    <div class="text">
                                        <h5 class="text text-capitalize" >{{ $testimony->user->name }}</h5>
                                    <p class="text text-dark" >{{$testimony->body}}</p>
                                    <div class="text text-bold text-center" >
                                       posted  {{  ( $testimony->created_at)->diffForHumans() }}
                                    </div>
                                    </div>
                                </div>
                            </div>
                @endforeach
                <div class="col-12 col-md-12 col-lg-12 text text-center mb-5 ">

                     {{$testimonies->links()}}
                </div>

                @endif
</section>
<!-- ##### Services Area End ###### -->

@endsection
