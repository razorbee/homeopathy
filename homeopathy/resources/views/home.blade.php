@extends('layouts.app')

@section('title')
    Homeopathy - Home
@endsection

@section('content')
    @doctor
    @include('user.doctor.dashboard')
    @enddoctor

    @assistant
    @include('user.assistant.dashboard')
    @endassistant

      @doctorother
    @include('user.doctorother.dashboard')
    @enddoctorother

    @pharma
    @include('user.pharma.dashboard')
    @endpharma
    
@endsection
