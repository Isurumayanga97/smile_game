@include('layouts.header')
@include('layouts.nav-bar')

<div class="container-fluid m-0 p-0">
    <div class="row">

        <div class="col-md-2"></div>

        <div class="col-md-8">

            <!-- Game Image Content -->
            <div class="image-body"
                 style="background: none !important;margin-top: 10px">
                <div class="outer-border">
                    <div class="mid-border">
                        <div class="inner-border">
                            <img class="logo"
                                 src="https://www.sanfoh.com/uob/smile/data/sbaa82d43d3429001d5d5deb66cn302.png"
                                 alt="Five Bells logo">
                        </div>
                    </div>
                </div>
            </div>


            <h2 id="select-number-text">Select Number</h2>


            <div class="card card-body border-0 shadow mt-4 justify-content-center">
                <div class="d-grid gap-1 d-flex">
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


        </div>


        <div class="col-md-2">

            <h4 id="timer-title" style="margin-top: 100px">Time Remaining</h4>
            <div class="justify-content-center d-flex">
                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                     style="--value:0" id="pageBeginCountdown">
                </div>
            </div>

            <button type="button" class="btn btn-warning">Exit</button>
        </div>


    </div>


</div>


@include('layouts.footer')
