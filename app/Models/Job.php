<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Job extends Model
{
    use HasFactory;
    
    public $timestamps = true;
    
    protected $fillable = [
		'summary',
		'description',
		'property_id',
		'time_stamp' 
    ];
    
	   // Test database connection
	try {
	    DB::connection()->getPdo();
	} catch (\Exception $e) {
	    die("Could not connect to the database.  Please check your configuration. error:" . $e );
	}
	
    
}
 