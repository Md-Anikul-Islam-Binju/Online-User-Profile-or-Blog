@extends('layouts.app')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/blog_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/blog_responsive.css')}}">

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-speed="0.8"><img src="{{URL::to($blog->image)}}" style="height: 250px; width: 1350px;"></div>
	</div>

	<!-- Single Blog Post -->

	<div class="single_post">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="single_post_title"><h3>{{$blog->title}}</h3></div>
					<div class="single_post_text">
						<p>{{$blog->details}}</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Blog Posts -->
	@php
	$blog=DB::table('blogs')->get();
	@endphp

	<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="blog_posts d-flex flex-row align-items-start justify-content-between">

						<!-- Blog post -->
                       @foreach($blog as $row)
						<div class="blog_post">
							<div class="blog_image"><img src="{{URL::to($row->image)}}" style="height: 150px; width: 360px;"></div>
							<div class="blog_text">{{ $row->title }}</div>
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