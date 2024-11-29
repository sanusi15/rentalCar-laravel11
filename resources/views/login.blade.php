<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- sewat alert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('sweetalert::sweetalert')
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>
<body>
    {{-- @if ($errors->any())
    <div class="abolute left-1/2 -translate-x-1/2  w-max mx-auto bg-red-200 p-4 rounded-md animate-fade" role="alert">
        <div class="flex items-center gap-2 ">
            <ion-icon name="warning-outline" class="text-red-700 text-lg"></ion-icon> <div class="text-red-700 text-sm font-light">Username or password is incorrect</div>
        </div>
    </div>
    @endif --}}
    <div class="w-full h-screen flex flex-col justify-center items-center bg-slate-50">
        <div class="">
            <img src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="logo" class="mx-auto h-10 w-auto">
            <h2 class="text-2xl font-bold tracking-tight">Sign in to your account</h2>
        </div>
        <div class="w-full h-max p-6 md:w-1/2 lg:w-1/3 xl:w-16/12">
            <form action="/signIn" method="POST">
                @csrf
                <div class="bg-white rounded-md p-6 shadow-md lg:py-10 lg:px-12" >
                    <div class="mb-8">
                        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                        <input type="text" id="username" name="username" class="block w-full py-1.5 px-2 border-0 shadow-sm ring-1 ring-gray-300 text-gray-900 text-sm rounded-md mt-2 focus:ring-2 focus:ring-inset focus:ring-indigo-600
                        @error('username') ring-2 ring-red-400 @enderror
                        ">
                        @error('username')
                            <div class="mt-2 text-xs text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-8">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <input type="password" for="password" name="password" class="block w-full py-1.5 px-2 ring-1 border-0 shadow-sm ring-gray-300 rounded-md text-gray-900 text-sm focus:ring-2 focus:ring-inset focus:ring-indigo-600 @error('password') ring-2 ring-red-400 @enderror">
                         @error('password')
                            <div class="mt-2 text-xs text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-8 flex justify-between">
                        <div>
                            <input type="checkbox" id="remember" class="w-4 h-4 ring-0 ring-gray-300 border-slate-100 outline-none border-none active:ring-1 rounded-md active:ring-indigo-600"><label for="remember" class="ml-2 text-xs font-medium text-gray-700">Remember me</label>
                        </div>
                        <div>
                            <a href="#" class="text-indigo-600 text-xs font-semibold focus:outline-none">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="mb-8">
                        <button type="submit" class="w-full outline-none border-none rounded-md py-2 bg-indigo-600 text-white text-sm font-semibold focus:ring-2 focus:ring-indigo-500">Sign In</button>
                    </div>
                    <div class="mb-8 flex">
                        <div class="basis-1/4 my-auto"><div class="ring-1 ring-slate-200"></div></div>
                        <div class="basis-1/2 text-xs text-center font-semibold text-gray-900">Or continue with</div>
                        <div class="basis-1/4 my-auto"><div class="ring-1 ring-slate-200"></div></div>
                    </div>
                    <div class="flex gap-2">
                        <a href="#" class="w-1/2 ring-1 ring-slate-300 rounded-md p-1">
                            <div class="flex gap-2 justify-center items-center">
                                <img src="/images/search.png" alt="logo" class="h-4 w-auto">
                                <p class="text-sm font-semibold text-slate-900 leading-6 tracking-wider">Google</p>
                            </div>
                        </a>
                        <a href="#" class="w-1/2 ring-1 ring-slate-300 rounded-md p-1">
                            <div class="flex gap-2 justify-center items-center">
                                <img src="/images/github.png" alt="logo" class="h-4 w-auto">
                                <p class="text-sm font-semibold text-slate-900 leading-6 tracking-wider">GitHub</p>
                            </div>
                        </a>
                    </div>

                </div>
            </form>
        </div>


    </div>

    {{-- ionicons --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>