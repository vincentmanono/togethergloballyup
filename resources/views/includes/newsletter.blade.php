<section class="newsletter-area section-padding-100 bg-img jarallax" style="background-image: url(assets/img/bg-img/6.jpg);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-lg-8">
                <div class="nl-content text-center">
                    <h2>Subscribe to our newsletter</h2>
                <form action="{{ route('subscribe') }}" method="POST">
                    @csrf
                        <input type="email" name="email" id="nlemail" placeholder="Your e-mail">
                        <button type="submit">Subscribe</button>
                    </form>
                    <p>Be the first to know when we introduce new offers</p>
                </div>
            </div>
        </div>
    </div>
</section>
