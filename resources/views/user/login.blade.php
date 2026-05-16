<!DOCTYPE html>
<html>
<head>
    <title>Login Pembeli - TiketKu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>

    @keyframes float {
        0% {
            transform: translateY(0px) rotate(0deg);
        }

        50% {
            transform: translateY(-25px) rotate(8deg);
        }

        100% {
            transform: translateY(0px) rotate(0deg);
        }
    }

    .float {
        animation: float 5s ease-in-out infinite;
    }

</style>
</head>

<body class="min-h-screen overflow-hidden bg-gradient-to-br from-purple-950 via-indigo-950 to-pink-900 flex items-center justify-center text-white relative">

<div class="absolute left-10 top-10 text-[120px] opacity-20 float">🍿</div>

<div class="absolute right-16 top-12 text-[130px] opacity-20 float">🎞️</div>

<div class="absolute left-20 bottom-16 text-[150px] opacity-20 float">🎬</div>

<div class="absolute right-24 bottom-20 text-[130px] opacity-20 float">📽️</div>

<div class="w-full max-w-md bg-white/10 backdrop-blur-xl border border-white/10 rounded-[35px] p-10 shadow-2xl">

    <div class="text-center mb-8">
        <div class="text-6xl mb-3">🎟️</div>

        <h1 class="text-5xl font-black">
            Tiket<span class="text-pink-400">Ku</span>
        </h1>

        <p class="text-gray-300 mt-2">
            Login Pembeli
        </p>
    </div>

    @if(session('error'))
        <div class="bg-red-500 text-white px-5 py-3 rounded-2xl mb-5">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="bg-green-500 text-white px-5 py-3 rounded-2xl mb-5">
            {{ session('success') }}
        </div>
    @endif

    <form action="/login-pembeli" method="POST" class="space-y-5">
        @csrf

        <input type="text" name="username" placeholder="Username"
               class="w-full bg-white/90 text-gray-900 rounded-2xl px-5 py-4 outline-none">

        <input type="password" name="password" placeholder="Password"
               class="w-full bg-white/90 text-gray-900 rounded-2xl px-5 py-4 outline-none">

        <button class="w-full bg-pink-500 hover:bg-pink-600 text-white py-4 rounded-2xl font-black">
            Login
        </button>
    </form>

    <p class="text-center text-gray-300 mt-6">
        Belum punya akun?
        <a href="/register-pembeli" class="text-pink-400 font-bold">Daftar</a>
    </p>

</div>

</body>
</html>