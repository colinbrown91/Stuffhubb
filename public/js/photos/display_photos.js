function displayPhotos() {
// function readURL(input) {
    // if (input.files && input.files[0]) {
    //     var reader = new FileReader();

    //     reader.onload = function (e) {
    //         $('#screenshot').attr('src', e.target.result);
    //     };

    //     reader.readAsDataURL(input.files[0]);
    // }

	var id = document.getElementById("photoDisplay");
    var name = document.forms["photoUpload"]["file_0"].value;
    return id.innerHTML=name;
}
