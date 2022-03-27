<!doctype html>
<html lang="en">

<!-- Mirrored from themesbrand.com/minible/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Jul 2021 13:45:16 GMT -->
<head>

        <meta charset="utf-8" />
        <title>Login | Minible - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('backend/auth-assets/images/favicon.ico')}}">

        <!-- Bootstrap Css -->
        <link href="{{asset('backend/auth-assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('backend/auth-assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('backend/auth-assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg">
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                           
                            <div class="card-body p-4"> 
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    @php
                                    $message = Session::get('message');
                                    if(isset($message)){
                                        echo '<h5 style="color:red !important;" class="text-primary">'.$message.'</h5>';
                                        Session::put('message',null);
                                    }
                                    @endphp
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="{{url('/admin-dashboard')}}" method="post">
                                        @csrf
        
                                        <div class="mb-3">
                                            <label class="form-label" for="username">User Email</label>
                                            <input type="text" class="form-control" name="email" id="username" placeholder="Enter username">
                                        </div>
                
                                        <div class="mb-3">
                                            <label class="form-label" for="userpassword">Password</label>
                                            <input name="password" type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                        </div>
                
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="auth-remember-check">
                                            <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                        </div>
                                        
                                        <div class="mt-3 text-end">
                                            <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Log In</button>
                                        </div>
                                    </form>
                                </div>
            
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>

        <!-- JAVASCRIPT -->
        <script src="{{asset('backend/auth-assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('backend/auth-assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('backend/auth-assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('backend/auth-assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('backend/auth-assets/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{asset('backend/auth-assets/libs/waypoints/lib/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('backend/auth-assets/libs/jquery.counterup/jquery.counterup.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('backend/auth-assets/js/app.js')}}"></script>
    </body>

<!-- Mirrored from themesbrand.com/minible/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Jul 2021 13:45:16 GMT -->
</html>
