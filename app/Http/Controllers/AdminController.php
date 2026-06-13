<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Journal;
use App\Models\Gallery; // Tambahan wajib
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('cv')) {
            if ($user->cv_path && Storage::disk('public')->exists($user->cv_path)) {
                Storage::disk('public')->delete($user->cv_path);
            }
            $user->cv_path = $request->file('cv')->store('cv_files', 'public');
        }

        if ($request->hasFile('photo')) {
            if ($user->profile_photo_path && Storage::disk('public')->exists($user->profile_photo_path)) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }
            $user->profile_photo_path = $request->file('photo')->store('profile_photos', 'public');
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