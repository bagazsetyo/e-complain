<?php

namespace App\Http\Controllers;
//validasi bawaan
use Illuminate\Http\Request;
//memnggil complain
use App\Complain;
//memnggil gallerie
use App\Gallerie;
//memnggil user
use App\User;
//memnggil pdf untuk cetak data
use PDF;

class DashboardController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
     //validasi login
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
        //menampilkan data complain berdasarkan id terbesar dan di ambil 6
        $items = Complain::orderBy('id','DESC')->take(6)->get();

        //menjumlahkan bagian yang pending,success,dan failed
        $pie = [
            'pending' => Complain::where('status','pending')->count(),
            'failed' => Complain::where('status','failed')->count(),
            'success' => Complain::where('status','success')->count(),
        ];

        return view('pages.dashboard')->with([
            'items' => $items,
            'pie' => $pie,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengarahkan ke halaman pages/auth/create
        return view('pages.auth.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }
    public function pdf($id)
    {
        //menampilkan data data untuk pdf
        $items = Complain::findOrFail($id);
        $default = Gallerie::with('galleries')
                    ->where('complaints_id', $id )
                    ->where('is_default',1)
                    ->take(1)
                    ->get();
        $default2 = Gallerie::with('galleries')
                    ->where('complaints_id', $id )
                    ->where('is_default',1)
                    ->take(1)
                    ->get();
        $user = User::where('level', 'public')->get();
        $data = Gallerie::with('galleries')->where('complaints_id', $id)->get();

        return view('pages.pdf.index')->with([
            'items' => $items,
            'default' => $default,
            'default2' => $default2,
            'user' => $user,
            'data' => $data,
        ]);
    }
    public function cetakpdf($id)
    {   
        //menampilakn data user dan complainnya
        $items = Complain::where('user_id', $id)->orderBy('id','DESC')->get();
        $user = User::findOrFail($id);
        //mencetak data tersebut
        $pdf = PDF::loadview('pages.pdf.cetakpdf',['items'=>$items,'user'=>$user]);
        return $pdf->download('laporan-pdf');
    }
    public function manual()
    {   
       return view('pages.user_manual');
    }

}
