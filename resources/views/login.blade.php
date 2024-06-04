

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    @extends('hd_scripts')
    <style>
        body {
            background-image: url('/assets/img//background.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .loginCard{
            position: absolute;
            top: 55%;
            bottom: 45%;
            width: 50vh;
            left: 25%;
            right: 75%;
            background-color: gray;
        }
        .card-body {
            text-align: center;
        }

        .title-header {
            position: absolute;
            top: 8vh;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            color:#3A3B45;
            font-weight: bold
        }

    </style>
</head>

<body>

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="title-header">
                    <h1  style="font-family: 'Century Gothic', sans-serif;font-size: 5vh; color: white; text-shadow: 5px 5px black;"><b>Trucking Management System Basic</b></h1>
                </div>
                <div class="card o-hidden border-0 shadow-lg my-5 loginCard">
                    <div class="card-body p-0" style = "background-color: gray">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1  style="font-family: 'Century Gothic', sans-serif; color: white;" class="h4  mb-4"><b>WELCOME BACK!</b> </h1>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                name="email"
                                                placeholder="Enter Email Address..." required autofocus
                                                style="font-family: 'Century Gothic', sans-serif;" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="password"
                                                id="exampleInputPassword" placeholder="Password" required
                                                style="font-family: 'Century Gothic', sans-serif;"
                                                >
                                        </div>

                                        <button  type="submit" class="btn btn-primary btn-user btn-block" style="font-family: 'Century Gothic', sans-serif; background-color: #fd7e14;">
                                            Login
                                        </button>
                                    </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    @extends('ft_scripts')

</body>

</html>
