@extends('layouts.pharmacies')


@section('css')
    <style>
        .card-body ul {
            list-style: none;
            padding: 0;
        }

        .card-body ul li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.15);

        }

        .card-body ul li a {
            color: #000;
            font-size: 14px;
            font-weight: 500;
            font-family: 'Mulish';
            font-style: normal;
            font-weight: 700;
            font-size: 16px;
            line-height: 20px;
            /* identical to box height */


            color: #555555;


        }
    </style>
@endsection

@section('content')
    @include('mobile.pharmacies.inc.header')
    <section class="cat-accordian pt-3">
        <div class="container-fluid">

            <div class="accordion" id="accordionExample">
      
                @foreach ($categories as $cate)
                    <div class="card">
                        <div class="card-header py-3" id="headingOne2">
                            <h2 class="mb-0 d-flex justify-content-between align-items-center" data-toggle="collapse"
                                data-target="#collapseOne{{ $cate->id }}" aria-expanded="true" aria-controls="collapseOne{{ $cate->id }}">
                                <span>
                                    <img src="{{ $cate->image }}" class="mr-3"> {{ $cate->name }}
                                </span>
                                <img src="{{ asset('asset/images/2.png') }}">
                            </h2>
                        </div>

                        <div id="collapseOne{{ $cate->id }}" class="collapse show" aria-labelledby="headingOne{{ $cate->id }}"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <ul>
                                    @foreach ($cate->subcategory as $sub)
                                        <li>
                                            <a href="{{route('mobile.pharma.pharma_list',$sub->id)}}">{{ $sub->name }}</a>
                                            <img src="{{ asset('asset/images/arrow-black.png') }}">
                                        </li>
                                    @endforeach
                        
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach

                
            </div>
        </div>
    </section>
@endsection
