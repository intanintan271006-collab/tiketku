<!DOCTYPE html>
<html>
<head>
    <title>Login - TiketKu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-25px) rotate(8deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }

        @keyframes floatReverse {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(25px) rotate(-8deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }

        .float {
            animation: float 5s ease-in-out infinite;
        }

        .float-reverse {
            animation: floatReverse 6s ease-in-out infinite;
        }
    </style>
</head>

<body class="min-h-screen overflow-hidden bg-gradient-to-br from-purple-950 via-indigo-950 to-pink-900 flex items-center justify-center relative">

    <!-- Background decorative icons -->
    <div class="absolute left-10 top-10 text-[120px] opacity-20 float">🍿</div>
    <div class="absolute right-16 top-12 text-[130px] opacity-20 float-reverse">🎞️</div>
    <div class="absolute left-20 bottom-16 text-[150px] opacity-20 float-reverse">🎬</div>
    <div class="absolute right-24 bottom-20 text-[130px] opacity-20 float">📽️</div>

    <!-- Glow effect -->
    <div class="absolute w-[500px] h-[500px] bg-pink-500/30 rounded-full blur-3xl bottom-[-150px] right-[-100px]"></div>
    <div class="absolute w-[500px] h-[500px] bg-purple-500/30 rounded-full blur-3xl top-[-150px] left-[-100px]"></div>

    <div class="relative z-10 w-full max-w-md">

        <div class="bg-white/15 backdrop-blur-xl border border-white/20 rounded-[35px] shadow-2xl p-10">

            <div class="text-center mb-8">
                <div class="text-7xl mb-3 float">
                    🎟️
                </div>

                <h1 class="text-5xl font-black text-pink-400">
                    Tiket<span class="text-white">Ku</span>
                </h1>

                <p class="text-gray-200 mt-2">
                    Sistem Tiket Bioskop Modern
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

            <form action="/login" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-white mb-2 font-semibold">
                        Username
                    </label>

                    <input
                        type="text"
                        name="username_admin"
                        class="w-full bg-white/90 text-gray-900 placeholder-gray-500 rounded-2xl px-5 py-4 outline-none focus:ring-4 focus:ring-pink-400"
                        placeholder="Masukkan username">
                </div>

                <div>
                    <label class="block text-white mb-2 font-semibold">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password_admin"
                        class="w-full bg-white/90 text-gray-900 placeholder-gray-500 rounded-2xl px-5 py-4 outline-none focus:ring-4 focus:ring-pink-400"
                        placeholder="Masukkan password">
                </div>

                <button
                    class="w-full bg-pink-500 hover:bg-pink-600 text-white py-4 rounded-2xl font-bold text-lg shadow-xl transition hover:scale-105">

                    Login Admin

                </button>
            </form>

        </div>
    </div>

</body>
</html>