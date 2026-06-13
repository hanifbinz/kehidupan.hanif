<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Galeri - Ruang Kontrol</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 font-sans min-h-screen flex flex-col py-12">
    <div class="max-w-2xl mx-auto w-full px-4">
        <a href="/admin/dashboard" class="text-pink-600 font-medium hover:underline mb-6 inline-block">&larr; Kembali ke Dashboard</a>
        
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
            <h1 class="text-3xl font-bold mb-2">Unggah ke Galeri</h1>
            <p class="text-gray-500 mb-8">Pilih foto atau video untuk dibagikan di portofolio Anda.</p>
            
            <form action="/admin/galeri/simpan" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Pilih Media (Wajib)</label>
                    <input type="file" name="media" required accept="image/*,video/mp4,video/mkv" class="w-full px-4 py-3 bg-white rounded-xl border border-gray-300 focus:ring-2 focus:ring-pink-600 outline-none transition text-gray-500 text-sm">
                    <p class="text-xs text-gray-400 mt-2">Format: JPG, PNG, MP4. Maksimal 50MB.</p>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Keterangan / Caption (Opsional)</label>
                    <input type="text" name="title" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-pink-600 outline-none transition" placeholder="Tuliskan cerita singkat tentang media ini...">
                </div>
                
                <button type="submit" class="w-full bg-pink-600 text-white font-bold py-4 rounded-xl hover:bg-pink-700 transition shadow-lg shadow-pink-600/20">
                    Unggah Media
                </button>
            </form>
        </div>
    </div>
</body>
</html>