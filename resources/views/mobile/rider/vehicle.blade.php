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

                <label class="control-label1 mt-13">Type</label><br>
                <select class="select_make" onchange="get_brand_item('{{route('mobile.rider.brand')}}')" name="vehicle_type_id" id="vehicle_type_id" required>
                    <option required value="Select model">Select Type</option>
                    @foreach($type as $item)

                        <option {{(isset($vehicle) and $vehicle->vehicle_type_id == $item->id)?"selected":''}} value="{{$item->id}}">{{$item->name}}</option>

                    @endforeach
                </select>

                <label class="control-label1 mt-13">Make</label><br>
                <select class="select_make" onchange="get_model_item('{{route('mobile.rider.model')}}')" name="vehicle_make"  id="vehicle_make" required>
                    <option value="">Select Make</option>
                    @foreach($brand as $item)
                        <option {{(isset($vehicle) and $vehicle->vehicle_make == $item->id)?"selected":''}} value="{{ $item->id }}"> {{ $item->name }}</option>
                    @endforeach
                </select>

                <label class="control-label1 mt-13">Modal  </label><br>
                <select class="select_make" name="vehicle_modal" id="vehicle_modal" onchange="get_charge_item('{{route('mobile.rider.charge')}}')" required>
                    <option value="Select model">Select Modal</option>
                    @foreach($model as $item)
                        <option {{(isset($vehicle) and $vehicle->vehicle_modal == $item->id)?"selected":''}} value="{{ $item->id }}"> {{ $item->name }}</option>
                    @endforeach
                </select>

                <label class="control-label1 mt-13" >Distance (in Km)</label>
                <input type="number" readonly class="form_control1" placeholder="10" name="distance" id="distance"
                       value="{{ (isset($vehicle) and $vehicle->distance!="")?$vehicle->distance:'' }}" required>

                <label class="control-label1 mt-13" >Charge (In Rs)</label>
                <input type="number"  readonly  class="form_control1" placeholder="1" name="charge" id="charge"
                       value="{{ (isset($vehicle) and $vehicle->charge!="")?$vehicle->charge:'' }}" required>

                <label class="control-label1">Number of Seats</label>
                <input type="number" min="2" max="10" class="form_control1" placeholder="1" name="number_of_seats" id="number_of_seats"
                       value="{{ (isset($vehicle) and $vehicle->number_of_seats!="")?$vehicle->number_of_seats:'' }}" required>



                <button class="theme-bg btn nexBtn btn1 mb-5 mt-4 fs-25">Save</button>
            </form>
        </div>
    </section>
