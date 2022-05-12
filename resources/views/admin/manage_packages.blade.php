@extends('layouts.admin-master')

@section('content')



    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Manage Packages</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>

              <li class="breadcrumb-item active" aria-current="page">Packages</li>



          </ol>

        </nav>
      </div>

    </div>
    <!--end breadcrumb-->
    <div class="row">
      <div class="col">
      <h6 class="mb-0 text-uppercase">Packages</h6>
      </div>

      <div class="col">
      <a class="btn btn-success" href="#"  data-bs-toggle="modal" data-bs-target="#addpackageModal">Add</a>
      </div>
      @include('admin.modals.addpackage_modal')
    </div>
    @if(Session::has('package_added'))
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Success</h4>
            <div class="alert-body">
                {{Session::get('package_added')}}
            </div>
        </div>
        @elseif(Session::has('package_updated'))
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Success</h4>
                <div class="alert-body">
                    {{Session::get('package_updated')}}
                </div>
            </div>
            @elseif(Session::has('package_deleted'))
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Success</h4>
                    <div class="alert-body">
                        {{Session::get('package_deleted')}}
                    </div>
                </div>
        @endif


    <hr/>
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Package Name</th>
                <th>Package Price</th>
                <th>ROI</th>
                <th>Sponsor Bonus</th>
                <th>Duration</th>
                <th>Status</th>
                <th>Action</th>

              </tr>
            </thead>
            <tbody>
                @foreach($packages as $row)
              <tr>

                <td>{{$loop->index+1}}</td>
                <td>{{$row->package_name}}</td>
                <td>{{$row->package_price}}$</td>
                <td>{{$row->percentage}}%</td>
                <td>{{$row->sponsor_bonus}}%</td>

                <td>
                  {{$row->duration}} days
                </td>
                <td>{{$row->status}}</td>
                <td>  <a href="#" data-bs-toggle="modal" data-bs-target="#packageeditModal{{$row->id}}"><i class='bx bx-edit'></i></a>
                  <a href="/admin/package/delete/{{$row->id}}"><i class='bx bx-trash'></i></a></td>
                  @include('admin.modals.package_edit_modal')
              </tr>

                @endforeach





            </tbody>

          </table>
        </div>
      </div>
    </div>


    <script>
  		$(document).ready(function() {
  			$('#example').DataTable();
  		  } );
  	</script>
  	<script>
  		$(document).ready(function() {
  			var table = $('#example2').DataTable( {
  				lengthChange: false,
  				buttons: [ 'copy', 'excel', 'pdf', 'print']
  			} );

  			table.buttons().container()
  				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
  		} );
  	</script>




@endsection
