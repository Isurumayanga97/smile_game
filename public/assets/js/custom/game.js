let countdownTimer;
let timeleft = 20;

function ProgressCountdown(bar, text) {
    countdownTimer = setInterval(() => {
        let userId = document.getElementById("user-details").value;
        timeleft--;

        document.getElementById('pageBeginCountdown').style = '--value:' + timeleft * 10;

        if (timeleft <= 0) {
            // clearInterval(countdownTimer);
            // refresh the game
            $.ajax({
                type: "GET",
                url: "http://127.0.0.1:8000/api/refresh-games-board/" + userId,
                data: {},
                success: function (data) {
                    document.getElementById("game-image").src = data['gameData']['question'];
                    document.getElementById("game-details").value = data['gameDetails'];
                    document.getElementById("solution").value = data['gameData']['solution'];

                    //active all buttons
                    for (let i = 0; i < 10; i++) {
                        let btn = document.getElementById('btn-' + i);
                        btn.style.display = 'block';
                    }

                    let solution = document.getElementById("solution").value;
                    console.log(solution);
                }
            });

            timeleft = 20;
        }
    }, 1000);
}

ProgressCountdown('pageBeginCountdown', 'pageBeginCountdownText');

function confirmModal() {
    let userId = document.getElementById("user-details").value;
    let solution = document.getElementById("solution").value;

    Swal.fire({
        title: 'Are you sure want bonus claim?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, claim it!'
    }).then((result) => {
        $.ajax({
            type: "GET",
            url: "http://127.0.0.1:8000/api/claim-bonus/" + userId,
            data: {},
            success: function (data) {
                if (data['msg'] === 'Claimed') {
                    if (result.isConfirmed) {
                        let btnId = [];
                        for (let i = 0; i < 10; i++) {
                            if (i != solution) {
                                btnId.push('btn-' + i)
                            }
                        }

                        for (let j = 0; j < 5; j++) {
                            let btn = document.getElementById(btnId[j]);
                            btn.style.display = 'none';
                        }

                        Swal.fire(
                            'Claimed!',
                            'Your bonus has been claimed.',
                            'success'
                        );
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'You have not bonus!',
                        footer: 'Play game again!'
                    });
                }
            }
        });
    })
}

function nextGame(value) {
    let solution = document.getElementById("solution").value;
    let gameId = document.getElementById("game-details").value;
    let userId = document.getElementById("user-details").value;

    if (value == solution) {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Congratulations! Your answer is correct',
            showConfirmButton: true,
            timer: 1000
        }).then((result) => {
            // refresh the game
            $.ajax({
                type: "GET",
                url: "http://127.0.0.1:8000/api/submit-answer/" + userId,
                data: {},
                success: function (data) {
                    document.getElementById("game-image").src = data['gameData']['question'];
                    document.getElementById("game-details").value = data['gameDetails'];
                    document.getElementById("solution").value = data['gameData']['solution'];

                    //active all buttons
                    for (let i = 0; i < 10; i++) {
                        let btn = document.getElementById('btn-' + i);
                        btn.style.display = 'block';
                    }

                    let solution = document.getElementById("solution").value;
                    console.log(solution);
                }
            });

            timeleft = 20;
        })
    } else {
        $.ajax({
            type: "POST",
            url: "http://127.0.0.1:8000/api/store-attempt",
            data: {
                fk_attempt_userId: userId,
                fk_attempt_gameId: gameId,
            },
            success: function (data) {
                if (data['msg'] === 'Not attempt') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Sorry.!.You have not any chance!',
                        footer: 'Play new game!'
                    });

                    // refresh the game
                    $.ajax({
                        type: "GET",
                        url: "http://127.0.0.1:8000/api/refresh-games-board/" + userId,
                        data: {},
                        success: function (data) {
                            document.getElementById("game-image").src = data['gameData']['question'];
                            document.getElementById("game-details").value = data['gameDetails'];
                            document.getElementById("solution").value = data['gameData']['solution'];

                            //active all buttons
                            for (let i = 0; i < 10; i++) {
                                let btn = document.getElementById('btn-' + i);
                                btn.style.display = 'block';
                            }

                            let solution = document.getElementById("solution").value;
                            console.log(solution);
                        }
                    });
                } else {
                    let count = data['attempt'] + 1;
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Your answer went wrong! You have ' + count + ' more chances.',
                        footer: 'Play new game!'
                    });
                }
            }
        });
    }

}

function changeMode(mode) {
    let userId = document.getElementById("user-details").value;

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, change it!'
    }).then((result) => {
        $.ajax({
            type: "POST",
            url: "http://127.0.0.1:8000/api/change-mode",
            data: {
                userId: userId,
                mode: mode,
            },
            success: function (data) {
                console.log(data);
                if (result.isConfirmed) {
                    Swal.fire(
                        'Changed!',
                        'Your mode has been changed.',
                        'success'
                    );
                }
                location.reload();
            }
        });
    });
}


$(document).ready(function () {
    let solution = document.getElementById("solution").value;
    console.log(solution);
})


