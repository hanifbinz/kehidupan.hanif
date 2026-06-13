<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    // Menampilkan Form Upload
    public function create()
    {
        return view('admin.galeri_tambah');
    }

    // Proses Simpan
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'media' => 'required|file|mimes:jpg,jpeg,png,mp4,mkv|max:50000', // Wajib isi
        ]);

        $file = $request->file('media');
        $extension = strtolower($file->getClientOriginalExtension());
        
        // Deteksi apakah ini video atau gambar
        $type = in_array($extension, ['mp4', 'mkv']) ? 'video' : 'image';
        
        $path = $file->store('galleries', 'public');

        Gallery::create([
            'title' => $request->input('title'),
            'file_path' => $path,
            'type' => $type
        ]);

        return redirect('/admin/dashboard')->with('sukses', 'Media berhasil ditambahkan ke Galeri!');
    }

    // Proses Hapus Permanen
    public function destroy(int $id)
    {
        $gallery = Gallery::findOrFail($id);
        
        if (Storage::disk('public')->exists($gallery->file_path)) {
            Storage::disk('public')->delete($gallery->file_path);
        }
        
        $gallery->delete();
        return redirect('/admin/dashboard')->with('sukses', 'Media galeri berhasil dihapus.');
    }
}