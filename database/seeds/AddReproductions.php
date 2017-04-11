<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AddReproductions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDayDateTimeString();;
        DB::table('reproductions')->insert(
            [
                [   'reproduction_name'=>'OC',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [   'reproduction_name'=>'ЭС',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [   'reproduction_name'=>'РС-1',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [   'reproduction_name'=>'РС-2',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [   'reproduction_name'=>'F1',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [   'reproduction_name'=>'ППР',
                    'created_at' => $now,
                    'updated_at' => $now
                ]
            ]

        );
    }
}
