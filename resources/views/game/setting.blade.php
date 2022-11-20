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
    <link href="{{asset('admin/css/leader-board-style.css')}}" rel="stylesheet">
</head>
<body>

<div class="container p-3">

    <!-- Alert modal -->
    @if (Session::has('errMsg'))
        <div style="display: block;" class="modal" tabindex="-1" role="dialog" id="loginErrorModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header alert alert-danger">
                        <h5 class="modal-title">{{ Session::get('errMsg')[0] }}</h5>
                        <button type="button" class="close errorModal-btn" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" onclick="closeErrorModal()">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger">
                            <p>{{ Session::get('errMsg')[1] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (Session::has('msg'))
        <div style="display: block;" class="modal" tabindex="-1" role="dialog" id="loginErrorModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header alert alert-success">
                        <h5 class="modal-title">{{ Session::get('msg')[0] }}</h5>
                        <button type="button" class="close errorModal-btn" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" onclick="closeErrorModal()">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success">
                            <p>{{ Session::get('msg')[1] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- End alert modal-->

    <h6 class="display-4 mb-4 text-center text-white">
        <a href="{{url('ready-to-game')}}" class="float-left back-btn"><i class="fa-solid fa-chevron-left"></i></a>
        Settings
    </h6>
    <hr>


    <div class="row">
        <div class="col col-md-6">


                <!--Change Password-->
                <form class="card glass custom-form p-4" method="POST" action="{{ url('change-password') }}">
                    @csrf
                    <h5 class="h5 mb-5">Change Password</h5>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Current Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="old_password"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">New Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="new_password"
                               required>
                    </div>
                    <button type="submit" class="btn btn-yellow">Change Password</button>
                </form>

        </div>



        <div class="col col-md-6" style="height: 100vh">


                <!--Profile Update-->
                <form class="card glass custom-form p-4">
                    @csrf
                    <h5 class="h5 mb-5">Update Profile</h5>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Name</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="name"
                               required placeholder="Type your name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Info</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="info"
                               required placeholder="Type short description about you">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Profile Picture</label>
                        <input type="file" class="form-control" id="exampleInputPassword1" name="profile_picture"
                               required>
                    </div>
                    <button type="submit" class="btn btn-yellow">Update Profile</button>
                </form>

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
<script src="{{ asset('assets/js/custom/auth.js') }}"></script>
</body>

</html>
