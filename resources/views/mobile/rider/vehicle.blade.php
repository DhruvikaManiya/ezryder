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

            <form action="{{ route('mobile.rider.account') }}">

                <label class="control-label1">Add Vehicle number</label>
                <input type="text" class="form_control1" placeholder="GJ 12k 343" required>

                <label class="control-label1 mt-13">Make</label><br>
                <select class="select_make" required>
                    <option required value="Select Make">Select Make</option>
                    <option required value="" >Hero</option>
                    <option required value="" >TVS</option>
                    <option required value="" >Royal Enfield</option>
                    <option required value="" >Honda</option>
                    <option required value="">Bajaj</option>
                </select>

                <label class="control-label1 mt-13">Modal</label><br>
                <select class="select_make" required>
                    <option required value="Select Make">Select Modal</option>
                    <option required value="">SPLENDOR PLUS</option>
                    <option required value="">TVS XL100</option>
                    <option required value="">Bajaj Pulsar NS200 </option>
                </select>

                <button class="theme-bg btn nexBtn btn1 mb-5 mt-5 fs-25">Save</button>
            </form>
        </div>
    </section>
