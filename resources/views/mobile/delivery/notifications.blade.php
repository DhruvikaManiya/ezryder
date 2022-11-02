@extends('layouts.delivery_boy')


@section('content')
    <div class="main-container" id="ratings">
      <article class="topNav">
        <h2><img src="{{ asset('asset/images/leftArrow.png') }}" /> Notifications</h2>
        <a href="{{ route('delivery.notifications') }}">
          <img src="{{ asset('asset/images/notification.png') }}" alt="" />
        </a>
      </article>
      
      <article class="content-container padding-lr">
        
        @foreach ($notifications as $notification)

        <div class="review box-type2">
                  

          <div class="comment">
            <!-- <h4 class="header4">Ramesh Prajapati</h4> -->
            <p class="header5">{{ $notification->body }}</p>
          </div>


        </div>

        @endforeach
        

        
      </article>
      @include('layouts.partials.delivery_boy_footer_nav')
    </div>
@endsection
