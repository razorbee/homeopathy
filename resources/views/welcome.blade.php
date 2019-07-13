@extends('layouts.auth')

@section('title')
    {{config('app.name')}} Home
@endsection

@section('content')
    <style>
       .footer-bottom {
    background-color: #c00;
    min-height: 30px;
    width: 100%;
}
.copyright {
    color: #fff;
    line-height: 30px;
    min-height: 30px;
    padding: 7px 0;
}
.design {
    color: #fff;
    line-height: 30px;
    min-height: 30px;
    padding: 7px 0;
    text-align: right;
}
.design a {
    color: #fff;
}
.img-src{
    width: 240px;
    height: 250px;
    margin-left:200px;
}
h1,h6,p{
    text-align:center;  
}
.degrees{
    font-size:13px;
    text-align:center;
}
    </style>
    <?php $doctor = \App\User::first(); ?>
    <div class="container fullpage">

        <div class="row"  style="padding-top:150px;">
         <div class="col-md-5 col-sm-2">
               
                   
                    <img src="dashboard/images/mahima_logo.png" class="img-src"></a>
				    <h1>Sri Mahima Multispeciality Homoeo Clinic</h1> 
                    <p class="home_degree">
                         <!-- {!! nl2br(e($doctor ? $doctor->info : "Demo")) !!} -->
                          <!-- <h1>{{$doctor ? $doctor->name : "Demo"}}</h1> -->
                    </p>
             
            </div>
            <div class="col-md-2 col-sm-2">
            
                <img src="dashboard/images/logo (2).png" class="img-responsive">
                <!-- <img  src="{{App\User::first() ? App\User::first()->image : 'http://cdn.24.co.za/files/Cms/General/d/2809/34cbd0492a23476887812102f40f21d7.jpg'}}"  class="__img-fluid" alt=""> -->
                <h6>Dr.P. PREMAJYOTHI FRASER <div class="degrees">B.H.M.S.,M.D.,</div></h6>
                <p>Reg. No A-11934<br>Homoeopatic Physician<br>Asst.prof.Homoeopathic Medical college,Bengaluru</p>
</div>

<div class="col-md-2 col-sm-2">
               <img src="dashboard/images/logo (2).png" class="img-responsive">
              <h6>Dr.P. KUMARAIAH <div class="degrees">B.H.M.S.,M.D.,(Acu)</div> </h6>
              <p>Reg. No 5141<br>State Gen.Secretary,NAMA<br>State Joint Secretary,IIHP</p>
</div>

<div class="col-md-2 col-sm-2">
  
                <img src="dashboard/images/logo (2).png" class="img-responsive">
                
                <h6>Dr.P. NAGENDRA BABU <div class="degrees">B.H.M.S.,M.D.,M.B.A.,(H.M,)</div></h6>
                <p>Reg. No A-11935<br>Homoeopatic Physician<br>Asst.prof.Homoeopathic Medical college,Bengaluru</p>
</div>
              
           <!--<div class="col-md-12" style="padding-top: 85px;">
               <div class="card-box">
                   <div class="panel-heading">
                       <h4 class="text-center"><strong>About Me</strong></h4>
                   </div>
                   <div class="card-content" style="padding-top: 25px;">
                       <center>
                           {!! nl2br(e(\App\Model\About::first() ? \App\Model\About::first()->about : "Demo About")) !!}
                       </center>
                   </div>

               </div>
           </div>!-->

</div>
        </div>


    <div class="container-fluid form-zoom-in-up">
      <div class="row">
        <div class="card-box" style="margin-left:10%;">
            <!-- <div class="panel-heading">
                <h4 class="text-center"><strong>Appointment Schedule</strong></h4>
            </div> -->
            <div class="panel-body">
             <h4 class="text-center red"><strong>Appointment Schedule</strong></h4> 
          
                @foreach($appointments as $appointment)
                    <div class="row">
                        <div class="col-md-6">
                            <h4 style="color:#000;">{{$appointment->name}}</h4>
                        </div>
                        <div class="col-md-6">
                            <h4 style="color:#000;">Contact :</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" style="padding-left: 45px;">
                            @foreach($appointment->dateTime as $date)
                                <p style="color:#000;"><b><u>{{$date->days}}</u></b> <br>
                                    Chamber Time : <b>{{\Carbon\Carbon::parse($date->start_time)->format('g:i a')}}</b> to
                                   <b> {{\Carbon\Carbon::parse($date->end_time)->format('g:i a')}}</b></p>
                            @endforeach
                        </div>
                        <div class="col-md-6" style="padding-left: 45px;">
                            <h4 style="font-size: 20px;color:#000;">
                                {{$appointment->contact_person_name}}
                            </h4>
                            <dl class="row">
                                <dt class="col-sm-1"><i class="fa fa-phone-square" aria-hidden="true"></i></dt>
                                <dd class="col-sm-11"><a href="tel:{{$appointment->phone}}">{{$appointment->phone}}</a></dd>
                                <dt class="col-sm-1"><i class="fa fa-envelope" aria-hidden="true"></i></dt>
                                <dd class="col-sm-11"><a href="mailto:{{$appointment->email}}">{{$appointment->email}}</a></dd>
                                <dt class="col-sm-1"><i class="fa fa-map-marker" aria-hidden="true"></i></dt>
                                <dd class="col-sm-11"> {!! nl2br(e($appointment->address)) !!}</dd>
                            </dl>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

      </div>
       
    </div>
    <div class="footer-bottom">

<div class="container">

    <div class="row">

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

            <div class="copyright">

                © 2019, Razorbee, All rights reserved

            </div>

        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

            <div class="design">

                 <a href="http://www.razorbee.com/">Razorbee </a> |  <a target="_blank" href="">Web Design & Development by Razorbee</a>

            </div>

        </div>

    </div>

</div>

</div>
@endsection
