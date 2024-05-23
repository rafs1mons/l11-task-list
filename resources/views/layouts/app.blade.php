<!doctype html>
<html lang="en">
<head>
    <title>Laravel 11 Task List App</title>
    @yield('styles')
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
.btn {
    @apply rounded-md py-1 text-center font-medium shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-100 text-slate-700
}

.link {
    @apply font-medium text-gray-700 underline decoration-pink-500
}
    </style>
    {{-- blade-formatter-enable --}}

</head>
<body class="container mx-auto mt-10 max-w-lg">
<h1 class="text-2xl">@yield('title')</h1>
<div>
    @if(session()->has('success'))
        <div>{{session('success')}}</div>
    @endif
    @yield('content')
</div>
</body>
</html>
