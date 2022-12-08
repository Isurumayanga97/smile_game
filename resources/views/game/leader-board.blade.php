<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Leaderboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f0083c03d1.js" crossorigin="anonymous"></script>
    <link href="{{asset('admin/css/leader-board-style.css')}}" rel="stylesheet">

</head>
<body>


<div class="container-fluid">

    <div class="row">
        <div class="col-12 col-md-7" style="height: 100vh">
            <div class="overflow-auto" style="height: 100%;">
                <h6 class="display-4 mb-4 text-center text-white">
                    <a href="{{url('ready-to-game')}}" class="float-left back-btn"><i
                            class="fa-solid fa-chevron-left"></i></a>
                    Leaderboard
                </h6>
                <hr>

                <!--Table-->
                <div class="text-center" style="border: 1px solid #e58d27">
                    <div class="table-responsive">
                        <table class="rounded-lg table table-dark text-left mb-3">
                            <thead>
                            <tr>
                                <th scope="col">Ranks</th>
                                <th scope="col">Player</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Points</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data as $key=>$value)
                                <tr @if($key==0) class="top" @endif>
                                    <td><span class="badge badge-pill"
                                              style="background: #f5c944;color: red;border: 2px solid green">{{$key+1}}</span>
                                    </td>
                                    <td>
                                        <img width="30px"
                                             height="30px"
                                             src="https://images.pexels.com/photos/2690323/pexels-photo-2690323.jpeg?auto=compress&cs=tinysrgb&w=600"
                                             class="rounded-circle mr-3" alt="">
                                    </td>
                                    <td>{{$value['name']}}</td>
                                    <td>{{$value['email']}}</td>
                                    <td>{{$value['point']}}</td>
                                    <td><span class="badge badge-warning p-2"></span></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12 col-md-5" style="height: 100vh">

            <div class="overflow-auto" style="height: 100%;">
                <h6 class="display-4 mb-4 text-center text-white">
                    My Profile
                </h6>
                <hr>

                <!-- Profile-->
                <div class="card" style="width: 100%;background: #343a40;border: 1px solid #e58d27;">
                    <img
                        src="https://cdn.pixabay.com/photo/2018/04/18/14/26/background-image-3330583__480.jpg"
                        class="card-img-top" alt="..." style="height: 100px">
                    <input type="text" hidden value="{{Auth::id()}}" id="user-details">
                    <div class="card-body">
                        <h5 class="card-title">{{$gameDetails['name']}}</h5>
                        <p class="card-text">{{$gameDetails['info']}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center" style="background: #343a40;color: white;border-bottom: 1px solid #e58d27"><h5>{{$gameDetails['point']}} Points</h5></li>
                        <li class="list-group-item text-center" style="background: #343a40;color: white"><h5>
                                <?php
                                if (is_null($gameDetails['bonus'])){
                                    echo '0 Bonus';
                                }else{
                                    echo $gameDetails['bonus']['no_of_bonus'].' Bonus';
                                }
                                ?>
                            </h5></li>
                        <li class="list-group-item text-center"
                            @if($gameDetails['mode']==='EASY')
                                style="background: #2ca445;border-bottom: 1px solid #e58d27"
                            @elseif($gameDetails['mode']==='MEDIUM')
                                style="background: #6b737b;border-bottom: 1px solid #e58d27"
                            @elseif($gameDetails['mode']==='HARD')
                                style="background: #db3444;border-bottom: 1px solid #e58d27"
                            @endif>
                            <i style="font-weight: bolder;color: white">{{$gameDetails['mode']}}</i>
                        </li>
                        </ul>
                    <div class="card-body">
                        <form class="card glass p-4">
                            <h5 class="h5 mb-5">Select Mode</h5>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-success" onclick="changeMode(1)">Easy</button>
                                <button type="button" class="btn btn-secondary" onclick="changeMode(2)">Medium</button>
                                <button type="button" class="btn btn-danger" onclick="changeMode(3)">Hard</button>
                            </div>
                        </form>

                        <div class="mt-2">
                            <a class="btn btn-primary w-100" style="background-color: #3b5998;" href="https://www.facebook.com/" role="button">
                                <i class="fab fa-facebook-f"></i> Share Profile</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.1.1.min.js">

    <script src="{{ asset('assets/js/number-swiper.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/js/custom/spinner.js') }}"></script>
<script src="{{ asset('assets/js/custom/game.js') }}"></script>
<script src="{{ asset('assets/js/custom/auth.js') }}"></script>
</body>


</html>
