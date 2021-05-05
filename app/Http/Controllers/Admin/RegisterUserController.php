<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest\StoreRequest;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pengguna.index', [
            'users' => User::orderBy('name', 'ASC')->where('id', '!=', auth()->user()->id)->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
            'password' => bcrypt( $request->password)
        ]);
        Alert::success('Informasi Pesan!', 'Pengguna Baru Berhasil ditambahkan');
        return redirect()->route('admin.pengguna.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->role == 'admin')
        {
            User::findOrFail($id)->delete();
            Alert::success('Informasi Pesan!', 'Pengguna Berhasil dihapus!');
            return back();
        } else {
            Alert::warning('Informasi Pesan!', 'Gagal dihapus dikarenakan anda bukan ADMIN!');
            return back();
        }
    }
}
