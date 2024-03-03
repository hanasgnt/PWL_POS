<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penjualanData = [
            [
                'user_id' => 3,
                'pembeli' => 'Sarah Brown',
                'penjualan_kode' => 'PJN001',
                'penjualan_tanggal' => '2024-01-03 10:15:00',
                'created_at' => '2024-01-03 10:15:00',
            ],
            [
                'user_id' => 2,
                'pembeli' => 'Michael Lee',
                'penjualan_kode' => 'PJN002',
                'penjualan_tanggal' => '2024-01-03 14:00:00',
                'created_at' => '2024-01-03 14:00:00',
            ],
            [
                'user_id' => 1,
                'pembeli' => 'Emily White',
                'penjualan_kode' => 'PJN003',
                'penjualan_tanggal' => '2024-02-03 20:15:00',
                'created_at' => '2024-02-03 20:15:00',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Sarah Brown',
                'penjualan_kode' => 'PJN004',
                'penjualan_tanggal' => '2024-02-03 17:45:00',
                'created_at' => '2024-02-03 17:45:00',
            ],
            [
                'user_id' => 2,
                'pembeli' => 'Michael Lee',
                'penjualan_kode' => 'PJN005',
                'penjualan_tanggal' => '2024-02-13 15:15:00',
                'created_at' => '2024-02-13 15:15:00',
            ],
            [
                'user_id' => 1,
                'pembeli' => 'Emily White',
                'penjualan_kode' => 'PJN006',
                'penjualan_tanggal' => '2024-02-13 16:30:00',
                'created_at' => '2024-02-13 16:30:00',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Sarah Brown',
                'penjualan_kode' => 'PJN007',
                'penjualan_tanggal' => '2024-02-22 21:30:00',
                'created_at' => '2024-02-22 21:30:00',
            ],
            [
                'user_id' => 2,
                'pembeli' => 'Michael Lee',
                'penjualan_kode' => 'PJN008',
                'penjualan_tanggal' => '2024-02-23 19:00:00',
                'created_at' => '2024-02-23 19:00:00',
            ],
            [
                'user_id' => 1,
                'pembeli' => 'Emily White',
                'penjualan_kode' => 'PJN009',
                'penjualan_tanggal' => '2024-02-26 11:30:00',
                'created_at' => '2024-02-26 11:30:00',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Sarah Brown',
                'penjualan_kode' => 'PJN010',
                'penjualan_tanggal' => '2024-03-01 12:45:00',
                'created_at' => '2024-03-01 12:45:00',
            ],
        ];

        DB::table('t_penjualan')->insert($penjualanData);
    }
}
