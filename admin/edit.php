<?php
session_start();

if(@$_SESSION['admin']=="") { echo "Error connection! "; die();}
	
include "upadmin.php";
?>


<script>
getOneUrl(<?php echo $_GET['slugid'];?>);
</script>


<div class="container">
	
		
				
					<form action="" method=post id=frmupdt>
						<div class=row>
							<div class=col-md-6>
								  <div class="form-group">
									<label for="url">Url address:</label>
									<input type="text" class="form-control" id="url" name=url placeholder="Type your url" required value="">
								  </div>
								
							</div>
							<div class=col-md-3>
								<div class="form-group">
									<label for="select">Choose hour:</label>
										<select class='form-control' id='ch' name='ch'>
											<option selected disabled>Choose time length:</option>
											<option value=1>10 minutes</option>
											<option value=2>60 minutes</option>
											<option value=3>24 hours</option>
											<option value=4>1 week</option>
											<option value=5>15 days</option>
										</select>
								</div>
							</div>
							<div class=col-md-1>
								<div class="form-group">
									<label for="select">Renewable:</label>
									
									<input type="checkbox" id=chb name="chb" value="1" style='width:50px;height:39px;margin-top:-4px;'>
								</div>
							</div>
							<div class=col-md-1>
								<div class="form-group">
									<label for="select">Active:</label>
									
									<input type="checkbox" id=act name="act" value="1" style='width:50px;height:39px;margin-top:-4px;'>
								</div>
							</div>
							<input type=hidden id=slugid name=slugid value=<?php echo $_GET['slugid'];?>>
							<div class=col-md-1>
							<div class="form-group">
									<label></label>
								<button type="submit" class=" form-control btn btn-default">Update</button>	
							</div>
							</div>
						</div>
					</form>
					
					<div class=row>
						<div class="col-md-4">
							
						</div>
						
						<div class="col-md-4">
						
							<div id=message>
								
							</div>
							
						</div>
						
						<div class="col-md-4">
							
						</div>
						
					</div>
					
					
			
	
	
</div>




<?php

include "footeradmin.php";
?>