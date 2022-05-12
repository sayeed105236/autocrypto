@extends('layouts.admin-master')

@section('content')



    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Manage Daily Bonus</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>

              <li class="breadcrumb-item active" aria-current="page">Daily Bonus</li>



          </ol>

        </nav>
      </div>

    </div>
    <!--end breadcrumb-->
    <div class="row">
      <div class="col">
      <h6 class="mb-0 text-uppercase">Bonus</h6>
      </div>

      <div class="col">
      <a class="btn btn-success" href="#"  data-bs-toggle="modal" data-bs-target="#givebonus">Give</a>
      </div>
      @include('admin.modals.givebonusmodal')
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
      <div class="card-header">
        <h6>Daily Bonus</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>#</th>
                <th>User Name</th>
                <th>Bonus Amount</th>
                <th>Type</th>

                <th>Date</th>



              </tr>
            </thead>
            <tbody>
              @foreach($daily_bonus as $dbonus)
              <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$dbonus->user->user_name}}</td>
                <td>{{$dbonus->amount}}$</td>
                <td>{{$dbonus->type}}</td>
                <td>{{$dbonus->created_at}}</td>




              </tr>
              @endforeach







            </tbody>

          </table>
        </div>
      </div>
    </div>

    <hr>
    <div class="card">
      <div class="card-header">
        <h6>Level Bonus</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="example2" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>#</th>
                <th>User Name</th>
                <th>Bonus Amount</th>
                <th>Type</th>

                <th>Date</th>



              </tr>
            </thead>
            <tbody>
              @foreach($level_bonus as $lbonus)
              <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$lbonus->user->user_name}}</td>
                <td>{{$lbonus->amount}}$</td>
                <td>{{$lbonus->type}}</td>
                <td>{{$lbonus->created_at}}</td>




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
