@extends('layouts.mobile-rider')


@section('header_title', 'Vehicle Details')
@section('css')
    <link rel="stylesheet" href="{{ asset('asset/css/vendor.css') }}">
    <style>
        .btn {
            color: #FFFFFF !important;
        }
    </style>
    {{-- <link rel="stylesheet" href="{{ asset('asset/css/account.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/delivry.css ') }}"> --}}

@endsection

@section('content')
    @include('mobile.rider.inc.back-header')

    <section class="add_vehical_section">
        <div class="container mt-35 inp-clrrr">

            <form action="{{ route('mobile.rider.add_vehicle') }}" method="post">
                @csrf
                <label class="control-label1">Add Vehicle number</label>
                <input type="text" class="form_control1" name="vehicle_number" value="{{ (isset($vehicle) and $vehicle->vehicle_number!="")?$vehicle->vehicle_number:'' }}" placeholder="GJ 12k 343" required>

                <label class="control-label1 mt-13">Make</label><br>
                <select class="select_make" name="vehicle_make" required>
                    <option  value="Select Make">Select Make</option>
                    <option {{(isset($vehicle) and $vehicle->vehicle_make!="hero")?"selected":''}} value="hero">Hero</option>
                    <option {{(isset($vehicle) and $vehicle->vehicle_make!="hero")?"selected":''}} required value="tvs">TVS</option>
                    <option {{(isset($vehicle) and $vehicle->vehicle_make!="royal")?"selected":''}} required value="royal">Royal Enfield</option>
                    <option {{(isset($vehicle) and $vehicle->vehicle_make!="honda")?"selected":''}} required value="honda">Honda</option>
                    <option {{(isset($vehicle) and $vehicle->vehicle_make!="bajaj")?"selected":''}} required value="bajaj">Bajaj</option>
                </select>

                <label class="control-label1 mt-13">Modal</label><br>
                <select class="select_make" name="vehicle_modal" required>
                    <option required value="Select model">Select Modal</option>
                    <option {{(isset($vehicle) and $vehicle->vehicle_modal!="hero")?"selected":''}} required value="splendor">SPLENDOR PLUS</option>
                    <option {{(isset($vehicle) and $vehicle->vehicle_modal!="tvs")?"selected":''}} required value="tvs">TVS XL100</option>
                    <option {{(isset($vehicle) and $vehicle->vehicle_modal!="bajaj")?"selected":''}} required value="bajaj">Bajaj Pulsar NS200</option>
                </select>

                <button class="theme-bg btn nexBtn btn1 mb-5 mt-5 fs-25">Save</button>
            </form>
        </div>
    </section>
