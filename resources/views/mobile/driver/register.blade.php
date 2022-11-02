@extends('layouts.driver')
<div class="main-container" id="registerFinal">
    <article class="topNav">
        <h2><img src="{{ asset('asset/driver/images/leftArrow.png') }}" /> Register</h2>
    </article>
    <h1 class="h1-type1 padding-lr">Drive & Earn</h1>
    <h1 class="h1-type1 padding-lr">Money</h1>
    <form class="padding-lr form-type1">
        <article class="input-label-container1">
            <label for="name" class="label-type1">Your Name</label>
            <input
                    type="text"
                    name="name"
                    id="name"
                    class="input-type1"
                    placeholder="Enter your name"
            />
        </article>
        <article class="input-label-container1">
            <label for="email" class="label-type1">Your Email</label>
            <input
                    type="email"
                    class="input-type1"
                    name="email"
                    id="email"
                    placeholder="Enter your email"
            />
        </article>
        <article class="input-label-container1">
            <label for="password" class="label-type1">Password</label>
            <input
                    type="password"
                    name="password"
                    class="input-type1"
                    id="password"
                    placeholder="Enter your password"
            />
        </article>
        <article class="input-label-container1">
            <label for="repeatPassword" class="label-type1">Repeat Password</label>
            <input
                    type="password"
                    name="password"
                    class="input-type1"
                    id="repeatPassword"
                    placeholder="Enter your password"
            />
        </article>
        <button class="btn-type1">
            <p>Register</p>


            <img src="/assets/rightArrow.png" alt="" />
        </button>
    </form>
    <article class="padding-lr">
        <p class="forgotPassword">Already have an account?</p>
        <button class="btn-type1 loginBtn btn-color-lightGreen padding-lr">
            <p>Login</p>
            <img src="/assets/rightArrow.png" alt="" />
        </button>
    </article>
</div>
