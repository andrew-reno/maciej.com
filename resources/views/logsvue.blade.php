<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>
			eLogbooks - welcome.blade
		</title>

		
		
 

	</head>

	<body class="antialiased">
		<!-- BEGIN VUE APP -->
		<div id="app">
			<h1>
				Home - Laravel Vue JS @{{title}}
			</h1>
		</div>
		<!-- END VUE APP -->
	</body>
	@include('partials.footer_scripts') 
</html>
