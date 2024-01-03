<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('admins')->insert([
            'name' => 'Super admin',
            'role' => 'sa',
            'email' => 'sa@gmail.com',
            'password' => Hash::make('123456789'),
            'image' => 'a'
        ]);

        DB::table('admins')->insert([
            'name' => 'Admin',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'),
            'image' => 'b'
        ]);

        DB::table('admins')->insert([
            'name' => 'Admin Food',
            'role' => 'admin-food',
            'email' => 'adminfood@gmail.com',
            'password' => Hash::make('123456789'),
            'image' => 'b'
        ]);

        DB::table('admins')->insert([
            'name' => 'Admin Barang',
            'role' => 'admin-barang',
            'email' => 'adminbarang@gmail.com',
            'password' => Hash::make('123456789'),
            'image' => 'b'
        ]);

        DB::table('foods')->insert([
            'id' => 1,
            'name' => "ayam",
            'image' => "a",
            'harga' => 4000
        ]);

        DB::table('foods')->insert([
            'id' => 2,
            'name' => "babi",
            'image' => "b",
            'harga' => 5000
        ]);

        DB::table('barangs')->insert([
            'id' => 1,
            'name' => "HP",
            'image' => "a",
            'harga' => 400000
        ]);

        DB::table('barangs')->insert([
            'id' => 2,
            'name' => "Laptop",
            'image' => "b",
            'harga' => 500000
        ]);

       

    }
}
