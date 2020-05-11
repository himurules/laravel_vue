@extends('layouts.app')

@section('content')
    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h5>{{ __('home.title') }}</h5>
                            <h1>Deliciousness jumping into the mouth</h1>
                            <p>Together creeping heaven upon third dominion be upon won't darkness rule land
                                behold it created good saw after she'd Our set living. Signs midst dominion
                                creepeth morning</p>
                            <div class="banner_btn">
                                <div class="banner_btn_iner">
                                    <a href="#" class="btn_2">Reservation <img src="img/icon/left_1.svg" alt=""></a>
                                </div>
                                <a href="https://www.youtube.com/watch?v=pBFQdxA-apI" class="popup-youtube video_popup">
                                    <span><img src="img/icon/play.svg" alt=""></span> Watch our story</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!--::exclusive_item_part start::-->
    <section class="exclusive_item_part blog_item_section">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="section_tittle">
                        <p>Popular Dishes</p>
                        <h2>Our {{ $exclusive->name }} Items</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($exclusive->foodItem as $exclusiveItem)
                <div class="col-sm-6 col-lg-4">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="img/{{$exclusiveItem->img_src}}" alt="">
                        </div>
                        <div class="single_blog_text">
                            <h3>{{ $exclusiveItem->name }}</h3>
                            <p>{{ \Illuminate\Support\Str::limit($exclusiveItem->description, 100, $end='...') }}</p>
                            <a href="#" class="btn_3">Read More <img src="img/icon/left_2.svg" alt=""></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--::exclusive_item_part end::-->

    <!-- about part start-->
    <section class="about_part">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-4 col-lg-5 offset-lg-1">
                    <div class="about_img">
                        <img src="img/about.png" alt="">
                    </div>
                </div>
                <div class="col-sm-8 col-lg-4">
                    <div class="about_text">
                        <h5>Our History</h5>
                        <h2>Where The Food’s As Good
                            As The Root Beer.</h2>
                        <h4>Satisfying people hunger for simple pleasures</h4>
                        <p>May over was. Be signs two. Spirit. Brought said dry own firmament lesser best sixth deep
                            abundantly bearing, him, gathering you
                            blessed bearing he our position best ticket in month hole deep </p>
                        <a href="#" class="btn_3">Read More <img src="img/icon/left_2.svg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about part end-->

    @include('common.video')

    @include('common.menu')

    @include('common.chef')

    <!--::regervation_part start::-->
    <section class="regervation_part section_padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="section_tittle">
                        <p>Reservation</p>
                        <h2>Book A Table</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="regervation_part_iner">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Name *">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="password" class="form-control" id="inputPassword4"
                                           placeholder="Email address *">
                                </div>
                                <div class="form-group col-md-6">
                                    <select class="form-control" id="Select">
                                        <option value="1" selected>Persons *</option>
                                        <option value="2">Number of guests 1</option>
                                        <option value="3">Number of guests 2</option>
                                        <option value="4">Number of guests 3</option>
                                        <option value="5">Number of guests 4</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="pnone" placeholder="Phone number *">
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="input-group date">
                                        <input id="datepicker" type="text" class="form-control" placeholder="Date *" />
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <select class="form-control" id="Select2">
                                        <option value="" selected>Time *</option>
                                        <option value="1">8 AM TO 10AM</option>
                                        <option value="1">10 AM TO 12PM</option>
                                        <option value="1">12PM TO 2PM</option>
                                        <option value="1">2PM TO 4PM</option>
                                        <option value="1">4PM TO 6PM</option>
                                        <option value="1">6PM TO 8PM</option>
                                        <option value="1">4PM TO 10PM</option>
                                        <option value="1">10PM TO 12PM</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" id="Textarea" rows="4"
                                              placeholder="Your Note *"></textarea>
                                </div>
                            </div>


                            <div class="regerv_btn">
                                <a href="#" class="btn_4">Book A Table</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::regervation_part end::-->

    @include('common.reviews')

@endsection
