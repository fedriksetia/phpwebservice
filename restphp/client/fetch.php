	<?php

	
	//File name: fetch.php

	//Deskripsi: melakukan koneksi ke server dan menampilkan grid data
	
	include "global.php";

	
	$service_url = $service_url. "interface.php?action=fetch_all";
	$client = curl_init($service_url);
	curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

	$response = curl_exec($client);
	$result = json_decode($response);

	$output = '';

	if(count($result) > 0)
	{

	foreach($result as $row)
	{
	$output .= '
	<tr>
	<td>'.$row->first_name.'</td>
	<td>'.$row->last_name.'</td>
	<td><button type="button" name="edit" class="btn btn-
	warning btn-xs edit" id="'.$row->id.'">Edit</button>
	<button  type="button"  name="delete"  class="btn  btn-
	danger btn-xs delete" id="'.$row->id.'">Delete</button></td>
	</tr>
	';
	}
	}

	else
	{
	$output .= '

	<tr>
	<td colspan="4" align="center">No Data Found</td>
	</tr>
	';

	}
	echo $output;
?>

