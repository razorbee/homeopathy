@extends('layouts.auth')

@section('title')
    {{config('app.name')}} Home
@endsection

@section('content')
    <style>
       .footer-bottom {
    background-color: #7aad5c;
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
.home_degree{
    font-size: 22px;
  
  }

  .home_desc{

    text-align: left !important;
    padding-left: 70px;
    padding-top: 170px;
    padding-bottom: 10px;
    margin-top: 170px;
    margin-left: 100px;
  }
  .home_desc h1{
    font-family: -webkit-body;
    font-size:45px;
    font-weight: 900;
    margin-top:-200px;
    /* -webkit-text-stroke-width: 1px; */
    /* -webkit-text-stroke-color: black; */

  }
  .text-center > img{
    border-radius:50%;
    margin-top:0px;
    height:520px;
}
    </style>
    <?php $doctor = \App\User::first(); ?>
    <div class="container fullpage">

        <div class="row">
         

            
            <div class="col-md-4 col-sm-2">
                <div class="text-center">
                <img  src="{{App\User::first() ? App\User::first()->image : 'http://cdn.24.co.za/files/Cms/General/d/2809/34cbd0492a23476887812102f40f21d7.jpg'}}"  class="__img-fluid" alt="">
                
                </div>
            </div>
            <div class="col-md-8 col-sm-2" style="padding-top: 50px;">
                <div class="_text-center home_desc">
                    <h1>{{$doctor ? $doctor->name : "Demo"}}</h1>
				   <!-- <h1>Sri Mahima Multispeciality Homeo Clinic</h1> -->
                    <p class="home_degree">
                         {!! nl2br(e($doctor ? $doctor->info : "Demo")) !!}
                    </p>
                </div>
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
            <div class="panel-heading">
                <h4 class="text-center"><strong>Appointment Schedule</strong></h4>
            </div>
            <div class="panel-body">
            <!-- <h4 class="text-center red"><strong>Appointment Schedule</strong></h4> -->
          
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
