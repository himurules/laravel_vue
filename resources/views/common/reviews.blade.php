<!--::review_part start::-->
<section class="review_part gray_bg section_padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-5">
                <div class="section_tittle">
                    <p>Testimonials</p>
                    <h2>Customers Feedback</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-11">
                <div class="client_review_part owl-carousel">
                    @if($testimonials ?? '')
                        @foreach($testimonials as $review)
                            <div class="client_review_single media">
                                <div class="client_img align-self-center">
                                    <img src="{{$review->user->img_src}}" alt="">
                                </div>
                                <div class="client_review_text media-body">
                                    <p>{{ $review->testimonial }}</p>
                                    <h4>{{ $review->user->first_name." ".$review->user->last_name}}, <span>Dated: {{ date('M jS Y', strtotime($review->created_at)) }}</span></h4>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="client_review_single media">
                            <label class="text-info text-center">
                                No Reviews yet!
                            </label>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!--::review_part end::-->
