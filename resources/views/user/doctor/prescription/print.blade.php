@extends('layouts.app')
@section('title')
    Print
@endsection
@section('extra-css')
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <style>
        @if(config('app.fancy_font') == 1)
        p > b {
            font-family: 'Lobster', cursive;
        }
        .prescription-p-title{
            font-family: 'Lobster', cursive;
            font-weight: 100;
            font-size: 16px;
        }
        @endif
        .print_class:nth-child(3),.print_class:nth-child(2) {
            margin-left:25px;
        }
        ol > li{
            margin-left:-25px;
        }
        .letterhead{
        height: cover;
         overflow:hidden;
         width:1200px;
        }
        #print,#printPageBtn{
            margin-top:40px;
            margin-bottom:20px;
        margin-left:100px;        
        }
        table{
            padding-right:40px;
            width:100%;
        }
    </style>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="fa fa-print fa-2x"></i>
            </div>
            <div class="card-content">
                <div id="printPage">
                <div class="letterheadbg">
  <div class="letterhead">
                    <div class="text-right">
                    
                        <h3>{{$prescription->user->name}}</h3>
                        <p>{!! nl2br(e($prescription->user->info)) !!}</p>
                    </div>
                    <div id="print_prescription">
                        <style>
                            @media print {
                                @if(config('app.fancy_font') == 1)
                                p > b {
                                    font-family: 'Lobster', cursive;
                                }
                                .prescription-p-title{
                                    font-family: 'Lobster', cursive;
                                    font-weight: 100;
                                    font-size: 16px;
                                }
                                table{
                                    margin-top:250px;
                                    /* margin-left:250px; */
                                    width:720px;
                                }
                                th{
                                    width:150px!important;
                                    height:3px;
                                }
                                th:nth-child(2){
                                    width:140px;
                                   
                                }
                                th:nth-child(3){
                                    width:160px!important;
                                    
                                }
                                th:nth-child(4){
                                    width:170px!important;
                             }
                                th:nth-child(5){
                                    width:210px!important;
                                    } 
                                    th:nth-child(6){
                                   margin-top:20px!important;
                                    } 
                                   
                                    .prescription-p-title{
                                        margin-top:100px;
                                    }  
                                  .print_img{
                                      margin-left:25%!important;
                                  } 
                                .letterheadbg{
                                  /* background:url('{{url('/')}}/dashboard/images/bill-page0001.jpg'); */
                                  height: 1000px;
                                  overflow:hidden;
                                  width:750px;
                                } 
                                .letterhead{
                                    height: 970px;
                                  overflow:hidden;
                                  width:715px;
                                }
                                 .force{
                                    margin-left:25%!important;  
                                } 
                                @endif
                                .col-md-4 {
                                    width: 30%;
                                }
                                .col-md-8 {
                                    width: 60%;
                                }
                            }
                        </style>
                        <table style="margin-bottom: 10px;">
                            <thead>
                            <tr>
                                <th> <span class="prescription-p-title"></span> Name: {{$prescription->patient->name}} 
                                </th>
                                <th> <span class="prescription-p-title"></span> Id:{{$prescription->patient->id}}</th>
                                <th> <span class="prescription-p-title"></span> Age
                                    : {{$prescription->patient->date_of_birth->diff($prescription->created_at)->format('%y years')}}</th>
                                <th><span class="prescription-p-title"></span> Gender
                                    : @if($prescription->patient->gender ==1)
                                        Male
                                    @elseif($prescription->patient->gender ==2)
                                        Female
                                    @else
                                        Other
                                    @endif
                                </th>
                                <th>
                                    <span class="prescription-p-title"></span>Date :
                                    {{$prescription->prescription_date->format('d-m-Y')}}
                                </th>
                               
                                <th>
                                
                                    <span class="prescription-p-title"></span>Disease :
                                    {{$prescription->disease}}
                                </th>
                            </tr>
                            </thead>
                        </table>
                        <div class="row">
                       
                          <img class="print_img" src="{{url('/dashboard/images/rx.png')}}" width="30px" height="25px" alt="" style="margin-left:20px  ">  
                        
                        </div>
                        <ol class="hi">
                            <div class="row">


                            @foreach($prescription->drugs as $drug)
                            @if(!$drug->multi_drug)
                            <div class="col-md-4" style="margin-top: 10px;">
                            
                                        <li class="print_class"><b>Drug-Type:</b> <i>{{$drug->type}}</i> <br>
                                        <b>Dose:</b> {{$drug->dose}}
                                            <br>
                                           </div>
                                            
                                            <div class="col-md-4" style="margin-top: 10px;">
                                            <ul style="padding-left: 0px">
                                                <li style="list-style: none">
                                                <b>Drug Name:</b>{{$drug->drug_name}}
                                            @if(config('app.generic_name') == 1)
                                                ({{$drug->drug['generic_name']}})
                                            @endif
                                           
                                                <li style="list-style: none"><b>Drug Duration:</b> {{$drug->duration}}</li>
                                                
                                            </ul>
                                            </div>
                                            <div class="col-md-4" style="margin-top: 10px;">
                                            <ul style="padding-left: 0px">
                                            <li style="list-style: none"><b>Strength:</b> {{$drug->strength}}</li>
                                            <li style="list-style: none"><b> Frequencies:</b> {{$drug->frequencies}}</li>
                                          
                                            </ul>
                                        </li>
                                        
                                  </div>
                                  <div class="col-md-12" style="margin-top: 0px;">
                                            <ul style="padding-left: 50px">
                                            <li style="list-style:none"><b> Advice:</b> {{$drug->advice}}</li>
                                           </ul>
                                   </div>
                                  </li>
                                  @endif
                                  @endforeach
                                                </div>
                     </li>
                        </ol>
                      <!-- <div class="col-md-2" style="margin-top: 10px;">
                                <table>
                                    <tr>
                                        <td>Disease:</td>
                                        <td>{{$prescription->disease}}</td>
                                    </tr>
                                </table>
                            </div> -->
                            </div>
                            <div class="col-md-2">
                                @if($prescription->next_visit != null || $prescription->next_visit != '')
                                <p><b>Next Visit :</b>
                                    {{$prescription->next_visit}}
                                </p>
                                @endif
                            </div>
                            <div class="col-md-8 m-t-20">
                                <p class="prescription-p-title" style="border-top: 1px solid black; width: 150px;float: right;">Seal and
                                    Signature</p>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                <button id="print" class="btn btn-inverse pull-right m-l-15"><i class="fa fa-print"></i> &nbsp; Print Prescription</button>
                <button id="printPageBtn"  class="btn btn-success pull-right m-l-15"><i class="fa fa-print"></i> &nbsp; Print Page</button>
                <br>
                <br>
            </div>
        </div>
   
    
@endsection
@section('extra-js')
    <script src="{{url('/dashboard/plugins/printthis/printThis.js')}}"></script>
    <script>
        $(document).ready(function () {
            $("#print").on('click', function () {
                $("#print_prescription").addClass('force'); 
                 $("#print_prescription").printThis(); 
              
            }); 
            $("#printPageBtn").on('click', function () {
               $("#printPage").printThis();
            });
       
    
            
        });
        
</script>

@endsection