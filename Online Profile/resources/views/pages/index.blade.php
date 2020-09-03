@extends('layouts.app')
@section('content')
@include('layouts.menubar')

    @php
    $family=DB::table('familymembers')->get();
    @endphp

    <div class="trends">
        <div class="trends_background" style="background-image:url({{asset('public/frontend/images/trends_background.jpg')}})"></div>
        <div class="trends_overlay"></div>
        <div class="container">
            <div class="row">

                <!-- Trends Content -->
                <div class="col-lg-3">
                    <div class="trends_container">
                        <h2 class="trends_title">Family Members</h2>
                        <div class="trends_text"><p>Clic the members and get details...................</p></div>
                        <div class="trends_slider_nav">
                            <div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                            <div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                        </div>
                    </div>
                </div>

                <!-- Trends Slider -->
                <div class="col-lg-9">
                    <div class="trends_slider_container">

                        <!-- Trends Slider -->

                        <div class="owl-carousel owl-theme trends_slider">

                            <!-- Trends Slider Item -->
                            @foreach($family as $row)
                            <div class="owl-item">
                                <div class="trends_item is_new">
                                    <div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="{{URL::to($row->image)}}" style="height: 160px; width: 170px;"></div>
                                    <div class="trends_content">
                                        <div class="trends_category"><a href="{{URL::to('single/family/'.$row->id)}}">{{ $row->firstname }}</a></div>
                                        <div class="trends_info clearfix">
                                            <div class="trends_name"><a href="{{URL::to('single/family/'.$row->id)}}">{{ $row->relation }}</a></div>
                                            <div class="trends_price">+880{{ $row->phone }}</div>
                                        </div>
                                    </div>
                                    <div class="trends_fav"><i class="fas fa-heart"></i></div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>




<!--   all file -->
@php
$file=DB::table('files')->get();
@endphp
    <div class="popular_categories">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="popular_categories_content">
                    <div class="popular_categories_title">All Important File</div>
                    <div class="popular_categories_slider_nav">
                        <div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                        <div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                    </div>
                    <div class="popular_categories_link"><a href="#">full catalog</a></div>
                </div>
            </div>
            
          

            <div class="col-lg-9">
                <div class="popular_categories_slider_container">
                    <div class="owl-carousel owl-theme popular_categories_slider">
                        @foreach($file as $row)
                        <div class="owl-item">
                            <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                <div class="popular_category_image">
                                <img src="{{asset('public/frontend/images/pdf.png')}}" alt="">
                                     <!-- <iframe src="{{url($row->up_file)}}" style="height:90px; width:90px;"></iframe> -->
                                </div>

                                <div class="popular_category_text">{{ $row->name}}</div>


                                <div class="popular_category_text"><a href="{{URL::to('file/downlode/'.$row->id)}}">Downlode</a></div>


                            </div>
                        </div>
                        @endforeach             
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection