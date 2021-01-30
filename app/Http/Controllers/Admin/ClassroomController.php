<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassroomRequest\StoreRequest;
use App\Http\Requests\ClassroomRequest\UpdateRequest;
use App\Models\Borrowing;
use App\Models\Classroom;
use App\Models\Student;
use RealRashid\SweetAlert\Facades\Alert;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kelas.index', [
            'classrooms' => Classroom::orderBy('name', 'ASC')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        Classroom::create($request->all());
        Alert::success('Informasi Pesan!', 'Kelas Baru Berhasil ditambahkan');
        return redirect()->route('admin.kelas.index');
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
        $classroom = Classroom::findOrFail($id);
        return view('admin.kelas.edit', compact('classroom'));
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
        Classroom::findOrFail($id)->update($request->all());
        Alert::success('Informasi Pesan!', 'Kelas Berhasil diupdate');
        return redirect()->route('admin.kelas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classroom = Classroom::findOrFail($id);
        $classroom->delete();
        $classroom->students()->delete();
        Alert::success('Informasi Pesan!', 'Kelas Berhasil dihapus!');
        return back();
    }

    public function delete_all_class()
    {
        Classroom::truncate();
        Student::truncate();
        Borrowing::truncate();
        Alert::success('Informasi Pesan!', 'Kelas Berhasil dibersihkan semua!');
        return back();
    }
}
