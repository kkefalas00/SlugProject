$(document).ready(function(){
	
	
//Insert slug into database
 
$("#frm1").submit(function(event){
	
  event.preventDefault();
  
   $.post("api/api.php?q=1",$("#frm1").serialize(), function(res){
	   
		if(res!="false")
		{
		 
		 $("#message").html("<div class='alert alert-success msgs'>New slug is inserted. The new slug is '"+res+"'</div>");
		 $("#url").val("");
		}
		else
		{
		 $("#message").html("<div class='alert alert-danger msgd'>Site already exists. Try again! </div>");
		 $("#url").val("");
		}
	});
});



	
	
});



function getAllActive()


{
	
	$.get("api/api.php?q=2",function(res){
		
		var js=JSON.parse(res);
		var s=0;
				for(i=0;i<js.length;i++)
					
					{
						if(js[i].act==1) s+=1;
						
					}

			

			
			$("#counter").html("The active urls are:"+s);
			
	});
}