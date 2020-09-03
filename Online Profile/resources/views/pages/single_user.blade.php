@extends('layouts.app')
@section('content')


<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/product_styles.css')}}">

    @php
    $person=DB::table('persons')->first();
    @endphp
	<div class="single_product">
		<div class="container">
			<div class="row">
				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="{{URL::to($person->image)}}" style="height: 550px; width: 450px;"></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<h4>First Name: {{$person->firstname}} {{$person->lastname}}</h4>
						<!-- <h4>Last Name: {{$person->lastname}}</h4> -->
						<h4>Email: {{$person->email}}</h4>
						<h4>Phone: 
							+880{{$person->phone}}</h4>
						<h4>Birth Date: {{$person->birthdate}}</h4>
						<h4>Relagion: {{$person->relagion}}</h4>
						<h4>Job Post: {{$person->job}}</h4>
						<h4>Email: {{$person->email}}</h4>
				
						<div class="product_name">Short Description:</div>	
						<div class="product_text"><p>{{$person->description}}</p></div>


						<div class="product_name">Achivment:</div>	
						<div class="product_text"><p>{{$person->achivment}}</p></div>
					</div>
				</div>

			</div>
		</div>
	</div>


@endsection