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

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('mobile.rider.add_vehicle') }}" method="post">
                @csrf


                <label class="control-label1">Add Vehicle number</label>
                <input type="text" class="form_control1" name="vehicle_number"
                       value="{{ (isset($vehicle) and $vehicle->vehicle_number!="")?$vehicle->vehicle_number:'' }}"
                       placeholder="GJ 12k 343" required>
     <label class="control-label1">Vehicle name</label>
                <input type="text" class="form_control1" name="vehicle_name"
                       value="{{ (isset($vehicle) and $vehicle->vehicle_name!="")?$vehicle->vehicle_name:'' }}"
                       placeholder="Name" required>

                <label class="control-label1 mt-13">Make</label><br>
                <select class="select_make" name="vehicle_make" required>
                    <option value="Select Make">Select Make</option>
                    <option {{(isset($vehicle) and $vehicle->vehicle_make=="hero")?"selected":''}} value="hero">Hero
                    </option>
                    <option {{(isset($vehicle) and $vehicle->vehicle_make=="tvs")?"selected":''}} required value="tvs">
                        TVS
                    </option>
                    <option {{(isset($vehicle) and $vehicle->vehicle_make=="royal")?"selected":''}} required
                            value="royal">Royal Enfield
                    </option>
                    <option {{(isset($vehicle) and $vehicle->vehicle_make=="honda")?"selected":''}} required
                            value="honda">Honda
                    </option>
                    <option {{(isset($vehicle) and $vehicle->vehicle_make=="bajaj")?"selected":''}} required
                            value="bajaj">Bajaj
                    </option>
                </select>

                <label class="control-label1 mt-13">Modal  </label><br>
                <select class="select_make" name="vehicle_modal" required>
                    <option required value="Select model">Select Modal</option>
                    <option {{(isset($vehicle) and $vehicle->vehicle_modal=="splendor")?"selected":''}} required
                            value="splendor">SPLENDOR PLUS
                    </option>
                    <option {{(isset($vehicle) and $vehicle->vehicle_modal=="tvs")?"selected":''}} required
                            value="tvs">                         TVS XL100
                    </option>
                    <option {{(isset($vehicle) and $vehicle->vehicle_modal=="bajaj")?"selected":''}} required
                            value="bajaj">Bajaj Pulsar NS200
                    </option>
                </select>

                <label class="control-label1 mt-13">Type</label><br>
                <select class="select_make" name="vehicle_type_id" required>
                    <option required value="Select model">Select Type</option>
                    @foreach($type as $item)

                        <option {{(isset($vehicle) and $vehicle->vehicle_type_id == $item->id)?"selected":''}} value="{{$item->id}}">{{$item->name}}</option>

                    @endforeach
                </select>

                <label class="control-label1">Number of Seats</label>
                <input type="number" min="2" max="10" class="form_control1" placeholder="1" name="number_of_seats"
                       value="{{ (isset($vehicle) and $vehicle->number_of_seats!="")?$vehicle->number_of_seats:'' }}" required>

                <label class="control-label1 mt-13" >Charge (In Rs)</label>
                <input type="number" min="30"  class="form_control1" placeholder="1" name="charge"
                       value="{{ (isset($vehicle) and $vehicle->charge!="")?$vehicle->charge:'' }}" required>


                <label class="control-label1 mt-13" >Distance (in Km)</label>
                <input type="number" min="2" class="form_control1" placeholder="10" name="distance"
                       value="{{ (isset($vehicle) and $vehicle->distance!="")?$vehicle->distance:'' }}" required>


                {{--                <label class="control-label1">Add Vehicle number</label>--}}
                {{--                <input type="text" class="form_control1" name="vehicle_number" value="{{ (isset($vehicle) and $vehicle->vehicle_number!="")?$vehicle->vehicle_number:'' }}" placeholder="GJ 12k 343" required>--}}



                {{--                <h2><b>Add your id proof</b></h2>--}}
                {{--                <label class="control-label1 mt-13">Image</label><br>--}}
                {{--                <div class="docu_box">--}}
                {{--                    <div class="docu_boxone">--}}
                {{--                        <div class="images">--}}
                {{--                            <img src="{{  asset('asset/images/Group 5.svg') }}" class="img-fluid select-image image1"--}}
                {{--                                 data-image="image1">--}}
                {{--                            <input type="file" name="id_proof_front" id="image1" class="d-none image" accept="image/*">--}}
                {{--                        </div>--}}

                {{--                    </div>--}}

                {{--                </div>--}}

                <button class="theme-bg btn nexBtn btn1 mb-5 mt-4 fs-25">Save</button>
            </form>
        </div>
    </section>
