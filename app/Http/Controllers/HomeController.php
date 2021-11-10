<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Posts;
use App\Models\User;
use App\Models\Komentar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Symfony\Contracts\Service\Attribute\Required;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function index_a()
    {
        return view('admin');
    }


    public function welcome()
    {
        return view('welcome');
    }


    public function client()
    {
        return view('client');
    }


    public function tampil_blog(Posts $post)
    {
        $category = Category::all(); 
        $data = Posts::orderBy('created_at','desc')->take(3)->get();
        $data1 = Posts::orderBy('created_at','asc')->take(3)->get();

        return view('klien', compact('data', 'category', 'data1'));
    }


    public function tampil_artikel(Posts $post)
    {
        $data = Posts::orderBy('created_at','desc')->paginate(4);

        return view('klien.artikel', compact('data',));
    }


    public function detail($id)
    {
        $post = Posts::findorfail($id);

        return view('klien.detail', compact('post'));
    }

    public function komentar(Request $request)
    {
        $request->request->add(['users_id' => auth()->user()->id]);
        $komentar = Komentar::create($request->all());

        return redirect()->back()->with('success','Komentar Berhasil Dibuat ');
    }

    public function clean($id){
        $komentar = Komentar::findorfail($id);
        $komentar->delete();

        return redirect()->back()->with('success','Post Berhasil Dihapus Permanen ');
    }


    public function artikel(Request $request)
    {
        if($request->has('cari')){
            $post=Posts::where('judul','LIKE','%'.$request->cari. '%')->get();
        }
        else{
            $post = Posts::all();

        }

        return view('klien.artikel', compact('post'));
    }


    public function detail1($id)
    {
        $post = Posts::findorfail($id);

        return view('klien', compact('post'));
    }
    

    public function kategori(Request $request)
    {
        
        $category = Category::all();        
        
        return view('klien.kategori', compact('category'));
    }

   
}
