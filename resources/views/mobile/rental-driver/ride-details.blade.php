@extends('layouts.mobile-rider')


@section('css')
@endsection

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
                        <p class="name-a fw-700">Accepted</p>
                        <p class="name-b">Brijesh Mishra</p>
                    </div>
                </div>
                <div class="call-box d-flex top-mt-66">
                    <div>
                        <a href="#">Call</a>
                    </div>
                    <div class="left-ml-13">
                        <a href="#">chat</a>
                    </div>
                </div>
                <div class="cost-ad top-mt-8 pos-rele">
                    <p>Pickup location:</p>
                    <span class="share1"><img src="{{asset('asset/images/share.png') }}" alt=""></span>
                    <p class="l-height-19">D293, laxmikrupa, arbudangaar odhave<br> ahmedabad</p>

                </div>
                <div class="btn-acp top-mt-322 mb-17">
                    <!-- <a href="#">Accept</a> -->
                    <a href="{{ route('mobile.rental-driver.verifyotp') }}" class="green_bg_btn">Verify OTP</a>
                </div>


            </div>
        </div>
    </div>
</section>

@endsection
