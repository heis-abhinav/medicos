@extends('layouts.app')

@section('content')
<link href="{{ asset('css/base.css') }}" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card getappointment">
                <div class="card-body getappointment">
                    <div class="getappointmenttext">{{ __('Get Your Appointment Now') }}</div>
                   
                   <button class="btn getappointment ">{{ __('Get Appointment') }}</button>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-6 float-left">
            <div class="card ">
                <div class="card-body ">
                    <div class="">{{ __('Get Your Appointment Now') }}</div>
                   
                   <button class="btn ">{{ __('Get Appointment') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
