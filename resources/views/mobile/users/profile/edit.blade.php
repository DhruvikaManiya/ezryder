@extends('layouts.ecommerce')

@section('css')
    <style>
        #loginFinalValidation textarea {
            padding: 16px;
            border: 1px solid #b2d1d1;
            box-shadow: inset 0px -4px 12px rgb(178 209 209 / 25%);
            border-radius: 4px;
            font-size: 14px;
            line-height: 18px;
            color: #5D8080;
            font-style: normal;
        }

        .text-danger {
            color: #BD2F2F;
        }
    </style>
@endsection

@section('content')
    <div class="main-container no-padding navStyle auth" id="loginFinalValidation">
        <article id="top-nav">
            <div class="reviewBackButton">
                <img src="/pages/assets/loginScreen/leftArrow.png" alt="">
                <p>Edit Profile</p>
            </div>
        </article>
        <form method="post" action="{{ route('ecommerce.profile.update') }}" enctype="multipart/form-data">
            @csrf
            <article>
                <label for="email">Name *</label>
                <input type="text" placeholder="Enter Name" name="name"
                    value="{{ $user != null ? $user->name : '' }}" />
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </article>

            <article>
                <label for="email">Mobile *</label>
                <input type="number" placeholder="Enter Mobile" name="phone"
                    value="{{ $user != null ? $user->phone : '' }}" />
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </article>

            <article>
                <label for="email">Email *</label>
                <input type="email" placeholder="Enter Email" name="email"
                    value="{{ $user != null ? $user->email : '' }}" />
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </article>

            <article>
                <label for="email">Address *</label>
                <textarea name="address" id="" rows="3">{{ $user != null ? $user->address : '' }}</textarea>
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </article>

            <article>
                <label for="email">Area *</label>
                <input type="text" name="area" placeholder="Enter your Area"
                    value="{{ $user != null ? $user->area : '' }}" />
                @error('area')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </article>

            <article>
                <label for="email">city *</label>
                <input type="text" name="city" placeholder="Enter your city"
                    value="{{ $user != null ? $user->city : '' }}" />
                @error('city')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </article>

            <article>
                <label for="email">Country *</label>
                <input type="text" name="country" placeholder="Enter your country"
                    value="{{ $user != null ? $user->country : '' }}" />
                @error('country')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </article>

            <article>
                <label for="email">State *</label>
                <input type="text" name="state" placeholder="Enter your state"
                    value="{{ $user != null ? $user->state : '' }}" />
                @error('state')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </article>

            <article>
                <label for="email">Pincode *</label>
                <input type="number" name="pincode" placeholder="Enter your pincode"
                    value="{{ $user != null ? $user->pincode : '' }}" />
                @error('pincode')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </article>

            <article>
                <label for="email">Profile *</label>
                <input type="file" name="profile" placeholder="Enter your profile" />
                @error('profile')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </article>

            <button id="login">
                <p>Save</p>
            </button>
        </form>



    </div>
@endsection
