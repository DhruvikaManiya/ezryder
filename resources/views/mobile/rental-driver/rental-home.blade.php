@extends('layouts.mobile-rider')


@section('content')

        <section>
            <div class="container-fluid pad-fig top-mt-53">
                <div class="rw">
                    <div class="col-12 pad-00">



                        <div class="cost-box pos-rele">
                            <div class="top-pt-10 bot-pt-32">
                                <p># 12345</p>
                                <p>3 hours</p>
                                <p>Cost: $100 per hour </p>
                                <p>Total Cost: $300 per hour </p>
                            </div>
                            <div>
                                <p class="name-b">Brijesh Mishra</p>
                            </div>
                        </div>
                        <div class="cost-ad top-mt-27">
                            <p>Pickup location:</p>
                            <p>D293, laxmikrupa, arbudangaar odhave<br> ahmedabad</p>
                        </div>
                        <div class="btn-acp top-mt-77 bop-mt-345">
                            <!-- <a href="#">Accept</a> -->
                            <a href="{{ route('mobile.rental-driver.ridedetails') }}" class="green_bg_btn">Accept</a>
                        </div>

                    </div>
                </div>
            </div>
        </section>
@endsection
