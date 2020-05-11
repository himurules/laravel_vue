<!-- food_menu start-->
<section class="food_menu gray_bg">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="section_tittle">
                    <p>Popular Menu</p>
                    <h2>Delicious Food Menu</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="nav nav-tabs food_menu_nav" id="myTab" role="tablist">
                    @foreach($otherCategories as $key=>$category)
                        <a @if($key==0) class="active" @endif id="{!! str_replace(" ", "-", preg_replace("/[^A-Za-z0-9 ]/", '', $category->name)) !!}-tab" data-toggle="tab" href="#{!! str_replace(" ", "-", preg_replace("/[^A-Za-z0-9 ]/", '', $category->name)) !!}" role="tab"
                           aria-controls="{!! str_replace(" ", "-", preg_replace("/[^A-Za-z0-9 ]/", '', $category->name)) !!}" aria-selected="false">{!! str_replace(" ", "-", preg_replace("/[^A-Za-z0-9 ]/", '', $category->name)) !!} <img src="img/icon/play.svg"
                                                                                                                                                                                                                                              alt="play"></a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-12">
                <div class="tab-content" id="myTabContent">
                    @foreach($otherCategories as $key=>$category)
                        <div class="tab-pane fade @if($key==0) show active @endif single-member" id="{!! str_replace(" ", "-", preg_replace("/[^A-Za-z0-9 ]/", '', $category->name)) !!}" role="tabpanel"
                             aria-labelledby="{!! str_replace(" ", "-", preg_replace("/[^A-Za-z0-9 ]/", '', $category->name)) !!}-tab">
                            <div class="row">
                                @foreach($category->foodItem as $foodItem)
                                    <div style="float: left; width: 50%" class="px-2">
                                        <div class="single_food_item media">
                                            <img src="img/{{ $foodItem->img_src }}" class="mr-3" alt="..." style="max-width: 165px; max-height: 163px">
                                            <div class="media-body align-self-center">
                                                <h3>{{ $foodItem->name }}</h3>
                                                <p>{{ \Illuminate\Support\Str::limit($foodItem->description, 50, $end='...') }}</p>
                                                <h5>${{$foodItem->price}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- food_menu part end-->
