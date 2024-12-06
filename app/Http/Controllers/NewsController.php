<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $news = News::with('category')
            ->when($search, function ($query, $search) {
                return $query->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('judul', 'like', '%' . $search . '%');
            })
            ->paginate(5);

        return view(
            'admin.news.index',
            ['title' => 'Admin | Berita'],
            compact('news')
        );
    }


    public function create()
    {
        $categories = Category::all();
        return view(
            'admin.news.create',
            ['title' => 'Admin | Tambah Berita'],
            compact('categories')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'tag_id' => 'required|exists:kategori,id',
            'tanggal_berita' => 'required|date',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif',
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
        return view(
            'admin.news.edit',
            ['title' => 'Admin | Edit Berita'],
            compact('news', 'categories')
        );
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'tag_id' => 'required|exists:kategori,id',
            'tanggal_berita' => 'required|date',
        ]);
        $data = $request->only(['judul', 'isi', 'tag_id', 'tanggal_berita']);

        if ($request->hasFile('foto')) {
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
