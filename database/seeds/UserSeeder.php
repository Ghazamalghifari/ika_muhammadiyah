<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //membuat role admin
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "Admin";
        $adminRole->save();
        
        // Membuat sample admin
        $admin = new User();
        $admin->name= 'Admin Larapus';
        $admin->jenis_kelamin = '-';
        $admin->email = 'admin@gmail.com';
        $admin->id_angkatan = '1';
        $admin->kontak = '-';
        $admin->kategori_kontak = '-';
        $admin->pemilik_kontak = '-';
        $admin->alamat = '-';
        $admin->status = 'admin';
        $admin->password = bcrypt('rahasia');
        $admin->save();
        $admin->attachRole($adminRole);


        //membuat role member
        $memberRole = new Role();
        $memberRole->name = "member";
        $memberRole->display_name = "Member";
        $memberRole->save();
        
        // Membuat sample member
        $member = new User();
        $member->name= 'Member Larapus';
        $member->email = 'member@gmail.com';
        $member->jenis_kelamin = '-';
        $member->id_angkatan = '1';
        $member->kontak = '-';
        $member->kategori_kontak = '-';
        $member->pemilik_kontak = '-';
        $member->alamat = '-';
        $member->status = 'member';
        $member->password = bcrypt('rahasia');
        $member->save();
        $member->attachRole($memberRole);
    }
}
