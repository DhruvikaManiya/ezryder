@extends('layouts.vendor')

@section('header_title', 'Products')

@section('css')
    <style>
        .frt-price-box img {
            width: 150px;
            height: 90px;
        }

        .price {
            font-weight: 600 !important;
        }

        .price del {
            font-size: 12px;
            font-weight: normal;
            margin-right: 5px;
        }
    </style>
@endsection


@section('content')
    @include('mobile.vendor.inc.back-header')


    <div class="container-max p-both">
        <div class="rw">
            <div class="col-12 pad-00 pb-3">
                <div class="search-box top-space30 pos-rele">
                    <input type="text" placeholder="Search">
                    <span><img src="{{ asset('asset/images/search.svg') }}" alt=""></span>
                </div>

                @foreach ($products as $prod)
                    {{-- {{dd($prod->p_image)}} --}}
                    <div class="frt-price-box d-flex  top-space30">
                        <div>
                            <img src="{{ asset($prod->p_image) }}" alt="">
                        </div>
                        <div class="frt-b-data ml-11-m ml-3">
                            <p>{{ $prod->name }} </p>
                            <p>{{ $prod->prod_details }}</p>
                            <p class="price"><del>${{ $prod->price }}</del>
                                ${{ $prod->price - ($prod->price * $prod->Dis_price) / 100 }}</p>
                        </div>
                        <div class="mt-07 ml-auto">
                            <input class='input-switch' name="status" type="checkbox" value="{{ $prod->status }}"
                                {{ $prod->status == 1 ? 'checked' : '' }} id="product{{ $prod->id }}" />
                            <label class="label-switch" for="product{{ $prod->id }}"
                                data-product="{{ $prod->id }}"></label>
                            <span class="info-text"></span>
                        </div>
                    </div>
                    
                @endforeach


            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $('.label-switch').click(function() {
            var input = $(this).attr('for');
            var product = $(this).data('product');
            var val = $('#' + input).val();

            console.log(product);

            if (val == '1') {
                $('#' + input).val('0');
                val = 0;
            } else {
                $('#' + input).val('1');
                val = 1;
            }
            $.ajax({
                url: "{{ route('vendor.prodcuts.active') }}",
                data: {
                    val: val,
                    id: product
                },
                success: function(responce) {
                    console.log(responce);
                }
            });

        });
    </script>
@endsection
