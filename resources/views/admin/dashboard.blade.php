<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruang Kontrol | Kehidupan Hanif</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 font-sans min-h-screen p-10 relative">

    @if(session('sukses'))
    <div id="toast-success" class="fixed top-10 right-10 z-50 bg-emerald-600 text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-4 transition-all duration-500">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        <span class="font-medium">{{ session('sukses') }}</span>
        <button onclick="document.getElementById('toast-success').style.display='none'" class="text-white/80 hover:text-white text-xl font-bold ml-4">&times;</button>
    </div>
    <script>
        setTimeout(() => {
            const toast = document.getElementById('toast-success');
            if(toast) {
                toast.style.opacity = '0';
                setTimeout(() => toast.style.display = 'none', 500);
            }
        }, 4000);
    </script>
    @endif

    <div class="max-w-5xl mx-auto bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
        <div class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-3xl font-bold">Ruang Kontrol "Kehidupan"</h1>
                <p class="text-gray-500 mt-2">Pusat kendali portofolio Anda.</p>
            </div>
            <div class="flex gap-4">
                <a href="/" target="_blank" class="bg-violet-100 text-violet-700 px-4 py-2 rounded-lg font-semibold hover:bg-violet-200 transition">Lihat Web</a>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-50 text-red-600 px-4 py-2 rounded-lg font-semibold hover:bg-red-100 transition">Keluar</button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <div class="border border-gray-200 p-6 rounded-2xl hover:border-emerald-500 transition group flex flex-col justify-between">
                <div>
                    <h3 class="text-xl font-bold mb-2">1. Profil & CV</h3>
                    <p class="text-gray-500 mb-4 text-sm">Perbarui nomor kontak, foto profil, dan dokumen CV Anda.</p>
                </div>
                
                <div class="mb-4 flex flex-wrap gap-2 border-t border-gray-100 pt-4">
                    @if(isset($user) && $user->profile_photo_path)
                        <span class="inline-flex items-center gap-1 text-xs font-bold bg-purple-100 text-purple-700 px-2 py-1 rounded-md">📷 Foto Terisi</span>
                    @else
                        <span class="inline-flex items-center gap-1 text-xs font-bold bg-gray-100 text-gray-500 px-2 py-1 rounded-md">📷 Foto Kosong</span>
                    @endif

                    @if(isset($user) && $user->cv_path)
                        <span class="inline-flex items-center gap-1 text-xs font-bold bg-emerald-100 text-emerald-700 px-2 py-1 rounded-md">📄 CV Terunggah</span>
                    @else
                        <span class="inline-flex items-center gap-1 text-xs font-bold bg-red-100 text-red-700 px-2 py-1 rounded-md">📄 CV Kosong</span>
                    @endif
                </div>
                <a href="/admin/profil" class="inline-block text-center bg-emerald-600 text-white px-5 py-2 rounded-lg font-medium group-hover:bg-emerald-700 transition">Atur Profil &rarr;</a>
            </div>

            <div class="border border-gray-200 p-6 rounded-2xl hover:border-blue-500 transition group flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-bold">2. Projek & Tugas</h3>
                        <a href="/admin/project/tambah" class="bg-blue-50 text-blue-600 px-3 py-1 text-xs font-bold rounded-md hover:bg-blue-600 hover:text-white transition">+ Tambah</a>
                    </div>
                    <div class="space-y-2 max-h-40 overflow-y-auto pr-1 border-t border-gray-100 pt-3">
                        @forelse($projects as $proj)
                        <div class="flex justify-between items-center bg-gray-50 p-2.5 rounded-xl border border-gray-200 text-xs">
                            <span class="font-semibold text-gray-700 truncate max-w-[180px]">{{ $proj->title }}</span>
                            <div class="flex gap-2 shrink-0">
                                <a href="/admin/project/edit/{{ $proj->id }}" class="text-blue-600 font-bold hover:underline">Edit</a>
                                <a href="/admin/project/hapus/{{ $proj->id }}" onclick="return confirm('Yakin hapus projek ini?')" class="text-red-600 font-bold hover:underline">Hapus</a>
                            </div>
                        </div>
                        @empty
                        <p class="text-xs text-gray-400 italic">Belum ada projek yang diunggah.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="border border-gray-200 p-6 rounded-2xl hover:border-orange-500 transition group flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-bold">3. Catatan Jurnal</h3>
                        <a href="/tulis" class="bg-orange-50 text-orange-600 px-3 py-1 text-xs font-bold rounded-md hover:bg-orange-600 hover:text-white transition">+ Tambah</a>
                    </div>
                    <div class="space-y-2 max-h-40 overflow-y-auto pr-1 border-t border-gray-100 pt-3">
                        @forelse($journals as $jrnl)
                        <div class="flex justify-between items-center bg-gray-50 p-2.5 rounded-xl border border-gray-200 text-xs">
                            <span class="font-semibold text-gray-700 truncate max-w-[180px]">{{ $jrnl->title }}</span>
                            <div class="flex gap-2 shrink-0">
                                <a href="/admin/journal/edit/{{ $jrnl->id }}" class="text-orange-600 font-bold hover:underline">Edit</a>
                                <a href="/admin/journal/hapus/{{ $jrnl->id }}" onclick="return confirm('Yakin hapus catatan ini?')" class="text-red-600 font-bold hover:underline">Hapus</a>
                            </div>
                        </div>
                        @empty
                        <p class="text-xs text-gray-400 italic">Belum ada jurnal yang ditulis.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="border border-gray-200 p-6 rounded-2xl hover:border-pink-500 transition group flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-bold">4. Galeri Umum</h3>
                        <a href="/admin/galeri/tambah" class="bg-pink-50 text-pink-600 px-3 py-1 text-xs font-bold rounded-md hover:bg-pink-600 hover:text-white transition">+ Tambah</a>
                    </div>
                    <p class="text-gray-500 mb-4 text-sm">Kelola dokumentasi visual di luar konteks projek.</p>
                    
                    <div class="space-y-2 max-h-40 overflow-y-auto pr-1 border-t border-gray-100 pt-3">
                        @forelse($galleries as $gal)
                        <div class="flex justify-between items-center bg-gray-50 p-2.5 rounded-xl border border-gray-200 text-xs">
                            <span class="font-semibold text-gray-700 truncate max-w-[180px]">
                                {{ $gal->type == 'video' ? '🎥' : '📷' }} {{ $gal->title ?? 'Tanpa Keterangan' }}
                            </span>
                            <a href="/admin/galeri/hapus/{{ $gal->id }}" onclick="return confirm('Yakin hapus media ini?')" class="text-red-600 font-bold hover:underline shrink-0">Hapus</a>
                        </div>
                        @empty
                        <p class="text-xs text-gray-400 italic">Belum ada media di galeri.</p>
                        @endforelse
                    </div>
                </div>
                <div class="border-t border-gray-100 pt-3 mt-4 text-center text-xs text-gray-400">Total: {{ count($galleries) }} Media</div>
            </div>
            
        </div>
    </div>
</body>
</html>