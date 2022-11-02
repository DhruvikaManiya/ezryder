@extends('layouts.users_app_products')

@section('content')
<div class="main-container no-padding navStyle" id="addBankDetails">
      <article id="top-nav">
        <div class="reviewBackButton">
          <img src="/pages/assets/loginScreen/leftArrow.png" alt="" />
          <p>Add Bank Details</p>
        </div>
        <p>
          <span>3</span>
          <img src="/pages/assets/homeScreen/shoppingBag.png" alt="" />
        </p>
      </article>

      <form>
        <article>
          <label for="email">Account Name</label>
          <input
            type="email"
            name="email"
            id="email"
            placeholder="Enter your account name"
          />
        </article>
        <article>
          <label for="email">Account Number</label>
          <input
            type="email"
            name="email"
            id="email"
            placeholder="Enter your account number"
          />
        </article>
        <article>
          <label for="email">IFSC Code</label>
          <input
            type="email"
            name="email"
            id="email"
            placeholder="Enter your IFSC code"
          />
        </article>
        <button id="register">
          <p>Save Bank Details</p>
          <span>></span>
        </button>
      </form>

      
    </div>

@endsection

