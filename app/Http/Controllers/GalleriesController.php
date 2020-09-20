<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//memanggil gallerie
use App\Gallerie;
//memnaggil complain
use App\Complain;
//delet gambaar
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\GalleriesRequest;

class GalleriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //authentivication login
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleriesRequest $request)
    {
        //mengambil data
        $data = $request->all();
        //menyimpan foto di public/storage/galleries
        $data['photo'] = $request->file('photo')->store(
            'assets/gallerie','public'
         );

        //menyimpan data
        Gallerie::create($data);
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
        //menampilkan data berdasrkan id complain
        $data = Complain::findOrFail($id);
        //menampilkan data gambar berdasrkan id complain
        $items = Gallerie::with('galleries')->where('complaints_id', $id)->get();
        return view('pages.galleries.index')->with([
            'items' => $items,
            'data' => $data
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
        Gallerie::where('id',$id)->delete();
        //pengalamatan langsung, menghindari web.php
        return back();
    }
    public function picture($id)
    {
        //menampilkan data complain berdasarkan id
        $items = Complain::findOrFail($id);;
        return view('pages.galleries.create')->with([
            'items' => $items
        ]);
    }
}
