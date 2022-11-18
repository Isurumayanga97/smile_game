<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Settings</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/f0083c03d1.js" crossorigin="anonymous"></script>

    <link href="{{asset('admin/css/settings-style.css')}}" rel="stylesheet">
</head>
<body>

<div class="container p-3">
    <h6 class="display-4 mb-4 text-center text-white">
        <a href="{{url('ready-to-game')}}" class="float-left back-btn"><i class="fa-solid fa-chevron-left"></i></a>
        Settings
    </h6>
    <hr>
    <div class="row">
        <div class="col col-md-6">
            <form class="card glass custom-form p-4">
                <h5 class="h5 mb-5">Change Password</h5>
                <div class="form-group">
                    <label for="exampleInputPassword1">Current Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-yellow">Change Password</button>
            </form>
        </div>
        <div class="col col-md-6">
            <form class="card glass p-4">
                <h5 class="h5 mb-5">Select Mode</h5>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-success">Easy</button>
                    <button type="button" class="btn btn-secondary">Medium</button>
                    <button type="button" class="btn btn-danger">Hard</button>
                </div>
            </form>
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
