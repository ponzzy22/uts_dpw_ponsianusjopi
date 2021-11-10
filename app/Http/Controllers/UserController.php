<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
public function index(Request $request)
    {
        if($request->has('cari')) 
        {
            $users= User::where('name','LIKE','%'.$request->cari.'%')->get();
        }
        else
        {
            $users = User::all();
        }
      
        return view('admin.users.index', compact('users'));
    }


public function create()
    {
        return view('admin.users.create');
    }


public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3|max:100',
            'email' => 'required|email',
            'tipe' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'tipe' => $request->tipe,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('users.index')->with('success','Pengguna Berhasil Ditambahkan');
    }


public function show($id)
    {
        //
    }


public function edit($id)
    {
        $users = User::findorfail($id);
        
        return view('admin.users.edit', compact('users'));
    }


public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:100',
            'email' => 'required|email',
            'tipe' => 'required'
        ]);

        $users = User::findorfail($id);

        if ($request->input('password')) {
            $users_data = [
                'name' =>$request->name,
                'email' => $request->email,
                'tipe' => $request->tipe,
                'password' => bcrypt($request->password),
            ];
        }
        
        else{
            $users_data = [
                'name' =>$request->name,
                'email' => $request->email,
                'tipe' => $request->tipe,                
            ];
        }        

        $users->update($users_data);
        return redirect()->route('users.index')->with('success','Data Pengguna anda berhasil di Update');
        
    }


public function destroy($id)
    {
        $users = User::findorfail($id);
        $users->delete();

        return redirect()->back()->with('success','Pengguna Berhasil Dihapus');
    }


}
