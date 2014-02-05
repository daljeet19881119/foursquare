// JavaScript Document
function showHint()
{
	
	var venuecity = document.getElementById("venuecity").value ;
	var venuetitle = document.getElementById("venuetitle").value ;
	
	if(venuecity.length==0)
	{ 
		document.getElementById("resultvenues").innerHTML="";
		return;
	}
	
	var xmlhttp = new XMLHttpRequest();		
	
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("resultvenues").innerHTML=xmlhttp.responseText;
		}
		else
		{
			document.getElementById("resultvenues").innerHTML="Loading...";	
		}
	}
	
	xmlhttp.open("GET","utilities/public.php?c="+venuecity+"&v="+venuetitle,true);
	xmlhttp.send();
}


function viewVenue(thisvenue)
{
	document.getElementById('selected_venue').innerHTML = "";
	document.getElementById('venue_field').value = "";
	$("#selected_venue").show();
	document.getElementById('selected_venue').innerHTML = document.getElementById(thisvenue).innerHTML;
	document.getElementById('venue_field').value = document.getElementById(thisvenue).innerHTML;
}

function selectectVenue(thisvenue)
{
	$("#venuemain").hide();
	$("#selected_venue").append("<div class='crossvenue' onclick='removeVenue()'><img src='images/cross-w-20x20.png' alt='Remove Venue' /></div>");
}

function removeVenue()
{
	document.getElementById('selected_venue').innerHTML = "";
	document.getElementById('venue_field').value = "";
	$("#selected_venue").hide();
}
