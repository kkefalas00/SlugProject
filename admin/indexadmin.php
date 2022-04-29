<?php
session_start();

if(@$_SESSION['admin']=="") { echo "Error connection! "; die();}
	
	
include "upadmin.php";
?>



<div class=container>

<div class=row>
	Search: <input type=text id=search1 placeholder="Type your search">
	<br><br>
</div>


<input type=hidden id=idslug>

<div class=row>

	<div class=col-md-2>
	</div>
	
	<div class=col-md-8>
		<div id=list>
		</div>
	</div>
	
	<div class=col-md-2>
	</div>


</div>


<div class=row>

		<div class=col-md-2>
							
		</div>
						
		<div class=col-md-8>
						
			<div id=list2>
								
			</div>
							
		</div>
						
		<div class=col-md-2>
							
		</div>
						
</div>

<script>
getAllSlugs();
setInterval(getAllfinal,1000)
</script>



<div class=row>

	<div class=col-md-4>
	</div>
	
	<div class=col-md-4>
		<div id=message>
		</div>
		
	</div>
	
	<div class=col-md-4>
	</div>


</div>




<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Delete slug</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Do you want to delete this slug?
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick='delslug()'>Yes</button><button type="button" class="btn btn-danger" data-dismiss="modal">No</button> 
      </div>

    </div>
  </div>

</div>

<?php
include "footeradmin.php";

?>