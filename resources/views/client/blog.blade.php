@extends('layouts.mainapp')

@section('content')

   <!-- ##### Breadcrumb Area Start ##### -->
   <section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(assets/img/bg-img/13.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>News</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">News</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### News Area Start ##### -->
<section class="news-area section-padding-100">
    <div class="container">
        <div class="row">
            <!-- Single News Area -->
            <div class="col-12 col-lg-8">

                <!-- Single Blog Area -->
                <div class="single-blog-area mb-70">
                    <div class="blog-thumbnail">
                        <a href="#"><img src="/assets/img/bg-img/20.jpg" alt=""></a>
                    </div>
                    <div class="blog-content">
                        <span>July 18, 2018</span>
                        <a href="#" class="post-title">How to get the best loan online</a>
                        <div class="blog-meta">
                            <a href="#" class="post-author"><img src="assets/img/core-img/pencil.png" alt=""> Jane Smith</a>
                            <a href="#" class="post-date"><img src="assets/img/core-img/calendar.png" alt=""> April 26</a>
                        </div>
                        <p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis egestas sem. Tut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis.</p>
                    </div>
                </div>

                <!-- Single Blog Area -->
                <div class="single-blog-area mb-70">
                    <div class="blog-thumbnail">
                        <a href="#"><img src="/assets/img/bg-img/21.jpg" alt=""></a>
                    </div>
                    <div class="blog-content">
                        <span>July 18, 2018</span>
                        <a href="#" class="post-title">A new way to finance your dream home</a>
                        <div class="blog-meta">
                            <a href="#" class="post-author"><img src="assets/img/core-img/pencil.png" alt=""> Jane Smith</a>
                            <a href="#" class="post-date"><img src="assets/img/core-img/calendar.png" alt=""> April 26</a>
                        </div>
                        <p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis egestas sem. Tut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis.</p>
                    </div>
                </div>

                <!-- Single Blog Area -->
                <div class="single-blog-area mb-70">
                    <div class="blog-thumbnail">
                        <a href="#"><img src="/assets/img/bg-img/4.jpg" alt=""></a>
                    </div>
                    <div class="blog-content">
                        <span>July 18, 2018</span>
                        <a href="#" class="post-title">10 tips to get the best loan for you</a>
                        <div class="blog-meta">
                            <a href="#" class="post-author"><img src="/assets/img/core-img/pencil.png" alt=""> Jane Smith</a>
                            <a href="#" class="post-date"><img src="/assets/img/core-img/calendar.png" alt=""> April 26</a>
                        </div>
                        <p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis egestas sem. Tut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis.</p>
                    </div>
                </div>

                <!-- Pagination -->
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item active"><a class="page-link" href="#">01</a></li>
                        <li class="page-item"><a class="page-link" href="#">02</a></li>
                        <li class="page-item"><a class="page-link" href="#">03</a></li>
                    </ul>
                </nav>
            </div>

            <!-- Sidebar Area -->
            <div class="col-12 col-sm-9 col-md-6 col-lg-4">
                <div class="sidebar-area">

                    <!-- Single Sidebar Widget -->
                    <div class="single-widget-area search-widget">
                        <form action="#" method="post">
                            <input type="search" name="search" placeholder="Search">
                            <button type="submit">Search</button>
                        </form>
                    </div>

                    <!-- Single Sidebar Widget -->
                    <div class="single-widget-area cata-widget">
                        <div class="widget-heading">
                            <div class="line"></div>
                            <h4>Categories</h4>
                        </div>

                        <ul>
                            <li><a href="#">Advices</a></li>
                            <li><a href="#">Budgeting</a></li>
                            <li><a href="#">Fast cash</a></li>
                            <li><a href="#">Loans for students</a></li>
                            <li><a href="#">Money hacks</a></li>
                            <li><a href="#">Payday Loans</a></li>
                            <li><a href="#">Quick cash</a></li>
                            <li><a href="#">Supplement income</a></li>
                            <li><a href="#">Сash loans</a></li>
                        </ul>
                    </div>

                    <!-- Single Sidebar Widget -->
                    <div class="single-widget-area tabs-widget">
                        <div class="widget-heading">
                            <div class="line"></div>
                            <h4>Latest News</h4>
                        </div>

                        <div class="credit-tabs-content">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="tab--1" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false">Latest</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab--2" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Popular</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab--3" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="true">Comments</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade" id="tab1" role="tabpanel" aria-labelledby="tab--1">
                                    <div class="credit-tab-content">
                                        <!-- Single News Area -->
                                        <div class="single-news-area d-flex align-items-center">
                                            <div class="news-thumbnail">
                                                <img src="/assets/img/bg-img/10.jpg" alt="">
                                            </div>
                                            <div class="news-content">
                                                <span>July 18, 2018</span>
                                                <a href="#">How to get the best loan online</a>
                                                <div class="news-meta">
                                                    <a href="#" class="post-author"><img src="assets/img/core-img/pencil.png" alt=""> Jane Smith</a>
                                                    <a href="#" class="post-date"><img src="assets/img/core-img/calendar.png" alt=""> April 26</a>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Single News Area -->
                                        <div class="single-news-area d-flex align-items-center">
                                            <div class="news-thumbnail">
                                                <img src="/assets/img/bg-img/11.jpg" alt="">
                                            </div>
                                            <div class="news-content">
                                                <span>July 18, 2018</span>
                                                <a href="#">A new way to finance your dream home</a>
                                                <div class="news-meta">
                                                    <a href="#" class="post-author"><img src="/assets/img/core-img/pencil.png" alt=""> Jane Smith</a>
                                                    <a href="#" class="post-date"><img src="/assets/img/core-img/calendar.png" alt=""> April 26</a>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Single News Area -->
                                        <div class="single-news-area d-flex align-items-center">
                                            <div class="news-thumbnail">
                                                <img src="/assets/img/bg-img/12.jpg" alt="">
                                            </div>
                                            <div class="news-content">
                                                <span>July 18, 2018</span>
                                                <a href="#">10 tips to get the best loan for you</a>
                                                <div class="news-meta">
                                                    <a href="#" class="post-author"><img src="/assets/img/core-img/pencil.png" alt=""> Jane Smith</a>
                                                    <a href="#" class="post-date"><img src="/assets/img/core-img/calendar.png" alt=""> April 26</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade show active" id="tab2" role="tabpanel" aria-labelledby="tab--2">
                                    <div class="credit-tab-content">
                                        <!-- Single News Area -->
                                        <div class="single-news-area d-flex align-items-center">
                                            <div class="news-thumbnail">
                                                <img src="/assets/img/bg-img/10.jpg" alt="">
                                            </div>
                                            <div class="news-content">
                                                <span>July 18, 2018</span>
                                                <a href="#">How to get the best loan online</a>
                                                <div class="news-meta">
                                                    <a href="#" class="post-author"><img src="assets/img/core-img/pencil.png" alt=""> Jane Smith</a>
                                                    <a href="#" class="post-date"><img src="assets/img/core-img/calendar.png" alt=""> April 26</a>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Single News Area -->
                                        <div class="single-news-area d-flex align-items-center">
                                            <div class="news-thumbnail">
                                                <img src="assets/img/bg-img/11.jpg" alt="">
                                            </div>
                                            <div class="news-content">
                                                <span>July 18, 2018</span>
                                                <a href="#">A new way to finance your dream home</a>
                                                <div class="news-meta">
                                                    <a href="#" class="post-author"><img src="assets/img/core-img/pencil.png" alt=""> Jane Smith</a>
                                                    <a href="#" class="post-date"><img src="assets/img/core-img/calendar.png" alt=""> April 26</a>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Single News Area -->
                                        <div class="single-news-area d-flex align-items-center">
                                            <div class="news-thumbnail">
                                                <img src="assets/img/bg-img/12.jpg" alt="">
                                            </div>
                                            <div class="news-content">
                                                <span>July 18, 2018</span>
                                                <a href="#">10 tips to get the best loan for you</a>
                                                <div class="news-meta">
                                                    <a href="#" class="post-author"><img src="assets/img/core-img/pencil.png" alt=""> Jane Smith</a>
                                                    <a href="#" class="post-date"><img src="assets/img/core-img/calendar.png" alt=""> April 26</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab--3">
                                    <div class="credit-tab-content">
                                        <!-- Single News Area -->
                                        <div class="single-news-area d-flex align-items-center">
                                            <div class="news-thumbnail">
                                                <img src="assets/img/bg-img/10.jpg" alt="">
                                            </div>
                                            <div class="news-content">
                                                <span>July 18, 2018</span>
                                                <a href="#">How to get the best loan online</a>
                                                <div class="news-meta">
                                                    <a href="#" class="post-author"><img src="assets/img/core-img/pencil.png" alt=""> Jane Smith</a>
                                                    <a href="#" class="post-date"><img src="assets/img/core-img/calendar.png" alt=""> April 26</a>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Single News Area -->
                                        <div class="single-news-area d-flex align-items-center">
                                            <div class="news-thumbnail">
                                                <img src="assets/img/bg-img/11.jpg" alt="">
                                            </div>
                                            <div class="news-content">
                                                <span>July 18, 2018</span>
                                                <a href="#">A new way to finance your dream home</a>
                                                <div class="news-meta">
                                                    <a href="#" class="post-author"><img src="assets/img/core-img/pencil.png" alt=""> Jane Smith</a>
                                                    <a href="#" class="post-date"><img src="assets/img/core-img/calendar.png" alt=""> April 26</a>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Single News Area -->
                                        <div class="single-news-area d-flex align-items-center">
                                            <div class="news-thumbnail">
                                                <img src="assets/img/bg-img/12.jpg" alt="">
                                            </div>
                                            <div class="news-content">
                                                <span>July 18, 2018</span>
                                                <a href="#">10 tips to get the best loan for you</a>
                                                <div class="news-meta">
                                                    <a href="#" class="post-author"><img src="assets/img/core-img/pencil.png" alt=""> Jane Smith</a>
                                                    <a href="#" class="post-date"><img src="assets/img/core-img/calendar.png" alt=""> April 26</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### News Area End ##### -->

@endsection
