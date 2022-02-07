<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>eLogbooks - viewlogs.blade</title>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
		<script src="<?php echo getenv('APP_URL'); ?>/resources/js/app.js?v=<?php echo getenv('APP_VERSION'); ?>"></script>
		<link rel="stylesheet"   href="css/style.css">    
    </head>
    <div class="logo"></div>
    <h1>View Logs</h1>
    <body class="antialiased">
	@include('partials.nav') 
	<!-- BEGIN CONTAINER VUE APP -->
	<div class="table_container " id="appLB" vcloak->  
	<div id="response"></div>
		<!-- BEGIN CONTROLS -->
		<div class="formCtrlsMini themeButton miniContainer">
			<label for="search">Filter:  
			<input name="search" id="search" type="search" v-model="filter">
		</div>
		 <!-- BEGIN LOG TABLE -->
		<table>
			<thead>
				<tr>
				<th @click="sort('id')" 	  	 :class="{sortable_flip: flipSortIcon}" class="sortable">ID</th>
				<th @click="sort('summary')"  	 :class="{sortable_flip: flipSortIcon}" class="sortable">Summary</th>
				<th @click="sort('description')" :class="{sortable_flip: flipSortIcon}" class="sortable">Description</th>
				<th @click="sort('status')" 	 :class="{sortable_flip: flipSortIcon}" class="sortable">Status</th>
				<th @click="sort('time_stamp')"  :class="{sortable_flip: flipSortIcon}" class="sortable">Time</th>
				<th @click="sort('name')"   	 :class="{sortable_flip: flipSortIcon}" class="sortable">Property</th>
				<th @click="sort('manager')"   	 :class="{sortable_flip: flipSortIcon}" class="sortable">Manager</th>
				</tr>
			</thead>
			<tbody>	      
				<tr v-for="log in sortedLogs">
				    <td>@{{log.id}}</td>
				    <td>@{{log.summary}}</td>
				    <td>@{{log.description}}</td>
				    <td>@{{log.status}}</td>
				    <td>@{{log.time_stamp}}</td>
				   <!--	can not sort json 
				    <td><template  v-for="key1 in log.name">@{{ key1 + " " }}</template ></td> 
				    -->
				    <td>@{{ log.name }}</td> 
				   <td>@{{log.manager}}</td>
				</tr>	 
		  </tbody>	

		 </table><!-- END LOG TABLE --> 
			  <p>
			  	<button aria-label="Previous" class="themeButton" @click="prevPage">Previous</button> 
			  	<button aria-label="Next" class="themeButton" @click="nextPage">Next</button>
			  </p>	
	 </div> <!-- END CONTAINER VUE APP -->
    </body>
    @include('partials.footer_scripts') 
</html>
