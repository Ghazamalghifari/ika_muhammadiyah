<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Angkatan;
use App\Keterangan_ika;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class AngkatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $angkatan = Angkatan::select(['id','nama_angkatan']);
            return Datatables::of($angkatan)
                ->addColumn('action', function($angkatans){
                    return view('datatable._action', [
                        'model'    => $angkatans,
                        'form_url' => route('angkatan.destroy', $angkatans->id),
                        'edit_url' => route('angkatan.edit', $angkatans->id),
                        'confirm_message' => 'Yakin Mau Mengapus Master Angkatan ' . $angkatans->nama_angkatan . '?'
                        ]);
                })->make(true);
        }

        $html = $htmlBuilder
         ->addColumn(['data' => 'nama_angkatan', 'name' => 'nama_angkatan', 'title' => 'Angkatan'])
         ->addColumn(['data' => 'action', 'name'=>'action','title'=>'', 'orderable'=>false, 'searchable'=>false]);

         return view('angkatan.index')->with(compact('html'));   
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('angkatan.create');
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
        $this->validate($request,[
            'nama_angkatan'=>'required|unique:angkatans']);

        $jumlah_anggota = Keterangan_ika::find(1);   
        $jumlah_anggota->jumlah_angkatan  +=1 ;
        $jumlah_anggota->save();  

        $angkatan = Angkatan::create($request->only('nama_angkatan'));
        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil Menambah Master Angkatan $angkatan->nama_angkatan"
            ]);
        return redirect()->route('angkatan.index');
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
        $angkatan = Angkatan::find($id);
        return view('angkatan.edit')->with(compact('angkatan'));
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
          $angkatan = Angkatan::find($id);
        if(!$angkatan->update($request->all())) return redirect()->back();

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Mengubah Angkatan $angkatan->nama_angkatan"
            ]);
        return redirect()->route('angkatan.index');
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
        $jumlah_anggota = Keterangan_ika::find(1);   
        $jumlah_anggota->jumlah_angkatan  -=1 ;
        $jumlah_anggota->save();  

        Angkatan::destroy($id);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Angkatan Berhasil Di Hapus"
            ]);
        return redirect()->route('angkatan.index');
    }
}
