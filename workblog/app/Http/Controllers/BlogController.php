<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tematika' => 'required|max:255',
            'naslov' => 'required|max:255',
            'sadrzaj' => 'required'
        ]);

        $blog = new Blog();
        $blog->tematika = $request->tematika;
        $blog->naslov = $request->naslov;
        $blog->sadrzaj = $request->sadrzaj;
        $blog->user_id = Auth::id();
        $blog->save();

        $request->session()->flash('success', 'Blog je uspješno dodan!');
        return redirect()->route('blogs.index');
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.show', compact('blog'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tematika' => 'required|max:255',
            'naslov' => 'required|max:255',
            'sadrzaj' => 'required'
        ]);

        $blog = Blog::findOrFail($id);

        if ($blog->user_id != Auth::id()) {
            abort(403, 'Nemate dopuštenje za uređivanje ovog bloga.');
        }

        $blog->tematika = $request->tematika;
        $blog->naslov = $request->naslov;
        $blog->sadrzaj = $request->sadrzaj;
        $blog->save();

        $request->session()->flash('success', 'Blog je uspješno ažuriran!');
        return redirect()->route('blogs.index');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->user_id != Auth::id()) {
            abort(403, 'Nemate dopuštenje za brisanje ovog bloga.');
        }

        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog je uspješno izbrisan.');
    }
}
