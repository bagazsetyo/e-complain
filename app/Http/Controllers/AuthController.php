<?php

namespace App\Http\Controllers;

//memanggil request UserStore untuk validasi
use App\Http\Requests\UserStoreRequest;
//validdasi bawaan
use Illuminate\Http\Request;
//memnggil app user
use App\User;
//mengacak password
use Hash;

class AuthController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */

     //function ini berfungsi agar user yang belum login akan di lempar ke halaman login
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
        //mengambil data dari tabel user dengan level admin
        //data yang di ambil di simpan dengan variabel $items

        $items = User::where('level','admin')->get();
        //menuju ke halaman view dan masuk di folder pages auth index dengan menyertakan variabel items
        return view('pages.auth.index')->with([
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
        //menuju ke halaman view dan masuk ke folder pages/auth/create.blade.php
        return view('pages.auth.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
       //mengambil semua request dan di tampung di variabel $user selanjutnya data di simpan
       $user = new User();
       $user->name = $request['name'];
       $user->email = $request['email'];
       $user->level = $request['level'];
       $user->number = 0;
       //hash untuk mengacak data
       $user->password = Hash::make($request['password']);
       //menyimoan data
       $user->save();
       //menuju ke halaman pages.auth.create.blade.php
       return view('pages.auth.create')->with('succes','user can be created');
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
        //mengambil data user berdasarkan id
        //findOrFail, jika tidak di temukan maka akan di bawa ke halaman 404 
        $items = User::findOrFail($id);
        //menuju ke halaman pages.auth.edit di volder view dengan menyertakn $items
        return view('pages.auth.edit')->with([
            'items' => $items
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
        //menampung semua data request
        $data = $request->all();

        //findOrFail, jika tidak di temukan maka akan di bawa ke halaman 404 
        $item = User::findOrFail($id);
        //mengupdate data
        $item->update($data);

        //kembali ke halaman dashboard
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //findOrFail, jika tidak di temukan maka akan di bawa ke halaman 404 
        $item = User::findOrFail($id);
        //mendelet data sementara (karena menggunakan softdelet)
        $item->delete();

        //kembali ke halaman tadi
        return back();
    }
    
    public function officer()
    {

        //mengambil data dari tabel user dengan level officer
        //data yang di ambil di simpan dengan variabel $items
        $items = User::where('level','officer')->get();
        //data di bawa ke folder pages.auth.index.php
        return view('pages.auth.index')->with([
            'items' => $items
        ]);
    }
    
    public function community()
    {
        //mengambil data dari tabel user dengan level public
        //data yang di ambil di simpan dengan variabel $items
        $items = User::where('level','public')->get();
        //data di bawa ke folder pages.auth.index.php
        return view('pages.auth.index')->with([
            'items' => $items
        ]);
    }
    
    public function authtrash()
    {
        //mengambil data user yang terkena softdelet
        $items = User::onlyTrashed()->get();
        //data di bawa ke pages/auth/trash.blade.php
        return view('pages.auth.trash')->with([
            'items' => $items
        ]);
    }

    public function undo($id)
    {
        //merestore data user agar bisa di gunakan lagi
        $items = User::onlyTrashed()->where('id',$id); 
        $items->restore();

        return back();
    }
    public function force($id)
    {
        //melakukan delete peremanen
        $items = User::onlyTrashed()->where('id',$id); 
        $items->forceDelete();

        return back();
    }
    // public function editauth()
    // {
    //     return view('pages.auth.authedit');
    // }
}
