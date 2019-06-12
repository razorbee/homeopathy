<?php

namespace App\Http\Controllers;

use App\Model\Advice;
use App\Model\Appointment;
use App\Model\Drug;
use App\Model\DrugAdvice;
use App\Model\DrugDose;
use App\Model\DrugDuration;
use App\Model\DrugStrength;
use App\Model\DrugType;
use App\Model\Patient;
use App\Model\Diseases;
use App\Model\PatientAppointment;
use App\Model\Prescription;
use App\Model\PrescriptionTemplate;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    /**
     * @return mixed
     * Get all drug to database and render it to data table
     */
    public function allDrugToDataTable()
    {
        $drug = Drug::all();
        return datatables($drug)
           ->addColumn('#',function($i){
                static $i = 1;
                return $i++;
           })
            ->editColumn('status',function($drug){
                return $drug->status ==1 ? 'Active' : "in-Active";
            })
            ->addColumn('total_use',function ($drug){
                return view('user.doctor.drug.datatable.total-use',[
                    'drug'  =>  $drug
                ]);
            })
            ->addColumn('action','user.doctor.drug.datatable.actions')
            ->rawColumns(['status', 'action','total_use'])
            ->make(true);
    }

    /**
     * @return mixed
     * Get all assistant and render it to data table
     */
    public function allAssistantToDataTable()
    {
        $assistant = User::all();
        return datatables($assistant)
            ->addColumn('#',function(){
                static $i = 1;
                return $i++;
            })
            ->editColumn('status',function($drug){
                return $drug->status ==1 ? 'Active' : "in-Active";
            })
            ->editColumn('name',function ($assistant){
                return $assistant->name . '<br>' . $assistant->username . '<br>' . $assistant->email ;
            })

            ->addColumn('role',function($assistant){
                return view('user.doctor.assistant.datatable.role',[
                    'assistant'   =>  $assistant
                ]);
            })
            
            ->editColumn('address',function ($assistant){
                return 'Address : '.$assistant->address . "<br>" .
                    "Phone Number :". $assistant->phone . "<br>".
                    'Assistant since :' .$assistant->created_at->format('d-M-Y');
            })
            ->editColumn('image','user.doctor.assistant.datatable.image')
            
            ->addColumn('action','user.doctor.assistant.datatable.actions')
            ->rawColumns(['image','action','name','role','address'])
            ->make(true);
    }

    /**
     * @return mixed
     * Get all prescription template and render in data table
     */
    public function allTemplateToDataTable()
    {
        $templates = PrescriptionTemplate::all();
        return datatables($templates)
            ->addColumn('#',function($i){
                static $i = 1;
                return $i++;
            })
            ->addColumn('total_use',function($template){
                return count($template->prescriptions)." Times";
            })
            ->addColumn('total_drug',function($templates){
                return count($templates->drugs);
            })
            ->editColumn('status',function($template){
                return $template->status ==1 ? 'Active' : "in-Active";
            })
            ->editColumn('created_at',function ($template){
                return $template->created_at->format('d-M-Y');
            })
            ->addColumn('action','user.doctor.template.datatable.actions')
            ->make(true);
    }

    /**
     * @return mixed
     * Get all prescriptions and render it to data table
     */
    public function allPrescriptionToDataTable()
    {
        $parts = parse_url($_SERVER['REQUEST_URI']);
        parse_str($parts['query'], $query);
       $arr = array();
      
       if (isset($query['patient_id']) && $query['patient_id']!=""){
            array_push($arr,['patient_id', '=', $query['patient_id']]);
       }
        $prescription = Prescription::orderBy('id','desc')->where($arr)->get();
        return datatables($prescription)
            ->addColumn('#',function (){
                static $i = 1;
                return $i++;
            })

            ->editColumn('created_at',function ($prescription){
                return $prescription->created_at->format('d-M-Y');
            })
            ->editColumn('patient_id',function ($prescription){
                return $prescription->patient->id;
            })
			->editColumn('patient_name',function ($prescription){
                return $prescription->patient->name;
            })
            ->editColumn('patient_age',function ($prescription){
                $dob = $prescription->patient->date_of_birth;
                $now = time();
                $d = strtotime($dob);
                $diff = $now - $d;
                return round($diff/(60*60*24*365));
            })
            ->editColumn('patient_disease',function ($prescription){
                
                return  $prescription->disease;
            })
            ->addColumn('action','user.doctor.prescription.datatables.actions')
            ->make(true);
    }

	

    /**
     * @return mixed
     * Get all patient and render it to data table
     */
     /**public function allPatientToDataTable()
    {
        $patient = Patient::orderBy('id','desc')->get();
        return datatables($patient)
            ->addColumn('#',function (){
                static $i = 1;
                return $i++;
            })
            ->addColumn('medical_info',function($patient){
                return view('user.doctor.patient.datatable.medical-info',[
                    'patient'   =>  $patient
                ]);
            })
            ->addColumn('actions','user.doctor.patient.datatable.actions')
            ->addColumn('contact_info','user.doctor.patient.datatable.contact-info')
            ->addColumn('patient_info',function ($patient){
                return view('user.doctor.patient.datatable.patient-info',[
                    'patient'   =>  $patient
                ]);
            })
            ->editColumn('image','user.doctor.patient.datatable.image')
            ->rawColumns(['image','patient_info','contact_info','actions','medical_info'])
            ->make(true);
    }*/

	    public function allPatientToDataTable(Request $request)
    {

        $parts = parse_url($_SERVER['REQUEST_URI']);
        parse_str($parts['query'], $query);
       $arr = array();
      /* if ($query['disease'] && $query['disease']!==0){
        array_push($arr,['disease', '=', $query['disease']]);
       }*/
       if (isset($query['gender']) && $query['gender']!=="0"){
            array_push($arr,['gender', '=', $query['gender']]);
       }
       if (isset($query['age']) && $query['age']!=="0"){
        $age = explode("-",$query['age']);
        $time1 = $age[0]*31556926; // calculating age in seconds
        $dob1 = time() - $time1; // getting the timestamp for his / her date of birth
        $startdob = date("Y-m-d",$dob1); // getting the date of birth here

        $time1 = $age[1]*31556926; // calculating age in seconds
        $dob1 = time() - $time1; // getting the timestamp for his / her date of birth
        $enddob = date("Y-m-d",$dob1); // getting the date of birth here


        array_push($arr,['date_of_birth', '<', $startdob]);
        array_push($arr,['date_of_birth', '>', $enddob]);

        
        //    array_push($arr,['age', '=', $query['age']]);
        }
       if (isset($query['name']) && $query['name']!==''){
            array_push($arr,['name', 'like', '%'.$query['name'].'%']);
        }
       
        $patient = Patient::orderBy('id','desc')->where($arr)->get();
       // $patient = Patient::orderBy('id','desc')->get();
       global $_disease ;
       $_disease = $query['disease'];
      if (isset($query['disease']) && $query['disease']!=""){
            $filtered_patient= $patient->filter(function($_patient){
                $diseases = $_patient->disease;
                foreach ($diseases as $d) {
                    global $_disease;
                    //return $_patient;
                     if ($d['disease']==$_disease){ return $_patient;}
                }
            });
        }else{
            $filtered_patient= $patient ;

        }



       // $patient = Patient::orderBy('id','desc')->leftJoin('prescriptions','patients.id','=','prescriptions.patient_id', 'and', 'prescriptions.disease','=','Celiac Disease' );
      
      //  $patient = Patient::where($arr)->leftJoin('prescriptions', 'patients.id', '=', 'prescriptions.patient_id');

    


     //   print_r($patient);
//exit();
        return datatables($filtered_patient)
            ->addColumn('#',function (){
                static $i = 1;
                return $i++;
            })
            ->addColumn('medical_info',function($patient){
                return view('user.doctor.patient.datatable.medical-info',[
                    'patient'   =>  $patient
                ]);
            })
            ->addColumn('actions','user.doctor.patient.datatable.actions')
            ->addColumn('contact_info','user.doctor.patient.datatable.contact-info')
            ->addColumn('patient_info',function ($patient){
                return view('user.doctor.patient.datatable.patient-info',[
                    'patient'   =>  $patient
                ]);
            })
            ->addColumn('disease',function ($patient){
                $diseases = $patient->disease;
                $disease_text = '';
                foreach ($diseases as $d) {
                    if ($d['disease']){
                        $disease_text .= ' ['.$d['disease'].'] ' ;
                    }else{}
                   }
                
                //foreach($disease as $disease) {
                   // echo $disease->disease;
                    //$disease_text.= $disease['disease'];
                //}
                return $disease_text;
            })
            ->editColumn('image','user.doctor.patient.datatable.image')
            ->rawColumns(['image','patient_info','contact_info','actions','medical_info'])
            ->make(true);
    }

    /**
     * @return mixed
     * My schedule (Doctor) render to data table
     */
    public function myScheduleToDataTable()
    {
        $schedule = Appointment::all();
        return datatables($schedule)
            ->addColumn('#',function (){
                static $i = 1;
                return $i++;
            })
            ->addColumn('action','user.doctor.schedule.datatable.actions')
            ->addColumn('model','user.doctor.schedule.datatable.modal')
            ->rawColumns(['action','model'])
            ->make(true);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * Get schedule details for api response
     */
    public function getScheduleDetails($id)
    {
        $schedule = Appointment::with('dateTime')->findOrFail($id);
        return response()->json($schedule);
    }

    /**
     * @return mixed
     * Get all patient appointment including pending and appointed and render in data table
     */
    public function allAppointmentToDataTable()
    {
        $appointment = PatientAppointment::with('user')
            ->orderBy('created_at','desc')
            ->orderBy('status','asc')
            ->get();
        return datatables($appointment)
            ->addColumn('patient',function($appointment){
                return view('user.doctor.appointment.datatable.patient',[
                    'appointment'   =>  $appointment
                ]);
            })
            ->addColumn('appointment',function ($appointment){
                return view('user.doctor.appointment.datatable.appointment',[
                    'appointment'   =>  $appointment
                ]);
            })
            ->addColumn('actions','user.doctor.appointment.datatable.actions')
            ->editColumn('status',function ($appointment){
                return $appointment->status ==0 ? 'Pending' : 'Done';
            })
            ->addColumn('#',function (){
                static $i = 1;
                return $i++;
            })
            ->rawColumns(['actions','patient','appointment'])
            ->make(true);
    }

    /**
     * @return mixed
     * Get today's patient appointment including pending and appointed and render in data table
     */
    public function appointmentToday()
    {
        $appointment = PatientAppointment::with('user')->where('date',Carbon::today())
            ->orderBy('status','asc')
            ->get();
        return datatables($appointment)
            ->addColumn('patient',function($appointment){
                return view('user.doctor.appointment.datatable.patient',[
                    'appointment'   =>  $appointment
                ]);
            })
            ->addColumn('appointment',function ($appointment){
                return view('user.doctor.appointment.datatable.appointment',[
                    'appointment'   =>  $appointment
                ]);
            })
            ->addColumn('actions','user.doctor.appointment.datatable.actions')
            ->editColumn('status',function ($appointment){
                return $appointment->status ==0 ? 'Pending' : 'Done';
            })
            ->addColumn('#',function (){
                static $i = 1;
                return $i++;
            })
            ->rawColumns(['actions','patient','appointment'])
            ->make(true);
    }


    /**
     * @return mixed
     * Get all drug types and render it to data table
     */
    public function allDrugTypesToDataTable()
    {
        $drug_type = DrugType::all();
        return datatables($drug_type)
            ->addColumn('#',function (){
                static $i = 1;
                return $i++;
            })
            ->editColumn('status',function($drug_type){
                return $drug_type->status == 1 ? 'Active' : "In-Active";
            })
            ->editColumn('created_at',function($drug_type){
                return $drug_type->created_at->format('d-M-Y');
            })
            ->addColumn('actions','user.doctor.setting.prescription.tab-body.drug-types.actions')
            ->rawColumns(['actions'])
            ->make(true);
    }

    /**
     * @return mixed
     * Get all drug strength and render it to data table
     */
    public function allDrugStrengthToDataTable()
    {
        $drug_strength = DrugStrength::all();
        return datatables($drug_strength)
            ->addColumn('#',function (){
                static $i = 1;
                return $i++;
            })
            ->addColumn('actions','user.doctor.setting.prescription.tab-body.drug-strength.actions')
            ->editColumn('status',function($drug_type){
                return $drug_type->status == 1 ? 'Active' : "In-Active";
            })
            ->editColumn('created_at',function($drug_type){
                return $drug_type->created_at->format('d-M-Y');
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    /**
     * @return mixed
     * Get all drug dose and render it to data table
     */
    public function allDrugDosesToDataTable()
    {
        $drug_doses = DrugDose::all();
        return datatables($drug_doses)
            ->addColumn('#',function (){
                static $i = 1;
                return $i++;
            })
            ->addColumn('actions','user.doctor.setting.prescription.tab-body.drug-dose.actions')
            ->editColumn('created_at',function($drug_type){
                return $drug_type->created_at->format('d-M-Y');
            })
            ->editColumn('status',function($drug_type){
                return $drug_type->status == 1 ? 'Active' : "In-Active";
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    /**
     * @return mixed
     * Get All drug and render it to data table
     */
    public function allDrugDurationToDataTable()
    {
        $drug_duration = DrugDuration::all();
        return datatables($drug_duration)
            ->addColumn('#',function (){
                static $i = 1;
                return $i++;
            })
            ->addColumn('actions','user.doctor.setting.prescription.tab-body.drug-duration.actions')
            ->editColumn('created_at',function($drug_duration){
                return $drug_duration->created_at->format('d-M-Y');
            })
            ->editColumn('status',function($drug_duration){
                return $drug_duration->status == 1 ? 'Active' : "In-Active";
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    /**
     * @return mixed
     * Get all drug advice and render it to data table
     */
    public function allDrugAdviceToDataTable()
    {
        $drug_advice = DrugAdvice::all();
        return datatables($drug_advice)
            ->addColumn('#',function (){
                static $i = 1;
                return $i++;
            })
            ->addColumn('actions','user.doctor.setting.prescription.tab-body.drug-advice.actions')
            ->editColumn('created_at',function($drug_advice){
                return $drug_advice->created_at->format('d-M-Y');
            })
            ->editColumn('status',function($drug_advice){
                return $drug_advice->status == 1 ? 'Active' : "In-Active";
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    /**
     * @return mixed
     * Get all prescription advice and render it to data table
     */
    public function allAdviceToDataTable()
    {
        $advice = Advice::all();
        return datatables($advice)
            ->addColumn('#',function (){
                static $i = 1;
                return $i++;
            })
            ->addColumn('actions','user.doctor.setting.prescription.tab-body.advice.actions')
            ->editColumn('created_at',function($advice){
                return $advice->created_at->format('d-M-Y');
            })
            ->editColumn('status',function($advice){
                return $advice->status == 1 ? 'Active' : "In-Active";
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function allDiseaseToDataTable()
    {
        $disease = Diseases::all();
        return datatables($disease)
            ->addColumn('#',function (){
                static $i = 1;
                return $i++;
            })
            ->addColumn('action','user.doctor.drug.datatable.action')
            ->editColumn('created_at',function($disease){
                return $disease->created_at->format('d-M-Y');
            })
           
            ->rawColumns(['action'])
            ->make(true);
    }



}
