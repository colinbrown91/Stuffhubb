/**
 * Function displays the current selected photo in form
 * for user preview
 * @var DOM output - output to div with id = photoDisplay
 * @var DOM photoInput - input file form
 * 	need Form::label in order to use DOM on Form::file
 * 
 */
$(document).ready(function displayPhotos() {

	var output = document.getElementById('photoDisplay');
	var photoInput = document.getElementById('file_0');
	/**
	 * Function add event listener to Form::file 'file_0'
	 * event "change" - when chosen photo file changes
	 * display the photo in the output area
	 * @var object file - input photo in Form::file 'file_0'
	 * @var string imageType - image mime type
	 * @var reader reader - new FileReader
	 *
	 */
	photoInput.addEventListener('change', function() {
		
		var file = photoInput.files[0];
		var imageType = /image.*/; // not sure which file types this supports
		var display = new Image();

		// Attempted Ajax
		// display.src =	$.ajax({
		// 				type: "GET",
		// 				url: "{!! action('PhotoController@getPhotoTest', 'id') !!}"
		// 			});
		// output.innerHTML = display; 

		if(file.type.match(imageType) && file.size < 500000000) { // validate file type
			var reader = new FileReader();
			/**
			 * @param e - ?
			 * @var image img - new image
			 */
			reader.onload = function(e) {
				output.innerHTML = ""; // initialize output area
				var img = new Image(); 
				img.src = reader.result;
				output.appendChild(img);
			}
			reader.readAsDataURL(file);
		}
		else {
			output.innerHTML = "File not supported!"
		}
	});
});