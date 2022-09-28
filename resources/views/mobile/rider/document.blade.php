@extends('layouts.mobile-rider')


@section('header_title', 'Documents')
@section('css')
    <link rel="stylesheet" href="{{ asset('asset/css/delivry.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/account.css') }}">
    <style>
        .images img {
            border-radius: 5px;
            width: 100px;
        }
    </style>
@endsection

@section('content')
    @include('mobile.rider.inc.back-header')

    <section class="docu docu_pad mb-34">
        <h2><b>Add your id proof</b></h2>
        <div class="docu_box">
            <div class="docu_boxone">
                <div class="images">
                    <img src="{{ asset('asset/images/Group 5.svg') }}" class="img-fluid select-image image1"
                        data-image="image1">
                    <input type="file" name="image1" id="image1" class="d-none image" accept="image/*">
                </div>
                <h4>Front</h4>
            </div>
            <div class="docu_boxone">
                <div class="images">
                    <img src="{{ asset('asset/images/Group 5.svg') }}" class="img-fluid select-image image2"
                        data-image="image2">
                    <input type="file" name="image2" id="image2" class="d-none image" accept="image/*">
                </div>
                <h4>Back</h4>
            </div>
        </div>
        <h2><b>Upload your licence</b></h2>
        <div class="docu_box">
            <div class="docu_boxone">
                <div class="images">
                    <img src="{{ asset('asset/images/Group 5.svg') }}" class="img-fluid select-image image1"
                        data-image="image1">
                    <input type="file" name="image1" id="image1" class="d-none image" accept="image/*">
                </div>
                <h4>Front</h4>
            </div>
            <div class="docu_boxone">
                <div class="images">
                    <img src="{{ asset('asset/images/Group 5.svg') }}" class="img-fluid select-image image2"
                        data-image="image2">
                    <input type="file" name="image2" id="image2" class="d-none image" accept="image/*">
                </div>
                <h4>Back</h4>
            </div>
        </div>
        <h2><b>Upload vehicle details</b></h2>
        <div class="docu_box">
            <div class="docu_boxone">
                <div class="images">
                    <img src="{{ asset('asset/images/Group 5.svg') }}" class="img-fluid select-image image1"
                        data-image="image1">
                    <input type="file" name="image1" id="image1" class="d-none image" accept="image/*">
                </div>
                <h4>Front</h4>
            </div>
            <div class="docu_boxone">
                <div class="images">
                    <img src="{{ asset('asset/images/Group 5.svg') }}" class="img-fluid select-image image2"
                        data-image="image2">
                    <input type="file" name="image2" id="image2" class="d-none image" accept="image/*">
                </div>
                <h4>Back</h4>
            </div>
        </div>
        <button class="btn withdraw_btn fs-25 btn1 w-100 p-2 mb-34 ">Withdraw</button>
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
                    input.siblings('img').attr('style', 'width:100px;height:100px;');

                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>


@endsection
