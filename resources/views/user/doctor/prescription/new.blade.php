@extends('layouts.app')

@section('title')
    Create new prescription
@endsection

@section('extra-css')
    <link rel="stylesheet" href="{{url('/dashboard/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('/dashboard/plugins/jquery-ui/jquery-ui.css')}}">

    <style>
#drugListView > li > ul >li,.print_class {
list-style:none!important;
}
</style>
@endsection

@section('content')

    @if(session('has_patient'))
        <?php $patient = session('has_patient') ?>
        <input type="hidden" value="{{$patient->id}}" id="defaultPatient">
    @endif




    <!-- <select class="js-select2" multiple="multiple">
                <option value="O1" data-badge="">Option1</option>
                <option value="O2" data-badge="">Option2</option>
                <option value="O3" data-badge="">Option3</option>
                <option value="O4" data-badge="">Option4</option>
                <option value="O5" data-badge="">Option5</option>
                <option value="O6" data-badge="">Option6</option>
                <option value="O7" data-badge="">Option7</option>
                <option value="O8" data-badge="">Option8</option>
                <option value="O9" data-badge="">Option9</option>
                <option value="O10" data-badge="">Option10</option>
                <option value="O11" data-badge="">Option11</option>
                <option value="O12" data-badge="">Option12</option>
                <option value="O13" data-badge="">Option13</option>
            </select>    -->



    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="ti-write" style="font-size: 30px;"></i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Add new prescription</h4>
            </div>

            <div class="col-md-12">
                <div class="row">
                    
                 
                    <div class="col-md-8">
                        <h4>Rx</h4>
                        <form action="javascript:void(0)" method="post" id="addDrugToListForm">
                            <div class="row">
                                <div class="col-md-3">
                                <div class="form-group-custom">
                        <!-- <input type="text" name="generic_name" required="required"/> -->
                        <select name="drug_type" id="drug_type" required="required" class="select2">
                        <option  value="select">select Medicine type</option>
                            <option  value="Biochemic">Biochemic</option>
                            <option  value="Mother-Tinture">Mother-Tinture</option>
                            <option  value="Ointments & Oils">Ointments & Oils</option>
                            <option  value="Syrups">Syrups</option>
                            <option  value="Dilutions">Dilutions</option>
                        </select>
                     </div>
                                </div>
                                <div class="col-md-4">
                                    <script>
                                        var drugs = "{{$drugs}}"
                                        // console.log(drugs);
                                        </script>

                                    <select class="form-control select2" id="drug" multiple="multiple">
                                        <option>Please select Medicine</option>
                                        

                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-block btn-default waves-effect waves-light"
                                            data-toggle="modal"
                                            data-target="#con-close-modal" id="btnNewDrug">+
                                    </button>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group-custom">
                                  <!-- <input type="text" id="strength"/> -->
                    <select id = "selectStrength" class="select3 js-select2" name = "strength" multiple="multiple">
                               
                                <option value="1X">1X</option>
                                <option value="3X">3X</option>
                                <option value="6X">6X</option>
                                <option value="12X">12X</option>
                                <option value="6C">6C</option>
                                <option value="30C">30C</option>
                                <option value="200C">200C</option>
                                <option value="1M">1M</option>
                                <option value="10M">10M</option>  
                                <option value="50M">50M</option>  
                                <option value="Q">Q</option>  

                             </select>
                                        <label class="control-label">Strength</label><i class="bar"></i>
                                
                                   </div>
                                  </div>

                                <!-- <div class="col-md-3">
                                    <div class="form-group-custom">
                                    <input type="text" id="dose"/>
                                        <label class="control-label">Dose</label><i class="bar"></i>
                                    </div>
                                </div> -->
                                <div class="col-md-3">
                                    <div class="form-group-custom">
                                   
                                    <!-- <select name="dose" id="dose" placeholder="Dose"> -->
                                    <select id = "selectDosage" class="form-control js-select2" name = "dose" >
                                    <option value="">Pick a dose</option>
                                <option value="1 tab">1 Tab</option>
                                <option value="3 pill">3 Pills</option>
                                <option value="4 pills">4 Pills</option>
                                <option value="6 pills">6 Pills</option>
                                <option value="3 diskets">3 diskets</option>
                                <option value="4 diskets">4 diskets</option>
                                <option value="15 drops">15 drops</option>
                                <option value="20 drops">20 drops</option>
                                <option value="30 drops">30 drops</option>  
                            </select>
                            <label class="control-label">Dose</label><i class="bar"></i>  
                              </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group-custom">
                                    <select id = "selectDuration" class="form-control js-select2" name = "duration" >
                                    <option value="">Pick a dose</option>
                                <option value="1 week">1 week</option>
                                <option value="2 week">2 weeks</option>
                                <option value="1 month">1 month</option>
                                <option value="2 month">2 months</option>
                             </select>
                                        <label class="control-label">Duration</label><i class="bar"></i>
                                    </div>
                                </div>
                                <div class="col-md-5">
                               
                                    <div   class="form-group-custom">
                                    
                                      <label type="hidden" class="control-label" id="frequencies"></label>
                                    
                                      <br>
                                      <ul class="medi" id="main_freq">
                                      <li class="d-inline">
                                      <label class="checkbox-inline  m-r-10 m-l-10   text-center" for="morning">
                                      <input type="checkbox" name="frequencies[]" value="morning" class="mor"/>Morning
                                        </label>
                                        </li>
                                        <li  class="d-inline m-r-5  text-center">
                                          <label class="checkbox-inline m-r-10 m-r-10 m-r-10 " for="afternoon">
                                      <input type="checkbox" name="frequencies[]" value="afternoon"/>Afternoon
                                    </label>
                                    </li>
                                        <li class="d-inline m-r-5  text-center">
                                      <label class="checkbox-inline" for="evening">
                                      <input type="checkbox" name="frequencies[]" value="evening"/>Evening
                                    </label>
                                    </li>
                                        <li class="d-inline m-r-5 text-center">
                                      <label class="checkbox-inline" for="night">
                                        <input type="checkbox" name="frequencies[]" value="night"/>Night
                                        </label> </li>
                                        </ul>


                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <!-- <div class="col-md-6">
                                    <div class="form-group-custom">
                                        <input type="text" id="dose"/>
                                        <label class="control-label">Dose</label><i class="bar"></i>
                                    </div>
                                </div> -->
                                <!-- <div class="col-md-6">
                                    <div class="form-group-custom">
                                        <input type="text" id="duration"/>
                                        <label class="control-label">Duration</label><i class="bar"></i>
                                    </div>
                                </div> -->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group-custom">
                                        <input type="text" id="drug_advice"/>
                                        <label class="control-label">Advice</label><i class="bar"></i>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success waves-effect" data-dismiss="modal">Add Drug
                                    in prescription
                                </button>
                            </div>
                        </form>

                        <hr>
                     

                        </ol>
                    </div>

                   
                    <div class="col-md-3">
                        <!--<select class="form-control" id="selectTemplate">
                            <option></option>
                            @foreach($templates as $template)
                                <option value="{{$template->id}}">{{$template->name}}</option>
                            @endforeach
                        </select>-->
                        <br>
                        <br>
                        
                        <select class="form-control " id="selectPatient">

                      
                            <option value="">Select Patient</option>
                            @foreach($patients as $patient)
                                <option value="{{$patient->id}}">{{$patient->name}} {{$patient->id}}  |<span>@if($patient->gender ==1)
    Male
