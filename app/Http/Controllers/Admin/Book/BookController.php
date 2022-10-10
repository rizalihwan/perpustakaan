<?php

namespace App\Http\Controllers\Admin\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest\StoreRequest;
use App\Http\Requests\BookRequest\UpdateRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use RealRashid\SweetAlert\Facades\Alert;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.buku.index', [
            'books' => Book::orderBy('book_code', 'ASC')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $number = Book::count();
        if($number > 0)
        {
            $number = Book::max('book_code');
            $strnum = substr($number, 2, 3);
            $strnum = $strnum + 1;
            if (strlen($strnum) == 3) {
                $kode = 'BK' . $strnum;
            } else if (strlen($strnum) == 2) {
                $kode = 'BK' . "0" . $strnum;
            } else if (strlen($strnum) == 1) {
                $kode = 'BK' . "00" . $strnum;
            }
        } else {
            $kode = 'BK' . "001";
        }
        return view('admin.buku.create', [
            'kode' => $kode,
            'categories' => Category::orderBy('name', 'ASC')->get(),
            'authors' => Author::orderBy('name', 'ASC')->get(),
            'publishers' => Publisher::orderBy('name', 'ASC')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try {
            $data = $request->all();
            $thumbnail = request()->file('thumbnail')->store("images/books");
            $data['thumbnail'] = $thumbnail;
            Book::create($data);
            Alert::success('Informasi Pesan!', 'Buku Berhasil ditambahkan');
        } catch(\Exception $e) {
            \Log::error($e);
            return "Terjadi Kesalahan";
        }
        
        return redirect()->route('admin.buku.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.buku.edit', [
            'book' => Book::findOrFail($id),
            'categories' => Category::orderBy('name', 'ASC')->get(),
            'authors' => Author::orderBy('name', 'ASC')->get(),
            'publishers' => Publisher::orderBy('name', 'ASC')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $book = Book::findOrFail($id);
        if(request()->file('thumbnail'))
        {
            \Storage::delete($book->thumbnail);
            $thumbnail = request()->file('thumbnail')->store("images/books");
        } else {
            $thumbnail = $book->thumbnail;
        }
        $data = $request->all();
        $data['thumbnail'] = $thumbnail;
        $book->update($data);
        Alert::success('Informasi Pesan!', 'Buku Berhasil di update');
        return redirect()->route('admin.buku.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Book::findOrFail($id);
        \Storage::delete($data->thumbnail);
        $data->delete();
        $data->borrowing()->delete();
        Alert::success('Informasi Pesan!', 'Buku Berhasil dihapus!');
        return back();
    }
}
