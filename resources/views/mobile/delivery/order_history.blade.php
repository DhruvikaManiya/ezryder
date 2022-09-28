@extends('layouts.delivery')

@section('header_title', ' Order History')
@section('content')
    @include('mobile.delivery.inc.back-header')
<div class="container-maxx p-both">
    <div class="rw ">
        <div class="col-100">
            <!-- <h2 class="ord-title top30-m">Orders</h2> -->
            <table class="h-table w100 tab-height mt88">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Amount</th>
                    </tr>
                </thead>


                <tbody>
                    <tr>
                        <td>#2901</td>
                        <td>09-03-2022</td>
                        <td>200</td>
                    </tr>
                    <tr>
                        <td>#2901</td>
                        <td>09-03-2022</td>
                        <td>200</td>
                    </tr>
                    <tr>
                        <td>#2901</td>
                        <td>09-03-2022</td>
                        <td>200</td>
                    </tr>
                    <tr>
                        <td>#2901</td>
                        <td>09-03-2022</td>
                        <td>200</td>
                    </tr>
                    <tr>
                        <td>#2901</td>
                        <td>09-03-2022</td>
                        <td>200</td>
                    </tr>
                    <tr>
                        <td>#2901</td>
                        <td>09-03-2022</td>
                        <td>200</td>
                    </tr>
                    <tr>
                        <td>#2901</td>
                        <td>09-03-2022</td>
                        <td>200</td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection