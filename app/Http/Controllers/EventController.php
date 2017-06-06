<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Daftar_event;
use App\Event;
use App\Keterangan_ika;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $event = Event::select(['id','nama_event','tanggal_event','waktu_event','keterangan_event','status_event']);
            return Datatables::of($event)
                ->addColumn('action', function($events){
                    return view('datatable._action_event', [
                        'model'    => $events,
                        'form_url' => route('event.destroy', $events->id),
                        'edit_url' => route('event.edit', $events->id),
                        'show_url' => route('event.show', $events->id),
                        'confirm_message' => 'Yakin Mau Mengapus Event ' . $events->nama_event . '?'
                        ]);
                })->make(true);
        }

        $html = $htmlBuilder
         ->addColumn(['data' => 'nama_event', 'name' => 'nama_event', 'title' => 'Nama Event'])
         ->addColumn(['data' => 'tanggal_event', 'name' => 'tanggal_event', 'title' => 'Tanggal Event'])
         ->addColumn(['data' => 'waktu_event', 'name' => 'waktu_event', 'title' => 'Waktu Event'])
         ->addColumn(['data' => 'keterangan_event', 'name' => 'keterangan_event', 'title' => 'Keterangan Event'])
         ->addColumn(['data' => 'action', 'name'=>'action','title'=>'', 'orderable'=>false, 'searchable'=>false]);

         return view('event.index')->with(compact('html'));   
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('event.create');
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
            'nama_event'=>'required|max:225',
            'tanggal_event'=>'required|max:225',
            'waktu_event'=>'required|max:225',
            'keterangan_event'=>'required|max:225']);

        $jumlah_anggota = Keterangan_ika::find(1)->first();   
        $jumlah_anggota->jumlah_event  +=1 ;
        $jumlah_anggota->save();  

        $event = Event::create($request->all()); 
        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil Menambah Event Alumni"
            ]);
        return redirect()->route('event.index');
    }

    public function daftar_event(Request $request,$id)
    {
        // 
        return redirect()->route('event.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(Request $request, Builder $htmlBuilder,$id)
    {
        if ($request->ajax()) {
            $daftar_event = Daftar_event::with(['event','alumni'])->where('id',$id);
            return Datatables::of($daftar_event)
                ->addColumn('action', function($daftar_events){
                    return view('datatable.daftar_event', [
                        'model'    => $daftar_events,
                        'form_url' => route('daftar_event.destroy', $daftar_events->id),
                        'edit_url' => route('daftar_event.edit', $daftar_events->id),
                        'show_url' => route('daftar_event.show', $daftar_events->id),
                        'confirm_message' => 'Yakin Mau Mengapus daftar_event ' . $daftar_events->daftar_event . '?'
                        ]);
                })->make(true);
        }

        $html = $htmlBuilder
         ->addColumn(['data' => 'alumni.nama', 'name' => 'alumni.nama', 'title' => 'Nama Event']) 
         ->addColumn(['data' => 'keterangan_pendaftaran', 'name' => 'keterangan_pendaftaran', 'title' => 'Keterangan'])
         ->addColumn(['data' => 'action', 'name'=>'action','title'=>'', 'orderable'=>false, 'searchable'=>false]);

         return view('event.daftar',['id' => $id])->with(compact('html'));   
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
        $event = Event::find($id);
        return view('event.edit')->with(compact('event'));
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
          $event = Event::find($id);
        if(!$event->update($request->all())) return redirect()->back();

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Mengubah Event $event->nama_event"
            ]);
        return redirect()->route('event.index');
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
        $jumlah_anggota = Keterangan_ika::find(1)->first();   
        $jumlah_anggota->jumlah_event  -=1 ;
        $jumlah_anggota->save();   
        Event::destroy($id);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Event Berhasil Di Hapus"
            ]);
        return redirect()->route('event.index');
    }
}
