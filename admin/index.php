<?php

include "up.php";

?>

<div class=container>
		<div class=row>
			<div class=col-md-3>
			</div>
			<div class=col-md-6>
			<form action="" id='frmlogadmin' method=post>
				<h1>Login as a Admin</h1>
				
			  <div class="form-group">
				<input type="text" class="form-control" required id="usr" required name="usr" placeholder="Type your username">
			  </div>
			  <div class="form-group">
			   <input type="password" class="form-control" required id="pwd" name="pwd" placeholder="Password: ex. a!123Ager">
			  </div>
			  
			  <button type="submit" class="btn btn-default bt" >Login</button>
			</form>
			</div>
			<div class=col-md-3>
			</div>
			
		</div>
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

</div>

<?php

include "footeradmin.php";


?>