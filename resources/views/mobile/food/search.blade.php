@extends('layouts.food')

@section('css')
    <style>
        .search-box {
            width: 100%;
            padding: 2px 10px;
            font-size: 14px;
            border: 1px solid #008080;
            margin-top: 10px;
            border-radius: 20px;
        }

        .search-box input {
            border: none;
            font-size: 17px;
            background: none;
            outline: none;
            float: left;
            padding: 0;
            color: #008080;
            font-weight: bold;
            width: 85%;
            line-height: 30px;

        }

        .search-box .fa-search {
            color: #008080;
            font-size: 18px;
        }

        #search-result {
            padding: 10px;
            padding-left: 20px;
        }

        #search-result .label {


            width: 100%;
            background: #fff;
            color: #808080;
            text-transform: capitalize;
            border-bottom: 1px solid #bdbdbd;
            font-weight: bold;
            font-size: 14px;
        }

        #search-result .row:first-of-type {
            margin-top: 10px;
        }

        #search-result .row {
            width: 100%;
            background: #fff;
            color: #808080;
            text-transform: capitalize;
            border-top: 1px solid #bdbdbd;
            font-weight: bold;
            font-size: 14px;
            padding: 10px 0;
            margin: auto;
        }

        #search-result .row .store_icon {
            width: 100%;
        }

        #store_details {
            display: flex;
            align-items: center;
        }

        .store_name {
            margin: 0;
            color: #4b4b4b;
        }
    </style>
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="search-box">
                        <form action="{{ route('mobile.food.search') }}" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search here..." name="search"
                                    autofocus>
                                <div class="input-group-append">
                                    <button class="btn" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12" id="search-result">

                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $('.search-box input').on('keyup', function() {
            var value = $(this).val();
            console.log(value);
            $.ajax({
                url: "{{ route('mobile.food.search_qry') }}",
                type: "POST",
                data: {
                    search: value,
                    '_token': "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log(response);
                    if (response.success) {
                        $('#search-result').html(response.data);
                    } else {
                        $('#search-result').html('');
                    }
                }
            });
        });
    </script>
@endsection
