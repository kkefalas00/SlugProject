<?php

include "connect.php";

	
//login admin
 
if($_GET['q']==3)
{
	$mypassword=md5($_POST['pwd']); 
	
	$sql="select * from admin where usr='$_POST[usr]' and ps='$mypassword'";
		
	$q=mysqli_query($db,$sql);
		
	if(mysqli_num_rows($q)>0)
	{
		$r=mysqli_fetch_assoc($q);
		$_SESSION['admin']=$r['id'];
		echo "true";
			
	}
	else
	{
		echo "false";
	};
}

//Get all from slugs



if($_GET['q']==4)
	{
		$sql="select * from slugs ";
						
		$q=mysqli_query($db,$sql);
		$A=[];
		while($r=mysqli_fetch_assoc($q))
		{
			$A[]=$r;
		}
		
			echo json_encode($A);

	}

//Delete slug


	
	if($_GET['q']==5)
	{
		$sql="delete from slugs where id='$_GET[idslug]'";
		
		if(mysqli_query($db,$sql))
		{
			echo "true";
		}
		else
		{
			echo "error";
		}
	}
	
	
//Get url data



if($_GET['q']==6)
	{
		$sql="select * from slugs where id='$_GET[slugid]'";
					
		$q=mysqli_query($db,$sql);
		
		$r=mysqli_fetch_assoc($q);
		
			echo json_encode($r);

	}

//Update url



	if($_GET['q']==7)
			
	{		
			if(@$_POST['chb']=="") $chb=0;
			else $chb=1;
			
			if(@$_POST['act']=="") $act=0;
			else $act=1;
		 
			if($_POST['ch']==1 )
			{
			
			$sql="update slugs set act='$act',ren='$chb', dateexp=date_add(dateins,interval 10 minute), url='$_POST[url]', choice='$_POST[ch]' where id='$_POST[slugid]'";
			
			}
			
			if($_POST['ch']==2)
			{
			
			$sql="update slugs set act='$act',ren='$chb', dateexp=date_add(dateins,interval 60 minute),url='$_POST[url]', choice='$_POST[ch]' where id='$_POST[slugid]'";
			
			}
			
			if($_POST['ch']==3)
			{
			
			$sql="update slugs set act='$act',ren='$chb', dateexp=date_add(dateins,interval 24 hour), url='$_POST[url]', choice='$_POST[ch]' where id='$_POST[slugid]'";
			
			}
			
			if($_POST['ch']==4)
			{
			
			$sql="update slugs set act='$act',ren='$chb', dateexp=date_add(dateins,interval 1 week), url='$_POST[url]', choice='$_POST[ch]' where id='$_POST[slugid]'";
			
			}
			
			if($_POST['ch']==5)
			{
			
			$sql="update slugs set act='$act',ren='$chb', dateexp=date_add(dateins,interval 15 days),url='$_POST[url]', choice='$_POST[ch]' where id='$_POST[slugid]'";
			
			}	
				
				if(mysqli_query($db,$sql))
				{
					echo "ok";
				}
				else
				{
					echo "error";
				}
	}
	
//get final
	
	if($_GET['q']==8)
			
	{
		
		$A=[];
		
		//αριθμός non active site
		
		$sql1="select count(*) as nonact from slugs where act='0'";	
		$q1=mysqli_query($db,$sql1);
		$r1=mysqli_fetch_assoc($q1);
		$A["nonact"]=$r1["nonact"];
		
		//αριθμός active site
		
		$sql2="select count(*) as active from slugs where act='1'";	
		$q2=mysqli_query($db,$sql2);
		$r2=mysqli_fetch_assoc($q2);
		$A["active"]=$r2["active"];	
		
		//αριθμός renewable site
		
		$sql3="select count(*) as renew from slugs where ren='1'";
		$q3=mysqli_query($db,$sql3);
		$r3=mysqli_fetch_assoc($q3);
		$A["renew"]=$r3["renew"];

			echo json_encode($A);
		
	}



?>