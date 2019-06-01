  

<?php $__env->startSection('title'); ?>
    Create new prescription
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-css'); ?>
    <link rel="stylesheet" href="<?php echo e(url('/dashboard/plugins/select2/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/dashboard/plugins/jquery-ui/jquery-ui.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php if(session('has_patient')): ?>
        <?php $patient = session('has_patient') ?>
        <input type="hidden" value="<?php echo e($patient->id); ?>" id="defaultPatient">
    <?php endif; ?>

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
                    <!-- <div class="col-md-3">
                        <div class="form-group-custom">
                            <textarea required="required" id="cc" rows="3"></textarea>
                            <label class="control-label">Chief Complains</label><i class="bar"></i>
                        </div>
                        <div class="form-group-custom">
                            <textarea required="required" id="oe" rows="3"></textarea>
                            <label class="control-label">On examinations</label><i class="bar"></i>
                        </div>
                        <div class="form-group-custom">
                            <textarea required="required" id="pd" rows="3"></textarea>
                            <label class="control-label">Provisional Diagnosis</label><i class="bar"></i>
                        </div>
                        <div class="form-group-custom">
                            <textarea required="required" id="dd" rows="3"></textarea>
                            <label class="control-label">Differential diagnosis</label><i class="bar"></i>
                        </div>
                        <div class="form-group-custom">
                            <textarea required="required" id="lab_worekup" rows="3"></textarea>
                            <label class="control-label">Lab Workup</label><i class="bar"></i>
                        </div>
                        <div class="form-group-custom">
                            <textarea id="advice" required="required"></textarea>
                            <label class="control-label">Advices</label><i class="bar"></i>
                        </div>
                        <div class="form-group-custom">
                            <input id="next_visit" required="required">
                            <label class="control-label">Next Visit</label><i class="bar"></i>
                        </div>

                    </div> -->
					 <div class="col-md-3">
                        <!--<select class="form-control" id="selectTemplate">
                            <option></option>
                            <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($template->id); ?>"><?php echo e($template->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>-->
                        <br>
                        <br>
                        <select class="form-control" id="selectPatient">
                            <option value="">Select Patient</option>
                            <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($patient->id); ?>"><?php echo e($patient->name); ?> | <span><?php echo e($patient->phone); ?></span>
                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
						
                        <center>
                            <img id="_patientImage" src="<?php echo e(url('/dashboard/images/image_placeholder.jpg')); ?>" width="80%"
                                 style="margin-top:10px;" class="rounded-circle img-fluid" alt="">
                            <h4 id="_patientName">No Patient Selected yet</h4>
                            <p id="_patientAge"></p>
                            <p id="_patientGender"></p>
                            
                        </center>
                        <div class="form-group-custom patientPres" style="display: none">
                            <select class="select3" id="_patientPrescriptions">
                                <option value="">Patient prescriptions</option>
                            </select>
                            <label class="control-label">Prescriptions</label><i class="bar"></i>
                        </div>

                        <br>
                        <center>
                            <button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">
                                Create new patient
                            </button>
                        </center>
                  </div>
                 
                    <div class="col-md-8">
                        <h4>Rx</h4>
                        <form action="javascript:void(0)" method="post" id="addDrugToListForm">
                            <div class="row">
                                <div class="col-md-2">
                                <div class="form-group-custom">
                        <!-- <input type="text" name="generic_name" required="required"/> -->
                        <select name="drug_type" id="drug_type" required="required">
                        <option  value="select">select</option>
                            <option  value="Medicine">Medicine</option>
                            <option  value="Mother-Tinture">Mother-Tinture</option>
                            <option  value="Ointments & Oils">Ointments & Oils</option>
                            <option  value="Syrups">Syrups</option>
                            <option  value="Dilutions">Dilutions</option>
                        </select>
                        <label class="control-label">Drug Type &nbsp;*</label><i class="bar"></i>
                    </div>
                                </div>
                                <div class="col-md-4">
                                    <script>
                                        var drugs = "<?php echo e($drugs); ?>"
                                        </script>
                    
                                    <select class="form-control select2" id="drug">
                                        <option>Please select the drug-type</option>
                                        

                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-block btn-default waves-effect waves-light"
                                            data-toggle="modal"
                                            data-target="#con-close-modal" id="btnNewDrug">+
                                    </button>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group-custom">
                                    <!-- <select name="disease" id="disease" required="required">
                                     
                                        <option  value="Autoimmune Diseases">Autoimmune Diseases</option>
                        <option  value="Allergies & Asthma">Allergies & Asthma</option>
                        <option  value="Cancer">Cancer</option>
                        <option  value="Celiac Disease">Celiac Disease</option>
                        <option  value="Crohn's & Colitis">Crohn's & Colitis</option>
                        <option  value="Heart Disease">Heart Disease</option>
                        <option  value="Infectious Disease">Infectious Disease</option>
                        <option  value="Liver Disease">Liver Disease</option>
                        <option  value="Lupus">Lupus</option>
                        <option  value="Relapsing Polychondritis">Relapsing Polychondritis</option>
                        <option  value="Rheumatoid Arthritis">Rheumatoid Arthritis</option>
                        <option  value="Scleroderma">Scleroderma</option>
                        <option  value="Type 1 Diabetes">Type 1 Diabetes</option>
                        <option  value="Other">Other</option>
                                    </select> -->
                                    <select class="form-control" id="selectDisease">
                            <option value="">Select Disease</option>
                            <?php $__currentLoopData = $disease; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $disease): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($disease->disease); ?>"><?php echo e($disease->disease); ?></span>
                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                                    <input type="text" name="other" id="other" style='display:none;'/>
                                      <label class="control-label">Disease</label><i class="bar"></i>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group-custom">
                                        <input type="text" id="strength"/>
                                        <label class="control-label">Strength</label><i class="bar"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div   class="form-group-custom">
									
                                      <label type="hidden" class="control-label" id="frequencies">Frequencies</label>
									
                                      <br>
                                      <ul class="medi">
                                      <li class="d-inline">
                                      <label class="checkbox-inline  m-r-10 m-l-10   text-center" for="morning">
                                      <input type="checkbox" name="frequencies" value="morning" class="mor"/>Morning
                                        </label>
                                        </li>
                                        <li  class="d-inline m-r-5  text-center">
                                          <label class="checkbox-inline m-r-10 m-r-10 m-r-10 " for="afternoon">
                                      <input type="checkbox" name="frequencies" value="afternoon"/>Afternoon
                                    </label>
                                    </li>
                                        <li class="d-inline m-r-5  text-center">
                                      <label class="checkbox-inline" for="evening">
                                      <input type="checkbox" name="frequencies" value="evening"/>Evening
                                    </label>
                                    </li>
                                        <li class="d-inline m-r-5 text-center">
                                      <label class="checkbox-inline" for="night">
                                        <input type="checkbox" name="frequencies" value="night"/>Night
                                        </label> </li>
                                        </ul>


                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group-custom">
                                        <input type="text" id="dose"/>
                                        <label class="control-label">Dose</label><i class="bar"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group-custom">
                                        <input type="text" id="duration"/>
                                        <label class="control-label">Duration</label><i class="bar"></i>
                                    </div>
                                </div>
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
                        <ol id="drugListView">

                        </ol>
                    </div>

                   
                        <!-- <div class="col-md-3">
                        <center>
                            <img id="_patientImage" src="<?php echo e(url('/dashboard/images/image_placeholder.jpg')); ?>" width="80%"
                                 class="rounded-circle img-fluid" alt="">
                            <h4 id="_patientName">No Patient Selected yet</h4>
                            <p id="_patientAge"></p>
                            <p id="_patientGender"></p>
                            
                        </center>
                        <div class="form-group-custom patientPres" style="display: none">
                            <select class="select3" id="_patientPrescriptions">
                                <option value="">Patient prescriptions</option>
                            </select>
                            <label class="control-label">Prescriptions</label><i class="bar"></i>
                        </div>

                        <br>
                        <center>
                            <button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">
                                Create new patient
                            </button>
                        </center>
                  </div>-->
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
                <div class="col-md-12" style="margin-top:20px;">
                    <button onclick="$(this).savePrescription();"
                            class="btn btn-block btn-lg btn-inverse waves-effect waves-light">Save & Print
                        <i id="loadingSavePrescription" class="fa fa-refresh fa-spin"></i>
                    </button>
                </div>
            </div>

        </div>
    </div>

    <?php echo $__env->make('user.doctor.prescription.model.new-patient', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('user.doctor.template.modals.new-drug', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('user.doctor.template.modals.edit-drug-from-list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
    <script src="<?php echo e(url('/dashboard/js/jquery.hotkeys-0.7.9.min.js')); ?>"></script>
    <script src="<?php echo e(url('/dashboard/plugins/select2/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(url('/app_js/prescription-template.js')); ?>"></script>
    <script src="<?php echo e(url('/dashboard/plugins/jquery-ui/jquery-ui.js')); ?>"></script>
    <script src="<?php echo e(url('/app_js/prescription-autocomplete.js')); ?>"></script>
    <script>
        $(document).ready(function () {
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
                drugs = JSON.parse(decodeHtml(drugs));
            }
            $('#drug_type').on('change', function() {
                var data = [];
                $("select.select2").html('<option "></option> ')
                for (var i=0; i<drugs.length; i++){
                    if (drugs[i].generic_name==this.value){
                        data.push({id: drugs[i].id, text: drugs[i].name });
                        $("select.select2").append("<option value='"+drugs[i].id+"'>"+drugs[i].name+"</option>");
                    }
                }


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
                placeholder: "Disease"
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
                console.log("Change");
                var patientId = $("#selectPatient").val();
                $(this).getPatientDetails(patientId);
            });
				//checkbox
				



            // Create new patient on prescription page
            $("#newPatient").on("submit",function (e) {
               e.preventDefault();
               data = new FormData(this);
               $.ajax({
                   url:'<?php echo e(url('/save-patient')); ?>',
                   type:'post',
                   data : data,
                   contentType: false,
                   cache: false,
                   processData:false,
                   success:function (data) {
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

 
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>