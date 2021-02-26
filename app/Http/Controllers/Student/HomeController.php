<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;

class HomeController extends Controller
{
    // title properti
    private $titleDefault = "Semua Buku";
    private $titleLatest = "Buku Terbaru";
    private $titleAsc = "Buku dari (A - Z)";
    private $titleDesc = "Buku dari (Z - A)";

    public function index()
    {
        return view('siswa.index', [
            'title' => $this->titleDefault,
            'books' => Book::where('stock', '>=', 1)->paginate(3),
            'categories' => Category::orderBy('name', 'ASC')->get()
        ]);
    }

    public function bookLatest()
    {
        return view('siswa.index', [
            'title' => $this->titleLatest,
            'books' => Book::where('stock', '>=', 1)->latest()->paginate(3),
            'categories' => Category::orderBy('name', 'ASC')->get()
        ]);
    }

    public function bookAsc()
    {
        return view('siswa.index', [
            'title' => $this->titleAsc,
            'books' => Book::orderBy('name', 'ASC')->where('stock', '>=', 1)->paginate(3),
            'categories' => Category::orderBy('name', 'ASC')->get()
        ]);
    }

    public function bookDesc()
    {
        return view('siswa.index', [
            'title' => $this->titleDesc,
            'books' => Book::orderBy('name', 'DESC')->where('stock', '>=', 1)->paginate(3),
            'categories' => Category::orderBy('name', 'ASC')->get()
        ]);
    }

    public function categoryShow($id)
    {
        $data = Category::findOrFail($id);
        return view('siswa.index', [
            'title' => "Kategori : " . $data->name,
            'books' => $data->book()->where('stock', '>=', 1)->latest()->paginate(3),
            'categories' => Category::orderBy('name', 'ASC')->get()
        ]);
    }

    public function authorShow($id)
    {
        $data = Author::findOrFail($id);
        return view('siswa.index', [
            'title' => "Pengarang : " . $data->name,
            'books' => $data->book()->where('stock', '>=', 1)->latest()->paginate(3),
            'categories' => Category::orderBy('name', 'ASC')->get()
        ]);
    }

    public function search()
    {
        $query = request('query');
        if($query != null)
        {
            $books = Book::with('category', 'author', 'publisher')
            ->where('stock', '>=', 1)
            ->where("name", "like", "%$query%")
            ->orWhere("book_code", "like", "%$query%")
            ->orWhere("description", "like", "%$query%")
            ->latest()->paginate(3);
        } else {
            $books = Book::where('stock', '>=', 1)->paginate(3);
        }
        return view('siswa.index', [
            'title' => "Pencarian : " . $query,
            'books' => $books,
            'categories' => Category::orderBy('name', 'ASC')->get()
        ]);
    }

    public function detail($id)
    {
        $book = Book::findOrFail($id);
        return view('siswa.detail', compact('book'));
    }

}
