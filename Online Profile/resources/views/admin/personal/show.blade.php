@extends('admin.admin_layouts')
@section('admin_content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">



    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Starlight</a>
        <span class="breadcrumb-item active">Person Information Section</span>
      </nav>
      <div class="sl-pagebody">
      	   
         
          <p class="mg-b-20 mg-sm-b-30">Person Information Details</p>
         
          <div class="form-layout">
            <div class="row mg-b-25">



              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">First Name:</label></br>
                  <strong>{{ $person->firstname }}</strong>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Last Name:</label></br>
                  <strong>{{ $person->lastname }}</strong>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Email:</label></br>
                  <strong>{{ $person->email }}</strong>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Relagion:</label></br>
                  <strong>{{ $person->relagion }}</strong>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Phone:</label></br>
                  <strong>+088{{ $person->phone }}</strong>
                </div>
              </div>




              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Birth Date:</label></br>
                   <strong>{{ $person->birthdate }}</strong>                
                </div>
              </div>

              
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Job Post:</label></br>
                   <strong>{{ $person->job }}</strong>                
                </div>
              </div>






              





          





              



            





              <div class="col-lg-12">
              	<div class="form-group">
                  <label class="form-control-label">Person Life History:</label><br>
                   <strong>{!! $person->description !!}</strong>
                </div>	
              </div>


              <div class="col-lg-12">
              	<div class="form-group">
                  <label class="form-control-label">Person Achivement:</label><br>
                   <strong>{{ $person->achivment }}</strong>
                </div>	
              </div>



              <div class="col-lg-4">
              <lebel>User Image<span class="tx-danger">*</span></lebel><br>
                 <td><img src="{{URL::to($person->image)}}" style="height: 100px; width: 100px;"></td>
              </div>


              

            </div>
            <br><hr>




          <div class="row">

          </div>
          </form>
        </div>
       
      </div>
    </div>





@endsection