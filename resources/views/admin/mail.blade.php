@if ($status==1)
    
<h1>Hi, {{ $name }}</h1>
<h4>, {{ $email }}</h4>

<p>Sending Mail from Ezryder.</p>
<p>now you can add your product on Application</p>

@elseif($status==2)
<h1>Hi, {{ $name }}</h1>
<h4>, {{ $email }}</h4>

<p>Sending Mail from Ezryder.</p>
<p>sorry, your Approvemanet deny so you can't add product on Application</p>

@endif

{{-- <p>Order prie {{$price}}</p> --}}