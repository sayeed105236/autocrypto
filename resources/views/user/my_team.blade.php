@extends('layouts.frontend-master')

@section('content')
<style type="text/css">
      .green_tree * {
          color: #008911 !important;
          font-size: 12px
      }

      .red_tree * {
          color: #ff363b !important;
          font-size: 12px
      }

      .popover .arrow {
          display: none !important
      }

      .popover-body {
          color: #0c4b85 !important;
      }

      .popover-body span {
          font-weight: 400;
          color: #0070d7
      }

      .popover-header {
          background-color: #1d72f3 !important;
          color: #fff !important;
          border-radius: 0px !important;
          font-weight: bold;
          text-align: center
      }

      .tree-table * {
          text-align: center !important;
      }

      .tree img {
          max-width: 60px !important;
          height: auto
      }

      .tree.table thead tr th, .table tbody tr td {
          border: 0
      }

      .tree .line {
          width: 100%;
          max-width: 50% !important;
      }

      .tree-table {
          width: 100%;
          min-width: 800px
      }

      .card i {
          color: rgba(235, 177, 0, 0.95);
          font-weight: bold;
          font-size: 16px
      }
  </style>


    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">My Team</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>

              <li class="breadcrumb-item active" aria-current="page">My Team</li>





          </ol>

        </nav>
      </div>

    </div>
    <!--end breadcrumb-->
    <div class="row">
      <div class="col">
      <h6 class="mb-0 text-uppercase">My Team</h6>
      </div>

    </div>


    <hr/>

    <div class="content-body">
                   <!-- Content start -->
                   <div class="tree">
                       <div class="table-responsive">
                           <table class="border-0 tree-table">
                               <tr>
                                   <td colspan="8">
                                       <a class="text-center green_tree" href="{{isset($user) ?$user->id : ''}}" data-toggle="popover" title=""
                                          data-content="<span>Name:</span> Company User<br/><span>Sponsor:</span> ><span>Registration Date:</span> 2020-09-07<br/><span>Package:</span> sahilkajle<br/><span>Own Investment:</span> ₹ 36951.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                          data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                      src="{{asset('images/avatar.png')}}"

                                                                                      alt="Company User"><br/><strong> {{isset($user) ?$user->user_name : ''}}</strong><br/><span
                                               class="text-sm-center"></span></a><br/>
                                       <img style="height:3px;" class="img-fluid line" src="{{asset('images/line.png')}}"
                                            alt="">
                                   </td>
                               </tr>

                                   @php
                                       $child_left = $user->placements->where('position',1)->first();

                                       $child_right = $user->placements->where('position',2)->first();
                                       $lev_two_left_l=$lev_two_left_r=$lev_two_right_l=$lev_two_right_r=null;
                                       if ($child_left){
                                           $lev_two_left_l = $child_left->placements->where('position',1)->first();
                                       $lev_two_left_r = $child_left->placements->where('position',2)->first();
                                       }
                                       if ($child_right){
                                           $lev_two_right_l = $child_right->placements->where('position',1)->first();
                                       $lev_two_right_r = $child_right->placements->where('position',2)->first();
                                       }
                                       //dd($lev_three_left_l,$lev_three_left_r,$lev_three_right_l,$lev_three_right_r);
                                   $lev_three_left_l_l=$lev_three_left_l_r=$lev_three_left_r_l=$lev_three_left_r_r = null;
                                   $lev_three_right_l_l=$lev_three_right_l_r=$lev_three_right_r_l=$lev_three_right_r_r = null;
                                   if ($lev_two_left_l){
                                   $lev_three_left_l_l = $lev_two_left_l->placements->where('position',1)->first();
                                   $lev_three_left_l_r = $lev_two_left_l->placements->where('position',2)->first();
                                   }
                                   if ($lev_two_left_r){
                                   $lev_three_left_r_l = $lev_two_left_r->placements->where('position',1)->first();
                                   $lev_three_left_r_r = $lev_two_left_r->placements->where('position',2)->first();
                                   }
                                   if ($lev_two_right_l){
                                       $lev_three_right_l_l = $lev_two_right_l->placements->where('position',1)->first();
                                       $lev_three_right_l_r = $lev_two_right_l->placements->where('position',2)->first();
                                   }
                                   if ($lev_two_right_r){
                                       $lev_three_right_r_l = $lev_two_right_r->placements->where('position',1)->first();
                                   $lev_three_right_r_r = $lev_two_right_r->placements->where('position',2)->first();
                                   }

                                   @endphp
                                   <tr>
                                       @if($child_left)
                                           <td colspan="4">
                                               <a class="text-center green_tree"
                                                  href="{{$child_left->id}}"
                                                  data-toggle="popover" title=""
                                                  data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                  data-trigger="hover" data-html="true">
                                                  @if($child_left->activation_status == 1)
                                                  <img class="rounded-circle"
                                                  src="{{asset('images/green.png')}}"
                                                      alt="Mohammed Saleem">
                                                      @else

                                                      <img class="rounded-circle"
                                                      src="{{asset('images/red.png')}}"
                                                          alt="Mohammed Saleem">
                                                          @endif

                                                      <br/><strong>
                                                       {{$child_left->user_name}}
                                                   </strong><br/><span class="text-sm-center"> </span></a><br/>
                                               <img style="background:transparent; height:2px;" class="img-fluid line"
                                                    src="{{asset('images/line.png')}}" alt="">
                                           </td>
                                       @else
                                           <td colspan="4">
                                               <a class="text-center"
                                                  href="#"
                                                  data-toggle="popover" title=""
                                                  data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                  data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                              src="{{asset('/images/useradd.jpg')}}"
                                                                                              alt="Mohammed Saleem"><br/><strong>

                                                   </strong><br/><span class="text-sm-center"></span></a><br/>
                                               <img style="background:transparent;height:2px;" class="img-fluid line"
                                                    src="{{asset('images/line.png')}}" alt="">
                                           </td>
                                       @endif

                                       @if($child_right)
                                           <td colspan="4">
                                               <a class="text-center green_tree"
                                                  href="{{$child_right->id}}"
                                                  data-toggle="popover" title=""
                                                  data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                  data-trigger="hover" data-html="true">
                                                    @if($child_right->activation_status == 1)
                                                  <img class="rounded-circle"
                                                    src="{{asset('images/green.png')}}"
                                                    alt="Mohammed Saleem"><br/><strong>
                                                    @else
                                                      <img class="rounded-circle"
                                                      src="{{asset('images/red.png')}}"
                                                    alt="Mohammed Saleem"><br/><strong>
                                                      @endif
                                                       {{$child_right->user_name}}

                                                   </strong><br/><span class="text-sm-center"> </span></a><br/>
                                               <img style="background:transparent;height:2px;" class="img-fluid line"
                                                    src="{{asset('images/line.png')}}" alt="">
                                           </td>
                                       @else
                                           <td colspan="4">
                                               <a class="text-center"
                                                  href="#"
                                                  data-toggle="popover" title=""
                                                  data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                  data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                              src="{{asset('/images/useradd.jpg')}}"
                                                                                              alt="Mohammed Saleem"><br/><strong>

                                                   </strong><br/><span class="text-sm-center"></span></a><br/>
                                               <img style="background:transparent;" class="img-fluid line"
                                                    src="{{asset('images/line.png')}}" alt="">
                                           </td>
                                       @endif

                                   </tr>
                                   <tr>
                                       @if($lev_two_left_l)
                                           <td colspan="2">
                                               <a class="text-center green_tree"
                                                  href="{{$lev_two_left_l->id}}"
                                                  data-toggle="popover" title=""
                                                  data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                  data-trigger="hover" data-html="true">
                                                  @if($lev_two_left_l->activation_status== 1)
                                                  <img class="rounded-circle"
                                                  src="{{asset('images/green.png')}}"
                                                  alt="Mohammed Saleem">
                                                  @else

                                                  <img class="rounded-circle"
                                                  src="{{asset('images/red.png')}}"
                                                  alt="Mohammed Saleem">
                                                  @endif


                                                  <br/><strong>
                                                       {{$lev_two_left_l->user_name}}
                                                   </strong><br/><span class="text-sm-center"> </span></a><br/>
                                               <img style="background:transparent;" class="img-fluid line"
                                                    src="{{asset('images/line.png')}}" alt="">
                                           </td>
                                       @else
                                           <td colspan="2">
                                               <a class="text-center"
                                                  href="#"
                                                  data-toggle="popover" title=""
                                                  data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                  data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                              src="{{asset('/images/useradd.jpg')}}"
                                                                                              alt="Mohammed Saleem"><br/><strong>

                                                   </strong><br/><span class="text-sm-center"></span></a><br/>
                                               <img style="background:transparent;" class="img-fluid line"
                                                    src="{{asset('images/line.png')}}" alt="">
                                           </td>
                                       @endif

                                       @if($lev_two_left_r)

                                           <td colspan="2">
                                               <a class="text-center green_tree"
                                                  href="{{$lev_two_left_r->id}}"
                                                  data-toggle="popover" title=""
                                                  data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                  data-trigger="hover" data-html="true">
                                                  @if($lev_two_left_r->activation_status == 1)
                                                  <img class="rounded-circle"
                                                  src="{{asset('images/green.png')}}"
                                                  alt="Mohammed Saleem">
                                                  @else

                                                  <img class="rounded-circle"
                                                  src="{{asset('images/red.png')}}"
                                                  alt="Mohammed Saleem">
                                                  @endif

                                                  <br/><strong>
                                                       {{$lev_two_left_r->user_name}}
                                                   </strong><br/><span class="text-sm-center"> </span></a><br/>
                                               <img style="background:transparent;" class="img-fluid line"
                                                    src="{{asset('images/line.png')}}" alt="">
                                           </td>
                                       @else
                                           <td colspan="2">
                                               <a class="text-center"
                                                  href="#"
                                                  data-toggle="popover" title=""
                                                  data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                  data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                              src="{{asset('/images/useradd.jpg')}}"
                                                                                              alt="Mohammed Saleem"><br/><strong>

                                                   </strong><br/><span class="text-sm-center"></span></a><br/>
                                               <img style="background:transparent;" class="img-fluid line"
                                                    src="{{asset('images/line.png')}}" alt="">
                                           </td>
                                       @endif

                                       <!--- Lev two Right -->
                                           @if($lev_two_right_l)
                                               <td colspan="2">
                                                   <a class="text-center green_tree"
                                                      href="{{$lev_two_right_l->id }}"
                                                      data-toggle="popover" title=""
                                                      data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                      data-trigger="hover" data-html="true">
                                                      @if($lev_two_right_l->activation_status == 1)
                                                      <img class="rounded-circle"
                                                        src="{{asset('images/green.png')}}"
                                                      alt="Mohammed Saleem">
                                                      @else

                                                      <img class="rounded-circle"
                                                        src="{{asset('images/red.png')}}"
                                                      alt="Mohammed Saleem">
                                                      @endif


                                                      <br/><strong>
                                                           {{$lev_two_right_l->user_name }}
                                                       </strong><br/><span class="text-sm-center"> </span></a><br/>
                                                   <img class="img-fluid line"
                                                        src="{{asset('images/line.png')}}" alt="">
                                               </td>
                                           @else
                                               <td colspan="2">
                                                   <a class="text-center"
                                                      href="#"
                                                      data-toggle="popover" title=""
                                                      data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                      data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                                  src="{{asset('/images/useradd.jpg')}}"
                                                                                                  alt="Mohammed Saleem"><br/><strong>

                                                       </strong><br/><span class="text-sm-center"></span></a><br/>
                                                   <img class="img-fluid line"
                                                        src="{{asset('images/line.png')}}" alt="">
                                               </td>
                                           @endif

                                           @if($lev_two_right_r)
                                               <td colspan="4">
                                                   <a class="text-center green_tree"
                                                      href="{{$lev_two_right_r->id}}"
                                                      data-toggle="popover" title=""
                                                      data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                      data-trigger="hover" data-html="true">
                                                      @if($lev_two_right_r->activation_status == 1)
                                                      <img class="rounded-circle"
                                                      src="{{asset('images/green.png')}}"
                                                      alt="Mohammed Saleem">
                                                      @else

                                                      <img class="rounded-circle"
                                                      src="{{asset('images/red.png')}}"
                                                      alt="Mohammed Saleem">
                                                      @endif


                                                      <br/><strong>
                                                           {{$lev_two_right_r->user_name}}
                                                       </strong><br/><span class="text-sm-center"> </span></a><br/>
                                                   <img class="img-fluid line"
                                                        src="{{asset('images/line.png')}}" alt="">
                                               </td>
                                           @else
                                               <td colspan="2">
                                                   <a class="text-center"
                                                      href="#"
                                                      data-toggle="popover" title=""
                                                      data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                      data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                                  src="{{asset('/images/useradd.jpg')}}"
                                                                                                  alt="Mohammed Saleem"><br/><strong>

                                                       </strong><br/><span class="text-sm-center"></span></a><br/>
                                                   <img class="img-fluid line"
                                                        src="{{asset('images/line.png')}}" alt="">
                                               </td>
                                           @endif

                                   </tr>

                                   <tr>
                                       <!--left-->
                                       @if($lev_three_left_l_l)
                                           <td>
                                               <a class="text-center green_tree"
                                                  href="{{$lev_three_left_l_l->id}}" data-toggle="popover" title="" data-content="<span>Name:</span> YUSUFF<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-11-26<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00" data-trigger="hover" data-html="true">
                                                  @if($lev_three_left_l_l->activation_status == 1)
                                                  <img class="rounded-circle"
                                                  src="{{asset('images/green.png')}}" alt="YUSUFF">
                                                  @else

                                                  <img class="rounded-circle"
                                                  src="{{asset('images/red.png')}}" alt="YUSUFF">
                                                  @endif


                                                  <br />
                                                   <strong>  {{$lev_three_left_l_l->user_name}}</strong><br /><span class="text-sm-center"> </span ></a> </td>
                                       @else
                                           <td>
                                               <a target="_blank" href="#" data-toggle="tooltip" title="Click to register below: 9"><img src="{{asset('/images/useradd.jpg')}}" alt="New User"></a>
                                           </td>
                                       @endif

                                       @if($lev_three_left_l_r)

                                           <td>
                                               <a class="text-center green_tree" href="{{$lev_three_left_l_r->id}}" data-toggle="popover" title="" data-content="<span>Name:</span> YUSUFF<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-11-26<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00" data-trigger="hover" data-html="true">
                                                 @if($lev_three_left_l_r->activation_status == 1)
                                                 <img class="rounded-circle"
                                                 src="{{asset('images/green.png')}}" alt="YUSUFF">
                                                 @else

                                                 <img class="rounded-circle"
                                                 src="{{asset('images/red.png')}}" alt="YUSUFF">
                                                 @endif


                                                 <br />
                                                   <strong>  {{$lev_three_left_l_r->user_name}}</strong><br /><span class="text-sm-center"> </span ></a>
                                           </td>
                                       @else
                                           <td>
                                               <a target="_blank" href="#" data-toggle="tooltip" title="Click to register below: 9"><img src="{{asset('/images/useradd.jpg')}}" alt="New User"></a>
                                           </td>
                                       @endif

                                       @if($lev_three_left_r_l)
                                           <td>
                                               <a class="text-center green_tree" href="{{$lev_three_left_r_l->id}}" data-toggle="popover" title="" data-content="<span>Name:</span> YUSUFF<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-11-26<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00" data-trigger="hover" data-html="true">
                                                 @if($lev_three_left_r_l->activation_status == 1)

                                                 <img class="rounded-circle" src="{{asset('images/green.png')}}" alt="YUSUFF">
                                                 @else

                                                  <img class="rounded-circle" src="{{asset('images/red.png')}}" alt="YUSUFF">
                                                  @endif


                                                 <br />
                                                   <strong> {{$lev_three_left_r_l->user_name}}</strong><br /><span class="text-sm-center"> </span ></a>
                                           </td>
                                       @else
                                           <td>
                                               <a target="_blank" href="#" data-toggle="tooltip" title="Click to register below: 9"><img src="{{asset('/images/useradd.jpg')}}" alt="New User"></a>
                                           </td>
                                       @endif
                                       @if($lev_three_left_r_r)
                                           <td>
                                               <a class="text-center green_tree" href="{{$lev_three_left_r_r->id}}" data-toggle="popover" title="" data-content="<span>Name:</span> YUSUFF<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-11-26<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00" data-trigger="hover" data-html="true">
                                                 @if($lev_three_left_r_r->activation_status == 1)
                                                 <img class="rounded-circle" src="{{asset('images/green.png')}}" alt="YUSUFF">
                                                 @else

                                                  <img class="rounded-circle" src="{{asset('images/red.png')}}" alt="YUSUFF">
                                                  @endif

                                                 <br />
                                                   <strong> {{$lev_three_left_r_r->user_name}}</strong><br /><span class="text-sm-center"> </span ></a>
                                           </td>
                                       @else
                                           <td>
                                               <a target="_blank" href="#" data-toggle="tooltip" title="Click to register below: 9"><img src="{{asset('/images/useradd.jpg')}}" alt="New User"></a>
                                           </td>
                                       @endif

                                   <!--right-->
                                       @if($lev_three_right_l_l)
                                           <td>
                                               <a class="text-center green_tree"
                                                  href="{{$lev_three_right_l_l->id}}"
                                                  data-toggle="popover" title=""
                                                  data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                  data-trigger="hover" data-html="true">
                                                  @if($lev_three_right_l_l->activation_status == 1)
                                                  <img class="rounded-circle"
                                                  src="{{asset('images/green.png')}}"
                                                  alt="Mohammed Saleem">
                                                  @else

                                                  <img class="rounded-circle"
                                                  src="{{asset('images/red.png')}}"
                                                  alt="Mohammed Saleem">
                                                  @endif


                                                  <br/><strong>
                                                       {{$lev_three_right_l_l->user_name}}
                                                   </strong><br/><span class="text-sm-center"> </span></a><br/>
                                           </td>
                                       @else
                                           <td>
                                               <a target="_blank" href="#" data-toggle="tooltip" title="Click to register below: 5"><img src="{{asset('/images/useradd.jpg')}}" alt="New User"></a>
                                           </td>
                                       @endif

                                       @if($lev_three_right_l_r)
                                           <td>
                                               <a class="text-center green_tree"
                                                  href="{{$lev_three_right_l_r->id}}"
                                                  data-toggle="popover" title=""
                                                  data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                  data-trigger="hover" data-html="true">

                                                  @if($lev_three_right_l_r->activation_status == 1)
                                                  <img class="rounded-circle"
                                                  src="{{asset('images/green.png')}}"
                                                  alt="Mohammed Saleem">
                                                  @else

                                                  <img class="rounded-circle"
                                                  src="{{asset('images/red.png')}}"
                                                  alt="Mohammed Saleem">
                                                  @endif


                                                  <br/><strong>
                                                       {{$lev_three_right_l_r->user_name}}
                                                   </strong><br/><span class="text-sm-center"></span></a><br/>
                                           </td>
                                       @else
                                           <td>
                                               <a target="_blank" href="#" data-toggle="tooltip" title="Click to register below: 5"><img src="{{asset('/images/useradd.jpg')}}" alt="New User"></a>
                                           </td>
                                       @endif

                                       @if($lev_three_right_r_l)
                                           <td>
                                               <a class="text-center green_tree"
                                                  href="{{$lev_three_right_r_l->id}}"
                                                  data-toggle="popover" title=""
                                                  data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                  data-trigger="hover" data-html="true">

                                                  @if($lev_three_right_r_l->activation_status == 1)
                                                  <img class="rounded-circle"
                                                  src="{{asset('images/green.png')}}"
                                                  alt="Mohammed Saleem">
                                                  @else


                                                  <img class="rounded-circle"
                                                  src="{{asset('images/red.png')}}"
                                                  alt="Mohammed Saleem">
                                                  @endif




                                                  <br/><strong>
                                                       {{$lev_three_right_r_l->user_name}}
                                                   </strong><br/><span class="text-sm-center"></span></a><br/>
                                           </td>
                                       @else
                                           <td>
                                               <a target="_blank" href="#" data-toggle="tooltip" title="Click to register below: 5"><img src="{{asset('/images/useradd.jpg')}}" alt="New User"></a>
                                           </td>
                                       @endif
                                       @if($lev_three_right_r_r)
                                           <td>
                                               <a class="text-center green_tree"
                                                  href=" {{$lev_three_right_r_r->id}}"
                                                  data-toggle="popover" title=""
                                                  data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                  data-trigger="hover" data-html="true">

                                                  @if($lev_three_right_r_r->activation_status == 1)
                                                  <img class="rounded-circle"
                                                  src="{{asset('images/green.png')}}"
                                                  alt="Mohammed Saleem">
                                                  @else


                                                  <img class="rounded-circle"
                                                  src="{{asset('images/red.png')}}"
                                                  alt="Mohammed Saleem">
                                                  @endif




                                                  <br/><strong>
                                                       {{$lev_three_right_r_r->user_name}}
                                                   </strong><br/><span class="text-sm-center"> </span></a><br/>
                                           </td>
                                       @else
                                           <td>
                                               <a target="_blank" href="#" data-toggle="tooltip" title="Click to register below: 5"><img src="{{asset('/images/useradd.jpg')}}" alt="New User"></a>
                                           </td>
                                       @endif
                                   </tr>
                           </table>
                       </div>


                   </div>


                   <!-- Content End -->


               </div>
           </div>
       <!-- END: Content-->




@endsection
