<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('category')->get();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'tag_id' => 'required|exists:kategori,id',
            'tanggal_berita' => 'required|date',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif', // Validasi foto
        ]);

        $data = $request->only(['judul', 'isi', 'tag_id', 'tanggal_berita']);

        if ($request->hasFile('foto')) {
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('assets/berita'), $fileName);
            $data['foto'] = $fileName;
        }

        News::create($data);

        return redirect()->route('news.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit(News $news)
    {
        $categories = Category::all();
        return view('admin.news.edit', compact('news', 'categories'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'tag_id' => 'required|exists:kategori,id', // Sesuai kolom `tag_id` Anda
            'tanggal_berita' => 'required|date',
        ]);
        $data = $request->only(['judul', 'isi', 'tag_id', 'tanggal_berita']);

        if ($request->hasFile('foto')) {
            // Hapus gambar lama jika ada
            if ($news->foto && file_exists(public_path('assets/berita/' . $news->foto))) {
                unlink(public_path('assets/berita/' . $news->foto));
            }

            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('assets/berita'), $fileName);
            $data['foto'] = $fileName;
        }

        $news->update($data);


        return redirect()->route('news.index')->with('success', 'Berita berhasil diubah.');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')->with('success', 'Berita berhasil dihapus.');
    }
}
