@extends('admin.admin_layouts')
@section('admin_content')



    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">


      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Forent Setting Table</h5>

            <div class="col-lg-5 offset-lg-1" style="border: 5px solid grey; padding: 20px;">
   <div class="contact_form_container">


       <form action="#" id="contact_form" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Full Name </label>
                <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Full Name" name="name" required="">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Phone </label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  aria-describedby="emailHelp" placeholder="Phone" required="">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email </label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  aria-describedby="emailHelp" placeholder="Email" required="">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" class="form-control"  aria-describedby="emailHelp" placeholder="Password" name="password" required="">
            </div>

            <div class="contact_form_button">
                <button type="submit" class="btn btn-info">SIgnUp</button>
            </div>
       </form>
     </div>
   </div>
  </div>
</div>
<div class="panel"></div>
</div>

        </div>




@endsection
