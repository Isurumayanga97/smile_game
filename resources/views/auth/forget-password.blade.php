@extends('layouts.app')

@section('content')

    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="row">

            <div class="col-12 col-md-12" style="width: 500px">
                <form class="card glass custom-form p-4" method="POST" action="{{ url('send-reset-email') }}">
                    @csrf
                    <p style="text-align: center;">Welcome Back!</p>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" id="email"
                               placeholder="Type your email" name="email">

                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif

                    </div>

                    <a href="{{('/')}}" id="forgetPassword">Sign In</a>
                    <button type="submit" class="btn btn-yellow" style="font-weight: bold"> Send Password Reset Link</button>
                </form>
            </div>

        </div>


@endsection

@include('layouts.footer')
