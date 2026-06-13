<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tulis Jurnal - Kehidupan Hanif</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 font-sans min-h-screen flex flex-col py-12">
    <div class="max-w-2xl mx-auto w-full px-4">
        <a href="/" class="text-blue-600 font-medium hover:underline mb-6 inline-block">&larr; Kembali ke Beranda</a>
        
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
            <h1 class="text-3xl font-bold mb-8">Tulis Catatan Baru</h1>
            
            <form action="/simpan" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Judul</label>
                    <input type="text" name="title" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-600 outline-none transition" placeholder="Apa yang Anda pikirkan hari ini?">
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Isi Jurnal</label>
                    <textarea name="content" required rows="8" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-600 outline-none transition" placeholder="Tulis cerita Anda di sini..."></textarea>
                </div>
                
                <button type="submit" class="w-full bg-blue-600 text-white font-bold py-4 rounded-xl hover:bg-blue-700 transition">Publikasikan Jurnal</button>
            </form>
        </div>
    </div>
</body>
</html>