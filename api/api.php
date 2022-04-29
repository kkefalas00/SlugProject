<?php

include "connect.php";

//insert into slug


if($_GET['q']==1)
	
{
	$X="abcdefghiklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ_0123456789";
	
	
	while(true)
	{
		$slug="";
		for ($i=0;$i<7;$i++)
		{
			$k=rand(0,strlen($X)-1);
			$slug.=$X[$k];
			
		}

		$sql2="select * from slugs where slug='$slug'";
		$q=mysqli_query($db,$sql2);
		if(mysqli_num_rows($q)==0) break;

	}
	
	if(@$_POST['chb']=="") $chb=0;
	else $chb=$_POST['chb'];
		 
	if($_POST['ch']==1)
	{
	
	$sql="insert into slugs(id,act,ren,slug,dateins,dateexp,url,choice) 
	values(NULL,'1','$chb','$slug',now(),date_add(now(),interval 10 minute),'$_POST[url]','$_POST[ch]')"; 
	
	}
	
	if($_POST['ch']==2)
	{
	
	$sql="insert into slugs(id,act,ren,slug,dateins,dateexp,url,choice) 
	values(NULL,'1','$chb','$slug',now(),date_add(now(),interval  60 minute),'$_POST[url]','$_POST[ch]')"; 
	
	}
	
	if($_POST['ch']==3)
	{
	
	$sql="insert into slugs(id,act,ren,slug,dateins,dateexp,url,choice) 
	values(NULL,'1','$chb','$slug',now(),date_add(now(),interval  24 hour),'$_POST[url]','$_POST[ch]')"; 
	
	}
	
	if($_POST['ch']==4)
	{
	
	$sql="insert into slugs(id,act,ren,slug,dateins,dateexp,url,choice) 
	values(NULL,'1','$chb','$slug',now(),date_add(now(),interval  7 day),'$_POST[url]','$_POST[ch]')"; 
	
	}
	
	if($_POST['ch']==5)
	{
	
	$sql="insert into slugs(id,act,ren,slug,dateins,dateexp,url,choice) 
	values(NULL,'1','$chb','$slug',now(),date_add(now(),interval  15 day),'$_POST[url]','$_POST[ch]')"; 
	
	}
	
	if(mysqli_query($db,$sql))
		{
			echo "$slug";
			
		}
		else
		{
			echo "false";
		}
	
}


//Get all active urls


if($_GET['q']==2)
	{
		$sql="select * from slugs where slugs.act='1'";
						
		$q=mysqli_query($db,$sql);
		$A=[];
		while($r=mysqli_fetch_assoc($q))
		{
			$A[]=$r;
		}
		
			echo json_encode($A);

	}
	
	
	
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

?>