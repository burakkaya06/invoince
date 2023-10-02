<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Invoince</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('vertical/assets/images/favicon.ico')}}">

    <!-- App css -->

    <!-- App css -->
    <link rel="stylesheet" href="{{asset('vertical/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vertical/assets/css/icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('vertical/assets/css/theme.min.css')}}">


</head>

<body>

<div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center min-vh-100">
                    <div class="w-100 d-block bg-white shadow-lg rounded my-5">
                        <div class="row">
                            <div class="col-lg-5 d-none d-lg-block bg-login rounded-left"></div>
                            <div class="col-lg-7">
                                <div class="p-5">
                                    <h1 class="h5 mb-1">Welcome Back!</h1>
                                    <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p>
                                    @if ($errors->has('email'))
                                        <div class="alert alert-danger" id="error-alert">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail" placeholder="Email Address" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password" required>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-block waves-effect waves-light">Log In</button>
                                    </form>

                                    <div class="row mt-4">
                                        <div class="col-12 text-center">
                                            <p class="text-muted mb-2"><a href="pages-recoverpw.html" class="text-muted font-weight-medium ml-1">Forgot your password?</a></p>
                                            <p class="text-muted mb-0">Don't have an account? <a href="pages-register.html" class="text-muted font-weight-medium ml-1"><b>Sign Up</b></a></p>
                                        </div> <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </div> <!-- end .padding-5 -->
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div> <!-- end .w-100 -->
                </div> <!-- end .d-flex -->
            </div> <!-- end col-->
        </div> <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<!-- jQuery  -->

<script src="{{asset('vertical/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('vertical/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vertical/assets/js/metismenu.min.js')}}"></script>
<script src="{{asset('vertical/assets/js/waves.js')}}"></script>
<script src="{{asset('vertical/assets/js/simplebar.min.js')}}"></script>
<!-- App js -->
<script src="{{asset('vertical/assets/js/theme.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#error-alert').delay(1000).fadeOut('slow');
    });
</script>

</body>

</html>
