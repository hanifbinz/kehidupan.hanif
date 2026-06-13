<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Wajib untuk menghapus file fisik

class ProjectController extends Controller
{
    public function create()
    {
        return view('admin.project_tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'tech_stack' => 'nullable|string|max:255',
            'link_demo' => 'nullable|url',
            'media' => 'nullable|file|mimes:jpg,jpeg,png,mp4,mkv|max:50000',
        ]);

        $mediaPath = null;

        if ($request->hasFile('media')) {
            $mediaPath = $request->file('media')->store('projects', 'public');
        }

        Project::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'tech_stack' => $request->input('tech_stack'),
            'link_demo' => $request->input('link_demo'),
            'media_path' => $mediaPath,
        ]);

        return redirect('/admin/dashboard')->with('sukses', 'Projek baru berhasil diterbitkan!');
    }

    // TAMPILKAN HALAMAN EDIT PROJEK SPECIFIK
    public function edit(int $id)
    {
        $project = Project::findOrFail($id);
        return view('admin.project_edit', compact('project'));
    }

    // PROSES SIMPAN PERUBAHAN EDIT PROJEK
    public function update(Request $request, int $id)
    {
        $project = Project::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'tech_stack' => 'nullable|string|max:255',
            'link_demo' => 'nullable|url',
            'media' => 'nullable|file|mimes:jpg,jpeg,png,mp4,mkv|max:50000',
        ]);

        // Jika mengunggah file media dokumentasi baru
        if ($request->hasFile('media')) {
            // Hapus file dokumentasi lama jika ada
            if ($project->media_path && Storage::disk('public')->exists($project->media_path)) {
                Storage::disk('public')->delete($project->media_path);
            }
            // Simpan yang baru
            $project->media_path = $request->file('media')->store('projects', 'public');
        }

        $project->title = $request->input('title');
        $project->content = $request->input('content');
        $project->tech_stack = $request->input('tech_stack');
        $project->link_demo = $request->input('link_demo');
        $project->save();

        return redirect('/admin/dashboard')->with('sukses', 'Data projek berhasil diperbarui!');
    }

    // PROSES HAPUS PROJEK TOTAL
    public function destroy(int $id)
    {
        $project = Project::findOrFail($id);

        // Hapus file dokumentasi fisiknya dari server
        if ($project->media_path && Storage::disk('public')->exists($project->media_path)) {
            Storage::disk('public')->delete($project->media_path);
        }

        // Hapus data dari database
        $project->delete();

        return redirect('/admin/dashboard')->with('sukses', 'Projek berhasil dihapus permanen.');
    }
}