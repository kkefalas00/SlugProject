<?php
include "api/connect.php";

$sql1="update slugs set ren=0, dateexp=date_add(now(),interval timediff(dateexp,dateins) second) where now()>dateexp and ren=1";
	$q1=mysqli_query($db,$sql1);	


$sql1="update slugs set act=0 where now()>dateexp and ren=0";
	$q1=mysqli_query($db,$sql1);


	


$request = $_SERVER['REQUEST_URI'];

$u=explode("/",$request);
$slug=$u[count($u)-1];
if( @$slug!="" && $slug!="index.php")
{
	$sql="select * from slugs where slug='$slug' and act=1";
	$q=mysqli_query($db,$sql);
	if(mysqli_num_rows($q)>0)
	{
		$r=mysqli_fetch_assoc($q);
		echo "
		<h1>Redirecting</h1>
		<script>
			setTimeout(function(){ window.location.href='$r[url]'},3000);
		</script>
		";
		die();
	}
	else
	{
		echo "<script>alert('Not found');</script>";
	}
}

include "up.php";

?>


<div class="container">
	
		
				
					<form action="" method=post id=frm1>
						<div class=row>
							<div class=col-md-6>
								  <div class="form-group">
									<label for="url">Url address:</label>
									<input type="url" class="form-control" id="url" name=url placeholder="Type your url" required>
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
									
									<input type="checkbox"  name="chb" value=1 style='width:50px;height:39px;margin-top:-4px;'>
								</div>
							</div>
							<div class=col-md-2>
							<div class="form-group">
									<label></label>
								<button type="submit" class=" form-control btn btn-default">Submit</button>	
							</div>
							</div>
						</div>
					</form>
					
					<div class=row>
						<div class="col-md-12 text-center">
						
							<div id=counter>
								
							</div>
							
						</div>
						
					</div>
					
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
<script>

setInterval(getAllActive, 1000);
</script>

<?php

include "footer.php";


?>