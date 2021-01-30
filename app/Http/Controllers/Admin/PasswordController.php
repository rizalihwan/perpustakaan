<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('admin.pengguna.password.edit');
    }

    public function update()
    {
        $this->validate(request(),[
            'old_password' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $currentPassword = auth()->user()->password;
        $old_password = request('old_password');

        if(Hash::check($old_password, $currentPassword))
        {
            auth()->user()->update([
                'password' => bcrypt(request('password'))
            ]);
            Alert::success('Informasi Pesan!', 'Password Berhasil diganti');
            return redirect()->route('admin.dashboard');
        } else {
            Alert::warning('Informasi Pesan!', 'Password lama Tidak Valid!');
            return back();
        }
    }
}
