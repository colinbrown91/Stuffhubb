// function displayPhotos() {
// function displayPhotos(input) {
// var displayPhotos = function(event) {
//     var input = event.target;
//     // console.log(input);
//     var reader = new FileReader();
//     reader.onload = function(e){
//       var dataURL = reader.result;
//       // console.log(dataURL);
//       var output = document.getElementById('photoDisplay');
//       // console.log(output);
//       output.src = dataURL;
//       // console.log(output.src);
//     };
//     // console.log(input.files[0]);
//     reader.readAsDataURL(input.files[0]);
//   };

// window.onload = function() {
function displayPhotos() {
		var fileInput = document.getElementById('fileInput');
		var fileDisplayArea = document.getElementById('fileDisplayArea');


		// fileInput.addEventListener('change', function(e) {
			// fucntion(e) {

			var file = fileInput.files[0];
			console.log(file);
			var imageType = /image.*/;
			console.log(imageType);

			console.log(file.type.match(imageType));

			if (file.type.match(imageType)) {
				var reader = new FileReader();

				reader.onload = function(e) {
					fileDisplayArea.innerHTML = "";

					var img = new Image();
					img.src = reader.result;

					fileDisplayArea.appendChild(img);
				}

				reader.readAsDataURL(file);	
			} else {
				fileDisplayArea.innerHTML = "File not supported!"
			}
		// }

}


	// var id = document.getElementById("photoDisplay");
 //    var name = document.forms["photoUpload"]["file_0"].value;
 //    return id.innerHTML=name;
// }
