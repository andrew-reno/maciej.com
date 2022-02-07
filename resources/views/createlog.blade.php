<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>eLogbooks - Create Log</title>
		<link rel="stylesheet"   href="css/style.css">	
    </head>
    <body class="antialiased">
	<div class="logo"></div>
		<h1>Create Logs</h1>
		<div class="status"></div>
		 @include('partials.nav')
		   <!-- MIDWAY NAV END -->
        	 <div class="mini_container">
					<!-- BEGIN CREATE LOG VIEW -->
			 		<form action="savelog" method="POST" enctype="multipart/form-data" action="rsvp">
						{{ method_field('POST') }}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="form_purpose" value="create_new_log">
						<div class="formCtrls">
							<label  for="active">Properties:</label>
							<div style="padding:0em 0em 1em 0em">
								<select name="property">
									<option value="" selected >Look Up Data List</option>
									<option value="1">City Office Block</option>
									<option value="2">A Caravan Site</option>
									<option value="3">Council Estate</option>
								</select>
							</div>
						</div>
						<div class="formCtrls">
							<label for="summary" data-name="summary">Summary:</label>
							<textarea class="summary" name="summary" maxlength="150" style="height: 50px;"></textarea>
						</div>
						<div class="formCtrls">
							<label for="description" data-name="description">Description:</label>
							<textarea class="expand" name="description" maxlength="500" style="height: 100px;"></textarea>
						</div>
						<input type="submit" class="submitButton" id="formSave" style="" name="save" value="Save">
				</form>
			 <!-- END CREATE LOG VIEW  --></div> 
    </body>
      @include('partials.footer_scripts') 
</html>