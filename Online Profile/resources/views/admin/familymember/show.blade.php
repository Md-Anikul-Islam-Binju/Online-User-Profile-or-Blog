@extends('admin.admin_layouts')
@section('admin_content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">



    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Starlight</a>
        <span class="breadcrumb-item active">Family Member Information Section</span>
      </nav>
      <div class="sl-pagebody">
      	   
         
          <p class="mg-b-20 mg-sm-b-30">Family Member Information Details</p>
         
          <div class="form-layout">
            <div class="row mg-b-25">



              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">First Name:</label></br>
                  <strong>{{ $family->firstname }}</strong>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Last Name:</label></br>
                  <strong>{{ $family->lastname }}</strong>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Email:</label></br>
                  <strong>{{ $family->email }}</strong>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Relagion:</label></br>
                  <strong>{{ $family->relagion }}</strong>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Phone:</label></br>
                  <strong>+088{{ $family->phone }}</strong>
                </div>
              </div>




              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Birth Date:</label></br>
                   <strong>{{ $family->birthdate }}</strong>                
                </div>
              </div>

              
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Job Post:</label></br>
                   <strong>{{ $family->job }}</strong>                
                </div>
              </div>


              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">User Relation:</label></br>
                   <strong>{{ $family->relation }}</strong>                
                </div>
              </div>






              





          





              



            





              <div class="col-lg-12">
              	<div class="form-group">
                  <label class="form-control-label">Person Life History:</label><br>
                   <strong>{!! $family->description !!}</strong>
                </div>	
              </div>


              <div class="col-lg-12">
              	<div class="form-group">
                  <label class="form-control-label">Person Achivement:</label><br>
                   <strong>{{ $family->achivment }}</strong>
                </div>	
              </div>



              <div class="col-lg-4">
              <lebel>User Image<span class="tx-danger">*</span></lebel><br>
                 <td><img src="{{URL::to($family->image)}}" style="height: 100px; width: 100px;"></td>
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