@elseif($patient->gender == 2)
    Female
@else
    Other
@endif</span> | age-{{$patient->age()}}
                                </option>
                            @endforeach
                        </select>
                        
                        <center>
                            <img id="_patientImage" src="{{url('/dashboard/images/patient.png')}}" height="35"
                                 style="margin-top:10px; height:90px" class="rounded-circle img-fluid" alt="">
                           <div> <span id="_patientName"><b>No Patient Selected yet</b></span>
                            <span id="_patientAge"></span>
                            <!-- <span id="_patientGender"></span> -->
                            <span id="_patientDetails" class="patientdetail"></span>
                            </div>
                            {{--<p>Patient phone : <br> 01738070062 <br> Patient email : abc@patient.com</p>--}}
                        </center>
                        <!-- <div class="form-group-custom patientPres" style="display: none">
                            <select class="select3" id="_patientPrescriptions">
                                <option value="">Patient prescriptions</option>
                            </select>
                            <label class="control-label">Prescriptions</label><i class="bar"></i>
                        </div> -->

                        <br>
             
                    
                        <div class="form-group-custom1">
                          
                                <select class="form-control js-select2" id="selectDisease" multiple="multiple">
                                    <option value="">Select Disease</option>
                                    @foreach($diseases as $diseases)
                                <option value="{{$diseases -> disease}}" data-badge="">{{$diseases -> disease}}
                                </option>
                            @endforeach
                        </select>
                                   <!-- <input type="text" name="other" id="other" style='display:none;'/>-->
                                 
                                  </div>
                                  <center>
                                  <br/> <br/> 
                                  <button class="btn btn-primary"><a style="color:#ffffff;" href="{{url('/new-patient/')}}"> Create new patient</a></button>
                                
                            </button>
                        </center>
                </div>
            </div>

            <div class="row">
            <!--
                <div class="col-md-6">
                    <button onclick="$(this).saveTemplate('save-template',false);"
                            class="btn btn-block btn-lg btn-white waves-effect waves-light">Save as Template
                        <i id="loadingSaveTemplate" class="fa fa-refresh fa-spin"></i>
                    </button>
                </div>
                -->
               
                <div class="col-md-12">
    <ol id="drugListView"></ol>
