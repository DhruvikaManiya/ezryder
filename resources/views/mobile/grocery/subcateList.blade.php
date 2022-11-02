@extends('layouts.grocery')


@section('css')
@endsection

@section('content')
    @include('mobile.grocery.inc.header')


    <section class="trend-product pb-5">
        <div class="container-fluid">
            <div class="tend-title section-title pt-3">
                <h3>Trending Products</h3>
            </div>
            @include('mobile.grocery.product.product_list')
        </div>
    </section>
@endsection

@section('js')
    <script>
        $('body').on('click', '#addCart', function() {
            var id = $(this).data('id');

            $.ajax({
                url: "{{ route('cart.store') }}",
                method: "POST",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log(response.success);
                    if (response.success) {
                        $('#iscart' + id).show();
                        $('.addCart' + id).attr('style', 'display:none !important');
                    }
                }
            });
        });
    </script>
@endsection
