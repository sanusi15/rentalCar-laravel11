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
    <link rel="stylesheet" href="soft-ui-dashboard-tailwind.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    {{--start datatables --}}
    {{--end datatables --}}
    {{-- my style --}}
    <link rel="stylesheet" href="/css/style.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
    <div class="w-full flex h-screen bg-slate-50">
        {{-- start sidebar --}}
        <x-sidebar></x-sidebar>
        {{-- end sidebar --}}
        {{-- start content --}}
        <div class="basis-full h-full bg-zinc-100">
            <div class="w-full h-20 px-10 py-4 bg-slate-50 border-b-2"></div>
            <div class="p-4">
                {{$slot}}
            </div>
        </div>
        {{-- end content --}}

    </div>

    {{-- start ionicons --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    {{-- end ionicons --}}
    {{-- start highchart --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    {{-- end highchart --}}
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    {{-- start datatables --}}
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    {{-- end datatables --}}
  
    {{-- custom script disini --}}
    @if (isset($customjs))
        <script src="{{asset('js/'.$customjs)}}"></script>
    @endif
</body>
</html>