<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class master_kategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('master_kategori')->insert([
            [
                'kode'              => 'KTG-F01',
                'nama_kategori'     => 'Makanan',
                'deskripsi'         => 'Food/Beverage',
                'status'            => 1,
                'dibuat_kapan'      => date('Y-m-d H:i:s'),
                'dibuat_oleh'       => 1,
                'diperbarui_kapan'  => null,
                'diperbarui_oleh'   => null,
            ],
            [
                'kode'              => 'KTG-F02',
                'nama_kategori'     => 'Minuman',
                'deskripsi'         => 'Food/Beverage',
                'status'            => 1,
                'dibuat_kapan'      => date('Y-m-d H:i:s'),
                'dibuat_oleh'       => 1,
                'diperbarui_kapan'  => null,
                'diperbarui_oleh'   => null,
            ]

        ]);
    }
}
