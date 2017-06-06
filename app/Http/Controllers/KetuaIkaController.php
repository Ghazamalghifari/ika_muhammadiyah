<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ketua_ika;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class KetuaIkaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $ketua_angkatan = Ketua_ika::with(['angkatan','alumni']);
            return Datatables::of($ketua_angkatan)
                ->addColumn('action', function($ketua_angkatans){
                    return view('datatable._action', [
                        'model'    => $ketua_angkatans,
                        'form_url' => route('ketua_angkatan.destroy', $ketua_angkatans->id),
                        'edit_url' => route('ketua_angkatan.edit', $ketua_angkatans->id),
                        'confirm_message' => 'Yakin Mau Mengapus Ketua Angkatan ?'
                        ]);
                })->make(true);
        }

        $html = $htmlBuilder
         ->addColumn(['data' => 'id', 'name' => 'id', 'title' => 'ID'])
         ->addColumn(['data' => 'angkatan.nama_angkatan', 'name' => 'angkatan.nama_angkatan', 'title' => 'Angkatan'])
         ->addColumn(['data' => 'alumni.name', 'name' => 'alumni.name', 'title' => 'Ketua Angkatan'])
         ->addColumn(['data' => 'action', 'name'=>'action','title'=>'', 'orderable'=>false, 'searchable'=>false]);

         return view('ketua_angkatan.index')->with(compact('html'));   
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ketua_angkatan.create');
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
            'id_angkatan'=>'required|unique:ketua_ikas',
            'id_user'=>'required|unique:ketua_ikas']);

        $ketua_angkatan = Ketua_ika::create($request->all()); 
        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil Menambah Ketua Angkatan"
            ]);
        return redirect()->route('ketua_angkatan.index');
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
        $ketua_angkatan = Ketua_ika::find($id);
        return view('ketua_angkatan.edit')->with(compact('ketua_angkatan'));
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
        $ketua_angkatan = Ketua_ika::find($id);
        if(!$ketua_angkatan->update($request->all())) return redirect()->back();

        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil Mengubah Ketua Angkatan"
            ]);
        return redirect()->route('ketua_angkatan.index');
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
        Ketua_ika::destroy($id);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Ketua Angkatan Berhasil Di Hapus"
            ]);
        return redirect()->route('ketua_angkatan.index');
    }
}
