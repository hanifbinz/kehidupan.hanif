<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Journal;
use App\Models\Gallery; // Tambahan wajib
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
// Tambahan class wajib untuk kompresi gambar (Intervention Image)
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());
        $projects = Project::latest()->get();
        $journals = Journal::latest()->get();
        $galleries = Gallery::latest()->get(); // Ambil data galeri
        
        return view('admin.dashboard', compact('user', 'projects', 'journals', 'galleries'));
    }

    public function editProfil()
    {
        $user = User::find(Auth::id()); 
        return view('admin.profil', compact('user'));
    }

    public function simpanProfil(Request $request)
    {
        $user = User::find(Auth::id());

        $request->validate([
            'phone' => 'nullable|string|max:20',
            'cv' => 'nullable|mimes:pdf|max:5120',
            // Batas ukuran foto dinaikkan ke 5MB karena akan otomatis dikompres
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        if ($request->hasFile('cv')) {
            if ($user->cv_path && Storage::disk('public')->exists($user->cv_path)) {
                Storage::disk('public')->delete($user->cv_path);
            }
            $user->cv_path = $request->file('cv')->store('cv_files', 'public');
        }

        if ($request->hasFile('photo')) {
            // 1. Hapus foto lama jika ada
            if ($user->profile_photo_path && Storage::disk('public')->exists($user->profile_photo_path)) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            // 2. Persiapan file baru
            $file = $request->file('photo');
            $namaFile = time() . '_' . uniqid() . '.jpg';
            
            // Pastikan folder penyimpanan ada
            if (!Storage::disk('public')->exists('profile_photos')) {
                Storage::disk('public')->makeDirectory('profile_photos');
            }
            
            $path = storage_path('app/public/profile_photos/' . $namaFile);

            // 3. Proses Kompresi dengan Intervention Image
            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);
            
            // Perkecil lebar maksimal jadi 500px (tinggi menyesuaikan) dan simpan JPG kualitas 60%
            $image->scaleDown(width: 500);
            $image->toJpeg(60)->save($path);

            // 4. Simpan path ke database persis seperti aslinya
            $user->profile_photo_path = 'profile_photos/' . $namaFile;
        }

        $user->phone = $request->phone;
        $user->save();

        return redirect('/admin/dashboard')->with('sukses', 'Profil berhasil diperbarui!');
    }

    public function hapusFile(string $jenis)
    {
        $user = User::find(Auth::id());

        if ($jenis === 'cv' && $user->cv_path) {
            Storage::disk('public')->delete($user->cv_path);
            $user->cv_path = null;
            $user->save();
            return back()->with('sukses', 'Dokumen CV dihapus.');
        }

        if ($jenis === 'foto' && $user->profile_photo_path) {
            Storage::disk('public')->delete($user->profile_photo_path);
            $user->profile_photo_path = null;
            $user->save();
            return back()->with('sukses', 'Foto Profil dihapus.');
        }

        return back();
    }
}