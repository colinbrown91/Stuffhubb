/**
 * Function displays the current selected photo in form
 * for user preview
 */

$(document).ready(function displayPhotos() {

	var output = document.getElementById('photoDisplay');
	var photoUpload = document.getElementById('photoUpload');
	var photoInput = document.getElementById('photoInput');
	
	photoInput.addEventListener('change', function() {
		// var file = photoInput.value;
		// var file = photoInput.value;
		var file = photoInput.files[0];

		var reader = new FileReader();
		reader.onload = function(e) {
			output.innerHTML = "";

			var img = new Image();
			img.src = reader.result;

			output.appendChild(img);
		}

		reader.readAsDataURL(file);

		// console.log(files);
		// output.innerHTML = "hello";
	});
});