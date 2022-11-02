@extends('layouts.mobile-taxi-rider')
@section('header_title', 'Home')

@section('content')
    <div class="main-container" id="dropLocation2">
        <div class="topNavbar">
            <article class="topNav">
                <h2><img src="{{ url('asset/rider/assets/leftArrow.png')}}"/>Select Car</h2>
                <img src="{{ url('asset/rider/assets/notification.png')}}" alt=""/>
            </article>
            <form action="" id="dropLocationSearch" class="padding-lr">
                <div class="inputContainer">
                    <img src="{{ url('asset/rider/assets/compass.png') }}" alt=""/>
                    <input
                            type="text"
                            name=""
                            id=""
                            class="address"
                            value="D513, Pushp complex, Vastral char rasta"
                    />
                </div>
                <div class="inputContainer">
                    <img src="{{ url('asset/rider/assets/search.png') }}" alt=""/>
                    <input
                            type="text"
                            class="search"
                            name=""
                            placeholder="Select your drop location"
                    />
                </div>
            </form>
        </div>
        <img src="{{ url('asset/rider/assets/location4.png') }}" alt="" height="337px;"/>
        <section class="riderDesc padding-lr">
            <article id="bottomContent">
                <div class="leftSide">
                    <p>Ezryder:<span>Standard</span></p>
                    <p>Ride Type:<span>Shared</span></p>
                    <p>Distance:<span>12Kms</span></p>
                    <div class="sendMsg">
                        <img src="{{ url('asset/rider/assets/send.png') }}" alt=""/>
                        <p>Driver:<span>Brijesh Mishra</span></p>
                    </div>
                </div>
                <div class="rightSide">
                    <button>Cancel</button>
                    <p>$20.50</p>
                    <img src="{{ url('asset/rider/assets/car.png') }}" alt=""/>
                </div>
            </article>
            <div class="btn-option">
                <button class="call">Call</button>
                <button class="chat">Chat</button>
            </div>
        </section>
    </div>
@endsection