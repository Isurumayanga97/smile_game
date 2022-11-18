var numbers = new NumberSwiper('myNumberSwiper');

ProgressCountdown(20, 'pageBeginCountdown', 'pageBeginCountdownText');

function ProgressCountdown(timeleft, bar, text) {
    return new Promise((resolve, reject) => {
        var countdownTimer = setInterval(() => {
            timeleft--;

            // document.getElementById('pageBeginCountdown').style = '--value:' + timeleft * 10;

            if (timeleft <= 0) {
                clearInterval(countdownTimer);

                resolve(true);
            }
        }, 1000);
    });
}


function confirmModal() {
    Swal.fire({
        title: 'Are you sure want bonus claim?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, claim it!'
    }).then((result) => {
        if (result.isConfirmed) {
            var btn1 = document.getElementById("btnThree");
            var btn2 = document.getElementById("btnEight");
            var btn3 = document.getElementById("btnSix");
            btn1.style.display = 'none';
            btn2.style.display = 'none';
            btn3.style.display = 'none';

            Swal.fire(
                'Claimed!',
                'Your bonus has been claimed.',
                'success'
            )
        }
    })

}

function nextGame(e) {

    if (e == 2) {

        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Congratulations! Your answer is correct',
            showConfirmButton: true,
            timer: 4500
        }).then((result) => {
            location.reload();
        })

    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Answer not correct!',
            footer: 'Get help claiming the bonus.'
        })
    }

}

