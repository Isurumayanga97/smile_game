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


<div class="container p-3">
    <div>
        <h6 class="display-4 mb-4 text-center text-white">
            <a href="{{url('ready-to-game')}}" class="float-left back-btn"><i class="fa-solid fa-chevron-left"></i></a>
            Leaderboard
        </h6>
    </div>
    <hr>

    <div class="text-center">
        <div class="table-responsive">
            <table class="rounded-lg table table-dark text-left mb-3">
                <thead>
                <tr>
                    <th scope="col">Ranks</th>
                    <th scope="col">Player</th>
                    <th scope="col">Name</th>
                    <th scope="col">Points</th>
                </tr>
                </thead>
                <tbody>
                <tr class="top">
                    <td><span class="badge badge-pill" style="background: #f5c944">1</span></td>
                    <td>
                        <img width="30px"
                             height="30px"
                             src="https://images.pexels.com/photos/2690323/pexels-photo-2690323.jpeg?auto=compress&cs=tinysrgb&w=600"
                             class="rounded-circle mr-3" alt="">
                        Mark
                    </td>
                    <td>SriLanka</td>
                    <td><span class="badge badge-warning p-2">50.00</span></td>
                </tr>
                <tr>
                    <td><span class="badge badge-pill" style="background: #c5d1dd">2</span></td>
                    <td>
                        <img width="30px"
                             height="30px"
                             src="https://images.pexels.com/photos/2690323/pexels-photo-2690323.jpeg?auto=compress&cs=tinysrgb&w=600"
                             class="rounded-circle mr-3" alt="">
                        Jacob
                    </td>
                    <td>Thornton</td>
                    <td><span class="badge badge-secondary p-2">50.00</span></td>

                </tr>
                <tr>
                    <td><span class="badge badge-pill" style="background: #dcb083">3</span>
                    </th>
                    <td>
                        <img width="30px"
                             height="30px"
                             src="https://images.pexels.com/photos/2690323/pexels-photo-2690323.jpeg?auto=compress&cs=tinysrgb&w=600"
                             class="rounded-circle mr-3" alt="">
                        Larry
                    </td>
                    <td>the Bird</td>
                    <td><span class="badge p-2" style="background: #dcb083">50.00</span></td>
                </tr>
                <tr>
                    <td><span class="badge badge-pill badge-light">4</span>
                    </th>
                    <td>
                        <img width="30px"
                             height="30px"
                             src="https://images.pexels.com/photos/2690323/pexels-photo-2690323.jpeg?auto=compress&cs=tinysrgb&w=600"
                             class="rounded-circle mr-3" alt="">
                        Larry
                    </td>
                    <td>the Bird</td>
                    <td><span class="badge p-2 badge-light">50.00</span></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
</body>


</html>
