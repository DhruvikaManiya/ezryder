@extends('layouts.users_app_products')

@section('content')
    <div class="main-container no-padding navStyle vendorHomePageFinal" id="addBankDetails">
        <article id="top-nav">
            <div class="reviewBackButton">
                <img src="/pages/assets/loginScreen/leftArrow.png" alt="" />
                <p>Home</p>
            </div>
            <p>
                <span>3</span>
                <img src="/pages/assets/homeScreen/shoppingBag.png" alt="" />
            </p>
        </article>

        @if (Auth::user()->store == '')
            <a class="btn-secondary" href="{{ route('vendor.add_store') }}">
                Please add your store details
                <span><img src="{{ asset('asset/images/btn_secondary_arrow.svg') }}" alt=""></span>
            </a>
        @endif

        @if($order_id)
      <article class="notif-type1 padding-lr">
        <a class="btn-type1 btn-color-lightGreen" href="/vendor/order-detail/{{ $order_id }}">
          <p>You have a new order #{{ $order_id }}</p>
          <img src="{{ asset('asset/images/rightArrow.png') }}" alt="" />
        </a>
        
      </article>
      @endif

      


        <h1 class="header1 header-color-1">Orders</h1>

        <article class="orders">
            <a href="/vendor/orders">
                <div class="order">
                    <div>
                        <p>Pending</p>
                        <p>Approval</p>
                    </div>
                    <div>
                        <p>5</p>
                        <img src="{{ asset('asset/images/common/arrow.png') }}" alt="" />
                    </div>
                </div>
            </a>
            <a href="/vendor/orders">
                <div class="order">
                    <div>
                        <p>Rejected</p>
                        <p>Orders</p>
                    </div>
                    <div>
                        <p>1</p>
                        <img src="{{ asset('asset/images/common/arrow.png') }}" alt="" />
                    </div>
                </div>
            </a>
            <a href="/vendor/orders">
                <div class="order">
                    <div>
                        <p>In Progress</p>
                        <p>Orders</p>
                    </div>
                    <div>
                        <p>5</p>
                        <img src="{{ asset('asset/images/common/arrow.png') }}" alt="" />
                    </div>
                </div>
            </a>
            <a href="/vendor/orders">
                <div class="order">
                    <div>
                        <p>Ready for</p>
                        <p>pickup</p>
                    </div>
                    <div>
                        <p>1</p>
                        <img src="{{ asset('asset/images/common/arrow.png') }}" alt="" />
                    </div>
                </div>
                <a href="/vendor/orders">
                    <div class="order">
                        <div>
                            <p>Pickup</p>
                            <p>Done</p>
                        </div>
                        <div>
                            <p>5</p>
                            <img src="{{ asset('asset/images/common/arrow.png') }}" alt="" />
                        </div>
                    </div>
                </a>
                <a href="/vendor/orders">
                    <div class="order">
                        <div>
                            <p>Cancelled</p>
                            <p>Orders</p>
                        </div>
                        <div>
                            <p>1</p>
                            <img src="{{ asset('asset/images/common/arrow.png') }}" alt="" />
                        </div>
                    </div>
                </a>


                <a href="/vendor/orders">
                    <div class="order">
                        <div>
                            <p>Delivered</p>
                            <p>Orders</p>
                        </div>
                        <div>
                            <p>5</p>
                            <img src="{{ asset('asset/images/common/arrow.png') }}" alt="" />
                        </div>
                    </div>
                </a>
                <a href="/vendor/orders">
                    <div class="order">
                        <div>
                            <p>All</p>
                            <p>Orders</p>
                        </div>
                        <div>
                            <p>1</p>
                            <img src="{{ asset('asset/images/common/arrow.png') }}" alt="" />
                        </div>
                    </div>
                </a>
        </article>

        <h1 class="header1 header-color-1">Products</h1>
        <article class="orders">
            <a href="/vendor/products">
                <div class="order">
                    <div>
                        <p>Active</p>
                    </div>
                    <div>
                        <p>5</p>
                        <img src="{{ asset('asset/images/common/arrow.png') }}" alt="" />
                    </div>
                </div>
            </a>
            <a href="/vendor/products">
                <div class="order">
                    <div>
                        <p>Inactive</p>

                    </div>
                    <div>
                        <p>1</p>
                        <img src="{{ asset('asset/images/common/arrow.png') }}" alt="" />
                    </div>
                </div>
            </a>
            <a href="/vendor/products">
                <div class="order">
                    <div>
                        <p>In review</p>
                    </div>
                    <div>
                        <p>1</p>
                        <img src="{{ asset('asset/images/common/arrow.png') }}" alt="" />
                    </div>
                </div>
            </a>
            <a href="/vendor/products">
                <div class="order">
                    <div>
                        <p>All</p>

                    </div>
                    <div>
                        <p>1</p>
                        <img src="{{ asset('asset/images/common/arrow.png') }}" alt="" />
                    </div>
                </div>
            </a>
        </article>
        <h1 class="header1 header-color-1">Essentials</h1>
        <article class="orders pb">
            <a href="/vendor/wallet">
                <div class="order">
                    <div>
                        <p>Earnings</p>

                    </div>
                    <div>
                        <p>5</p>
                        <img src="{{ asset('asset/images/common/arrow.png') }}" alt="" />
                    </div>
                </div>
            </a>
            <a href="/vendor/review">
                <div class="order">
                    <div>
                        <p>Reviews</p>

                    </div>
                    <div>
                        <p>1</p>
                        <img src="{{ asset('asset/images/common/arrow.png') }}" alt="" />
                    </div>
                </div>
            </a>
        </article>


        @include('layouts.partials.vendor_footer_nav')
    </div>
@endsection
