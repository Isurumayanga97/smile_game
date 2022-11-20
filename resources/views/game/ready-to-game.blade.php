<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Smile☺</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/f0083c03d1.js" crossorigin="anonymous"></script>
    <link href="{{asset('admin/css/ready-game-style.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/spinner-style.css')}}" rel="stylesheet">

</head>
<body>
<div class="container p-4 h-100">

    <!--Title-->
    <h5 class="text-white text-center  mb-5" style="font-size: 70px;font-weight: normal">Smile Game (̶◉͛‿◉̶)</h5>

    <!--Action buttons-->
    <div class="d-flex justify-content-center align-items-center w-100">
        <div class="main-menu text-monospace">
            <button class="btn rounded-pill py-3 px-5 mb-3 font-weight-bold">
                <a href="{{url('game-board')}}" onclick="loadSpinner()"><i class="fa-solid fa-play pr-3"></i> Play</a>
            </button>
            <button class="btn rounded-pill py-3 px-5 mb-3 font-weight-bold">
                <a href="{{url('leader-board')}}" onclick="loadSpinner()"><i class="fa-solid fa-ranking-star"></i>
                    Leaderboard</a>
            </button>
            <button class="btn rounded-pill py-3 px-5 mb-3 font-weight-bold">
                <a href="{{url('settings')}}" onclick="loadSpinner()"><i class="fa-solid fa-gear"></i> Settings</a>
            </button>
            <button class="btn rounded-pill py-3 px-5 mb-3 font-weight-bold">
                <a href="{{'sign-out'}}" onclick="loadSpinner()"><i class="fa-solid fa-right-from-bracket"></i>Exit</a>
            </button>
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


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/custom/spinner.js') }}"></script>


</body>
</html>

