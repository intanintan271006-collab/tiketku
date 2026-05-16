<!DOCTYPE html>
<html>
<head>
    <title>Register Pembeli - TiketKu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-[#0b0618] via-[#1b0b3d] to-[#7a123f] flex items-center justify-center text-white">

<div class="w-full max-w-lg bg-white/10 backdrop-blur-xl border border-white/10 rounded-[35px] p-10 shadow-2xl">

    <h1 class="text-5xl font-black text-center mb-2">
        Daftar <span class="text-pink-400">Pembeli</span>
    </h1>

    <p class="text-gray-300 text-center mb-8">
        Buat akun untuk memesan tiket bioskop.
    </p>

    <form action="/register-pembeli" method="POST" class="space-y-5">
        @csrf

        <input type="text" name="nama" placeholder="Nama lengkap"
               class="w-full bg-white/90 text-gray-900 rounded-2xl px-5 py-4 outline-none">

        <input type="text" name="username" placeholder="Username"
               class="w-full bg-white/90 text-gray-900 rounded-2xl px-5 py-4 outline-none">

        <input type="password" name="password" placeholder="Password"
               class="w-full bg-white/90 text-gray-900 rounded-2xl px-5 py-4 outline-none">

        <input type="email" name="email" placeholder="Email"
               class="w-full bg-white/90 text-gray-900 rounded-2xl px-5 py-4 outline-none">

        <input type="text" name="no_telp" placeholder="No Telepon"
               class="w-full bg-white/90 text-gray-900 rounded-2xl px-5 py-4 outline-none">

        <button class="w-full bg-pink-500 hover:bg-pink-600 text-white py-4 rounded-2xl font-black">
            Daftar
        </button>
    </form>

    <p class="text-center text-gray-300 mt-6">
        Sudah punya akun?
        <a href="/login-pembeli" class="text-pink-400 font-bold">Login</a>
    </p>

</div>

</body>
</html>