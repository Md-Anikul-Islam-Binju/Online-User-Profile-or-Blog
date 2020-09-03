@extends('admin.admin_layouts')
@section('admin_content')



    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">


      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Slider Table</h5>

        </div>

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Slider
             <a href="#" class="btn btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Slider Add</a>
          </h6>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Slider Image</th>
                  <th class="wd-15p">Status</th>
                  <th class="wd-20p">ACTION</th>
                </tr>
              </thead>




              <tbody>
                @foreach($slider as $row)
                <tr>
                  <td>{{( $row->id )}}</td>
                  <td><img src="{{URL::to($row->slider)}}" style="height: 70px; width: 100px;"></td>
                  <td>
                    @if( $row->status == 1)
                      <span class="badge badge-success">Active</span>
                    @else
                      <span class="badge badge-danger">Inactive</span>
                    @endif
                  </td>
                          
                  <td>
                    <a href="{{URL::to('delete/slider/'.$row->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>

                    @if($row->status == 1)
                      <a href="{{URL::to('inactive/setting/'.$row->id)}}" class="btn btn-sm btn-danger" title="Inactive"><i class="fa fa-thumbs-down"></i></a>
                    @else
                      <a href="{{URL::to('active/setting/'.$row->id)}}" class="btn btn-sm btn-success" title="Active"><i class="fa fa-thumbs-up"></i></a>
                    @endif
                  </td>

                </tr>
                @endforeach
               
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->



     <div id="modaldemo3" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">******************* Slider Add *******************</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>



              @if ($errors->any())
               <div class="alert alert-danger">
                  <ul>
                   @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                   @endforeach
                  </ul>
                </div>
              @endif

             <form action="{{route('store.slider')}}" method="post" enctype="multipart/form-data">
             @csrf
             <div class="modal-body pd-20">


             <div class="form-group">
               <label for="exampleInputCategory">Slider Image</label>
                <input type="file" class="form-control" name="slider" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Slider Image">
             </div>


              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
             </form>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->

      


@endsection
