@extends('layouts.vendor-food')

@section('header_title','Analytics')
@section('content')
@include('mobile.vendor-food.inc.back-header')
<div class="container-max p-both">
    <div class="rw ">
        <div class="col-12 pad-00">
            <div class="counter-box-tab space-m-30">
                <p class="top-space-p17">Total Orders: 52</p>
                <p class="top-space-p26">Total Products: 12</p>
            </div>

            <div class="sold-box1 p-topspace-47">
                <table class="sold-tab-box">
                    <thead>
                        <tr>
                            <th>Items</th>
                            <th>Sold</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Cookie </td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>Burger</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>Pizza </td>
                            <td>5</td>
                        </tr>

                        <tr>
                            <td>Pastry </td>
                            <td>5</td>
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>




@endsection
