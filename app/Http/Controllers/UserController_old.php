<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // $user = UserModel::all();
        $user = UserModel::with('level')->get();
        // dd($user);
        return view('user', ['data' => $user]);
    }
    public function tambah()
    {
        return view('user_tambah');
    }
    public function tambah_simpan(StorePostRequest $request)
    {
        // UserModel::create([
        //     'level_id' => $request->level_id,
        //     'username' => $request->username,
        //     'nama' => $request->nama,
        //     'password' => Hash::make('$request->password')
        // ]);

        // Retrieve the validated input data..
        $validated = $request->validated();

        // Retrieve a portion of the validated input data
        $validated = $request->safe()->only(['level_id', 'username', 'nama', 'password']);
        $validated = $request->safe()->except(['level_id', 'username', 'nama', 'password']);
        return redirect('/user');
    }
    public function ubah($id)
    {
        $user = UserModel::find($id);
        return view('user_ubah', ['data' => $user]);
    }
    public function ubah_simpan($id, Request $request)
    {
        $user = UserModel::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make('$request->password');
        $user->level_id = $request->level_id;

        $user->save();

        return redirect('/user');
    }
    public function hapus($id)
    {
        $user = UserModel::find($id);

        $user->delete();

        return redirect('/user');
    }
}
