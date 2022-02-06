$(document).ready(function()
	{
 		
	 
	
	 
		$('#formSave').on('click', function(e)
		{

				e.preventDefault();
 
			 			
				GUI_Status_Busy();


				$(window).scrollTop(0);
				
				 
				$.ajax(
					{
						url: "savelog", 
						data: $('input[name="save"]').closest("form").serialize() ,
						dataType: 'JSON',  // what to expect back from the PHP script, if anything
						cache: false,
						type: "POST",
						success: function(data)
						{

							if(data.error)
							{
								$(".status").html(" <!-- #formSave Complete! -->" + data.msg);
								$(".status").addClass("error_msg");
							}else
							{
								$(".status").html(" <!-- #formSave Complete! -->" + data.msg);

								$(".status").addClass("success_msg");
							}

							$(".status").removeClass("loader");

							setTimeout(function()
								{
									if(data.redirect)
										window.location.href = data.redirect;
								}, 1000
							);

							return;
						},
						error: function(XMLHttpRequest, textStatus, errorThrown)
						{
							$(".status").html("Failed! "+textStatus);
							$(".status").removeClass("loader");
						}
					});

			}); // End button click submit
			
		function GUI_Status_Busy()
		{

			$( ".status" ).html("");
			$(".status").addClass("loader");
			$(".status").removeClass("error_msg");
			$(".status").removeClass("success_msg");
		}
 
		const getCellValue = (tr, idx) => tr.children[idx].innerText || tr.children[idx].textContent;

		const comparer = (idx, asc) => (a, b) => ((v1, v2) =>
			v1 !== '' && v2 !== '' && !isNaN(v1) && !isNaN(v2) ? v1 - v2 : v1.toString().localeCompare(v2)
		)(getCellValue(asc ? a : b, idx), getCellValue(asc ? b : a, idx));

		// sorted tables
		document.querySelectorAll('table.sorted th').forEach(th => th.addEventListener('click', (() => {
			// $(".status").addClass("loader")
			const table = th.closest('table.sorted');
			Array.from(table.querySelectorAll('tr:nth-child(n+2)'))
			.sort(comparer(Array.from(th.parentNode.children).indexOf(th), this.asc = !this.asc))
			.forEach(tr => table.appendChild(tr) );

		})));
} ); // End doc ready