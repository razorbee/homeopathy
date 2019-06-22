<?php

namespace App\Http\Controllers;

use App\Model\Patient;
use App\Model\PatientAppointment;
use App\Model\Prescription;
use App\Model\Drug;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    /**
     * @return int
     * API response today's patient
     */
    public function todaysPatient()
    {
        // $patient = count(Patient::where('created_at','like',Carbon::today().'%')->get());
        $patient = count(Patient::whereDate('created_at', Carbon::today())->get());
        return $patient;
    }

    /**
     * @return int
     * API response total patient
     */
    public function totalPatient()
    {
        $patient = count(Patient::all());
        return $patient;
    }

    public function totalDrug()
    {
        $drug = count(Drug::all());
        return $drug;
    }

    /**
     * @return int
     * API response last seven days patient
     */
    public function lastSevenDaysPatient()
    {
        $date = new Carbon();
        $date->subWeek();
        $patient = count(Patient::where('created_at','>',$date->toDateTimeString())
            ->get());
        return $patient;
    }

    /**
     * @return mixed
     * Last seven days prescription
     */
    public function latestPrescription()
    {
        $date = new Carbon();
        $date->subWeek();
        $prescription = Prescription::where('created_at','>',$date->toDateTimeString())
            ->with('patient')
            ->with('drugs')
            ->get();
        return $prescription;

    }

    /**
     * @return mixed
     * Last seven days appointment
     */
    public function latestAppointment()
    {
        $date = new Carbon();
        $date->subWeek();
        $appointment = PatientAppointment::where('created_at','>',$date->toDateTimeString())
            ->with('patient')
            ->with('user')
            ->get();
        return $appointment;
    }
}
