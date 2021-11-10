<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\User;
use App\Models\Komentar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Symfony\Contracts\Service\Attribute\Required;

class PostsController extends Controller
{
public function __construct()
    {
        $this->middleware('auth');
    }
    
public function index()
    {
        $post = Posts::orderBy('created_at','desc')->paginate(4);
        return view('admin.posts.index', compact('post'));
    }

    
    public function create()
    {
        $category = Category::all();
        return view('admin.posts.create', compact('category'))->with('success','Kategori Anda Berhasil Disimpan Bujang');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'gambar' => 'required'
        ]);

        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();

        $post = Posts::create([
            'judul' =>$request->judul,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'gambar' => 'public/uploads/posts/'.$new_gambar,
            'slug' => Str::slug($request->judul),
            'users_id' => Auth::id() 
        ]);

        $gambar->move('public/uploads/posts/', $new_gambar);
        return redirect()->route('posts.index')->with('success','Artikel anda berhasil di Posting');
    }

    
public function show($id)
    {
        $users = User::all();
        $category = Category::all();
        $post = Posts::findorfail($id);
        return view('admin.posts.show', compact('post','category','users'));
    }

   
public function edit($id)
    {
        $category = Category::all();
        $post = Posts::findorfail($id);
        return view('admin.posts.edit', compact('post','category'));
    }

    
public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'category_id' => 'required',
            'content' => 'required'
        ]);

        $post = Posts::findorfail($id);

        if ($request->has('gambar')) {
            $gambar = $request->gambar;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move('public/uploads/posts/', $new_gambar);

            $post_data = [
                'judul' =>$request->judul,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'gambar' => 'public/uploads/posts/'.$new_gambar,
                'slug' => Str::slug($request->judul)
            ];
        }

        else{
            $post_data = [
                'judul' =>$request->judul,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'slug' => Str::slug($request->judul)
            ];
        }

        $post->update($post_data);
        return redirect()->route('posts.index')->with('success','Artikel anda berhasil di Update');
    }

    
    public function destroy($id)
    {
        $post = Posts::findorfail($id);
        $post->delete();

        return redirect()->back()->with('success','Kategori Berhasil Dihapus (Cek Tempat Sampah)');
    }


public function tampil_hapus(){
        $post = Posts::onlyTrashed()->paginate(10);
        return view('admin.posts.hapus', compact('post'));
    }


public function restore($id){
        $post = Posts::withTrashed()->where('id', $id)->first();
        $post->restore();

        return redirect()->back()->with('success','Post Berhasil Direstore (silahkan cek list)');
    }


public function kill($id){
        $post = Posts::withTrashed()->where('id', $id)->first();
        $post->forceDelete();

        return redirect()->back()->with('success','Post Berhasil Dihapus Permanen ');
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

        return redirect()->back()->with('succes','Post Berhasil Dihapus Permanen ');
    }
}
