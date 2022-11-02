@extends('layouts.ecommerce')
@section('css')
    <style>
        #ecommerceSearch {
            padding-top: 30px;
        }

        #ecommerceSearch #search {
            outline: none;
        }
    </style>
@endsection
@section('content')
    <div class="main-container no-padding navStyle storesFilters orderHistory" id="ecommerceSearch">

        <article class="searchbar-1">
            <img src="{{ asset('asset/images/common/search.png') }}" alt="">
            <input type="text" name="search" id="search" placeholder="Find a store or product" autofocus>
        </article>

        <div class="items">
        </div>

        @include('layouts.partials.user_footer_nav')
    </div>
@endsection


@section('js')
    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                $value = $(this).val();
                $.ajax({
                    type: 'post',
                    url: '{{ route('ecommerce.seach.result') }}',
                    data: {
                        'search': $value,
                        '_token': '{{ csrf_token() }}'

                    },
                    success: function(data) {
                        console.log(data);
                        var html = '';
                        $('.items').empty();
                        $.each(data, function(index, value) {
                            html = '<article class="item" >\
                                    <img src="' + value.logo + '" alt="">\
                                    <div class="desc">\
                                        <p class="name"> ' + value.name + '</p>\
                                        <p class="about">' + value.address + ', '+value.area+ ','+ value.city+'</p>\
                                    </div>\
                                    <img src="asset/images/loginScreen/rightArrow.png" alt="" class="bag">\
                                </article>';
                            $('.items').append(html);

                        });
                    }
                });
            })
        })
    </script>
@endsection
