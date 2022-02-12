$(document).ready(function() {

	App.init();
    //First upload
    var firstUpload = new FileUploadWithPreview('myFirstImage')
    //Second upload
    var secondUpload = new FileUploadWithPreview('mySecondImage')

	$('#banner-file').on('change', function () {
        
		alert('aSome');
		
       	var bast64 = window.URL.createObjectURL(this.files[0]);
       	$('#bannerImage').attr('src', bast64);

        // $('#banner-file-form').submit();

    });//end of change file

		
});//end of redy function