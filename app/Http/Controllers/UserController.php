<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Level;
use Hash;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class UserController extends Controller
{
    
    public function index(Request $request)
    {
        $search = $request->get('search');
        $users = User::where('name','LIKE',"%$search%")->orderBy('id','desc')->paginate(10);
        return view('user.index', compact('users'));
    }


    public function create()
    {
        $roles = Level::all();
        return view('user.add', compact('roles'));
    }


    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'telp' => 'required|numeric|digits_between:11,20',
            'alamat' => 'required',
            'email' => 'required|unique:users',
            'role' => 'required'
        ]);


        if ($request->role == 1) {
            $id = IdGenerator::generate(['table' => 'users','reset_on_prefix_change'=>true,'length' => 10, 'prefix' =>'Adm-']);
        }
        if ($request->role == 2) {
            $id = IdGenerator::generate(['table' => 'users', 'reset_on_prefix_change'=>true,'length' => 10, 'prefix' =>'Kry-']);
        }
        if ($request->role == 3) {
            $id = IdGenerator::generate(['table' => 'users', 'reset_on_prefix_change'=>true,'length' => 10, 'prefix' =>'Plg-']);
        }
        $user = new User;
        $user->id = $id;
        $user->name = $request->name;
        $user->no_telp = $request->telp;
        $user->alamat = $request->alamat;
        $user->email = $request->email;
        $user->level_id = $request->role;
        
        if(!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        session()->flash('success','Sukses Tambah Data Pengguna '.$user->name);
        return redirect()->route('pengguna.index');
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Level::all();
        return view('.user.edit', compact('user', 'roles'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'telp' => 'required|numeric|digits_between:11,20',
            'alamat' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->no_telp = $request->telp;
        $user->alamat = $request->alamat;
        $user->email = $request->email;
        $user->level_id = $request->role;


        if(!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->update();

        session()->flash('success','Sukses Ubah Data Pengguna '.$user->name);
        return redirect()->route('pengguna.index');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        session()->flash('success','Sukses Hapus Pengguna!');
        return redirect()->route('pengguna.index');

    }
}
