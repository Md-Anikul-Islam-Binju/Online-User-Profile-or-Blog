@extends('admin.admin_layouts')
@section('admin_content')



    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">


      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>User Blog Show Table</h5>

        </div>

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">User Blog Show Table
             
          </h6>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Blog ID</th>
                  <th class="wd-15p">Blogn Title</th>
                  <th class="wd-15p">Blog Image</th>
                  <th class="wd-20p">Action</th>

                </tr>
              </thead>




              <tbody>
                @foreach($blog as $row)
                <tr>
                  <td>{{( $row->id )}}</td>
                  <td>{{( $row->title )}}</td>   
                  <td><img src="{{URL::to($row->image)}}" style="height: 50px; width: 100px;"></td>

                  <td>

                
                    <a href="{{URL::to('view/blog/'.$row->id)}}" class="btn btn-sm btn-warning" title="view"><i class="fa fa-eye"></i></a>

                    <a href="{{URL::to('delete/blog/'.$row->id)}}" class="btn btn-sm btn-danger" id="delete" title="Delete"><i class="fa fa-trash"></i></a>

                  </td>
                </tr>
                @endforeach
               
              </tbody>


            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

@endsection
