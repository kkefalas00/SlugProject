$(document).ready(function(){
	

//login admin
	
$("#frmlogadmin").submit(function(event){
	
  event.preventDefault();
	   $.post("api/api.php?q=3",$("#frmlogadmin").serialize(), function(res){
	
		   
		if(res=="true")
		{
		 window.location.href='http://localhost/php_tests/Myconstructor/Project_2/admin/indexadmin.php';
		}
		else
		{
			$("#message").html("<div class='alert alert-danger msgd'>Error username or password</div>");
		}
		
	});
});


//Update url's profile
  
 $("#frmupdt").submit(function(event){
	
		event.preventDefault();
		
		$.post("api/api.php?q=7",$("#frmupdt").serialize(),function(res)
		{
			
			if(res=="ok")
			{
				$("#message").html("<div class=\"alert alert-success msgs\"> New data is saved!</div><div class=\"alert alert-success msgs\"><a href='indexadmin.php'>Go to your list</a></div>");
				
			}
			else
			{
				$("#message").html("<div class=\"alert alert-danger msgd\">Error edit!</div>");
			}
		
		});
});



$("#search1").keyup(function(){
		
		var s1=$(this).val().toLowerCase();
		$("#tt1 tr").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(s1) > -1)
    });
		
	
});
	
	
});






function delslug()
{
	x=$("#idslug").val();
	
$.get("api/api.php?q=5&idslug="+x,function(res){
	
		if(res=="true")
				{
					getAllSlugs();
					
				}
				else
				{
					$("#message").html("<div class=\"alert alert-danger msgd\">Error during process</div>");
				}

	});
	
}


function getAllSlugs()


{
	
	$.get("api/api.php?q=4",function(res){
		
		var js=JSON.parse(res);	
		var html1="";
			html1+="<table class='table table-hover tb1'>";
			html1+="<tr><th>URL</th><th>Url's slug</th><th>Delete</th><th>Edit</th><tbody id=tt1></tr>";
			
				for(i=0;i<js.length;i++)
					
					{
						html1+="<tr><td>"+js[i].url+"</td><td>"+js[i].slug+"</td>";
						html1+="<td><a onclick='$(\"#idslug\").val("+js[i].id+");$(\"#myModal\").modal(\"show\");'><span class='glyphicon glyphicon-trash'style='margin-left:10px;'></span></a></td><td><a href='edit.php?slugid="+js[i].id+"'><span class='glyphicon glyphicon-pencil' style='margin-left:5px;';></span></a></td></tr>";
						
					}
			html1+="</tbody></table>";
			

			
			$("#list").html(html1);
			
	});
}

function getOneUrl(id)
{
	$.get("api/api.php?q=6&slugid="+id,function(res){
		var js=JSON.parse(res);
		
		$("#url").val(js.url);
		$("#ch").val(js.choice);
		if(js.act==1) $("#act").prop("checked","true");
		if(js.ren==1) $("#chb").prop("checked","true");
		
		
	
	});

}

function getAllfinal()

{
	
		$.get("api/api.php?q=8",function(res){
			
			
			var js=JSON.parse(res);
			
		    var html1="";
				html1="<h2 style='margin-left:230px;'>Sites statistics</h2>"
				html1+="<table class='table table-hover'>";
				html1+="<tr><th>Number of active sites</th><th>Number of non active sites</th><th>Number of renewable sites</th></tr>";
			
				
						html1+="<tr><td><span style='margin-left:70px;'>"+js.active+"</span></td><td><span style='margin-left:80px;'>"+js.nonact+"</span></td><td><span style='margin-left:80px;'>"+js.renew+"</span></td></tr>";
					
					
				
			html1+="</table>";

			
			$("#list2").html(html1);
		});
		
}