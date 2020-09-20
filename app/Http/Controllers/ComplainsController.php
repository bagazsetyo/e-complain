<?php

namespace App\Http\Controllers;
//validasi bawan
use Illuminate\Http\Request;
//memanggil model Conplain
use App\Complain;
//memanggil model user
use App\User;
//memanggil model gaallerie
use App\Gallerie;
//memanggil request untuk validasi
use App\Http\Requests\PengaduanRequest;
class ComplainsController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
     //proteksi login
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mengambil data dengan urutan id terbesar
        $items = Complain::orderByDesc('id')->get();
        return view('pages.officer.index')->with([
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //menuju ke volder pages/complain/create.blade.php
        return view('pages.complain.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PengaduanRequest $request)
    {
        //mengambil semua request
        $data = $request->all();
        //menyimpan semua reques pada model Complain
        Complain::create($data);
        //kembali ke halaman
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //mengambil data complain berdasarkan id user
        $items = Complain::with('auth')->where('user_id', $id)->orderBy('id','DESC')->get();
        return view('pages.complain.show')->with([
            'items' => $items
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //mencari data pada tabel complain dengan $id jika data kosong akan di arahkan ke 404
        $items = Complain::findOrFail($id);
        return view('pages.complain.edit')->with([
            'item' => $items
        ]);
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
        //mengambil semua data
        $data = $request->all();
        //mencaro id complain
        $item = Complain::findOrFail($id);
        //mengupdate data complain
        $item->update($data);

        return back();   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //mencari data berdasarkan id
        $item = Complain::findOrFail($id);
        //lalu data itu di delete sementara
        $item->delete();
        //jika data di delet fotonya akan ikut di hapus
        Gallerie::where('complaints_id',$id)->delete();
        //kembali ke halaman
        return back();
    }

    public function complaintrash($id)
    {
        //menampilkan data complain samph sesuai id user
        $items = Complain::onlyTrashed()->with('auth')->where('user_id', $id)->get();

        return view('pages.complain.trash')->with([
            'items' => $items
        ]);
    }
     public function undo($id)
    {
        //merestore data complain
        $items = Complain::onlyTrashed()->where('id',$id); 
        $items->restore();

        return back();
    }
    public function force($id)
    {
        //menghapus data sampah secara permanen sesuai $id
        $items = Complain::onlyTrashed()->where('id',$id); 
        $items->forceDelete();

        return back();
    }
    public function setStatus(Request $request,$id)
    {
        //validasi stauts ,ijka data tidak sesuai data tidak akan di masukkan
        $request->validate([
            'status' => 'required|in:pending,success,failed'
        ]);
        //mencari data complain
        $item = Complain::findOrFail($id);
        $item->status = $request->status;
        //menyimpan updatean status complain
        $item->save();

        return back();
    }
    public function details($id)
    {  
        //mencari data complain sesuaai id
        $data = Complain::findOrFail($id);
        //mencari data galeri sesuai id_complian dan dengan is devault 1 dan hanya 3 yang akan di tampilkan
        $items = Gallerie::with('galleries')->where('complaints_id', $id )->where('is_default',1)->paginate(3);

        return view('pages.officer.show')->with([
            'data' => $data,
            'items' => $items,
        ]);
    }
    public function list($id)
    {  
        //mencari user berdasarkan id
        $user = User::findOrFail($id);
        //mencari data complain berdasarkan user id
        $items = Complain::where('user_id', $id)->orderBy('id','DESC')->get();

        return view('pages.complain.list')->with([
            'items' => $items,
            'user' => $user,
        ]);
    }
}
