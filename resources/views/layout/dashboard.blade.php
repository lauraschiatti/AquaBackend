@extends('layout.admin')

@section('title')
    <a href="#" class="mobile-tittle">Dashboard</a>
@stop

@section('content')
<!-- ALERT REVISAR REVISAR -->
<!-- DESKTOP -->
  <div class="desktop row container">
      <div class="chip right">
          <img src="img/face.jpg" alt="Contact Person">
          <a href="{{url('/settings',$user->id)}}">{{$user->name}}</a>
      </div>
     <!-- GRAPH -->
     <!-- ALERT - Use #dash_graph for link the graph in .js file -->
     <div class="col s12" id="dash_graph">
         <h2 class="white-text">HERE GOES A GRAPH THAT DEPENDS ON THE ROL</h2>
     </div>
     <!-- GRAPH -->

     <div id="second">
       <!-- CONDITION STARTS HERE -->
      <!-- ************** Use this for Providers *****************

         ALERT - Put contextual information depending of the user :

       <div class="col s12 m4 l4" id="boxes">
         <h2 class="light title">30</h2>   *** Here Sensors **
         <div id="box1">
           <div class="progress">
              <div class="determinate" style="width: 20%"></div>
           </div>
           <h6 class="light" class="content">Sensors</h6>
         </div>

       </div>
       <div class="col s12 m4 l4" id="boxes">
         <h2 class="light title">10</h2>  ** Here Nodes **
         <div id="box2">
           <div class="progress">
              <div class="determinate" style="width: 20%"></div>
           </div>
           <h6 class="light" class="content">Nodes</h6>
         </div>
       </div>

       <div class="col s12 m4 l4" id="boxes">
         <h2 class="light title">1000</h2>  ** Here Sensors **
         <div id="box3">
           <div class="progress">
              <div class="determinate" style="width: 20%"></div>
           </div>
           <h6 class="light" class="content">Downloads</h6>
         </div>
     </div>
      ************** Use this for Providers ***************** -->


        <!-- ************** This for admin ***************** -->
       <div class="col s6 m2 l2" id="boxes">
         <h2 class="light title">{{$sensors}}</h2>   <!-- Here all Sensors created -->
         <div id="box1">
           <div class="progress">
              <div class="determinate" style="width: 20%"></div>
           </div>
           <h6 class="light" class="content"> Sensors</h6>
         </div>

       </div>
       <div class="col s6 m2 l2" id="boxes">
         <h2 class="light title">{{$mynodes}}</h2>  <!-- Here My Nodes -->
         <div id="box2">
           <div class="progress">
              <div class="determinate" style="width: 20%"></div>
           </div>
           <h6 class="light" class="content"> My Nodes </h6>
         </div>
       </div>

       <div class="col s6 m2 l2" id="boxes">
         <h2 class="light title">{{$nodes}}</h2>  <!-- Here all Nodes -->
         <div id="box3">
           <div class="progress">
              <div class="determinate" style="width: 20%"></div>
           </div>
           <h6 class="light" class="content">All nodes  </h6>
         </div>
       </div>

      <div class="col s6 m2 l2" id="boxes">
         <h2 class="light title">{{$users}}</h2>  <!-- Here all Downloads -->
         <div id="box4">
           <div class="progress">
              <div class="determinate" style="width: 20%"></div>
           </div>
           <h6 class="light" class="content">Users</h6>
         </div>
     </div>
     <div class="col s6 m4 l4" id="boxes">
        <h2 class="light title">15233</h2>  <!-- Here all Downloads -->
        <div id="box5">
          <div class="progress">
             <div class="determinate" style="width: 20%"></div>
          </div>
          <h6 class="light" class="content">{{trans('dashboard.download')}}</h6>
        </div>
    </div>
     <!-- ************** This for admin ***************** -->
     <!--- CONDITION ENDS HERE -->

   </div>
 </div>
<!-- DESKTOP -->
@stop
