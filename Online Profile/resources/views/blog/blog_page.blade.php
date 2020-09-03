@extends('layouts.app')
@section('content')


<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/blog_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/blog_responsive.css')}}">

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{URL::to('public/frontend/images/shop_background.jpg')}}"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">User Blog</h2>
		</div>
	</div>

	<!-- Blog -->

	<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="blog_posts d-flex flex-row align-items-start justify-content-between">
						
						<!-- Blog post -->
						@foreach($blog as $row)
						<div class="blog_post">
							<div class="blog_image"><img src="{{URL::to($row->image)}}" style="height: 150px; width: 360px;"></div>
							<div class="blog_text">{{ $row->title }}.....................</div>
							<div class="blog_button"><a href="{{URL::to('single/blog/'.$row->id)}}">Continue Reading</a></div>
						</div>
						@endforeach
						
					</div>
				</div>
					
			</div>
		</div>
	</div>


<script src="{{asset('public/frontend/js/blog_custom.js')}}"></script>


@endsection