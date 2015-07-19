function resizePhotos(photo) {
	var resize_image = function(photo, newht, newwt) {
		photo.height = newht;
		photo.width = newwt;
		return photo
	};

	var w = photo.width, h = photo.height;
	
	var maxhw = 320, minhw = 240;

	var old_ratio = h / w;
	var min_ratio = minhw / minhw;

	if (old_ratio === min_ratio) {
		resize_image(photo, minhw, minhw);
	}
	else {
		var new_dim = [h, w];
		new_dim[0] = maxhw;
		new_dim[1] = new_dim[0] / old_ratio;
		if(new_dim[1] > maxhw){
			new_dim[1] = maxhw;
			new_dim[0] = new_dim[1] * old_ratio; 
		}
		resize_image(photo, new_dim[0], new_dim[1]);
	}
}