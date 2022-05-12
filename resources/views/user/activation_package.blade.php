@extends('layouts.frontend-master')

@section('content')



    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Packages</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>

              <li class="breadcrumb-item active" aria-current="page">Purchase Package</li>





          </ol>

        </nav>
      </div>

    </div>
    <!--end breadcrumb-->
    @if(Session::has('error'))
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Failed</h4>
            <div class="alert-body">
                {{Session::get('error')}}
            </div>
        </div>
        @elseif(Session::has('package_activated'))
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Success</h4>
                <div class="alert-body">
                    {{Session::get('package_activated')}}
                </div>
            </div>

        @endif
    <div class="row">
      <div class="col">
      <h6 class="mb-0 text-uppercase">Packages</h6>
      </div>

    </div>




    <hr/>
    <div class="card">
      <div class="card-body">



        <h5><strong style="height:130px;">Your Current Available Balance: {{$data['sum_deposit'] ? '$'.number_format((float)$data['sum_deposit'], 2, '.', '') : '$00.00'}}</strong></h5>

        <?php if ($data['sum_deposit']<=0): ?>
          <h6 style="color:red;">You don't have Enough Balance. Please Deposit funds in your account for activation.</h6>
        <?php endif; ?>





        </div>
      </div>
      	<div class="pricing-table">

      		<div class="row row-cols-1 row-cols-lg-3">
            @foreach($data['packages'] as $row)
      <div class="col mb-3">
        <div class="card mb-5 mb-lg-0 bg-success">
          <div class="card-body">
            <h5 class="card-title text-white text-uppercase text-center">{{$row->package_name}}</h5>
            <h2 class="card-price text-white text-center">${{$row->package_price}}</span></h2>
            <hr class="my-4">
            <ul class="list-group list-group-flush">
              <li class="list-group-item bg-transparent text-white"><i class='bx bx-check me-2 font-18'></i>{{$row->percentage}}% Daily Return of Investment</li>
              <li class="list-group-item bg-transparent text-white"><i class='bx bx-check me-2 font-18'></i>Sponsor Bonus</li>
              <li class="list-group-item bg-transparent text-white"><i class='bx bx-check me-2 font-18'></i>Rank Bonus</li>
              <li class="list-group-item bg-transparent text-white"><i class='bx bx-check me-2 font-18'></i>Club Bonus</li>
              <li class="list-group-item bg-transparent text-white"><i class='bx bx-check me-2 font-18'></i>Profit Share</li>
              <li class="list-group-item bg-transparent text-white"><i class='bx bx-check me-2 font-18'></i>Token Bonus</li>
              <li class="list-group-item bg-transparent text-white"><i class='bx bx-check me-2 font-18'></i>Weekly Payment</li>

            </ul>
            <div class="d-grid text-center">
              <form id="jquery-val-form" action="{{route('buy-package')}}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <input type="hidden" name="package_id" value="{{$row->id}}">


                  <button type="submit" class="btn btn-warning">Buy Package</button>
                </form>



            </div>
          </div>
        </div>
      </div>
      <br>
      <br>

      @endforeach


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
