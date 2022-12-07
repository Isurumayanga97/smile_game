@extends('layouts.app')

@section('content')

    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="row">

            <div class="col-12 col-md-12" style="width: 400px">
                <form class="card glass custom-form p-4" method="POST" action="{{ url('user-store') }}">
                    @csrf
                    <p style="text-align: center;">Register!</p>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="name"
                               placeholder="Type your name" name="name" >
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" id="email"
                               placeholder="Type your email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="password"
                               placeholder="Type your password" name="password" required onchange="checkPasswordConfirmation()">
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" id="password"
                               placeholder="Type again your password" name="c_password" required onchange="checkPasswordConfirmation()">
                    </div>
                    <input type="text" hidden name="info" value="">
                    <p id="confirm-text" style="text-align: center;color: red"></p>
                    <button type="submit" class="btn btn-yellow" style="font-weight: bold">Sign Up</button>
                    <p id="signUpText">Do you have an account? <a href="{{('/')}}">Sign In</a></p>
                </form>
            </div>


        </div>

    </div>

@endsection

@include('layouts.footer')




