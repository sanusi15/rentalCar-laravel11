<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/konrix/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Jun 2024 08:37:26 GMT -->
<head>
    <meta charset="utf-8">
    <title>Login | Konrix - Responsive Tailwind Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="coderthemes" name="author">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('asdzxc/images/favicon.ico')}}">

    
    <!-- Sweetalert -->
    <link href="{{asset('asdzxc/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" >

    <!-- App css -->
    <link href="{{asset('asdzxc/css/app.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Icons css -->
    <link href="{{asset('asdzxc/css/icons.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Theme Config Js -->
    <script src="{{asset('asdzxc/js/config.js')}}"></script>
</head>

<body>

    <div class="bg-gradient-to-r from-rose-100 to-teal-100 dark:from-gray-700 dark:via-gray-900 dark:to-black">

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="h-screen w-screen flex justify-center items-center">

            <div class="2xl:w-1/4 lg:w-1/3 md:w-1/2 w-full">
                <div class="card overflow-hidden sm:rounded-md rounded-none">
                     @if (session('success'))
                        <div class="bg-success/25 border border-green-200 rounded-md p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <i class="mgc_check_circle_line text-xl text-success"></i>
                                </div>
                                <div class="ms-4">
                                    <h3 class="text-sm text-success font-semibold">Registration successful.</h3>
                                    <div class="mt-1 text-xs">
                                        Please login now
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="bg-danger/25 border border-red-200 rounded-md p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <i class="mgc_information_line text-xl text-danger"></i>
                                </div>
                                <div class="ms-4">
                                    <h3 class="text-sm text-danger font-semibold">Login failed.</h3>
                                    <div class="mt-1 text-xs">
                                        Please check your username and password.
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <form action="/signIn" method="POST">
                        @csrf
                        <div class="p-6">
                            <a href="index.html" class="block mb-8">
                                <img class="h-6 block dark:hidden" src="{{asset('asdzxc/images/logo-dark.png')}}" alt="">
                                <img class="h-6 hidden dark:block" src="{{asset('asdzxc/images/logo-light.png')}}" alt="">
                            </a>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2" for="LoggingEmailAddress">Username</label>
                                <input id="LoggingEmailAddress" class="form-input" type="text" placeholder="Enter your username" name="username" autofocus>
                                @error('username')
                                    <div class="px-2 py-1 text-red-500 text-xs">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2" for="loggingPassword">Password</label>
                                <input id="loggingPassword" class="form-input" type="password" placeholder="Enter your password" name="password">
                                @error('password')
                                    <div class="px-2 py-1 text-red-500 text-xs">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <input type="checkbox" class="form-checkbox rounded" id="checkbox-signin">
                                    <label class="ms-2" for="checkbox-signin">Remember me</label>
                                </div>
                                <a href="auth-recoverpw.html" class="text-sm text-primary border-b border-collapse border-primary">Forget Password ?</a>
                            </div>

                            <div class="flex justify-center mb-6">
                                <button type="submit" class="btn w-full text-white bg-primary"> Log In </button>
                            </div>
                            <p class="text-gray-500 dark:text-gray-400 text-center">Don't have an account ?<a href="/register" class="text-primary ms-1"><b>Register</b></a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

    <script src="{{asset('asdzxc/js/app.js')}}"></script>
    <!-- Sweet Alerts js -->
    <script src="{{asset('asdzxc/libs/sweetalert2/sweetalert2.min.js')}}"></script>

    <!-- Sweet alert init js-->
    <script src="{{asset('asdzxc/js/pages/extended-sweetalert.js')}}"></script>

</body>


<!-- Mirrored from coderthemes.com/konrix/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Jun 2024 08:37:26 GMT -->
</html>