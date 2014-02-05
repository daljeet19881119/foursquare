<?php 
	// Load the Foursquare API library
	require_once("../src/FoursquareAPI.class.php");
	
	$venues = array();
	
	// Set your client key and secret
	$client_key = "ZQTHJKIHW3GYNXEAPMFYI4PI2BGJKLJLJLM5VNQYNUTUOKKOZL4IIJDJ52"; // ADD YOUR CLIENT KEY HERE
	$client_secret = "Y3EOQX0E54AG443ACG4NJ3GONDFGOIUOCJ5ESXQZ0CPFAA3PGOM5BJ3X"; // ADD YOUR CLIENT SECRET HERE
	

	if($client_key=="" or $client_secret=="")
	{
        echo 'Load client key and client secret from <a href="https://developer.foursquare.com/">foursquare</a>';
        exit;
	}

	$foursquare = new FoursquareAPI($client_key, $client_secret);
	$c = array_key_exists("c",$_GET) ? $_GET['c'] : "Montreal, QC";
	$v = array_key_exists("v",$_GET) ? $_GET['v'] : "KFC";
	
		
	// Generate a latitude/longitude pair using Google Maps API
	list($lat,$lng) = $foursquare->GeoLocate($c);
	
	
	// Prepare parameters
	// $params = array("ll"=>"$lat,$lng");
	
	if($v == "")
	{
		$params = array("ll"=>"$lat,$lng");
	}
	else if( ($v != "") && ($v != "") )
	{
		$params = array("ll"=>"$lat,$lng", "query"=>"$v");
	}
	
	// Perform a request to a public resource
	$response = $foursquare->GetPublic("venues/search",$params);
	$venues = json_decode($response);
?>
<div class="venuemain" id="venuemain">	
	<?php 
	// print_r($venues);
	if(!empty($venues->response->venues))
	{
		$i = 1;
			
		foreach($venues->response->venues as $venue): 
		$id = "venue_".$i ;	
		?>
			<div class="venue" id="<?php echo $id; ?>" onClick="selectectVenue('<?php echo $id; ?>')" onMouseOver="viewVenue('<?php echo $id; ?>')" >
				<?php 
					/*echo "<pre>";
					print_r($venue);
					echo "</pre>";
					die;*/
					if(isset($venue->categories['0']))
					{
						echo '<image class="icon" src="'.$venue->categories['0']->icon->prefix.'32.png"/>';
					}
					else
					{	
						echo '<image class="icon"  src="https://foursquare.com/img/categories/building/default_32.png"/>';
					}
					
						
					if(isset($venue->name))
					{
						echo "<b>".$venue->name.",</b> ";
					}
					
					if(isset($venue->categories['0']))
					{
						if(property_exists($venue->categories['0'],"name"))
						{
							echo '<b>'.$venue->categories['0']->name.',</b> ';
						}
					}
					
					if(isset($venue->location))
					{
						if(property_exists($venue->location,"crossStreet"))
						{
							echo $venue->location->crossStreet.', ';
						}					
						
						if(property_exists($venue->location,"city"))
						{
							echo $venue->location->city.', ';
						}
						
						if(property_exists($venue->location,"country"))
						{
							echo $venue->location->country;
						}
					}
					
	
					
	
					echo '<br/><b><i>History</i></b> :'.$venue->stats->usersCount." visitors , ".$venue->stats->checkinsCount." visits ";
					
				?>
			
			</div>
		<?php 
		$i++;
		endforeach;
	}
	else
	{
		echo "<p><b>No Result Found.</b></p>";
	}
	?>
	
</div>

