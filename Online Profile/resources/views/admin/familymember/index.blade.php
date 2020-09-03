@extends('admin.admin_layouts')
@section('admin_content')



    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">


      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Family Member Information Show Table</h5>

        </div>

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Family Member Information Show Table
             
          </h6>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Image</th>
                  <th class="wd-15p">Relation</th>
                  <th class="wd-15p">Name</th>
                  <th class="wd-15p">Phone</th>
                  <th class="wd-15p">Relagion</th>
                  <th class="wd-15p">Birth Date</th>

                  <th class="wd-20p">ACTION</th>

                </tr>
              </thead>




              <tbody>
                @foreach($family as $row)
                <tr>
                  <td>{{( $row->id )}}</td>
                  <td><img src="{{URL::to($row->image)}}" style="height: 50px; width: 50px;"></td>
                  <td>{{( $row->relation )}}</td>
                  <td>{{( $row->firstname )}}</td>    
                  <td>{{( $row->phone )}}</td>                
                  <td>{{( $row->relagion )}}</td>
                  <td>{{( $row->birthdate )}}</td>
  

                   
                 




                  <td>
                    <a href="{{URL::to('edit/family/'.$row->id)}}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>
                    <a href="{{URL::to('delete/family/'.$row->id)}}" class="btn btn-sm btn-danger" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
                    <a href="{{URL::to('view/family/'.$row->id)}}" class="btn btn-sm btn-warning" title="view"><i class="fa fa-eye"></i></a>
                  </td>
                </tr>
                @endforeach
               
              </tbody>


            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

@endsection
