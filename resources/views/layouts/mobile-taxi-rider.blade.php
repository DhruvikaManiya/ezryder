<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
            href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,700;1,300;1,500;1,700;0,800;0,1000&display=swap"
            rel="stylesheet"
    />
{{--    <link rel="stylesheet" href=" {{ url('asset/driver/css/common.css') }}" />--}}
    <link rel="stylesheet" href=" {{ asset('asset/rider/css/common.css') }}" />
    <link rel="stylesheet" href=" {{ asset('asset/rider/css/customStyling.css') }}" />
{{--    <link rel="stylesheet" href="{{ url('asset/driver/css/customStyling.css') }}" />--}}

    @yield('css')
</head>
<body>
@yield('content')


@yield('script')
</body>
</html>
