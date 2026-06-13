<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atur Profil & CV - Ruang Kontrol</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 font-sans min-h-screen flex flex-col py-12">
    
    @if(session('sukses'))
    <div id="toast" class="fixed top-10 right-10 z-50 bg-emerald-600 text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-4">
        <span class="font-medium">{{ session('sukses') }}</span>
        <button onclick="document.getElementById('toast').style.display='none'" class="text-white/80 hover:text-white text-xl font-bold ml-4">&times;</button>
    </div>
    @endif

    <div class="max-w-2xl mx-auto w-full px-4">
        <a href="/admin/dashboard" class="text-blue-600 font-medium hover:underline mb-6 inline-block">&larr; Kembali ke Dashboard</a>
        
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
            <h1 class="text-3xl font-bold mb-2">Atur Profil Anda</h1>
            <p class="text-gray-500 mb-8">Perbarui informasi kontak, foto, dan unggah CV Anda di sini.</p>
            
            <form action="/admin/profil/simpan" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor Telepon / WhatsApp</label>
                    <input type="text" name="phone" value="{{ $user->phone ?? '' }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-emerald-500 outline-none transition" placeholder="Contoh: +628123456789">
                </div>

                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Upload Foto Profil</label>
                    
                    @if($user->profile_photo_path)
                        <div class="mb-4 flex items-center justify-between bg-white p-3 rounded-xl border border-gray-200">
                            <div class="flex items-center gap-3">
                                <img src="/storage/{{ $user->profile_photo_path }}" class="w-12 h-12 rounded-full object-cover border border-gray-300">
                                <span class="text-sm font-medium text-gray-700">Foto terunggah</span>
                            </div>
                            <a href="/admin/profil/hapus/foto" onclick="return confirm('Yakin ingin menghapus foto ini?')" class="text-sm font-bold text-red-600 hover:underline">Hapus Foto</a>
                        </div>
                    @endif

                    <input type="file" name="photo" accept="image/*" class="w-full px-4 py-3 bg-white rounded-xl border border-gray-300 focus:ring-2 focus:ring-emerald-500 outline-none transition text-gray-500 text-sm">
                    <p class="text-xs text-gray-400 mt-2">* Format JPG/PNG. Maksimal 2MB. File baru otomatis menimpa yang lama.</p>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Upload Dokumen CV (PDF)</label>
                    
                    @if($user->cv_path)
                        <div class="mb-4 text-sm bg-white p-4 rounded-xl border border-gray-200 flex justify-between items-center">
                            <span class="font-medium text-gray-700">CV.pdf</span>
                            <div class="flex gap-4">
                                <a href="/storage/{{ $user->cv_path }}" target="_blank" class="font-bold text-blue-600 hover:underline">Lihat</a>
                                <a href="/admin/profil/hapus/cv" onclick="return confirm('Yakin ingin menghapus CV ini?')" class="font-bold text-red-600 hover:underline">Hapus</a>
                            </div>
                        </div>
                    @endif

                    <input type="file" name="cv" accept=".pdf" class="w-full px-4 py-3 bg-white rounded-xl border border-gray-300 focus:ring-2 focus:ring-emerald-500 outline-none transition text-gray-500 text-sm">
                    <p class="text-xs text-gray-400 mt-2">* Format PDF. Maksimal 5MB. File baru otomatis menimpa yang lama.</p>
                </div>
                
                <button type="submit" class="w-full bg-emerald-600 text-white font-bold py-4 rounded-xl hover:bg-emerald-700 transition shadow-lg shadow-emerald-600/20">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>

    <script>
        setTimeout(() => {
            const toast = document.getElementById('toast');
            if(toast) {
                toast.style.opacity = '0';
                toast.style.transition = 'opacity 0.5s';
                setTimeout(() => toast.style.display = 'none', 500);
            }
        }, 3000);
    </script>
</body>
</html>