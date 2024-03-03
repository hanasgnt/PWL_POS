<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 1,
                'barang_kode' => 'BRG001',
                'barang_nama' => 'Laptop',
                'harga_beli' => 800,
                'harga_jual' => 1200,
            ],
            [
                'kategori_id' => 2,
                'barang_kode' => 'BRG002',
                'barang_nama' => 'T-shirt',
                'harga_beli' => 20,
                'harga_jual' => 35,
            ],
            [
                'kategori_id' => 3,
                'barang_kode' => 'BRG003',
                'barang_nama' => 'Toaster',
                'harga_beli' => 30,
                'harga_jual' => 50,
            ],
            [
                'kategori_id' => 4,
                'barang_kode' => 'BRG004',
                'barang_nama' => 'Ensiklopedia',
                'harga_beli' => 15,
                'harga_jual' => 25,
            ],
            [
                'kategori_id' => 5,
                'barang_kode' => 'BRG005',
                'barang_nama' => 'Football',
                'harga_beli' => 40,
                'harga_jual' => 60,
            ],
            [
                'kategori_id' => 1,
                'barang_kode' => 'BRG006',
                'barang_nama' => 'Desktop Computer',
                'harga_beli' => 1200,
                'harga_jual' => 1800,
            ],
            [
                'kategori_id' => 2,
                'barang_kode' => 'BRG007',
                'barang_nama' => 'Jeans',
                'harga_beli' => 25,
                'harga_jual' => 35,
            ],
            [
                'kategori_id' => 3,
                'barang_kode' => 'BRG008',
                'barang_nama' => 'Blender',
                'harga_beli' => 50,
                'harga_jual' => 80,
            ],
            [
                'kategori_id' => 4,
                'barang_kode' => 'BRG009',
                'barang_nama' => 'Mystery Novel',
                'harga_beli' => 18,
                'harga_jual' => 30,
            ],
            [
                'kategori_id' => 5,
                'barang_kode' => 'BRG010',
                'barang_nama' => 'Basketball',
                'harga_beli' => 35,
                'harga_jual' => 55,
            ],
        ];
        DB::table('m_barang')->insert($data);
    }
}
