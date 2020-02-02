/**
 * Created by rifat on 10/7/17.
 */
$(document).bind('keydown', 'ctrl+d', function (e) {
    e.preventDefault();
    $("#btnNewDrug").click();
});
$(document).ready(function () {
    var updateTemplateId = null;
    var patientId = null;
    var drugList = [];
    var drugUpdateKey = null;
    var selectedTemplate = null;
    var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
        "Jul", "Aug", "Sep", "Oct", "Nove", "Dec"
    ];
    // Select 2 initialize
    $(".select2").select2({
        placeholder: "Please select a drug",
        width: '100%'
    });
    // Add new drug
    $("#saveDrug").on('click', function () {
        $("#newDrug").submit();
    });
        // var frequencies = $('input[type=checkbox]:checked').map(function(_, el) {
        //     return $(el).val();
        // }).get();
    // Open new drug modal
    $("#newDrug").on('submit', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url:'save-new-drug',
            type:'POST',
            data:formData,
            contentType: false,
            cache: false,
            processData:false,
            success:function (data) {
                $.Notification.notify('success','top right',"Drug added successfully","drug has been added successfully");
                $("#drug").append('<option value='+data.id+'>'+data.name+'</option>');
                $("#drugUpdateSelect").append('<option value='+data.id+'>'+data.name+'</option>');
                $("#drug").val(data.id).trigger('change');
                $("#con-close-modal").modal('hide');
                $("#newDrug").get(0).reset();
            },error:function (data){
                $(this).showAjaxError(data);
            }
        });
    });
    // Add drug to the list
    $("#addDrugToListForm").on('submit',function (e) {
        e.preventDefault();
        
            var freq = $('#main_freq input[type=checkbox]:checked').map(function(_, el) {
                return $(el).val();
            }).get();
         freq = freq?freq.join(','):'';

         var selectdrugs = $("#drug").select2('data');

         var drug_name = [];
         for (var i=0; i< selectdrugs.length; i++){
             drug_name.push(selectdrugs[i].text);
         }

         var strength = $("#selectStrength").select3('data');
         if (selectdrugs.length != strength.length){
             
            alert ("drug selection and strength should be same!");
            return;
         }

         var drugstrength = [];
        for (var i=0; i< strength.length; i++){
            drugstrength.push(strength[i].id);
         }

         drug_name = drug_name.join(', ');

            drug = {
                drug_id : selectdrugs[0]?selectdrugs[0].id:'',
                drug_name : drug_name,
                drug_id1 : selectdrugs[1]?selectdrugs[1].id:'',
                drug_id2 : selectdrugs[2]?selectdrugs[2].id:'',
                drug_type : $("#drug_type").val(),
                strength : drugstrength.join(', '),
                dose : $("#selectDosage").val(),
                duration : $("#selectDuration").val(),
                drug_advice : $("#drug_advice").val(),
                frequencies : freq
            };
            drugList.push(drug);
            $(this).refreshDrugForm();
            $(this).renderDrug(drugList);
            // console.log(drugList);
            });
    // Open drug update (form the drug list) modal
    $("#updateDrugList").on('click',function () {
       $("#drugUpdateForm").submit();
    });
    // Update drug form the list
    $("#drugUpdateForm").on('submit',function (e) {
        e.preventDefault();
        var freq = $('#popup_freq input[type=checkbox]:checked').map(function(_, el) {
            return $(el).val();
        }).get();
        freq = freq?freq.join(','):'';
        if(drugUpdateKey != null){
            drug = {
                drug_id : $("#drugUpdateSelect").val(),
                 drug_id1 : $("#drugUpdateSelect").val(),
                 drug_id2 : $("#drugUpdateSelect").val(),
                drug_name : $("#drugUpdateSelect").select2('data')[0].text,
                strength : $("#updateDrugStrength").val(),
                dose : $("#updateDrugDose").val(),
                duration : $("#updateDrugDuration").val(),
                drug_advice : $("#updateDrugAdvice").val(),
                drug_type : $("#updateDrugType").val(),
                frequencies:  freq
            };
            drugList[drugUpdateKey] = drug;
            $(this).refreshDrugForm();
            $(this).renderDrug();
            $("#edit-drug-modal").modal('hide');
            drugUpdateKey = null;
        }
        });
    // Save Template
    $("#saveTemplate").on('click',function (e) {
        $(this).saveTemplate('save-template',true);
    });
    // Update template
    $("#updateTemplate").on('click',function (e) {
      
        var url = $("#appurl").val()+'/update-template/'+updateTemplateId;
        $(this).saveTemplate(url,false);
    });
    // Generate prescription form prescription
    $.fn.getPrescriptionDetails = function(prescriptionId){
      console.log(prescriptionId);
      $.get('/api/prescription-details/'+prescriptionId,function (data) {
          console.log(data);
          var _drugs = [];
          $.each(data.drugs, function (key, data) {
              var _drug = {
                  drug_id: data.drug.id,
                 drug_id1: data.drug.id1,
                   drug_id2: data.drug.id2,
                  drug_name: data.drug.name,
                  drug_type: data.type,
                  strength: data.strength,
                  dose: data.dose,
                  duration: data.duration,
                  drug_advice: data.advice,
                  disease:data.disease,
                  frequencies: data.frequencies,
              
              }
              _drugs.push(_drug);
          });
          $(this).setDrugList(_drugs);
          $(this).renderDrug();
          $(this).renderPrescriptionLeftForPrescription(data);
      })
    };
    // Save Prescription function
    $.fn.savePrescription = function () {
        console.log('Save prescription');
        if (drugList.length != 0) {
            if(patientId != null){
                prescriptionData = {
                    _token : $('input[name=_token]').val(),
                    drugs : drugList,
                    template_id : selectedTemplate,
                    patient_id : patientId,
                    drug_type : $("#drug_type").val(),
                    cc : $("#cc").val(),
                    oe : $("#oe").val(),
                    pd : $("#pd").val(),
                    dd : $("#dd").val(),
                    lab_workup : $("#lab_worekup").val(),
                    advice : $("#advice").val(),
                    note : $("#note").val(),
                    disease:$("#selectDisease").val().join(','),
                    next_visit : $("#next_visit").val()
                };
                $('.loading-bro').css("display", "block")
                $("#loadingSavePrescription").show();
                $.ajax({
                    url:'save-prescription',
                    type:'post',
                    data : JSON.stringify(prescriptionData),
                    contentType: 'application/json; charset=utf-8',
                    cache: false,
                    processData:false,
                    success:function (data) {
                        window.location.replace('print-prescription/'+data.id);
                        $("#loadingSavePrescription").hide();
                        
                    },error:function (data) {
                        console.log(data);
                        $("#loadingSavePrescription").hide();
                    }
                })
            }else{
                $.Notification.notify('error', 'top right', "No Patient selected yet",
                    "You cannot create an prescription without any patient." +
                    "Please select patient first.");
            }
        } else {
            $.Notification.notify('error', 'top right', "No drug added",
                "You cannot create an prescription without any drug." +
                "Please add minimum one drug to save template.");
        }
        oLanguage: {
            sProcessing : '<div class="loader"></div>'
            }
    };
    // Save template function
    $.fn.saveTemplate = function (url,isFormReset) {
        if(drugList.length != 0){
            templateData = {
                _token : $('input[name=_token]').val(),
                drugs : drugList,
                name : $("#templateName").val(),
                drug_type : $("#drug_type").val(),
                cc : $("#cc").val(),
                oe : $("#oe").val(),
                pd : $("#pd").val(),
                dd : $("#dd").val(),
                lab_workup : $("#lab_worekup").val(),
                advice : $("#advice").val(),
                note : $("#note").val(),
                disease:$("#disease").val(),
            };
            // ajax request
            $("#loadingSaveTemplate").show();
            $.ajax({
                url:url,
                type:'POST',
                data : JSON.stringify(templateData),
                contentType: 'application/json; charset=utf-8',
                cache: false,
                processData:false,
                success:function (data) {
                    $.Notification.notify('success','top right', "Prescription template save successfully")
                    if(isFormReset === true){
                        $(this).resetTemplate();
                    }
                    $("#loadingSaveTemplate").hide();
                },
                error:function (data) {
                    $.Notification.notify('error','top right','Whops! Something went worng');
                    $("#loadingSaveTemplate").hide();
                }
            })
        }else{
            $.Notification.notify('error','top right',"No drug added",
                "You cannot create an prescription template without any drug." +
                "Please add minimum one drug to save template.");
        }
    };
    // Render drug
    $.fn.renderDrug = function () {
        $("#drugListView").empty();
        $.each(drugList,function (key,data) {
            console.log(data);
            $("#drugListView").append(
                $('<li>').append(

                    $('<div style="margin-left: 10px; overflow: hidden; position: absolute; margin-top: 10px;z-index:100">').append(
                        $("<button>",{class:"btn btn-sm btn-link btn-primary ",
                            onClick:"$(this).editDrug("+key+")"}).append(
                            $("<i>",{class:'fa fa-pencil'})
                        ),
                        $("<button>",{class:"btn btn-sm btn-link btn-danger",
                            onClick:"$(this).deleteDrug("+key+")"}).append(
                            $("<i>",{class:'fa fa-trash-o'})
                        ),
                    ),

                    $('<div>').append('<div class="row"> <div class="col-md-4" style="margin-top: 10px;"> <ol> <li class="print_class"><b>Drug-Type:</b> <i>'+data.drug_type+'</i> <br> <b>Dose:</b> '+data.dose+'  </li></ol></div> <div class="col-md-4" style="margin-top: 10px;"> <ul style="padding-left: 0px"> <li style="list-style: none"> <b>Drug Name:</b> '+data.drug_name+' </li><li style="list-style: none"><b>Drug Duration:</b> '+data.duration+' </li> </ul> </div> <div class="col-md-4" style="margin-top: 10px;"> <ul style="padding-left: 0px"> <li style="list-style: none"><b>Strength:</b> '+data.strength+'</li> <li style="list-style: none"><b> Frequencies:</b>'+data.frequencies+'</li> </ul> </div><div class="col-md-12" style="margin-top: 0px;"><ul style="padding-left: 90px"><li style="list-style: none"><b>Advice:</b> '+data.drug_advice+'</li></ul></div>'),
                   // $("<i>",{text:data.drug_type}).append("&nbsp;&nbsp;"),
                   // $("<b>",{text:data.drug_name}).append("&emsp;"),
                    //$("<i>",{text:data.strength}).append("&emsp;"),
      
                )
            )
        })
    };
    // Render prescription elements left
    $.fn.renderPrescriptionLeft = function (data) {
        $("#cc").val(data.prescription_template_left.cc);
        $("#oe").val(data.prescription_template_left.oe);
        $("#pd").val(data.prescription_template_left.pd);
        $("#dd").val(data.prescription_template_left.dd);
        $("#lab_worekup").val(data.prescription_template_left.lab_workup);
        $("#templateName").val(data.name);
        $("#note").val(data.note);
        $("#advice").val(data.prescription_template_left.advice);
    };
    $.fn.renderPrescriptionLeftForPrescription = function (data) {
        $("#cc").val(data.prescription_left.cc);
        $("#oe").val(data.prescription_left.oe);
        $("#pd").val(data.prescription_left.pd);
        $("#dd").val(data.prescription_left.dd);
        $("#lab_worekup").val(data.prescription_left.lab_workup);
        $("#advice").val(data.prescription_left.advice);
    };
    // Set the selected drug value on the drug update modal
    $.fn.editDrug = function (key) {
        var drug = drugList[key];
        drugUpdateKey = key;
        $("#edit-drug-modal").modal('show');
        $("#drugUpdateSelect").val(drug.drug_id).trigger('change');
        $("#updateDrugStrength").val(drug.strength);
        $("#updateDrugDose").val(drug.dose);
        $("#updateDrugDuration").val(drug.duration);
        $("#updateDrugAdvice").val(drug.drug_advice);
        $("#updateDrugType").val(drug.drug_type);
        $('#morning').prop( "checked", drug.frequencies.indexOf('morning')!==-1 );
        $('#afternoon').prop( "checked", drug.frequencies.indexOf('afternoon')!==-1 );
        $('#evening').prop( "checked", drug.frequencies.indexOf('evening')!==-1 );
        $('#night').prop( "checked", drug.frequencies.indexOf('night')!==-1 );
    };
    // Delete drug form the list
    $.fn.deleteDrug = function (key) {
        var check = confirm('Are you sure you want to delete this drug form the list ?');
        if(check){
            drugList.splice(key,1);
            console.log(drugList);
            $(this).renderDrug(drugList);
        }
    };
    // check validation
    
    // Refresh drug form
    $.fn.refreshDrugForm = function () {
        $("#drug").val('').trigger('change');
        $("#strength").val('');
        $("#dose").val('');
        $("#duration").val('');
        $("#drug_advice").val('');
        $("#drug_type").val('')
    };
    $.fn.showAjaxError = function(data){
        if(data.status == 422 ){
            $.each(data.responseJSON,function (key,data) {
                for(var key in data) {
                    if(key.length > 2){
                        $.each(data[key],function (index,data) {
                            $.Notification.notify('error','top right',data)
                        })
                    }
                }
            });
        }else{
            $.Notification.notify('warning','top right',"Internal server error",
                "Internal server error" +
                "Refresh this page and try again" +
                "Or, contact to your system admin")
        }
    };
    // Reset prescription template
    $.fn.resetTemplate = function () {
        $(this).refreshDrugForm();
        drugList = [];
        $(this).renderDrug();
        $("#cc").val('');
        $("#oe").val('');
        $("#pd").val('');
        $("#dd").val('');
        $("#lab_worekup").val('');
        $("#templateName").val('');
        $("#note").val('');
        $("#advice").val('');
    };
    $.fn.setDrugList = function (drugs) {
        drugList = drugs;
    };
    $.fn.setTemplateId = function (id) {
        updateTemplateId = id;
    };
    $.fn.setPatientId = function (id) {
        patientId = id;
    };
    $.fn.setSelectedTemplate = function (id) {
        selectedTemplate = id;
    }
