<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Projek - Ruang Kontrol</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 font-sans min-h-screen flex flex-col py-12">
    <div class="max-w-2xl mx-auto w-full px-4">
        <a href="/admin/dashboard" class="text-blue-600 font-medium hover:underline mb-6 inline-block">&larr; Kembali ke Dashboard</a>
        
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
            <h1 class="text-3xl font-bold mb-2">Edit Projek / Tugas</h1>
            <p class="text-gray-500 mb-8">Ubah rincian informasi data projek Anda.</p>
            
            <form action="/admin/project/update/{{ $project->id }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Projek / Tugas</label>
                    <input type="text" name="title" value="{{ $project->title }}" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-600 outline-none transition">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Teknologi yang Digunakan (Tech Stack)</label>
                    <input type="text" name="tech_stack" value="{{ $project->tech_stack }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-600 outline-none transition" placeholder="Contoh: Laravel, Tailwind CSS, MySQL">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Link Live Demo / GitHub (Opsional)</label>
                    <input type="url" name="link_demo" value="{{ $project->link_demo }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-600 outline-none transition">
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Catatan / Deskripsi Projek</label>
                    <textarea name="content" required rows="6" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-600 outline-none transition">{{ $project->content }}</textarea>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Dokumentasi (Foto / Video)</label>
                    
                    @if($project->media_path)
                        <div class="mb-4 p-3 bg-white rounded-xl border border-gray-200 text-xs text-gray-500 flex items-center justify-between">
                            <span>File saat ini: <strong class="text-blue-600 truncate max-w-[200px] inline-block align-middle">{{ $project->media_path }}</strong></span>
                            <a href="/storage/{{ $project->media_path }}" target="_blank" class="font-bold text-blue-600 hover:underline">Lihat Media</a>
                        </div>
                    @endif

                    <input type="file" name="media" class="w-full px-4 py-3 bg-white rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-600 outline-none transition text-gray-500 text-sm">
                    <p class="text-xs text-gray-400 mt-2">Format yang didukung: JPG, PNG, MP4, MKV. Maksimal 50MB. Kosongkan jika tidak ingin mengubah foto/video lama.</p>
                </div>
                
                <button type="submit" class="w-full bg-blue-600 text-white font-bold py-4 rounded-xl hover:bg-blue-700 transition shadow-lg shadow-blue-600/20">
                    Simpan Perubahan Projek
                </button>
            </form>
        </div>
    </div>
</body>
</html>