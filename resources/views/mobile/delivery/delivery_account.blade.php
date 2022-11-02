@extends('layouts.delivery')


@section('header_title', 'Account')
@section('css')
    <link rel="stylesheet" href="{{ asset('asset/css/account.css') }}">
    <style>
        .images img {
            border-radius: 5px;
            width: 100px;
        }

        .image {
            width: 100%;
        }
    </style>
@endsection

@section('content')
    @include('mobile.delivery.inc.back-header')

    <section class=" img-fluid select-image image">

        <form action="{{ route('mobile.delivery.profilepic') }}" method="post" id="profile-image-form"
            enctype="multipart/form-data">
            @csrf

            @if ($data->profile != '')
                <img src="{{ asset($data->profile) }}" id="file-upload" class="img-fluid select-image image"
                    data-image="image1" id="profile-image" style="width: 100%; height:300px;">
            @else
                <img src="{{ asset('asset/images/Group 5.svg') }}" class="img-fluid select-image image" data-image="image1"
                    id="profile-image" style="width: 100%; height:300px;">
            @endif
            <input type="file" name="profile" id="profile" class="d-none image">

            <button type="submit" name="submit" class="btn btn1 mt-2 d-none" id="submit-btn">Submit</button>

        </form>
    </section>




    <section class="account_link_sec">
        <div class="container mt-5">
            <div class="account_links">

                <a href="{{ route('mobile.delivery.profile') }}" class="link">Profile</a>
                <a href="{{ route('mobile.delivery.wallet') }}" class="link">Wallets</a>
                <a href="{{ route('mobile.delivery.document') }}" class="link">Documents</a>
                <a href="{{ route('mobile.delivery.order_history') }}" class="link">Order History</a>
                <a href="{{ route('mobile.delivery.bankdetail') }}" class="link">Bank Details</a>
                <a href="{{ route('custome.logout') }}" class="link">Logout</a>

            </div>
        </div>
    </section>
@endsection

@section('js')

    <script>
        $('.select-image').click(function() {
            $(this).next().click();
        });

        $('#profile').change(function() {
            $('#submit-btn').click();
        });
    </script>


@endsection
