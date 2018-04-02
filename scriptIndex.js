var x = document.getElementById("getLOC");
var em=document.getElementById("emergency"), lc=document.getElementById("loc");
var sE=document.getElementById("suggEm"), sL=document.getElementById("suggLoc");
var form1=document.getElementById("form1");
var flag=0;
//var geocoder=new google.maps.Geocoder;

function getLocation() {
	if (navigator.geolocation) {
		x.style.color="black";
		x.innerHTML="Wait while we get your location";
		navigator.geolocation.getCurrentPosition(showPosition);
	} else {
		x.innerHTML = "Geolocation is not supported by this browser.";
	}
}
function showPosition(position) {
	x.innerHTML = "You are at " + position.coords.latitude + 
	"," + position.coords.longitude;
	document.getElementById("LLAT").value=position.coords.latitude;
	document.getElementById("LLONG").value=position.coords.longitude;
	//RevGeoCode(geocoder, position.coords.latitude,position.coords.longitude);
	flag=1;
	//alert("Hi");
}
function watermarkVanishEm()
{
	if(em.value=="What is your emergency?") { em.value=""; em.style.color="black";}
}
function watermarkDispEm()
{
	if(em.value=="") { em.value="What is your emergency?"; em.style.color="gray"; }
}
function watermarkVanishLc()
{
	if(lc.value=="What is your location?") { lc.value=""; lc.style.color="black";}
}
function watermarkDispLc()
{
	if(lc.value=="") { lc.value="What is your location?"; lc.style.color="gray"; }
} 
function submitForm()
{
	if(flag==0) { x.innerHTML="Tell us your location first"; x.style.color="red"; }
	else form1.submit();
}/*
function RevGeoCode(geocoder, lat, lng)
{
	
	geocoder.geocode({'location':{latitude:lat, longitude:lng}}, function(result, status){
		if(result[0]) alert(result);
		else if(status!='OK') alert(status);
	});
}*/