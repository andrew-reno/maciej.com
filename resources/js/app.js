document.addEventListener("DOMContentLoaded", function(event) 
{ 
 window.onerror = function(message, source, line, column, error) {
  console.log('ONE ERROR HANDLER TO RULE THEM ALL:', message);
}

	const app = new Vue({
	  el:'#appLB',
	  data:{
	  	title: "Vue JS App",
	    jobs:[],
	    currentSort:'name',
	    currentSortDir:'asc',
	    pageSize: 10,
	    currentPage:1,
	    filter:'',
	    flipSortIcon: true
	  } ,
	  
	  created:function() {
			fetch("vfetchlogs")
			.then(res => res.json())
			.then(res => {
				this.cats = res;
			})
		  },
	  created:function() {
	    fetch("vfetchlogs")
	    .then(res => res.json())
	    .then(res => {
	      	this.jobs = res; 
	        document.getElementById("appLB").style.opacity = "10";
	        document.getElementById("response").style.display = "none";
	        var  json_to_str;
			
			for(i = 0; i < this.jobs.length; i++)
			{  
				json_to_str = JSON.parse(this.jobs[i].name);
				// Address structure allows indexing on all fields to allow searching by City etc
				this.jobs[i].name = json_to_str['Line1'] ;
				this.jobs[i].name +=  json_to_str['Line2'] > "" ? ", " : json_to_str['Line2'];
				this.jobs[i].name +=  json_to_str['Line3'] > "" ? ", " : json_to_str['Line3'];
				this.jobs[i].name +=  ", " + json_to_str['City'];
				this.jobs[i].name +=  ", " + json_to_str['Postcode'];
				this.jobs[i].name +=  ", " + json_to_str['Country'];
				
				/* Need to add a meta field for visual date and sortable date in usa format 
	 				
	 			 var d = new Date(this.jobs[i].time_stamp)  
	 			this.jobs[i].time_stamp =  ('0' + (d.getDate()+1)).slice(-2)  + "/";
	 			this.jobs[i].time_stamp += ('0' + (d.getMonth()+1)).slice(-2) + "/" + d.getFullYear() + " ";
	 			this.jobs[i].time_stamp += d.getHours() +":"+d.getMinutes();
	 			 */	   
	 				
			}
	 		
	 		
	 	
		  	//for(i = 0; i < this.jobs.length; i++)
		   	// this.jobs[i].time_stamp  = Math.round(+new Date()/1000);// unix timestamp
			 
	     });
	    
	  },
	  methods:{
	    sort:function(s) {
	      //if s == current sort, reverse
	      if(s === this.currentSort) {
	        this.currentSortDir = this.currentSortDir === 'asc' ? 'desc' : 'asc';
	      }
	      this.currentSort = s;
	      this.flipSortIcon = !this.flipSortIcon;
	    },
	    nextPage:function() {
	      if((this.currentPage * this.pageSize) < this.filteredLogs.length) this.currentPage++;
	    },
	    prevPage:function() {
	      if(this.currentPage > 1) this.currentPage--;
	    }
	  },
	  watch: {
	    filter() {
	      //console.log('reset to page 1 due to filter');
	      this.currentPage = 1;
	    }
	  },
	  computed: {
	    filteredLogs() {    
	      return this.jobs.filter(c => {
	        if(this.filter == '') return true;
	         return c.summary.toLowerCase().indexOf(this.filter.toLowerCase())  >= 0 || c.description.toLowerCase().indexOf(this.filter.toLowerCase())  >= 0 || c.name.toLowerCase().indexOf(this.filter.toLowerCase())  >= 0  || c.manager.toLowerCase().indexOf(this.filter.toLowerCase())  >= 0 ; 
	      })
	    },
	    
	    sortedLogs() {
	        return this.filteredLogs.sort((a,b) => {
	        let modifier = 1;
	        if(this.currentSortDir === 'desc') modifier = -1;
	        if(a[this.currentSort] < b[this.currentSort]) return -1 * modifier;
	        if(a[this.currentSort] > b[this.currentSort]) return 1 * modifier;
	        return 0;
	      }).filter((row, index) => {
	        let start = (this.currentPage-1)*this.pageSize;
	        let end = this.currentPage*this.pageSize;
	        if(index >= start && index < end) return true;
	      });
	    } 
	    
	  }
	})// End vue
	
	 /*
	 	import Vue from 'vue'; 

		Vue.config.errorHandler = (err, vm, info) => {
		// err: error trace
		// vm: component in which error occured
		// info: Vue specific error information such as lifecycle hooks, events etc.
				console.log(err, vm, info)
		// TODO: Perform any custom logic or log to server

		};
		
		window.onerror = function(message, source, lineno, colno, error) {
	  	// TODO: write any custom logic or logs the error
	  	console.log(message, source, lineno, colno, error)
	};
	*/
	
 

});// End ready