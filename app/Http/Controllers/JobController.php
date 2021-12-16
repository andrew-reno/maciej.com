<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Property;
use App\Controller\PropertyController;
use Illuminate\Support\Facades\DB;
 
class JobController extends Controller
{
     	
    public  $id, $summary, $description, $status;
	
	public  $property; // Type property
	
	public function __construct()
	{
		$this->id 		= NULL;
		$this->property = new Property;
	}
 
 	// Create a new job/log
	public function NewLog()
	{
		$required 	= array('property','summary', 'description');
		 
		// Loop over field names, make sure each one exists and is not empty
		foreach($required as $field) 
		{
			
			if (empty( $this->SanitiseInput($_POST[$field]) ) ) 
			{
				$error = true;
				if( $missing )
					$missing .= ", ";
				$missing .= $field; 
			}
		}

		if($error) 
		{
			$data['error'] = 1;
			$data['msg'] = "All fields are required. Missing: ". ucwords($missing);
			return $data; 
		}  
		
		// Status 0 Closed | Status 1 = 0pen | Status 2 Complete | Status 3 Danger / Urgent
		// Insert new record to Job table
		$data['status'] = DB::table('job')->insertOrIgnore([
			 	[	
			 	'id' 					=> $request->input('id'),
			 	'summary' 				=> $request->input('schedule_id'), 
			 	'description' 			=> $request->input('description'),
			 	'status' 				=> $request->input('status'),  
			 	'property_id' 			=> $request->input('user_id'),  
				]
			]);
 
		$data['msg'] = "Data saved! <!--  DEBUG [$query] -->"  ;
		return $data;
	}
 
	public function NewLogTemplate()
	{
		
			$b = "<div class=\"mini_container\">
					<!-- BEGIN CREATE LOG VIEW -->
			 		<form method=\"post\" id=\"client_profile\" >

						<h2>New Job: </h2> 
						<input type=\"hidden\" name=\"form_purpose\" value=\"create_new_log\">
						
						<div class=\"formCtrls\">
							<label  for=\"active\">Properties:</label>
							<div style=\"padding:0em 0em 1em 0em\">
								<select name=\"property\">
									<option value=\"\" selected >Look Up Data List</option>
									<option value=\"1\">City Office Block</option>
									<option value=\"2\">A Caravan Site</option>
									<option value=\"3\">Council Estate</option>
								</select>
							</div>
						</div>

						<div class=\"formCtrls\">
							<label for=\"summary\" data-name=\"summary\">Summary:</label>
							<textarea class=\"summary\" name=\"summary\" maxlength=\"150\" style=\"height: 50px;\"></textarea>
						</div>
	 
						<div class=\"formCtrls\">
							<label for=\"description\" data-name=\"description\">Description:</label>
							<textarea class=\"expand\" name=\"description\" maxlength=\"500\" style=\"height: 100px;\"></textarea>
						</div>

						<input type=\"submit\" class=\"submitButton\" id=\"formSave\" style=\"\" name=\"save\" value=\"Save\">
				</form>

			 <!-- END CREATE LOG VIEW  --></div>";
 
 		return $b;
	}
	
	public function ViewLogTemplate()
	{
		$query = "SELECT * FROM ".DB_NAME_1.".".DB_TABLE_1." 
					JOIN .".DB_TABLE_2." p ON p.id =  ".DB_TABLE_1.".property_id 
					ORDER BY ".DB_TABLE_1.".id  ASC ";
		 
		// echo $query;

		$result = $this->mysqli->query($query);
		
		if($result->num_rows < 1)
		  return  "NO DB LOG RECORDS ".$query." MYSQLI ERROR " .$this->mysqli->error ;
		 
		 
 		$obuff = NULL;
 
		$obuff =" <!-- BEGIN LOG TABLE -->
		<table style=\"width: 100%; border-collapse: collapse;margin: 1em 0em;\">
		  <tr>
		    <th>ID</th>
		    <th>Status</th>
		    <th>Summary</th>
		    <th>Description</th>
		    <th>Property</th>
		     <th>Raised By <!-- Manager --></th>
		  </tr>";

		// Property name is an address ?	
		while($obj = $result->fetch_object())
		{
 			 $addr = json_decode($obj->name);
 			 if(json_last_error() == JSON_ERROR_NONE )
				$obuff .=  
				"<tr>
					<td>".$obj->id."</td>
					<td>".$this->JobStatus($obj->status)."</td>
					<td>".$obj->summary."</td>
					<td>".$obj->description."</td>
					<td>".$addr->Line1.",... ".$addr->Postcode."</td>
					<td>".$obj->manager."</td>
				</tr>";
		}	
		 
		$obuff .= "</table><!-- END LOG TABLE -->";

		return $obuff. $this->DebugShow("Query  = $query | No rows = ".$result->num_rows." | Json error = ".json_last_error());
	}
	
	private function DebugShow($str)
	{
		if(DEBUG_MODE )
			echo $str;
	}
	
	// Access needed in view or make duplicate or make more complicated  ...
	public function JobStatus($int)
	{
		switch($int)
		{	case "0":
				return "Closed";
			break;
			case "1":
				return "Open";
			break;
			case "2":
				return "Complete";
			break;
			case "3":
				return "Urgent / Danger.. Crisis";
			break;
		}
	}
	
	private function SanitiseInput($str)
	{
		$str = trim($str);
		//$str = $this->mysqli->real_escape_string($str);
		$str = htmlentities($str);
		return $str;
	}
	
	public function ShowJobs()
	{
	 
		$jobs = DB::table('jobs')
        ->join('property', 'property.id', '=', 'jobs.property_id')
        ->get();
        return view('viewlogs')->with('jobs', $jobs);
	}
	
	public function CreateLog()
	{
	 
		 return view('createlogs')->with('jobs', $jobs);
	}
	
	public function SaveLog(Request $r)
	{
		 
  		$required 		= array('property','summary', 'description');
		$missing 		= NULL;
		$error 			= NULL;
		$data['status'] = 0;
		
		// Loop over field names, make sure each one exists and is not empty
		foreach($required as $field) 
		{
			if (empty( $this->SanitiseInput($_POST[$field]) ) ) 
			{
				$error = true;
				if( $missing )
					$missing .= ", ";
				$missing .= $field; 
			}
		}

		if($error) 
		{
			$data['error'] = 1;
			$data['msg'] = "All fields are required. Missing: ". ucwords($missing);
			return $data; 
		}  
		
		try 
		{
			 
			$data['status'] = DB::table('jobs')->insertOrIgnore([
			 	[	
			 	'property_id' 		=> $r->property, 
			 	'summary' 			=> $r->summary, 
			 	'description' 		=> $r->description,
			 	'status' 			=> "1",  
			 	'time_stamp' 		=> 'NULL'
				]
			]);
			
			if($data['status']  == 1)
			 $data['msg'] = "Data saved!"  ;
 	 
		}
		catch(\Illuminate\Database\QueryException $e)
		{
			$data['status'] = 0;
			$data['error'] 	= 1;
			$data['msg'] 	= $e->getMessage();
			return $data;
		}
		
		return $data;
	}
	
}
