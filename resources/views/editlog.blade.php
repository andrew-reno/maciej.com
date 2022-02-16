<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>eLogbooks - Edit Log</title>
		<link rel="stylesheet"   href="<?php echo getenv('APP_URL'); ?>/css/style.css">	
    </head>
    <body class="antialiased">
	<a href="dash"><div class="logo"></div></a>
		<div class="status"></div>
		<h1>Edit Logs</h1>
		 @include('partials.nav')
		   <!-- MIDWAY NAV END -->
        	 <div class="mini_container">
					<!-- BEGIN EDIT LOG VIEW -->
			 		<form action="patchlog" method="POST" enctype="multipart/form-data">
						{{ method_field('PATCH') }}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="form_purpose" value="<?php echo getenv('APP_URL'); ?>/patchlog">
						<input type="hidden" name="id" value="<?php echo $job[0]->id; ?>">
						<div class="formCtrls">
							<label  for="active">Status:</label>
							<div style="padding:0em 0em 1em 0em">
								<select name="status">
									<option value="" selected >Change Status</option>
									<option value="1">Open</option>
									<option value="0">Close</option>
								
								</select>
							</div>
						</div>
						<div class="formCtrls">
							<label for="summary" data-name="summary">Summary:</label>
							<textarea class="summary" name="summary" maxlength="150" style="height: 50px;"><?php echo $job[0]->summary; ?></textarea>
						</div>
						<div class="formCtrls">
							<label for="description" data-name="description">Description:</label>
							<textarea class="expand" name="description" maxlength="500" style="height: 100px;"><?php echo $job[0]->description; ?></textarea>
						</div>
						<input type="submit" class="submitButton" id="formSave" style="" name="save" value="Save">
				</form>
			 <!-- END EDIT LOG VIEW  --></div> 
			 
					
    </body>
      @include('partials.footer_scripts') 
</html>