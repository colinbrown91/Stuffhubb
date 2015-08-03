<html>
<head>

{{-- @extends('layouts.main') --}}

{{-- @section('content') --}}

<title> Search Bar </title>

<script>
function showHint(str) {
	if (str.length == 0) {
		document.getElementById("txtHint").innerHTML = "";
		return;
	} else {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET", "{!! asset('getsearch.php?q=') !!}" + str, true);
		xmlhttp.send();
	}
}
</script>

</head>

<body>

<p> Start typing </p>
<form>
	First Name: <input type="text" onkeyup="showHint(this.value)">
</form>
<p> Suggestions: <span id="txtHint"></p>

</body>
</html>



{{-- @endsection --}}