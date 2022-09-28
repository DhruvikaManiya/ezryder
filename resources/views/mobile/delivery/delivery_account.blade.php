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
        <form action="{{ route('mobile.delivery.profilepic') }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- <h3 class="in_acti">InActive</h3> --}}
            @if (isset($data->profile))
                <img src="{{ asset($data->profile) }}" class="img-fluid select-image image" data-image="image1">
            @else
                <img src="{{ asset('asset/images/Group 5.svg') }}" class="img-fluid select-image image" data-image="image1">
            @endif
            <input type="file" name="profile" id="profile" class="d-none image">
            {{-- <button type=" submit" name="submit" class=" btn btn1 mt-2 ">Submit</button>             --}}
            
        </form>
    </section>

    {{-- <a href="{{ route('mobile.delivery.document') }}">
        <div class="add-p add_p_bold add_p_center">
            <p>Add your id proof</p>
            <p>Upload your licence</p>
            <p class="mt-bt-0">Upload vehicle details</p>
        </div>
    </a> --}}


    <section class="account_link_sec">
        <div class="container mt-5">
            <div class="account_links">

                <a href="{{ route('mobile.delivery.profile') }}" class="link">Profile</a>
                <a href="{{ route('mobile.delivery.wallet') }}" class="link">Wallets</a>
                <a href="{{ route('mobile.delivery.document') }}" class="link">Documents</a>
                <a href="{{ route('mobile.delivery.order_history') }}" class="link">Order History</a>
                <a href="{{ route('custome.logout') }}" class="link">Logout</a>

                {{-- <a class="link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form> --}}    
            </div>
        </div>
    </section>
@endsection

@section('js')

    <script>
        $(document).ready(function() {
            $('.select-image').click(function() {
                $(this).next().click();
            });
            $('.image').change(function() {
                var input = $(this);
                var reader = new FileReader();
                reader.onload = function(e) {
                    var image = e.target.result;

                    input.siblings('img').attr('src', e.target.result);
                    input.siblings('img').attr('style', 'width:100%;');

                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>


@endsection
