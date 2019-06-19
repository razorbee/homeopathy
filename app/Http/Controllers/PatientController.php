<?php

namespace App\Http\Controllers;

use App\Model\Appointment;
use App\Model\PatientAppointment;
use App\Model\PatientDocument;
use App\Model\PatientPayment;
use App\Model\Prescription;
use App\Model\Diseases;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Model\Patient;

use App\User;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Show new patient page
     */
    public function newPatient()
    {
        return view('user.doctor.patient.new');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Show patient details page
     */
    public function viewPatient($id)
    {
      // $appointment = DB::table('patient_appointments')->pluck('patient_id');
      $patient = Patient::findOrFail($id);
      if(!$patient){
        return response()->json(['Patient not exist','Patient not exist'], 200);
    }

         $appointment = PatientAppointment::pluck('patient_id');
      
        return view('user.doctor.patient.view',[
            'patient'   =>  $patient,
             'appointment' => $appointment
        ]);
    }

  //  public function viewPatient($id)
    //{
      //  $patient = Patient::findOrFail($id);

      // $patient_Appointment =   PatientAppointment::findOrFail($id);


    //var_dump( $patient_Appointment);
    //print_r($patientAppointment);
      //  $patientAppointment = PatientAppointment::findOrFail($id);

      /*  return view('user.doctor.patient.view',[
            'patient'   =>  $patient,
            'patientAppointment' => $patientAppointment
        ]);
    }*/



    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Show patient medical file
     */
    public function patientMedicalFile($id)
    {
        $patient = Patient::findOrFail($id);
        return view('user.doctor.patient.medical-files.new-file',[
            'patient'   =>      $patient
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Show patient medial history
     */
    public function patientMedicalHistory($id)
    {
        $patient = Patient::findOrFail($id);
        return view('user.doctor.patient.medical-history',[
            'patient'   =>      $patient
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Show edit patient page
     */
    public function editPatient($id)
    {
        $patient = Patient::findOrFail($id);
        $age=  $patient->only(['date_of_birth']);
        $dob="";
        foreach ($age as $key=>$value){
            if ($key =='date_of_birth'){
                $dob = $value;
            }
        }
//        echo $dob;
       
        
        $now = time();
        $d = strtotime($dob);
        $diff = $now - $d;
        $ages =round($diff/(60*60*24*365));
            
//$to   = new DateTime('today');
//echo $from->diff($to)->y;

      //  $age_obj =$age[0].date;
       // echo $age_obj->date;

        //echo $age_obj;
       // print_r ($patient);
        return view('user.doctor.patient.edit', [
            'patient'   =>    $patient,
            'age'    => $ages,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Show All Patient page
     */
    public function allPatient()
    {
        $patient = Diseases::all();
     
        return view('user.doctor.patient.all',[
            'patient'   =>      $patient,
           
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * Delete a patient by patient id
     */
    public function deletePatient($id)
    {
        $patient = Patient::findOrFail($id);
        PatientPayment::where('patient_id',$id)->delete();
        Prescription::where('patient_id',$id)->delete();
        PatientDocument::where('patient_id',$id)->delete();
        PatientAppointment::where('patient_id',$id)->delete();
        if($patient->delete()){
            return redirect()->back()->with('delete_patient','Patient has been deleted');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * Save new patient
     */
    public function savePatient(Request $request)
    {
        

          $age = $request->get('date_of_birth');
          $time1 = $age*31556926; // calculating age in seconds
          $dob1 = time() - $time1; // getting the timestamp for his / her date of birth
          $dob = date("Y-m-d",$dob1); // getting the date of birth here
          $patient = new Patient();
          $patient->name = $request->get('name');
          $patient->gender = $request->get('gender');
          $patient->date_of_birth = $dob;//Carbon::parse($request->get('date_of_birth'))->format('Y-m-d');
          $patient->email = $request->get('email');
          $patient->address = $request->get('address');
          $patient->phone = $request->get('phone');
          $patient->patientdetails = $request->get('patientdetails');
          $patient->user_id = auth()->user()->id;
        if ($request->hasFile('image')) {
            $patient->image = $request->file('image')
                ->move('../data/uploads/patient/\/', rand(100000, 900000) . '.' . $request->image->extension());
        }


        if ($patient->save()) {
            return response()->json($patient, 200);
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * Update and patient by patient id
     */
     public function updatePatient(Request $request, $id)
       {
          $age = $request->get('date_of_birth');
   $time1 = $age*31556926; // calculating age in seconds
   $dob1 = time() - $time1; // getting the timestamp for his / her date of birth
   $dob = date("Y-m-d",$dob1); // getting the date of birth here
           $patient = Patient::findOrFail($id);
           $patient->name = $request->get('name');
           $patient->gender = $request->get('gender');
           $patient->date_of_birth = $dob;
           $patient->email = $request->get('email');
           $patient->address = $request->get('address');
           $patient->phone = $request->get('phone');
           $patient->patientdetails = $request->get('patientdetails');
if ($request->hasFile('image')) {
            $patient->image = $request->file('image')
                ->move('../data/uploads/patient/', rand(100000, 900000) . '.' . $request->image->extension());
        }
        $patient->user_id = auth()->user()->id;
        if ($patient->save()) {
            return response()->json(['Patient updated','Patient Updated successfully'], 200);
        }
    }



    /**
     * @param Request $request
     * @param $patient_id
     * @return \Illuminate\Http\RedirectResponse
     * Save medical file of patient
     */
    public function saveMedicalFile(Request $request,$patient_id)
    {
        $patient_document = new PatientDocument();
        $patient_document->patient_id = $patient_id;
        $patient_document->prescription_id = 0;
        $patient_document->type = 1;
        if (!file_exists('../data/uploads')) { mkdir('uploads', 0777, true); }
        if (!file_exists('../data/uploads/medical_files')) { mkdir('../data/uploads/medical_files', 0777, true); }

        error_log("before", 3, "./my-errors.log");

        if ($request->hasFile('image')) {

            error_log("inside", 3, "./my-errors.log");

            $patient_document->path = $request->file('image')
                ->move('../data/uploads/medical_files', rand(100000, 900000) . '.' . $request->image->extension());
       }
        $patient_document->user_id = auth()->user()->id;
        if($patient_document->save()){
            return redirect()->back();
        }

    }

    public function deleteMedicalFile($id)
    {
        if(PatientDocument::destroy($id)){
            return redirect()->back()->with('medical_file_delete','Medical File Delete');
        }
    }

}
