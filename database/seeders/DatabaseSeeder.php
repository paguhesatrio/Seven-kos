<?php

namespace Database\Seeders;

use App\Models\admin;
use App\Models\Jenis;
use App\Models\Category;
use App\Models\jenberita;
use App\Models\news;
use App\Models\Province;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Paguh',
            'username' => 'paguh',
            'email' => 'paguh2015@gmail.com',
            'password' => bcrypt('1234'),
            'is_admin' => '1',
            'is_superadmin' => '1',
        ]);

        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('1234'),
            'is_admin' => '1',
        ]);

        User::create([
            'name' => 'superadmin',
            'username' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('1234'),
            'is_superadmin' => '1',
        ]);

        User::factory(2)->create();

        // ====================================================



        Jenis::create([
            'name' => 'Kos Laki Laki',
            'slug' => 'Kos-Laki-Laki',
        ]);

        Jenis::create([
            'name' => 'Kos Perempuan',
            'slug' => 'Kos-Perempuan',
        ]);

        Jenis::create([
            'name' => 'Kos Campur',
            'slug' => 'Kos-Campur',
        ]);

         // ====================================================

         jenberita::create([
            'name' => 'Universitas',
            'slug' => 'Universitas',
        ]);

        jenberita::create([
            'name' => 'Wisata',
            'slug' => 'Wisata',
        ]);

        jenberita::create([
            'name' => 'Kuliner',
            'slug' => 'Kuliner',
        ]);

        //=======================================================
        news::factory(3)->create();


    }

}
