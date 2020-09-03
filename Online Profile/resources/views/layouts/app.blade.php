<!DOCTYPE html>
<html lang="en">
<head>
<title>Personal Profile</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{asset('public/frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/plugins/slick-1.8.0/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/responsive.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">


</head>

<body>

<div class="super_container">   
<header class="header">

 @php
 $setting=DB::table('settings')->get();
 @endphp

<div class="top_bar">
    <div class="container">
        <div class="row">
            @foreach($setting as $row)
            <div class="col d-flex flex-row">
                <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{URL::to('public/forentend/images/phone.png')}}" alt=""></div>+880{{$row->phone}}</div>
                <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{URL::to('public/forentend/images/mail.png')}}" alt=""></div><a href="mailto:fastsales@gmail.com">{{$row->mail}}</a></div>
                <div class="top_bar_content ml-auto">
                    <div class="top_bar_menu">
                        <ul class="standard_dropdown top_bar_dropdown">
                            <li>
                                <a href="#">English<i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li><a href="#">Update Future</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                   <div class="top_bar_user">
                        <div class="user_icon"><img src="{{URL::to('public/forentend/images/user.svg')}}" alt=""></div>
                        <div><a href="{{route('admin.login')}}">Sign in</a></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>      
</div>

        <!-- Header Main -->

        <div class="header_main">
            <div class="container">
                <div class="row">

            @php
            $setting=DB::table('settings')->get();
            @endphp


            @foreach($setting as $row)
            <div class="col-lg-2 col-sm-3 col-3 order-1">
                <div class="logo_container">
                    <div class="logo"><a href="{{url('/')}}">{{ $row->name }}</a></div>
                </div>
            </div>
            @endforeach



            @php
            $family=DB::table('familymembers')->get();
            @endphp
            <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                <div class="header_search">
                    <div class="header_search_content">
                        <div class="header_search_form_container">
                            <form action="Online Profile/single/family" class="header_search_form clearfix">
                                <input type="search" class="header_search_input" placeholder="Search for Family Member...">
                                <div class="custom_dropdown">
                                    <div class="custom_dropdown_list">
                                        <span class="custom_dropdown_placeholder clc">All  Family Member</span>
                                        <i class="fas fa-chevron-down"></i>
                                        <ul class="custom_list clc">
                                            <li><a class="clc" href="{{URL::to('single/family/'.$row->id)}}">All Family Member</a></li>
                                            @foreach($family as $row)
                                            <li><a class="clc" href="{{URL::to('single/family/'.$row->id)}}">{{$row->lastname}}</a></li>
                                            @endforeach 
                                        </ul>
                                    </div>
                                </div>
                                <button type="submit"  class="header_search_button trans_300"><img src="{{asset('public/frontend/images/search.png')}}" alt=""></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Navigation -->



<!-- Characteristics -->
@yield('content')

@php
$setting=DB::table('settings')->get();
@endphp
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 footer_col">
                @foreach($setting as $row)
                <div class="footer_column footer_contact">
                    <div class="logo_container">
                        <div class="logo"><a href="#">{{$row->name}}</a></div>
                    </div>
                    <div class="footer_phone">+880{{$row->phone}}</div>
                    <div class="footer_contact_text">
                        <p>{{$row->address}}</p>
                        <p>{{$row->mail}}</p>
                    </div>
                    <div class="footer_social">
                        <ul>
                            <li><a href="{{$row->link1}}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{$row->link2}}"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{{$row->link3}}"><i class="fab fa-google"></i></a></li>
                            <li><a href="{{$row->link4}}"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</footer>

<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col"> 
                <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                    <div class="copyright_content">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Md Anikul Islam</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



<script src="{{asset('public/frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('public/frontend/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('public/frontend/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('public/frontend/plugins/slick-1.8.0/slick.js')}}"></script>
<script src="{{asset('public/frontend/plugins/easing/easing.js')}}"></script>
<script src="{{asset('public/frontend/js/custom.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>


<script>
        @if(Session::has('messege'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
          }
        @endif
</script>  

     
</body>
</html>