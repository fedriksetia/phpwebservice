	<?php

	

	//File name: action.php
	//Deskripsi: Mendefinisikan methods untuk Insert, Update, Delete.

	
	include "global.php";

	
	if(isset($_POST["action"]))

	{
	if($_POST["action"] == 'insert')
	{
	$form_data = array(	=>	$_POST['first_name'],
	'first_name'		
	'last_name'	=>	$_POST['last_name']
	);		
	$service_url  =  $service_url.  "interface.php?action=insert";
	//change this url as per your folder path for api folder
	$client = curl_init($service_url);
	curl_setopt($client, CURLOPT_POST, true);
	curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
	curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($client);
	curl_close($client);	
	$result = json_decode($response, true);
	foreach($result as $keys => $values)
	{		
	if($result[$keys]['success'] == '1')
	{		
	echo 'insert';
	}		
	else		
	{		
	echo 'error';	
	}		
	}		
	}
	
	if($_POST["action"] == 'fetch_single')
	{		
	$id = $_POST["id"];	=	$service_url.
	$service_url		
	"interface.php?action=fetch_single&id=".$id."";	
	$client = curl_init($service_url);	
	curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($client);	
	echo $response;		
	}
	if($_POST["action"] == 'update')

	{
		$form_data = array(	$_POST['first_name'],		
		'first_name'  =>			
	'last_name'	=>	$_POST['last_name'],
	'id'	=>	$_POST['hidden_id']
	);		
	$service_url = $service_url. "interface.php?action=update";
	$client = curl_init($service_url);
	curl_setopt($client, CURLOPT_POST, true);
	curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
	curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($client);	
	curl_close($client);		
	$result = json_decode($response, true);
	foreach($result as $keys => $values)
	{		
	if($result[$keys]['success'] == '1')
	{		
	echo 'update';	
	}		
	else		
	{		
	echo 'error';		
	}		
	}		

	}
	if($_POST["action"] == 'delete')

	{
	$id = $_POST['id'];	=	$service_url.
	$service_url		
	"interface.php?action=delete&id=".$id."";		
	$client = curl_init($service_url);	
	curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($client);	
	echo $response;		
	}

	}


	?>