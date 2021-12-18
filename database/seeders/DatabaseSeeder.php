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
            'id'			=> NULL,
            'property_id' 	=> 1,
            'description' 	=> "Electrician needed to fix car park light.",
            'summary' 		=> "Exterior Light Broken",
            'status' 		=> 1,
            'time_stamp'	=> NULL
        ]);

		// Property dropdown list #1
		 DB::table('properties')->insert([
		 	'id'			=> NULL,
			'name' 			=> "{\"Line1\":\"2 Grange Close\",\"Line2\":\"\",\"Line3\":\"\",\"City\":\"Bristol\",\"Postcode\":\"BS32 0AH\",\"Country\":\"United Kingdom\"}",
			'manager'		=> "Manager 1a",
			'geolocation'	=> "51.5436461,-2.5624881",
			'time_stamp'	=> NULL,
        ]
        );
        
        
        // Property dropdown list #3
         DB::table('properties')->insert([
		 	'id'			=> NULL,
			'name' 			=> "{\"Line1\":\"Woodhouse Park\",\"Line2\":\"\",\"Line3\":\"\",\"City\":\"Bristol\",\"Postcode\":\"BS32 0AH\",\"Country\":\"United Kingdom\"}",
			'manager'		=> "Manager 2b",
			'geolocation'	=> "51.5436461,-2.5624882",
			'time_stamp'	=> NULL,
        ]
        );
        
        // Property dropdown list #3
         DB::table('properties')->insert([
		 	'id'			=> NULL,
			'name' 			=> "{\"Line1\":\"Hilton Hotel, Aztec West\",\"Line2\":\"\",\"Line3\":\"\",\"City\":\"Bristol\",\"Postcode\":\"BS32 0AH\",\"Country\":\"United Kingdom\"}",
			'manager'		=> "Manager 3c",
			'geolocation'	=> "51.5436461,-2.5624883",
			'time_stamp'	=> NULL,
        ]
        );
        
        
    }
}
