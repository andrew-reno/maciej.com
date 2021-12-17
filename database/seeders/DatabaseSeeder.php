<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

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
        //id, description, summary, status, property_id
        DB::table('jobs')->insert([
            'description' 	=> "Electrician needed to fix car park light.",
            'summary' 		=> "Exterior Light Broken",
            'status' 		=> 1,
            'property_id' 	=> 1 
        ]);

		// id, name, manager, geolocation
		 DB::table('properties')->insert([
			'name' 			=> "{\"Line1\":\"2 Grange Close\",\"Line2\":\"\",\"Line3\":\"\",\"City\":\"Bristol\",\"Postcode\":\"BS32 0AH\",\"Country\":\"United Kingdom\"}",
			'manager'		=> "A R",
			'geolocation'	=> "51.5436461,-2.5624883"
        ]
        );
        
    }
}
