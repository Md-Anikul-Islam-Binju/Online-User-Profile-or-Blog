@php
$slider=DB::table('sliders')->get();
@endphp
<div class="banner_2">
<div class="banner_2_background" style="background-image:url({{ asset('public/frontend/images/banner_2_background.jpg') }})"></div>
<div class="banner_2_container">
<div class="banner_2_dots"></div>
<div class="owl-carousel owl-theme banner_2_slider">
    @foreach($slider as $row)
    <div class="owl-item">
        <div class="banner_2_item">
            <div class="container fill_height">
                <div class="row fill_height">
                    <div class="col-lg-8 col-md-6 fill_height">
                        <div class="banner_2_image_container">
                            <div class="banner_2_image"><img src="{{URL::to($row->slider)}}" style="height:400px; width:1150px;"></div>
                        </div>
                    </div>
                </div>
            </div>          
        </div>
    </div>
    @endforeach
</div>
</div>
</div>




<nav class="main_nav">
    <div class="container">
        <div class="row">
            <div class="col">   
                <div class="main_nav_content d-flex flex-row">
                 @php
                 $family=DB::table('familymembers')->get();
                 @endphp
                <div class="cat_menu_container">
                    <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                        <div class="cat_burger"><span></span><span></span><span></span></div>
                        <div class="cat_menu_text">Family Members</div>
                    </div>

                    <ul class="cat_menu">
                        @foreach($family as $row)
                        <li class="hassubs">
                            <a href="{{URL::to('single/family/'.$row->id)}}">{{$row->firstname}}<i class="fas fa-chevron-right"></i></a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                           <!-- Main Nav Menu -->
                <div class="main_nav_menu ml-auto">
                    <ul class="standard_dropdown main_nav_dropdown">
                        <li><a href="{{route('blog.page')}}">Blog<i class="fas fa-chevron-down"></i></a></li>
                      <!--   <li><a href="#">Contact<i class="fas fa-chevron-down"></i></a></li> -->
                    </ul>
                </div>

                <!-- Menu Trigger -->

                <div class="menu_trigger_container ml-auto">
                    <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                        <div class="menu_burger">
                            <div class="menu_trigger_text">menu</div>
                            <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</nav>
    <!-- </header> -->
    
    @php
    $person=DB::table('persons')->first();
    @endphp
    <div class="banner">
        <div class="banner_background" style="background-image:url({{asset('public/forentend/images/banner_background.jpg')}})"></div>
        <div class="container fill_height">
            <div class="row fill_height">
                <div class="banner_product_image"><img src="{{URL::to($person->image)}}" style="height: 250px; width: 250px;"></div>
                <div class="col-lg-5 offset-lg-4 fill_height">
                    <div class="banner_content">
                        <h1 class="banner_text">{{$person->firstname}} {{$person->lastname}}</h1>
                        <div class="banner_price">+880{{$person->phone}}</div>
                        <div class="banner_product_name">{{$person->email}}</div>
                        <div class="button banner_button"><a href="{{URL::to('single/user/'.$person->id)}}">Get Details</a></div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>



