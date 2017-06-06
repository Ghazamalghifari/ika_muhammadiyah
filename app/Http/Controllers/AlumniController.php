<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumni;
use App\Angkatan;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $alumni = Alumni::with(['angkatan']);
            return Datatables::of($alumni)
                ->addColumn('action', function($alumnis){
                    return view('datatable._action_member', [
                        'model'    => $alumnis,
                        'form_url' => route('alumni.destroy', $alumnis->id),
                        'edit_url' => route('alumni.edit', $alumnis->id),
                        'confirm_message' => 'Yakin Mau Mengapus Anggota Alumni ' . $alumnis->name . '?'
                        ]);
                })->make(true);
        }

        $html = $htmlBuilder
         ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Nama Anggota'])
         ->addColumn(['data' => 'angkatan.nama_angkatan', 'name' => 'angkatan.nama_angkatan', 'title' => 'Angkatan'])
         ->addColumn(['data' => 'email', 'name' => 'email', 'title' => 'Email Anggota'])
         ->addColumn(['data' => 'jenis_kelamin', 'name' => 'jenis_kelamin', 'title' => 'Jenis Kelamin'])
         ->addColumn(['data' => 'kontak', 'name' => 'kontak', 'title' => 'Kontak'])
         ->addColumn(['data' => 'kategori_kontak', 'name' => 'kategori_kontak', 'title' => 'Kategori Kontak'])
         ->addColumn(['data' => 'pemilik_kontak', 'name' => 'pemilik_kontak', 'title' => 'Pemilik Kontak'])
         ->addColumn(['data' => 'alamat', 'name' => 'alamat', 'title' => 'Alamat'])
         ->addColumn(['data' => 'action', 'name'=>'action','title'=>'', 'orderable'=>false, 'searchable'=>false]);
            
         $angkatan = Angkatan::select(['id','nama_angkatan'])->get();
         return view('alumni.index',['angkatan'=>$angkatan])->with(compact('html'));   
     }


     public function filter_angkatan(Request $request, Builder $htmlBuilder,$id)
    {
        if ($request->ajax()) {
            $alumni = Alumni::with(['angkatan'])->where('id_angkatan',$id);
            return Datatables::of($alumni)
                ->addColumn('action', function($alumnis){
                    return view('datatable._action_member', [
                        'model'    => $alumnis,
                        'form_url' => route('alumni.destroy', $alumnis->id),
                        'edit_url' => route('alumni.edit', $alumnis->id),
                        'confirm_message' => 'Yakin Mau Mengapus Anggota Alumni ' . $alumnis->name . '?'
                        ]);
                })->make(true);
        }

        $html = $htmlBuilder
         ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Nama Anggota'])
         ->addColumn(['data' => 'angkatan.nama_angkatan', 'name' => 'angkatan.nama_angkatan', 'title' => 'Angkatan'])
         ->addColumn(['data' => 'email', 'name' => 'email', 'title' => 'Email Anggota'])
         ->addColumn(['data' => 'jenis_kelamin', 'name' => 'jenis_kelamin', 'title' => 'Jenis Kelamin'])
         ->addColumn(['data' => 'kontak', 'name' => 'kontak', 'title' => 'Kontak'])
         ->addColumn(['data' => 'kategori_kontak', 'name' => 'kategori_kontak', 'title' => 'Kategori Kontak'])
         ->addColumn(['data' => 'pemilik_kontak', 'name' => 'pemilik_kontak', 'title' => 'Pemilik Kontak'])
         ->addColumn(['data' => 'alamat', 'name' => 'alamat', 'title' => 'Alamat'])
         ->addColumn(['data' => 'action', 'name'=>'action','title'=>'', 'orderable'=>false, 'searchable'=>false]);

         $angkatan = Angkatan::select(['id','nama_angkatan'])->get();
         return view('alumni.index',['angkatan'=>$angkatan])->with(compact('html'));   
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
        Alumni::destroy($id);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Anggota Alumni Berhasil Di Hapus"
            ]);
        return redirect()->route('alumni.index');
    }
}
