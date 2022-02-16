<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>eLogbooks - welcome.blade</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
    	 	
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
 
    </head>
    
    <div> 
			<div style="float: right">

				<a href="{{ url('/dash') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a> |
				 
				<a href="{{ url('fetchlogs') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">View logs (Vue.JS)</a> | 
				<a href="{{ url('createlog') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Create logs</a>  
			 </div>

			<div class="">
				<img style="width: 300px;padding: 0em;position: fixed;z-index: 0;top: 2rem;height: auto;"class="qodef-light-logo" src="https://32a8uf21bv9y2zeceg1suvz1-wpengine.netdna-ssl.com/wp-content/uploads/2021/10/Elogbooks-SRC-logo-web.png" alt="light logo">
			</div>
 
		</div>
		
   
    <body class="antialiased">
      <h1 style="text-align:center; clear:both; margin: 0 auto;padding: 8rem 0rem;">Home - Laravel</h1> 		
		<footer>
			<div style="text-align:center; font-size:smaller; color:#aaa">
				Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
			</div>
		</footer> 
	</body>
</html>
