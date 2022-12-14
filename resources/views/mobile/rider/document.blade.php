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
        <form method="post" action="{{ route('mobile.rider.add_document') }}" enctype="multipart/form-data">
            @csrf
            <h2><b>Add your id proof</b></h2>
            <div class="docu_box">
                <div class="docu_boxone">
                    <div class="images">
                        @if ($document)
                            <img src="{{ $document->id_proof_front == '' ? asset('asset/images/Group 5.svg') : asset('storage/id-proof/' . $document->id_proof_front) }}"
                                class="img-fluid select-image image1" data-image="image1">
                        @else
                            <img src="{{ asset('asset/images/Group 5.svg') }}" class="img-fluid select-image image1"
                                data-image="image1">
                        @endif
                        <input type="file" name="id_proof_front" id="image1" class="d-none image" accept="image/*" required>
                    </div>
                    <h4>Front</h4>
                </div>
                <div class="docu_boxone">
                    <div class="images">
                        @if ($document)
                            <img src="{{ $document->id_proof_back == '' ? asset('asset/images/Group 5.svg') : asset('storage/id-proof/' . $document->id_proof_back) }}"
                                class="img-fluid select-image image2" data-image="image2">
                        @else
                            <img src="{{ asset('asset/images/Group 5.svg') }}" class="img-fluid select-image image2"
                                data-image="image2">
                        @endif
                        <input type="file" name="id_proof_back" id="image2" class="d-none image" accept="image/*" required>
                    </div>
                    <h4>Back</h4>
                </div>
            </div>
            <h2><b>Upload your licence</b></h2>
            <div class="docu_box">
                <div class="docu_boxone">
                    <div class="images">
                        @if ($document)
                            <img src="{{ $document->licence_front == '' ? asset('asset/images/Group 5.svg') : asset('storage/licence/' . $document->licence_front) }}"
                                class="img-fluid select-image image1" data-image="image1">
                        @else
                            <img src="{{ asset('asset/images/Group 5.svg') }}" class="img-fluid select-image image1"
                                data-image="image1">
                        @endif
                        <input type="file" name="licence_front" id="image1" class="d-none image" accept="image/*" required>
                    </div>
                    <h4>Front</h4>
                </div>
                <div class="docu_boxone">
                    <div class="images">
                        @if ($document)
                            <img src="{{ $document->licence_back == '' ? asset('asset/images/Group 5.svg') : asset('storage/licence/' . $document->licence_back) }}"
                                class="img-fluid select-image image2" data-image="image2">
                        @else
                            <img src="{{ asset('asset/images/Group 5.svg') }}" class="img-fluid select-image image2"
                                data-image="image2">
                        @endif
                        <input type="file" name="licence_back" id="image2" class="d-none image" accept="image/*" required>
                    </div>
                    <h4>Back</h4>
                </div>
            </div>
            <h2><b>Upload vehicle details</b></h2>
            <div class="docu_box">
                <div class="docu_boxone">
                    <div class="images">
                        @if ($document)
                            <img src="{{ $document->vehicle_front == '' ? asset('asset/images/Group 5.svg') : asset('storage/vehicle/' . $document->vehicle_front) }}"
                                class="img-fluid select-image image1" data-image="image1">
                        @else
                            <img src="{{ asset('asset/images/Group 5.svg') }}" class="img-fluid select-image image1"
                                data-image="image1">
                        @endif
                        <input type="file" name="vehicle_front" id="image1" class="d-none image" accept="image/*" required>
                    </div>
                    <h4>Front</h4>
                </div>
                <div class="docu_boxone">
                    <div class="images">
                        @if ($document)
                            <img src="{{ $document->vehicle_back == '' ? asset('asset/images/Group 5.svg') : asset('storage/vehicle/' . $document->vehicle_back) }}"
                                class="img-fluid select-image image2" data-image="image2">
                        @else
                            <img src="{{ asset('asset/images/Group 5.svg') }}" class="img-fluid select-image image2"
                                data-image="image2">
                        @endif
                        <input type="file" name="vehicle_back" id="image2" class="d-none image" accept="image/*" required>
                    </div>
                    <h4>Back</h4>
                </div>
            </div>
            <button type="submit" class="btn withdraw_btn fs-25 btn1 w-100 p-2 mb-34 ">Submit</button>
        </form>
    </section>
@endsection
@section('js')

    <script>
        $(document).ready(function () {
            $('.select-image').click(function () {
                $(this).next().click();
            });
            $('.image').change(function () {
                var input = $(this);
                var reader = new FileReader();
                reader.onload = function (e) {
                    var image = e.target.result;

                    input.siblings('img').attr('src', e.target.result);
                    input.siblings('img').attr('style', 'width:100px;height:100px;');

                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>


@endsection
