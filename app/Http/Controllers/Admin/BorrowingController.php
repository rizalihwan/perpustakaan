<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BorrowingRequest\StoreRequest;
use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Student;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.peminjaman.index', [
            'borrowings' => Borrowing::orderBy('borrow_code', 'ASC')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $number = Borrowing::count();
        if($number > 0)
        {
            $number = Borrowing::max('borrow_code');
            $strnum = substr($number, 3, 3);
            $strnum = $strnum + 1;
            if (strlen($strnum) == 3) {
                $kode = 'PNJ' . $strnum;
            } else if (strlen($strnum) == 2) {
                $kode = 'PNJ' . "0" . $strnum;
            } else if (strlen($strnum) == 1) {
                $kode = 'PNJ' . "00" . $strnum;
            }
        } else {
            $kode = 'PNJ' . "001";
        }
        return view('admin.peminjaman.create', [
            'kode' => $kode,
            'students' => Student::orderBy('first_name', 'ASC')->get(),
            'books' => Book::where('stock', '>=', 1)->orderBy('book_code', 'ASC')->get()
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
        $sum = Book::findOrFail($request->book_id);
        Book::where('id', $request->book_id)->update([
            'stock' => $sum->stock - 1
        ]);
        Borrowing::create($request->all());
        Alert::success('Informasi Pesan!', 'Peminjaman Buku Berhasil ditambahkan');
        return redirect()->route('admin.pinjam.index');
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
        $borrowing = Borrowing::findOrFail($id);
        return view('admin.peminjaman.edit', compact('borrowing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $this->validate(request(), [
            'return_date' => 'required|date'
        ]);
        Borrowing::findOrFail($id)->update([
            'return_date' => request('return_date')
        ]);
        Alert::success('Informasi Pesan!', 'Peminjaman Berhasil diupdate');
        return redirect()->route('admin.pinjam.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Borrowing::findOrFail($id);
        $sum = Book::findOrFail($data->book_id);
        Book::where('id', $data->book_id)->update([
            'stock' => $sum->stock + 1
        ]);
        $data->delete();
        Alert::success('Informasi Pesan!', 'Peminjaman Buku berhasil di Kembalikan');
        return back();
    }

    public function fine()
    {
        return view('admin.denda.index', [
            'borrowings' => Borrowing::where('return_date', '<', Carbon::now())->orderBy('borrow_code', 'ASC')->paginate(5)
        ]);
    }
}
