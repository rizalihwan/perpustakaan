<?php

namespace App\Http\Controllers\Admin\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublisherRequest\StoreRequest;
use App\Http\Requests\PublisherRequest\UpdateRequest;
use App\Models\Borrowing;
use App\Models\Publisher;
use RealRashid\SweetAlert\Facades\Alert;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.buku.penerbit.index', [
            'publishers' => Publisher::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.buku.penerbit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        Publisher::create($request->all());
        Alert::success('Informasi Pesan!', 'Penerbit Baru Berhasil ditambahkan');
        return redirect()->route('admin.penerbit.index');
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
        $publisher = Publisher::findOrFail($id);
        return view('admin.buku.penerbit.edit', compact('publisher'));
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
        Publisher::findOrFail($id)->update($request->all());
        Alert::success('Informasi Pesan!', 'Penerbit Berhasil diupdate');
        return redirect()->route('admin.penerbit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publisher = Publisher::findOrFail($id);
        $publisher->delete();
        $publisher->book()->delete();
        Borrowing::truncate();
        Alert::success('Informasi Pesan!', 'Penerbit Berhasil dihapus!');
        return back();
    }
}
