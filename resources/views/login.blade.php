<!DOCTYPE html>
<html lang="id" class="dark scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication | Hanif Portofolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-neutral-950 text-white antialiased min-h-screen flex items-center justify-center relative overflow-hidden">

    <!-- Ornamen Background (Glow) -->
    <div class="fixed top-[-10%] right-[-10%] w-[500px] h-[500px] bg-violet-600/10 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="fixed bottom-[-10%] left-[-10%] w-[400px] h-[400px] bg-indigo-600/10 rounded-full blur-[120px] pointer-events-none"></div>

    <div class="w-full max-w-md p-6 relative z-10">
        <!-- Card Login -->
        <div class="backdrop-blur-xl bg-white/5 border border-white/10 p-10 rounded-[2rem] shadow-2xl">
            
            <div class="text-center mb-8">
                <h1 class="text-2xl font-black tracking-tight mb-2">Pintu Rahasia</h1>
                <p class="text-neutral-400 text-sm">Hanya untuk pemilik akses.</p>
            </div>

            @if(session('error'))
            <div class="bg-red-500/10 border border-red-500/20 text-red-400 px-4 py-3 rounded-2xl mb-6 text-sm text-center animate-pulse">
                {{ session('error') }}
            </div>
            @endif

            <form action="/login-owner" method="POST" class="space-y-5">
                @csrf
                <!-- Input Email -->
                <div class="relative group">
                    <label class="block text-xs font-bold text-neutral-500 uppercase tracking-widest mb-2 pl-1">Email</label>
                    <input type="email" name="email" required 
                        class="w-full bg-neutral-900/50 border border-white/5 focus:border-violet-500 focus:ring-2 focus:ring-violet-500/20 text-white rounded-2xl px-5 py-4 outline-none transition-all duration-300 placeholder:text-neutral-600">
                </div>

                <!-- Input Password -->
                <div class="relative group">
                    <label class="block text-xs font-bold text-neutral-500 uppercase tracking-widest mb-2 pl-1">Password</label>
                    <input type="password" name="password" required 
                        class="w-full bg-neutral-900/50 border border-white/5 focus:border-violet-500 focus:ring-2 focus:ring-violet-500/20 text-white rounded-2xl px-5 py-4 outline-none transition-all duration-300 placeholder:text-neutral-600">
                </div>
                
                <button type="submit" 
                    class="w-full bg-gradient-to-r from-violet-600 to-indigo-600 hover:from-violet-500 hover:to-indigo-500 text-white font-bold py-4 rounded-2xl transition-all duration-300 transform hover:scale-[1.02] shadow-lg shadow-violet-900/20 mt-4">
                    Masuk Sekarang
                </button>
                
                <div class="text-center mt-6">
                    <a href="/" class="text-xs text-neutral-600 hover:text-neutral-300 transition uppercase tracking-widest font-bold">Kembali ke Beranda</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>