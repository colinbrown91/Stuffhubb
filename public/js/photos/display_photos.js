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
			var resizePhotos = function(img) { // function to resize images that are too large
				var resize_image = function(img, newht, newwt) { // function final resize and return img
					img.height = newht;
					img.width = newwt;
					return img;
				};

				var w = img.width, h = img.height; // get dims of original img
				var maxhw = 320, minhw = 240; // max dims

				if (h > maxhw || w > maxhw) { // if image is too large

					var old_ratio = h / w; // ratio of original dims
					var min_ratio = minhw / minhw; // ratio of min dims

					if (old_ratio === min_ratio) { // if ratios match
						return resize_image(img, minhw, minhw); // return img with min h/w
					}
					else { // if ratios dont match, use ratios to constraint proportions
						var new_dim = [h, w];
						new_dim[0] = maxhw; // sort out height first
						new_dim[1] = new_dim[0] / old_ratio; // ratio = h / w => w = h / ratio
						if(new_dim[1] > maxhw){ // do we still need to sort width
							new_dim[1] = maxhw;
							new_dim[0] = new_dim[1] * old_ratio; // h = w * ratio
						}
						return resize_image(img, new_dim[0], new_dim[1]);
					}
				}
			};

			var reader = new FileReader();

			/**
			 * @param e - ?
			 * @var image img - new image
			 */
			reader.onload = function(e) {
				output.innerHTML = ""; // initialize output area
				var img = new Image(); 
				img.src = reader.result;
				img = resizePhotos(img);
				output.appendChild(img);
			}
			reader.readAsDataURL(file);
		}
		else {
			output.innerHTML = "File not supported!"
		}
	});

	
});


