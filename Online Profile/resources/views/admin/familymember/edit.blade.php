@extends('admin.admin_layouts')

@section('admin_content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">



    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Starlight</a>
        <span class="breadcrumb-item active">Update Family Member Information</span>
      </nav>
      <div class="sl-pagebody">
      	   <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Update Family Member Information</h6>
          <p class="mg-b-20 mg-sm-b-30">Update Family Member Information</p>
          <form action="{{url('update/family/'.$family->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          
          <div class="form-layout">
            <div class="row mg-b-25">


            <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">First Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="firstname" value="{{ $family->firstname}}">
                </div>
            </div>

            
            <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Last Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="lastname" value="{{ $family->lastname}}">
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="email" value="{{ $family->email}}">
                </div>
            </div>


            <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Relagion: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="relagion" value="{{ $family->relagion }}">
                </div>
            </div>


            <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Phone Number: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="number" name="phone" value="{{ $family->phone }}">
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Birth Date: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="date" name="birthdate" value="{{ $family->birthdate }}">
                </div>
            </div>


            <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Job Post: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="job" value="{{ $family->job }}">
                </div>
              </div>


               <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">User Relation: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="relation" value="{{ $family->relation }}">
                </div>
              </div>
      


              <div class="col-lg-12">
              	<div class="form-group">
                  <label class="form-control-label">Short Description<span class="tx-danger">*</span></label>
                   <textarea class="form-control" rows="10" id="summernote" name="description">{{$family->description}}</textarea>
                </div>	
              </div>


              <div class="col-lg-12">
              	<div class="form-group">
                  <label class="form-control-label">Achivment<span class="tx-danger">*</span></label>
                   <textarea class="form-control" rows="10" id="summernote" name="achivment">{{$family->achivment}}</textarea>
                </div>	
              </div>

              <div class="form-group">
               <label for="exampleInputCategory">User Image</label>
                <input type="file" class="form-control" name="image" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{( $family->image )}}">
             </div>

             <div class="form-group">
               <label for="exampleInputCategory">Old Brand Logo</label>
                <img src="{{URL::to($family->image)}}" style="height: 70px; width: 100px;">
                <input type="hidden" name="old_logo" value="{{( $family->image )}}">
             </div>


    





            
          <br><br><hr>


          <div class="form-layout-footer">
              <button class="btn btn-success" type="submit">Update</button>
          </div>
          </div>
          </form>
        </div>
       
      </div>
    </div>



    
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {
         $('select[name="category_id"]').on('change', function(){
             var category_id = $(this).val();
             if(category_id) {
                 $.ajax({
                     url: "{{  url('/get/subcategory/') }}/"+category_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                        var d =$('select[name="subcategory_id"]').empty();
                           $.each(data, function(key, value){

                               $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name + '</option>');

                           });
  
                     },
                    
                 });
             } else {
                 alert('danger');
             }

         });
     });

</script>


<script type="text/javascript">
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#one')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
<script type="text/javascript">
  function readURL1(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#two')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
<script type="text/javascript">
  function readURL2(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#three')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
 

@endsection