$.fn.getPatientDetails = function (patientId) {
  $(this).setPatientId(patientId);
        if (patientId != '') {
            $.get('api/patient-details/' + patientId, function (data) {
                $("#_patientName").text(data.patient.name);
                $("#_patientAge").text(data.age);
                var details = $('<textarea />').html(data.patient.patientdetails).text();
                $("#_patientDetails").html(details)
          
                
                $("#_patientGender").text(data.patient.gender === 1 ? 'Male' : data.patient.gender === 2 ? 'Female' : 'Other');
                $("#_patientImage").attr('src', data.patient.image != null ? data.patient.image : 'dashboard/images/patient.png')
                if (data.patient.prescriptions.length != 0) {
                    $("#_patientPrescriptions").children().remove();
                    $(".patientPres").show();
                    $("#_patientPrescriptions").append(
                        $("<option>", {value: null, text: 'Select one'})
                    );
                    $.each(data.patient.prescriptions, function (key, data) {
                        var d = new Date(data.created_at);
                        $("#_patientPrescriptions").append(
                            $("<option>", {value: data.id,
                                text: d.getDate()+"-"+monthNames[d.getMonth()]+"-"+d.getFullYear()
                            })
                        )
                    });
                } else {
                    $("#_patientPrescriptions").children().remove();
                    $(".patientPres").hide();
                }
                console.log(data.patient);
            })
        }
    };
});