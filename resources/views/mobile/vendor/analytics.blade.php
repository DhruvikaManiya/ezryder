@extends('layouts.vendor')

@section('header_title','Analytics')
@section('content')
@include('mobile.vendor.inc.back-header')
<div class="container-max p-both">
    <div class="rw ">
        <div class="col-12 pad-00">
            <div class="counter-box-tab space-m-30">
                <p class="top-space-p17"> <span>Total Orders :</span>{{$compelete_order}}</p>

                <p class="top-space-p26"><span>Total Products :</span> {{($product)->count()}}</p>
            </div>

            <div class="sold-box1 p-topspace-47">
                <table class="sold-tab-box">
                    <thead class="text-center">
                        <tr>
                            <th>Items</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody  class="text-center">
                        @foreach ($product as $prod )
                            
                       
                        <tr>
                            <td>{{$prod->name}}</td>
                            <td>${{$prod->price}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>




@endsection
