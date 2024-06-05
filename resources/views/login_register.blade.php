<!doctype html>
<html lang="en">
<head>
    <title>Login & Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/Register_Login.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="css/tiny-slider.css" rel="stylesheet">
    <link href="css/Register_log.css" rel="stylesheet">
</head>
<body>
<div class="section" >
    <div class="container">
        <div class="row full-height justify-content-center">
            <div class="col-12 text-center align-self-center py-5">
                <div class="section pb-5 pt-5 pt-sm-2 text-center">
                    <h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
                    <input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
                    <label for="reg-log"></label>
                    <div class="card-3d-wrap mx-auto">
                        <div class="card-3d-wrapper">
                            <div class="card-front">
                                <div class="center-wrap">
                                    <div class="section text-center">
                                        <h4 class="pb-3">Log In</h4>
                                        <form action="{{ route('loginUser') }}" method="Get">
                                            @if(Session::has('success'))
                                            <div class="alert alert-success">{{ Session::get('success')}}</div>
                                            @endif
                                            @if(Session::has('fail'))
                                            <div class="alert alert-danger">{{ Session::get('fail')}}</div>
                                            @endif

                                            @csrf
                                            <div class="form-group">
                                                <input type="email" class="form-style" placeholder="Email" name="email">
                                                <span class="text-danger">@error('email'){{ $message }}@enderror </span>
                                                <i class="input-icon uil uil-at"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="password" class="form-style" placeholder="Password" name="password">
                                                <span class="text-danger">@error('password'){{ $message }}@enderror </span>
                                                <i class="input-icon uil uil-lock-alt"></i>
                                            </div>
                                            <button type="submit" class="btn mt-4">Log in</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-back">
                                <div class="center-wrap">
                                    <div class="section text-center">
                                        <h4 class="mb-3 pb-3">Sign Up</h4>
                                        <form action="{{ route('registerUser') }}" method="POST">
                                            @if(Session::has('success'))
                                            <div class="alert alert -success">{{ Session::get('success') }}</div>
                                            @endif
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" class="form-style" name="fullname" placeholder="Full Name">
                                                <i class="input-icon uil uil-user"></i>
                                                <span class="text-danger">@error('fullname'){{ $message }}@enderror </span>

                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="tel" class="form-style" name="phone" placeholder="Phone Number">
                                                <i class="input-icon uil uil-phone"></i>
                                                <span class="text-danger">@error('phone'){{ $message }}@enderror </span>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="email" class="form-style" name="email" placeholder="Email">
                                                <i class="input-icon uil uil-at"></i>
                                                <span class="text-danger">@error('email'){{ $message }}@enderror </span>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="password" class="form-style" name="password" placeholder="Password">
                                                <i class="input-icon uil uil-lock-alt"></i>
                                                <span class="text-danger">@error('password'){{ $message }}@enderror </span>
                                            </div>
                                            <button type="submit" class="btn mt-4">Register</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div>

</div>
</body>
</html>
