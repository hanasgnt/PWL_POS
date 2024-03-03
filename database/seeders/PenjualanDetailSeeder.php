<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        // Fetch all products from the m_barang table
        $products = DB::table('m_barang')->select('barang_id', 'harga_jual')->get();

        // Generate 30 rows for t_penjualan_detail
        for ($i = 1; $i <= 10; $i++) {
            // Each penjualan_id has three associated details
            for ($j = 1; $j <= 3; $j++) {
                // Get random product
                $product = $products->shuffle();
                $product = $products->random();

                // Get random jumlah
                $jumlah = rand(1, 10);

                // Add data to the array
                $data[] = [
                    'penjualan_id' => $i,
                    'barang_id' => $product->barang_id,
                    'harga' => $product->harga_jual,
                    'jumlah' => $jumlah,
                    'created_at' => DB::table('t_penjualan')->where('penjualan_id', $i)->value('penjualan_tanggal'),
                ];
            }
        }
        DB::table('t_penjualan_detail')->insert($data);
    }
}
