@extends('layouts.app')
@section('content')


<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/product_styles.css')}}">

  
	<div class="single_product">
		<div class="container">
		
			<div class="row">
				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="{{URL::to($family->image)}}" style="height: 550px; width: 450px;"></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<h4>First Name: {{$family->firstname}} {{$family->lastname}}</h4>
						<!-- <h4>Last Name: {{$family->lastname}}</h4> -->
						<h4>Email: {{$family->email}}</h4>
						<h4>Phone: +880{{$family->phone}}</h4>
						<h4>Birth Date: {{$family->birthdate}}</h4>
						<h4>Relagion: {{$family->relagion}}</h4>
						<h4>Job Post: {{$family->job}}</h4>
						<h4>Email: {{$family->email}}</h4>
				
						<div class="product_name">Short Description:</div>	
						<div class="product_text"><p>{{$family->description}}</p></div>


						<div class="product_name">Achivment:</div>	
						<div class="product_text"><p>{{$family->achivment}}</p></div>
					</div>
				</div>

			</div>
			
		</div>
	</div>


@endsection