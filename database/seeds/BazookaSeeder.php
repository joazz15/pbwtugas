<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BazookaSeeder extends Seeder
{
    /**
     * 
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        $senjata = [
            'Sub Machine Gun' => ['M249 SAW', 'M60', 'PKM'],
            'Sniper' => ['M24', 'M82', 'Dragunov', 'AWM'],
            'Pistol' => ['Glock 17', 'Beretta 92', 'SIG Sauer P226', 'M1911'],
            'Assasult Rifle' => ['AK-47', 'M16', 'SCAR-L', 'H&K G36'],
        ];

        $data = [];
        $total_data = 100; 
        $counter = 0;

        for ($i = 0; $i < $total_data; $i++) {
            foreach ($senjata as $jenis => $senjata_per_jenis) {
                foreach ($senjata_per_jenis as $nama_senjata) {
                    $data[] = [
                        'nama_senjata' => $nama_senjata,
                        'jenis_senjata' => $jenis,
                        'jumlah' => $faker->numberBetween(5, 20),
                        'harga' => $faker->numberBetween(1000000, 3000000),
                        'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                        'updated_at' => $faker->dateTimeBetween('-1 year', 'now'),
                    ];
                    $counter++;

                    if ($counter >= $total_data) {
                        break 3;
                    }
                }
            }
        }

        DB::table('bazooka')->insert($data);

    }
}
