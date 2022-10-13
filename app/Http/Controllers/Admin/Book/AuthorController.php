<?php

namespace App\Http\Controllers\Admin\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest\StoreRequest;
use App\Http\Requests\AuthorRequest\UpdateRequest;
use App\Models\Author;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.buku.pengarang.index', [
            'authors' => Author::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.buku.pengarang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try{
            Author::create($request->all());
        } catch(\Exception $err) {
            return "Error: " . $err->getMessage();
        }

        Alert::success('Informasi Pesan!', 'Pengarang Baru Berhasil ditambahkan');
        return redirect()->route('admin.pengarang.index');
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
        $author = Author::findOrFail($id);
        return view('admin.buku.pengarang.edit', compact('author'));
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
        try{
            Author::findOrFail($id)->update($request->all());
        } catch(\Exception $err) {
            return "Error: " . $err->getMessage();
        }

        Alert::success('Informasi Pesan!', 'Pengarang Berhasil diupdate');
        return redirect()->route('admin.pengarang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();
        $author->book()->delete();
        Borrowing::truncate();
        Alert::success('Informasi Pesan!', 'Pengarang Berhasil dihapus!');
        return back();
    }
}
