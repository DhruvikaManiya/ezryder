@extends('layouts.users_app_products')

@section('content')
<div class="main-container no-padding" id="Reviews">
      <article id="top-nav">
        <div class="reviewBackButton">
          <img src="/pages/assets/loginScreen/leftArrow.png" alt="" />
          <p>Reviews</p>
        </div>
        <p>
          <span>3</span>
          <img src="/pages/assets/homeScreen/shoppingBag.png" alt="" />
        </p>
      </article>

      <div class="review">
        <img src="/pages/assets/Reviews/img1.png" alt="" />

        <div class="review-comment">
          <p>
            Best store and great services, they store staffs is very helpful.
          </p>
          <h4>Brijesh Mishra</h4>
        </div>
      </div>

      <div class="review">
        <img src="/pages/assets/Reviews/img2.png" alt="" />

        <div class="review-comment">
          <p>I got my products on time and with great packing. Thanks.</p>
          <h4>Ramesh Prajapati</h4>
        </div>
      </div>

      
    </div>




@endsection
