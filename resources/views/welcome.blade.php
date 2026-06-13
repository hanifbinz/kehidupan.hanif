<!DOCTYPE html>
<html lang="id" class="dark scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio | Muhammad Hanif</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-slate-50 dark:bg-neutral-950 text-slate-800 dark:text-neutral-200 font-sans antialiased overflow-hidden transition-colors duration-500 selection:bg-violet-600 selection:text-white">

    @if(session('sukses'))
    <div class="fixed top-20 left-1/2 transform -translate-x-1/2 bg-violet-600 text-white px-6 py-3 rounded-full shadow-lg z-50 animate-bounce">
        <i class="fas fa-check-circle mr-2"></i> {{ session('sukses') }}
    </div>
    @endif

    <button onclick="toggleTheme()" class="fixed top-6 right-6 z-50 w-12 h-12 rounded-full bg-white dark:bg-neutral-900 border border-slate-200 dark:border-white/10 shadow-lg flex items-center justify-center hover:scale-110 transition-transform duration-300">
        <i id="theme-icon" class="fas fa-sun text-yellow-500 text-xl"></i>
    </button>

    <nav class="fixed right-0 top-1/2 transform -translate-y-1/2 flex flex-col gap-3 z-40 hidden md:flex">
        <a href="#tentang" class="w-12 h-16 rounded-l-full bg-white/80 dark:bg-neutral-800/80 backdrop-blur-sm border-y border-l border-slate-200 dark:border-white/10 shadow-lg hover:w-14 hover:bg-violet-600 text-slate-500 hover:text-white transition-all duration-300 flex items-center justify-center pl-1 group relative">
            <i class="fas fa-user"></i>
            <span class="absolute right-16 top-1/2 -translate-y-1/2 bg-slate-800 dark:bg-neutral-900 text-white text-xs px-3 py-1.5 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap shadow-md pointer-events-none">Tentang Saya</span>
        </a>

        <a href="#projek" class="w-12 h-16 rounded-l-full bg-white/80 dark:bg-neutral-800/80 backdrop-blur-sm border-y border-l border-slate-200 dark:border-white/10 shadow-lg hover:w-14 hover:bg-violet-600 text-slate-500 hover:text-white transition-all duration-300 flex items-center justify-center pl-1 group relative">
            <i class="fas fa-briefcase"></i>
            <span class="absolute right-16 top-1/2 -translate-y-1/2 bg-slate-800 dark:bg-neutral-900 text-white text-xs px-3 py-1.5 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap shadow-md pointer-events-none">Projek & Tugas</span>
        </a>

        <a href="#jurnal" class="w-12 h-16 rounded-l-full bg-white/80 dark:bg-neutral-800/80 backdrop-blur-sm border-y border-l border-slate-200 dark:border-white/10 shadow-lg hover:w-14 hover:bg-violet-600 text-slate-500 hover:text-white transition-all duration-300 flex items-center justify-center pl-1 group relative">
            <i class="fas fa-book"></i>
            <span class="absolute right-16 top-1/2 -translate-y-1/2 bg-slate-800 dark:bg-neutral-900 text-white text-xs px-3 py-1.5 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap shadow-md pointer-events-none">Catatan Jurnal</span>
        </a>

        <a href="#galeri" class="w-12 h-16 rounded-l-full bg-white/80 dark:bg-neutral-800/80 backdrop-blur-sm border-y border-l border-slate-200 dark:border-white/10 shadow-lg hover:w-14 hover:bg-pink-600 text-slate-500 hover:text-white transition-all duration-300 flex items-center justify-center pl-1 group relative">
            <i class="fas fa-images"></i>
            <span class="absolute right-16 top-1/2 -translate-y-1/2 bg-slate-800 dark:bg-neutral-900 text-white text-xs px-3 py-1.5 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap shadow-md pointer-events-none">Galeri Umum</span>
        </a>

        @auth
        <a href="/admin/dashboard" class="w-12 h-16 rounded-l-full bg-emerald-600 dark:bg-emerald-500 backdrop-blur-sm shadow-lg hover:w-14 hover:bg-emerald-700 text-white transition-all duration-300 flex items-center justify-center pl-1 group relative mt-4">
            <i class="fas fa-cog"></i>
        </a>
        <form action="/logout" method="POST" class="mt-2">
            @csrf
            <button type="submit" class="w-12 h-12 rounded-l-full bg-red-600/80 backdrop-blur-sm border border-red-500 text-white flex items-center justify-center hover:w-14 transition-all">
                <i class="fas fa-sign-out-alt"></i>
            </button>
        </form>
        @endauth
    </nav>

    <main class="h-screen w-full overflow-y-scroll snap-y snap-mandatory hide-scrollbar relative">
        <div class="fixed top-0 left-0 w-full h-full pointer-events-none -z-10 overflow-hidden">
            <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-violet-300/30 dark:bg-violet-600/20 rounded-full blur-[100px]"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[400px] h-[400px] bg-blue-300/30 dark:bg-blue-600/10 rounded-full blur-[100px]"></div>
        </div>

        <section id="tentang" class="min-h-screen w-full snap-start pt-28 pb-12 px-6 md:px-16 flex flex-col justify-start">
            <div class="max-w-5xl mx-auto w-full grid grid-cols-1 md:grid-cols-2 gap-12 items-start mt-8">
                <div class="order-2 md:order-1">
                    <div class="inline-block px-4 py-1.5 rounded-full bg-violet-100 dark:bg-violet-500/10 text-violet-700 dark:text-violet-400 text-sm font-semibold mb-6">Profil Profesional</div>
                    <h1 class="text-5xl md:text-7xl font-extrabold text-slate-900 dark:text-white mb-4 tracking-tight">Muhammad <br><span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-500">Hanif.</span></h1>
                    <h2 class="text-2xl text-slate-600 dark:text-neutral-300 font-medium mb-6">Warehouse Administrator</h2>
                    <p class="text-slate-600 dark:text-neutral-400 text-lg leading-relaxed mb-8">Berpengalaman di fasilitas Gudang Cikarang dengan fokus pada optimalisasi tata kelola pergudangan. Merancang antarmuka web yang responsif, serta melakukan integrasi API untuk efisiensi logistik.</p>
                    
                    <div class="flex flex-wrap gap-4">
                        @if(isset($owner) && $owner->cv_path)
                            <a href="/storage/{{ $owner->cv_path }}" target="_blank" class="px-8 py-3 bg-violet-600 hover:bg-violet-700 text-white rounded-lg font-medium shadow-lg">Unduh CV</a>
                        @endif
                        @if(isset($owner) && $owner->phone)
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $owner->phone) }}" target="_blank" class="px-8 py-3 bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 text-slate-700 dark:text-white rounded-lg font-medium">Hubungi Saya</a>
                        @endif
                    </div>
                </div>
                
                <div class="order-1 md:order-2 flex justify-center md:justify-end">
                    <div class="w-56 h-56 md:w-72 md:h-72 rounded-full bg-gradient-to-tr from-violet-500 to-indigo-500 p-1 shadow-2xl relative">
                        <div class="w-full h-full bg-slate-100 dark:bg-neutral-900 rounded-full border-4 border-white dark:border-neutral-950 flex items-center justify-center overflow-hidden">
                            @if(isset($owner) && $owner->profile_photo_path)
                                <img src="/storage/{{ $owner->profile_photo_path }}" alt="Foto Muhammad Hanif" class="w-full h-full object-cover">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="projek" class="min-h-screen w-full snap-start pt-24 pb-12 px-6 md:px-16 flex flex-col justify-start">
            <div class="max-w-6xl mx-auto w-full">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4">
                    <div>
                        <h2 class="text-4xl md:text-5xl font-bold text-slate-900 dark:text-white mb-2">Projek & Tugas</h2>
                        <p class="text-slate-500">Daftar implementasi sistem, logika kode, dan rekam karya.</p>
                    </div>
                    <div class="flex bg-slate-200 dark:bg-neutral-800 p-1 rounded-lg w-fit">
                        <button onclick="switchView('carousel')" id="btn-carousel" class="px-4 py-2 rounded-md bg-white dark:bg-neutral-600 text-violet-600 dark:text-white shadow-sm text-sm font-medium"><i class="fas fa-columns"></i> Kolom</button>
                        <button onclick="switchView('list')" id="btn-list" class="px-4 py-2 rounded-md text-slate-600 dark:text-neutral-400 text-sm font-medium"><i class="fas fa-list"></i> List</button>
                    </div>
                </div>

                <div id="view-carousel" class="flex overflow-x-auto gap-6 pb-8 snap-x snap-mandatory hide-scrollbar">
                    @foreach($projects as $project)
                    <div class="w-80 md:w-96 shrink-0 snap-center bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-2xl p-6 shadow-sm flex flex-col justify-between">
                        <div>
                            @if($project->media_path)
                                <div class="w-full h-44 rounded-xl overflow-hidden mb-4 bg-slate-100 dark:bg-neutral-900">
                                    @if(preg_match('/\.(mp4|mkv)$/i', $project->media_path))
                                        <video src="/storage/{{ $project->media_path }}" controls class="w-full h-full object-cover"></video>
                                    @else
                                        <img src="/storage/{{ $project->media_path }}" class="w-full h-full object-cover">
                                    @endif
                                </div>
                            @endif
                            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">{{ $project->title }}</h3>
                            @if($project->tech_stack)
                                <p class="text-xs font-mono text-violet-600 dark:text-violet-400 mb-3 bg-violet-50 dark:bg-violet-950/30 px-2 py-1 rounded w-fit">{{ $project->tech_stack }}</p>
                            @endif
                            <p class="text-slate-600 dark:text-neutral-400 text-sm leading-relaxed mb-4 line-clamp-3">{{ $project->content }}</p>
                        </div>
                        @if($project->link_demo)
                            <a href="{{ $project->link_demo }}" target="_blank" class="text-sm font-bold text-indigo-600 dark:text-indigo-400 hover:underline"><i class="fas fa-external-link-alt"></i> Lihat Demo</a>
                        @endif
                    </div>
                    @endforeach
                </div>

                <div id="view-list" class="hidden flex-col gap-4 overflow-y-auto max-h-[60vh] pb-8 pr-2 hide-scrollbar">
                    <input type="text" id="search-project" class="w-full bg-white dark:bg-neutral-900 border border-slate-200 dark:border-white/10 px-4 py-3 rounded-xl mb-2 text-sm" placeholder="Cari projek...">
                    <div id="project-list-container" class="flex flex-col gap-3">
                        @foreach($projects as $project)
                        <div class="project-list-item bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl p-4 flex items-center gap-4">
                            <div class="w-12 h-12 shrink-0 bg-violet-100 text-violet-600 rounded-lg flex items-center justify-center"><i class="fas fa-briefcase"></i></div>
                            <div>
                                <h3 class="project-title text-base font-bold dark:text-white">{{ $project->title }}</h3>
                                <p class="project-desc text-slate-600 dark:text-neutral-400 text-xs line-clamp-1">{{ $project->content }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section id="jurnal" class="min-h-screen w-full snap-start pt-24 pb-12 px-6 md:px-16 flex flex-col justify-start">
            <div class="max-w-4xl mx-auto w-full">
                <div class="mb-8">
                    <h2 class="text-4xl font-bold text-slate-900 dark:text-white mb-2">Catatan Jurnal</h2>
                    <p class="text-slate-500">Ruang berbagi wawasan teknis, pemikiran, dan eksperimen.</p>
                </div>
                <div class="bg-white dark:bg-neutral-900/50 border border-slate-200 dark:border-white/10 rounded-2xl overflow-hidden shadow-sm">
                    @foreach($journals as $jurnal)
                    <div data-title="{{ $jurnal->title }}" data-content="{{ $jurnal->content }}" data-date="{{ $jurnal->created_at->format('d M Y') }}" onclick="openJournalModal(this)" class="p-6 border-b border-slate-100 dark:border-white/5 hover:bg-slate-50 dark:hover:bg-white/5 cursor-pointer flex justify-between gap-6 group">
                        <div>
                            <h4 class="text-lg font-bold text-slate-800 dark:text-neutral-200 group-hover:text-violet-600">{{ $jurnal->title }}</h4>
                            <p class="text-sm text-slate-500 mt-2 line-clamp-2">{{ $jurnal->content }}</p>
                        </div>
                        <span class="text-xs font-mono text-slate-400">{{ $jurnal->created_at->format('d M Y') }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="galeri" class="min-h-screen w-full snap-start pt-24 pb-12 px-6 md:px-16 flex flex-col justify-start">
            <div class="max-w-5xl mx-auto w-full">
                <div class="mb-8 text-center">
                    <h2 class="text-4xl font-bold text-slate-900 dark:text-white mb-2">Galeri Kehidupan</h2>
                    <p class="text-slate-500">Dokumentasi aktivitas, lingkungan, dan momen di luar layar monitor.</p>
                </div>

                @if(count($galleries) > 0)
                <div class="grid grid-cols-2 md:grid-cols-3 gap-1 md:gap-4">
                    @foreach($galleries as $item)
                    <div onclick="openGalleryModal('/storage/{{ $item->file_path }}', '{{ $item->type }}', '{{ addslashes($item->title ?? '') }}')" class="relative aspect-square bg-slate-200 dark:bg-neutral-800 rounded-lg md:rounded-xl overflow-hidden group cursor-pointer border border-slate-200 dark:border-white/5">
                        
                        @if($item->type === 'video')
                            <video src="/storage/{{ $item->file_path }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" muted loop onmouseover="this.play()" onmouseout="this.pause()"></video>
                            <div class="absolute top-3 right-3 text-white drop-shadow-md bg-black/30 w-8 h-8 flex items-center justify-center rounded-full z-10">
                                <i class="fas fa-video text-xs"></i>
                            </div>
                        @else
                            <img src="/storage/{{ $item->file_path }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        @endif

                        @if($item->title)
                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center p-4 z-20">
                            <p class="text-white text-center text-sm md:text-base font-medium line-clamp-3 px-4">{{ $item->title }}</p>
                        </div>
                        @endif

                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center p-12 bg-white dark:bg-white/5 rounded-2xl border border-slate-200 dark:border-white/10 mt-10">
                    <i class="fas fa-camera-retro text-5xl text-slate-300 dark:text-neutral-700 mb-4"></i>
                    <p class="text-slate-500 dark:text-neutral-400">Belum ada tangkapan momen yang diunggah.</p>
                </div>
                @endif
            </div>
        </section>

    </main>

    <div id="journal-modal" class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm flex items-center justify-center p-4 hidden opacity-0 transition-opacity duration-300">
        <div class="bg-white dark:bg-neutral-900 w-full max-w-2xl rounded-2xl border border-slate-200 dark:border-white/10 shadow-2xl p-6 flex flex-col max-h-[85vh]">
            <div class="flex justify-between items-start border-b border-slate-100 dark:border-white/5 pb-4">
                <div>
                    <span id="modal-date" class="text-xs font-mono text-violet-600 dark:text-violet-400"></span>
                    <h3 id="modal-title" class="text-2xl font-bold text-slate-900 dark:text-white mt-1"></h3>
                </div>
                <button onclick="closeJournalModal()" class="text-slate-400 text-2xl font-bold">&times;</button>
            </div>
            <div class="overflow-y-auto pt-4 flex-1 text-sm text-slate-600 dark:text-neutral-300 leading-relaxed whitespace-pre-line" id="modal-content"></div>
        </div>
    </div>

    <div id="gallery-modal" class="fixed inset-0 z-[60] bg-black/90 backdrop-blur-md flex items-center justify-center p-4 hidden opacity-0 transition-opacity duration-300" onclick="closeGalleryModal()">
        <button onclick="closeGalleryModal()" class="absolute top-6 right-6 text-white hover:text-gray-300 text-4xl font-bold z-[70]">&times;</button>
        
        <div class="relative w-full max-w-5xl flex flex-col items-center justify-center" onclick="event.stopPropagation()">
            <div id="gallery-media-container" class="w-full flex justify-center items-center overflow-hidden rounded-lg shadow-2xl">
                </div>
            <p id="gallery-modal-title" class="text-white text-center mt-6 text-lg font-medium tracking-wide"></p>
        </div>
    </div>

    <script>
        function toggleTheme() {
            const htmlTag = document.documentElement;
            htmlTag.classList.toggle('dark');
            document.getElementById('theme-icon').className = htmlTag.classList.contains('dark') ? 'fas fa-sun text-yellow-500 text-xl' : 'fas fa-moon text-slate-700 text-xl';
        }
        
        function switchView(viewType) {
            document.getElementById('view-carousel').classList.toggle('hidden', viewType === 'list');
            document.getElementById('view-carousel').classList.toggle('flex', viewType === 'carousel');
            document.getElementById('view-list').classList.toggle('hidden', viewType === 'carousel');
            document.getElementById('view-list').classList.toggle('flex', viewType === 'list');
        }
        
        const searchInput = document.getElementById('search-project');
        if(searchInput) {
            searchInput.addEventListener('input', e => {
                const keyword = e.target.value.toLowerCase();
                document.querySelectorAll('.project-list-item').forEach(item => {
                    item.style.display = (item.querySelector('.project-title').textContent.toLowerCase().includes(keyword) || item.querySelector('.project-desc').textContent.toLowerCase().includes(keyword)) ? 'flex' : 'none';
                });
            });
        }
        
        // Fungsi Modal Jurnal
        function openJournalModal(element) {
            document.getElementById('modal-title').textContent = element.getAttribute('data-title');
            document.getElementById('modal-content').textContent = element.getAttribute('data-content');
            document.getElementById('modal-date').textContent = element.getAttribute('data-date');
            const modal = document.getElementById('journal-modal');
            modal.classList.remove('hidden');
            setTimeout(() => modal.classList.remove('opacity-0'), 10);
        }
        function closeJournalModal() {
            const modal = document.getElementById('journal-modal');
            modal.classList.add('opacity-0');
            setTimeout(() => modal.classList.add('hidden'), 300);
        }

        // Fungsi Modal Galeri Lightbox (Baru)
        function openGalleryModal(url, type, title) {
            const modal = document.getElementById('gallery-modal');
            const container = document.getElementById('gallery-media-container');
            const titleElement = document.getElementById('gallery-modal-title');
            
            // Bersihkan isi sebelumnya
            container.innerHTML = '';
            
            // Render elemen berdasarkan jenis media (Video / Gambar)
            if (type === 'video') {
                container.innerHTML = `<video src="${url}" controls autoplay class="max-w-full max-h-[80vh] object-contain rounded-lg"></video>`;
            } else {
                container.innerHTML = `<img src="${url}" class="max-w-full max-h-[80vh] object-contain rounded-lg">`;
            }
            
            titleElement.textContent = title;
            
            modal.classList.remove('hidden');
            setTimeout(() => modal.classList.remove('opacity-0'), 10);
        }

        function closeGalleryModal() {
            const modal = document.getElementById('gallery-modal');
            const container = document.getElementById('gallery-media-container');
            
            modal.classList.add('opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
                container.innerHTML = ''; // Hapus isi HTML agar video berhenti berputar
            }, 300);
        }
    </script>
</body>
</html>