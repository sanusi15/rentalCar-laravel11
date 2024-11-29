<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/konrix/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Jun 2024 08:37:26 GMT -->
<head>
    <meta charset="utf-8">
    <title>Register | Konrix - Responsive Tailwind Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="coderthemes" name="author">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('asdzxc/images/favicon.ico')}}">

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
                   
                    <form action="/signUp" method="POST">
                        @csrf
                        <div class="p-6">
                            <a href="index.html" class="block mb-8">
                                <img class="h-6 block dark:hidden" src="{{asset('asdzxc/images/logo-dark.png')}}" alt="">
                                <img class="h-6 hidden dark:block" src="{{asset('asdzxc/images/logo-light.png')}}" alt="">
                            </a>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2" for="fullname">Fullname</label>
                                <input id="fullname" class="form-input" type="text" placeholder="Enter your name" name="fullname" value="{{old('fullname')}}">
                                @error('fullname')
                                    <div class="px-2 py-1 text-red-500 text-xs">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2" for="username">Username</label>
                                <input id="username" class="form-input" type="text" placeholder="Enter your username" name="username" value="{{old('username')}}">
                                @error('username')
                                    <div class="px-2 py-1 text-red-500 text-xs">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2" for="username">Email</label>
                                <input id="Email" class="form-input" type="email" placeholder="Enter your Email" name="email" value="{{old('email')}}">
                                @error('email')
                                    <div class="px-2 py-1 text-red-500 text-xs">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2" for="password1">Password</label>
                                <input id="password1" class="form-input" type="password" placeholder="Enter your password" name="password1">
                                @error('password1')
                                    <div class="px-2 py-1 text-red-500 text-xs">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2" for="password2">Confirm Password</label>
                                <input id="password2" class="form-input" type="password" placeholder="Enter your confirm password" name="password2">
                                @error('password2')
                                    <div class="px-2 py-1 text-red-500 text-xs">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="flex justify-center mb-6">
                                <button type="submit" class="btn w-full text-white bg-primary"> Register </button>
                            </div>

                            <div class="flex items-center mb-6">
                                <div class="flex-auto mt-px border-t border-dashed border-gray-200"></div>
                                <div>Or</div>
                                <div class="flex-auto mt-px border-t border-dashed border-gray-200"></div>
                            </div>


                            {{-- <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <input type="checkbox" class="form-checkbox rounded" id="checkbox-signin">
                                    <label class="ms-2" for="checkbox-signin">Remember me</label>
                                </div>
                                <a href="auth-recoverpw.html" class="text-sm text-primary border-b border-dashed border-primary">Forget Password ?</a>
                            </div> --}}

                            
                            <p class="text-gray-500 dark:text-gray-400 text-center">Already have an account ?<a href="/login" class="text-primary ms-1"><b>Login</b></a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</body>


<!-- Mirrored from coderthemes.com/konrix/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Jun 2024 08:37:26 GMT -->
</html>

{{-- <div class="flex items-center my-6">
    <div class="flex-auto mt-px border-t border-dashed border-gray-200 dark:border-slate-700"></div>
    <div class="mx-4 text-secondary">Or</div>
    <div class="flex-auto mt-px border-t border-dashed border-gray-200 dark:border-slate-700"></div>
</div> --}}