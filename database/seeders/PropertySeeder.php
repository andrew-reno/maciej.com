<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // id, name, manager, geolocation
		 DB::table('properties')->insert([
			'name' 			=> "{\"Line1\":\"2 Grange Close\",\"Line2\":\"\",\"Line3\":\"\",\"City\":\"Bristol\",\"Postcode\":\"BS32 0AH\",\"Country\":\"United Kingdom\"}",
			'manager'		=> "A R Property Seeder",
			'geolocation'	=> "51.5436461,-2.5624883",
			'time_stamp'	=> NULL
        ]
        );
    }
}
