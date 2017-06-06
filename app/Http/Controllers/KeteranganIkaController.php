<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keterangan_ika;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class KeteranganIkaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $keterangan = Keterangan_ika::select(['id','jumlah_anggota','jumlah_event','jumlah_angkatan']);
            return Datatables::of($keterangan)->make(true);
        }

        $html = $htmlBuilder
         ->addColumn(['data' => 'jumlah_anggota', 'name' => 'jumlah_anggota', 'title' => 'Jumlah Anggota Alumni'])
         ->addColumn(['data' => 'jumlah_event', 'name' => 'jumlah_event', 'title' => 'Jumlah Event'])
         ->addColumn(['data' => 'jumlah_angkatan', 'name' => 'jumlah_angkatan', 'title' => 'Jumlah Event']);

         return view('keterangan.index')->with(compact('html'));   
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
}
