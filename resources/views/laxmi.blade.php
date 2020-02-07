<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/css/bootstrap-colorpicker.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
<h2>Change Background Color Dynamically using Bootstrap Color Picker</h2>
<div class="row">
<div class="col-md-4 col-md-offset-2 well">

<a class="btn btn-default" id="change-color">Change background color</a>
<a class="btn btn-default" id="reset-color">Reset Default</a>
</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/js/bootstrap-colorpicker.min.js"></script>
<script>
	$('#change-color').colorpicker().on('changeColor', function(e) {
console.log( e.color.toString('rgba'));
var background_color = e.color.toString('rgba');
$('body')[0].style.backgroundColor = background_color;
$.ajax({
method: "POST",
url: "laxmi/change",
data: { change_color:1, background: background_color}
})
.done(function(response) {
// display change color message
});
});
</script>
<script>
	$( "#reset-color" ).click(function() {
$('body')[0].style.backgroundColor = "";
$.ajax({
method: "POST",
url: "laxmi/change",
data: {change_color:1, background: "#fff"}
})
.done(function(response) {
});
});
</script>

</body>
</html>