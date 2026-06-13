<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Project;
use App\Models\Gallery; // Wajib dipanggil
use App\Models\User;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function index() 
    {
        $journals = Journal::latest()->get();
        $projects = Project::latest()->get();
        $galleries = Gallery::latest()->get(); // Ambil galeri untuk pengunjung
        $owner = User::first(); 
        
        return view('welcome', compact('journals', 'owner', 'projects', 'galleries'));
    }

    public function create() 
    {
        return view('tulis');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required'
        ]);

        Journal::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect('/admin/dashboard')->with('sukses', 'Catatan jurnal berhasil diterbitkan!');
    }

    public function edit(int $id)
    {
        $journal = Journal::findOrFail($id);
        return view('admin.journal_edit', compact('journal'));
    }

    public function update(Request $request, int $id)
    {
        $journal = Journal::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required'
        ]);

        $journal->title = $request->input('title');
        $journal->content = $request->input('content');
        $journal->save();

        return redirect('/admin/dashboard')->with('sukses', 'Catatan jurnal diperbarui!');
    }

    public function destroy(int $id)
    {
        $journal = Journal::findOrFail($id);
        $journal->delete();

        return redirect('/admin/dashboard')->with('sukses', 'Catatan dihapus.');
    }
}