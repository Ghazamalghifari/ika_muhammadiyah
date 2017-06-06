<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder; 
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Session;
use App\Keterangan_ika;
use App\Ketua_ika;
use App\Angkatan;
use App\Alumni;
use App\Event;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ketua_angkatan = Ketua_ika::with(['angkatan','alumni'])->get();
        $keterangan = Keterangan_ika::select(['id','jumlah_anggota','jumlah_event','jumlah_angkatan'])->first();
        $event = Event::select(['id','nama_event','tanggal_event','waktu_event','keterangan_event','status_event'])->get();

        return view('home',['ketua_angkatan' => $ketua_angkatan,'keterangan' => $keterangan,'event' => $event]);
    }
}
