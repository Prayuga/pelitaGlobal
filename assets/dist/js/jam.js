$(document).ready(function() {
// Create two variable with the names of the months and days in an array
var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; 
var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

// Create a tglbaru() object
var tglbaru = new Date();
// Extract the current date from Date object
tglbaru.setDate(tglbaru.getDate());
// Output the day, date, month and year   
$('#Date').html(dayNames[tglbaru.getDay()] + ", " + tglbaru.getDate() + ' ' + monthNames[tglbaru.getMonth()] + ' ' + tglbaru.getFullYear());

setInterval( function() {
	// Create a tglbaru() object and extract the detiknya of the current time on the visitor's
	
	var detiknya = new Date().getSeconds();
	// Add a leading zero to seconds value
	$("#detiknya").html(( detiknya < 10 ? "0" : "" ) + detiknya);
	},1000);
	
setInterval( function() {
	// Create a tglbaru() object and extract the menitnya of the current time on the visitor's
	
	var menitnya = new Date().getMinutes();
	// Add a leading zero to the menitnya value
	$("#menitnya").html(( menitnya < 10 ? "0" : "" ) + menitnya);
	},1000);
	
setInterval( function() {
	// Create a tglbaru() object and extract the jamnya of the current time on the visitor's
	
	var jamnya = new Date().getHours();
	// Add a leading zero to the jamnya value
	$("#jamnya").html(( jamnya < 10 ? "0" : "" ) + jamnya);
	}, 1000);	
});