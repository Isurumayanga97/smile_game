@php use Illuminate\Support\Facades\Auth; @endphp
@extends('layouts.app')


<div class="container-fluid">

    <div class="row">

        <div class="col-12 col-md-8 vh-100 ">
            <div>
                <p id="game-title-text">Smile</p>
                <p id="game-title-emoji">(̶◉͛‿◉̶)</p>
            </div>

            <!--Store details-->
            <input type="text" hidden value="{{$gameDetails}}" id="game-details">
            <input type="text" hidden value="{{$gameData->solution}}" id="solution">
            <input type="text" hidden value="{{Auth::id()}}" id="user-details">

            <img src="{{$gameData->question}}"
                 alt="Five Bells logo" id="game-image">
        </div>


        <div class="col-12 col-md-4" style="border-left: 1px solid white">
            <!--Progress circle-->
            <div class="card card-body border-0 progress-div">
                <h2 id="select-number-text">Remaining!</h2>
                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                     style="--value:0" id="pageBeginCountdown">
                </div>
            </div>

            <!--Number select-->
            <h2 id="select-number-text">Select Number</h2>
            <div class="card card-body border-0 shadow mt-1 justify-content-center">
                <div class="btn-grid">
                    @for($x = 0; $x < 10; $x++)
                        <button type="button" class="btn btn-success w-100" id="btn-{{$x}}"
                                onclick="nextGame({{$x}})">{{$x}}
                        </button>
                    @endfor
                </div>
            </div>

            <!--Action button-->
            <div class="d-grid d-flex mt-5">
                <a class="btn btn-primary w-100 mr-1" href="#" role="button" id="bonus-btn" onclick="confirmModal()">Claim
                    Bonus</a>
                <a class="btn btn-yellow w-100" href="{{url('ready-to-game')}}" role="button" id="exit-bt">Exit</a>
            </div>

        </div>

    </div>
</div>


@include('layouts.footer')
