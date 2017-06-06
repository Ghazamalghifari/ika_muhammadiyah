<?php

use Illuminate\Database\Seeder;
use App\Keterangan_ika;
use App\Angkatan;

class SempleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $keterangan_ika = new Keterangan_ika();
        $keterangan_ika->jumlah_anggota = "0";
        $keterangan_ika->jumlah_event = "0";
        $keterangan_ika->jumlah_angkatan = "0";
        $keterangan_ika->save();

        $angkatan = new Angkatan(); 
        $angkatan->nama_angkatan = "1";
        $angkatan->save();

        $angkatan = new Angkatan(); 
        $angkatan->nama_angkatan = "2";
        $angkatan->save();

        $angkatan = new Angkatan(); 
        $angkatan->nama_angkatan = "3";
        $angkatan->save();

        $angkatan = new Angkatan(); 
        $angkatan->nama_angkatan = "4";
        $angkatan->save();

        $angkatan = new Angkatan(); 
        $angkatan->nama_angkatan = "5";
        $angkatan->save();

        $angkatan = new Angkatan(); 
        $angkatan->nama_angkatan = "6";
        $angkatan->save(); 
    }
}
