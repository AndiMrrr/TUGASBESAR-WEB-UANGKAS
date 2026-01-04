<?php

namespace Database\Seeders;

use App\Models\Kas;
use Illuminate\Database\Seeder;

class KasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat 5 data pemasukan
        Kas::factory(5)->pemasukan()->create();

        // Buat 5 data pengeluaran
        Kas::factory(5)->pengeluaran()->create();

        // Atau buat 10 data random
        // Kas::factory(10)->create();
    }
}
