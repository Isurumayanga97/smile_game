@extends('layouts.app')

@section('content')

    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="row">

            <div class="col-12 col-md-12" style="width: 400px">
                <form class="card glass custom-form p-4" method="POST" action="{{route('login')}}">
                    @csrf
                    <p style="text-align: center;">Welcome Back!</p>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" id="email"
                               placeholder="Type your email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="password"
                               placeholder="Type your password">
                    </div>
                    <a href="" id="forgetPassword">Forget password</a>
                    <button type="submit" class="btn btn-yellow" style="font-weight: bold">Sign In</button>
                    <p id="signUpText">Don't have an account? <a href="{{('sign-up')}}">Sign Up</a> </p>
                </form>
            </div>


        </div>

        {{--Spinner View--}}
        <div id="spinner-main-div">
            <div id="spinner-div">
                <div class="la-line-scale la-2x ">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>

@endsection

@include('layouts.footer')




