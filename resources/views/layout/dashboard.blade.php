@extends('layout.admin')

@section('title')
    <a href="#" class="mobile-tittle">{{ trans("general.dashboard") }}</a>
@stop

@section('content')
<!-- ALERT REVISAR REVISAR -->
<!-- DESKTOP -->
  <div class="desktop row container">
      <div class="chip right">
          <img src="img/face.jpg" alt="Contact Person">
          @if(Auth::check())
              <a href="{{url('users',$user->id)}}">{{$user->name}}</a>
          @else
              <a href="{{url('/')}}">User</a>
          @endif

      </div>
     <!-- GRAPH -->
      <div id="graph01" class="col s12">
          <div id="graph"></div>
      </div>
     <!-- GRAPH -->

     <div id="second">

        <!-- ************** This for admin ***************** -->
       <div class="col s6 m2 l2" id="boxes">
         <h2 class="light title">{{$sensors}}</h2>   <!-- Here all Sensors created -->
         <div id="box1">
           <div class="progress">
              <div class="determinate" style="width: 20%"></div>
           </div>
           <h6 class="light" class="content"> {{ trans("general.sensors") }}</h6>
         </div>

       </div>
       <div class="col s6 m2 l2" id="boxes">
         <h2 class="light title">{{$mynodes}}</h2>  <!-- Here My Nodes -->
         <div id="box2">
           <div class="progress">
              <div class="determinate" style="width: 20%"></div>
           </div>
           <h6 class="light" class="content"> {{ trans("nodes.my nodes") }} </h6>
         </div>
       </div>

       <div class="col s6 m2 l2" id="boxes">
         <h2 class="light title">{{$nodes}}</h2>  <!-- Here all Nodes -->
         <div id="box3">
           <div class="progress">
              <div class="determinate" style="width: 20%"></div>
           </div>
           <h6 class="light" class="content">{{ trans("nodes.all nodes") }} </h6>
         </div>
       </div>

      <div class="col s6 m2 l2" id="boxes">
         <h2 class="light title">{{$users}}</h2>  <!-- Here all Downloads -->
         <div id="box4">
           <div class="progress">
              <div class="determinate" style="width: 20%"></div>
           </div>
           <h6 class="light" class="content">{{ trans("general.users") }}</h6>
         </div>
     </div>
     <div class="col s6 m4 l4" id="boxes">
        <h2 class="light title">{{$downloads}}</h2>  <!-- Here all Downloads -->
        <div id="box5">
          <div class="progress">
             <div class="determinate" style="width: 20%"></div>
          </div>
          <h6 class="light" class="content">{{trans('general.downloads')}}</h6>
        </div>
    </div>
     <!-- ************** This for admin ***************** -->
     <!--- CONDITION ENDS HERE -->

   </div>
 </div>
<!-- DESKTOP -->
@stop

@section('javascript')
    <script type="text/javascript" src="/js/highcharts/highcharts.js"></script>            <!-- HighCharts core JS -->
    <script type="text/javascript" src="/js/graphs/graph_dash.js"></script>                 <!-- Graphs core JS -->
    <script type="text/javascript" src="/js/highcharts/sand-signika.js"></script>
@stop