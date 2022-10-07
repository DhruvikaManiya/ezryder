@extends('layouts.delivery')


@section('header_title', 'Documents')
@section('css')
    <link rel="stylesheet" href="{{ asset('asset/css/account.css') }}">
    <style>
        .images img {
            border-radius: 5px;
            width: 100px;
        }
    </style>
@endsection

@section('content')
    @include('mobile.delivery.inc.back-header')

    <section class="docu docu_pad doc-inp mb-34">
        <form method="post" action="{{ route('mobile.delivery.documentdocs') }}" enctype="multipart/form-data">
            @csrf

            <h2><b>Add your id proof</b></h2>
            <div class="docu_box">
                <div class="docu_boxone">
                    <div class="images">
                        @if (isset($document->id_front))
                            <img src="{{ asset($document->id_front) }}" class="img-fluid select-image image1"
                                data-image="image1">
                        @else
                            <img src="{{ asset('asset/images/Group 5.svg') }}" class="img-fluid select-image image1"
                                data-image="image1">
                        @endif
                        <input type="file" required   name="id_front" id="id_front"  class="d-none image">
                    </div>
                    <h4>Front</h4>
                </div>
                <div class="docu_boxone">
                    <div class="images">
                        @if (isset($document->id_back))
                            <img src="{{ asset($document->id_back) }}" class="img-fluid select-image image2"
                                data-image="image2">
                        @else
                            <img src="{{ asset('asset/images/Group 5.svg') }}" class="img-fluid select-image image2"
                                data-image="image2">
                        @endif
                        <input type="file" name="id_back" required  id="id_back" class="d-none image" accept="image/*">
                    </div>
                    <h4>Back</h4>
                </div>
            </div>
            <h2><b>Upload your licence</b></h2>
            <div class="docu_box">
                <div class="docu_boxone">
                    <div class="images">
                        @if (isset($document->licence_front))
                            <img src="{{ asset($document->licence_front) }}" class="img-fluid select-image image3"
                                data-image="image3">
                        @else
                        <img src="{{ asset('asset/images/Group 5.svg') }}" class="img-fluid select-image image1"
                            data-image="image1">
                        @endif
                        <input type="file" name="licence_front" required  id="licence_front" class="d-none image" accept="image/*">
                    </div>
                    <h4>Front</h4>
                </div>
                <div class="docu_boxone">
                    <div class="images">
                        @if (isset($document->licence_back))
                            <img src="{{ asset($document->licence_back) }}" class="img-fluid select-image image4"
                                data-image="image4">
                        @else
                        <img src="{{ asset('asset/images/Group 5.svg') }}" class="img-fluid select-image image2"
                            data-image="image2">
                        @endif
                        <input type="file" name="licence_back" required  id="licence_back" class="d-none image" accept="image/*">
                    </div>
                    <h4>Back</h4>
                </div>
            </div>
            <h2> <b>Upload vehicle details</b></h2>
            <div class="docu_box">
                <div class="docu_boxone">
                    <div class="images">
                        @if (isset($document->vehicle_front))
                            <img src="{{ asset($document->vehicle_front) }}" class="img-fluid select-image image5"
                                data-image="image5">
                        @else
                        <img src="{{ asset('asset/images/Group 5.svg') }}" class="img-fluid select-image image1"
                            data-image="image1">
                        @endif
                        <input type="file" name="vehicle_front" required  id="vehicle_front" class="d-none image" accept="image/*">
                    </div>
                    <h4>Front</h4>
                </div>
                <div class="docu_boxone">
                    <div class="images">
                        @if (isset($document->vehicle_back))
                            <img src="{{ asset($document->vehicle_back) }}" class="img-fluid select-image image6"
                                data-image="image6">
                        @else
                        <img src="{{ asset('asset/images/Group 5.svg') }}" class="img-fluid select-image image2"
                            data-image="image2">
                        @endif
                        <input type="file" name="vehicle_back" required  id="vehicle_back" class="d-none image" accept="image/*">
                    </div>
                    <h4>Back</h4>
                </div>
            </div>
            <button type="submit" class="btn withdraw_btn fs-25 btn-clrr">Submit</button>
        </form>
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
