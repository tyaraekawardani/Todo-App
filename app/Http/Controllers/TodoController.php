<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan halaman awal atau menampilkan semua data
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
    public function data()
    {
        //ambil data dari table todos
        $todos = Todo::all();
        //compact untuk mengirim data ke bladenya
        //isi di compact harus sama kaya nama variablenya
        return view('data', compact ('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //menampilkan halaman input form tambah data
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //mengirim data baru ke data base
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:8',
        ]);

        //->kirim data ke database yang table todos : model Todo
        //->yang '' = nama column
        //->yang $request-> = value name
        //->kenapa kirim 5 data padahal di input data ada 3 inputan? kalau di cek di table todos itu kan ada 6 column 
        //yang harus di isi salah satunya column done_date yang nullable, kalau nullable itu gausah diisi, salah satunya column
        //->column done_date yang nullable, kalau nullable itu gausah diisi gapapa jadi ga diisi dulu
        //->user_id ngambil id dari fitur auth (history login), supaya tau itu todo punya siapa
        //column status kan boolean, jadi kalau status si todo belum dikerjain = 0
        
        Todo::create([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'status' => 0,
        ]);

        // kalau berhasil tambah ke db, bakal diarahin ke halaman dashboard dengan menampilkan pemberitahuan
        return redirect('/dashboard')->with('addTodo', 'Berhasil menambahkan data 
        Todo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //menampilkan satu data spesifik
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menampilkan halaman form input edit
        // parameter $id mengambil data path dinamis {$id} 
        // ambil satu baris data yang memiliki value colum id sama dengan data path dinamis id yang dikirim ke 
        $todo = Todo::where('id', $id)->first();
        // 
        return view('edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //mengupdate data di database
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:8',
        ]);
        // cari baris data yang punya value column id sama dengan id yang dikirim ke route 
        Todo::where('id',$id)->update([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'status' => 0,
        ]);
        // kalau berhasil, arahkan ke halaman data dengan pemberitahuan berhasil
        Todo::where('id', $id)->delete();
        
        return redirect('/data')->with('successUpdate', 'berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //menghapus data di database
        Todo::where('id', $id)->delete();
        return redirect('/data')->with('successDelete', 'Berhasil menghapus data Todo!');
    }

    public function updateToComplated(Request $request, $id)
    {
        Todo::where('id', '=', $id)->update([
            'status'=> 1,
            'done_time'=> \Carbon\Carbon::now(),
        ]);

        return redirect()->back()->with('done', 'Todo telah selesai dikerjakan');
    }
}