</div>
                <div class="col-md-12" style="margin-top:20px;">
                    <button onclick="$(this).savePrescription();"
                            class="btn btn-block btn-lg btn-inverse waves-effect waves-light">Save & Print
                        <i id="loadingSavePrescription" class="fa fa-refresh fa-spin"></i>
                    </button>
                </div>
            </div>

        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="ti-write" style="font-size: 30px;"></i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Patient History</h4>
            </div>

            <div class="col-md-12">
                <div class="row m-l-15">
                <p id="patienthistory" value="{{$patient->id}}" style="text-align:justify;margin-right:40px;"></p>
               </div> 
            </div>
        </div>
    </div>

    @include('user.doctor.prescription.model.new-patient')
    @include('user.doctor.template.modals.new-drug')
    @include('user.doctor.template.modals.edit-drug-from-list')
    
@endsection

@section('extra-js')
    <script src="{{url('/dashboard/js/jquery.hotkeys-0.7.9.min.js')}}"></script>
    <script src="{{url('/dashboard/plugins/select2/js/select2.min.js')}}"></script>


    <script src="{{url('/app_js/prescription-template.js')}}"></script>
    <script src="{{url('/dashboard/plugins/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{url('/app_js/prescription-autocomplete.js')}}"></script>
    <script src="{{url('/dashboard/plugins/select2/js/select3.min.js')}}"></script>

    <script>
        $(document).ready(function () {



            
            $('.select3').select3();
 
 $('.select3-input').on('click',function()
 {
   $('input.select3-input').css('width','300px;');
   $('.select3-drop .select3-results li').removeClass('select3-disabled');
   $('.select3-drop .select3-results li').each(function()
   {
     if(!$(this).hasClass('select3-result-selectable'))
       $(this).addClass('select3-result-selectable');
   });   
 });
 
 $('.select3-container-multi').on('mouseover',function()
 {
   $('.select3-input').click();
 });


            $("#loadingSaveTemplate").hide();
            $("#loadingSavePrescription").hide();
            var defaultPatient = $("#defaultPatient").val();
            if(defaultPatient != '' || defaultPatient != null){
                $(this).getPatientDetails(defaultPatient);
                $("#selectPatient").val(defaultPatient).change();
            }
            function decodeHtml(html) {
                 return $('<div>').html(html).text();
            }
            if (drugs){
                // debugger;
                drugs = JSON.parse(decodeHtml(drugs));
            }
            $('#drug_type').on('change', function() {
                var data = [];
                $("select#drug.select2").html('<option "></option> ')
                for (var i=0; i<drugs.length; i++){
                    if (drugs[i].generic_name==this.value){
                        data.push({id: drugs[i].id, text: drugs[i].name });
                        $("select#drug.select2").append("<option value='"+drugs[i].id+"'>"+drugs[i].name+"</option>");
                    }
                }
            });
            $("#selectDosage").select2({
                placeholder: "select dosage",
                tags: true,
                   });
                   $("#selectDuration").select2({
                placeholder: "select duration",
                tags: true,
                   });
                



  



            // Select template
            $("#selectTemplate").select2({
                placeholder: "Prescription template"
            });
            
            // Select patient
            $("#selectPatient").select2({
                placeholder: "Patients"
            });
            $("#selectDisease").select2({
                placeholder: "Treament for"
            });
            // Select template
            $("#selectTemplate").on('change', function () {
                var templateId = $("#selectTemplate").val();
                if (templateId != '') {
                    $.get('/api/template-details/' + templateId, function (data) {
                        $(this).setSelectedTemplate(templateId);
                        var _drugs = [];
                        $.each(data.drugs, function (key, data) {
                            var _drug = {
                                drug_id: data.drug.id,
                                drug_name: data.drug.name,
                                drug_type: data.type,
                                strength: data.strength,
                                dose: data.dose,
                                duration: data.duration,
                                drug_advice: data.advice,
                                frequencies:data.frequencies
                            }
                            _drugs.push(_drug);
                        });
                        $(this).setDrugList(_drugs);
                        $(this).renderDrug();
                        $(this).renderPrescriptionLeft(data);
                    });
                }
            });
            // Get patient prescription
            $("#_patientPrescriptions").on('change', function () {
                $(this).setTemplateId(null);
                $(this).getPrescriptionDetails($("#_patientPrescriptions").val());
            });
            // get patient details
            $("#selectPatient").on('change', function () {
                // console.log("Change");
                var patientId = $("#selectPatient").val();
                $(this).getPatientDetails(patientId);
            });
                //checkbox
                
            // Create new patient on prescription page
            $("#newPatient").on("submit",function (e) {
               e.preventDefault();
               data = new FormData(this);
          showLoader();
               $.ajax({
                   url:'{{url('/save-patient')}}',
                   type:'post',
                   data : data,
                   contentType: false,
                   cache: false,
                   processData:false,
                   success:function (data) {
                    showLoader();
                       $.Notification.notify('success','top right',"Patient added successfully","Patient has been added successfully");
                       $("#selectPatient").append(
                            $('<option>',{value:data.id,text:data.name + "|" +data.phone}).select2({
                                placeholder: "Select Patient"
                            })
                        );
                       $("#selectPatient").val(data.id).trigger('change');
                       $(".bs-example-modal-lg").modal('hide');
                   },error:function (data) {
          
                        $(this).showAjaxError(data);
                   }
               });
            });
        });
        $('select#selectDisease').on('select2:open', function (e) {
            $($('#selectDisease').data('select2').$dropdown).addClass('mtop25')
});
       
 $( ".patientdetail" ).appendTo( "#patienthistory" );
// var htmlString= document.getElementById("patienthistory");
// var text = htmlString.replace(/<[^>]+>/g, '');
    </script>
@endsection