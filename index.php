<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>DEMO Foursqure.com checkout api</title>

<link href="css/style.css" type="text/css" rel="stylesheet" />
<script src="//code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="js/venue-ajax.js" type="text/javascript" ></script>
</head>

<body>

	<div class="post_controls">
	
		<div class="selected_venue" id="selected_venue">
		Venue		
		</div>
	
		<input type="hidden" value="" name="venue_field" id="venue_field" />
		
		<div class="location_fields" id="nearlocation">
		<input type="text" name="venuecity" id="venuecity" placeholder="City" onKeyUp="showHint()" autocomplete="off" />
		<input type="text" name="venuetitle" id="venuetitle" placeholder="Place" onKeyUp="showHint()" autocomplete="off" />
		<div id="resultvenues"  class="resultvenues"></div>
		</div>		
		
		<input type='submit' name ='submitbark' id ='submitbark' class="submit_button" value='SUBMIT'>
	
	</div>

</body>
</html>
