@extends('layouts.app')


<div class="container-fluid">

    <div class="row">

        <div class="col-12 col-md-8 vh-100 ">
            <div>
                <p id="game-title-text">Smile</p>
                <p id="game-title-emoji">(̶◉͛‿◉̶)</p>
            </div>

            <img src="https://www.sanfoh.com/uob/smile/data/sbaa82d43d3429001d5d5deb66cn302.png"
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
                    <button type="button" class="btn btn-success w-100" id="btnZero" onclick="nextGame(0)">0</button>
                    <button type="button" class="btn btn-success w-100" id="btnOne" onclick="nextGame(1)">1</button>
                    <button type="button" class="btn btn-success w-100" id="btnTwo" onclick="nextGame(2)">2</button>
                    <button type="button" class="btn btn-success w-100" id="btnThree" onclick="nextGame(3)">3</button>
                    <button type="button" class="btn btn-success w-100" id="btnFour" onclick="nextGame(4)">4</button>
                    <button type="button" class="btn btn-success w-100" id="btnFive" onclick="nextGame(5)">5</button>
                    <button type="button" class="btn btn-success w-100" id="btnSix" onclick="nextGame(6)">6</button>
                    <button type="button" class="btn btn-success w-100" id="btnSeven" onclick="nextGame(7)">7</button>
                    <button type="button" class="btn btn-success w-100" id="btnEight" onclick="nextGame(8)">8</button>
                    <button type="button" class="btn btn-success w-100" id="btnNine" onclick="nextGame(9)">9</button>
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
