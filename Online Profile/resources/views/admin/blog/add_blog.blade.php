@extends('admin.admin_layouts')

@section('admin_content')


    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Starlight</a>
        <span class="breadcrumb-item active">Personal Blog Section</span>
      </nav>
      <div class="sl-pagebody">
      	   <div class="card pd-20 pd-sm-40">

          <p class="mg-b-20 mg-sm-b-30">Personal Blog add form</p>


          <form action="{{route('store.blog')}}" method="post" enctype="multipart/form-data">
          @csrf
          
          <div class="form-layout">
            <div class="row mg-b-25">



              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Blog  Title: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="title">
                </div>
              </div>


              <div class="col-lg-12">
              	<div class="form-group">
                  <label class="form-control-label">Blog Details: <span class="tx-danger">*</span></label>
                   <textarea class="form-control" rows="10" id="summernote" name="details"></textarea>
                </div>	
              </div>



              <div class="col-lg-4">
              <lebel>Blog Picture<span class="tx-danger">*</span></lebel>
              	<label class="custom-file">
      				  <input type="file" id="file" class="custom-file-input" name="image" onchange="readURL(this);" required="" accept="image">
      				  <span class="custom-file-control"></span>
      				  <img src="#" id="one">
      				</label>
              </div> 

        </div>


        <div class="col-lg-4">
          <br><br><hr>
          <div class="form-layout-footer">
              <button class="btn btn-success" type="submit">Submit</button>
          </div>
          </div>
          </form>
        </div>
       
      </div>
    </div>




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

 

@endsection