<!--::chefs_part start::-->
<section class="chefs_part blog_item_section section_padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-5">
                <div class="section_tittle">
                    <p>Team Member</p>
                    <h2>Our Experience Chefs</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($chefs as $chef)
                <div class="col-sm-6 col-lg-4">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="{{ $chef->img_src }}" alt="">
                        </div>
                        <div class="single_blog_text text-center">
                            <h3>{{ $chef->name }}</h3>
                            <p>{{ $chef->title }}</p>
                            <div class="social_icon">
                                <a href="{{ $chef->fb_link }}"> <i class="ti-facebook"></i> </a>
                                <a href="{{ $chef->twitter_link }}"> <i class="ti-twitter-alt"></i> </a>
                                <a href="{{ $chef->insta_link }}"> <i class="ti-instagram"></i> </a>
                                <a href="{{ $chef->skype_link }}"> <i class="ti-skype"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!--::chefs_part end::-->
