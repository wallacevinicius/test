$(document).ready(function(){
	$('.alert-danger').hide();
	$("#loading").hide();
    $("#creatPlot").click(function(){
        $("#loading").fadeIn(1000);
    });
});

var Upload = {
	one: 0,
	two: 0,
	three: 0,
	num: 0,
	All: function(num){
		var formData = new FormData($('#formUpload')[0]),
		num = Upload.num,
		inputFile = $('[data-prog="'+num+'"]'),
		progressBar = $('[data-prog="'+num+'"] .progress-bar');
		if(Upload.one == 0 && num == 1 || Upload.two == 0 && num == 2 || Upload.three == 0 && num == 3){
			$.ajax({
				type: 'POST',
				url: '/assets/scripts/upload.php',
				processData: false,
				contentType: false,
				data: formData,
				cache: false,
				xhr: function(){
					var xhr = new window.XMLHttpRequest();
					xhr.upload.addEventListener("progress", function(evt){
						if(evt.lengthComputable){
							var percentComplete1 = evt.loaded / evt.total;
							progressBar.animate({'width': Math.round(percentComplete1 * 100)+'%'});
							console.log(Math.round(percentComplete1 * 100));
						}
					}, false);
					xhr.addEventListener("progress", function(evt){
						if(evt.lengthComputable){
							var percentComplete1 = evt.loaded / evt.total;
							progressBar.animate({'width': Math.round(percentComplete1 * 100)+'%'});
							console.log(percentComplete1);
						}
					}, false);
					return xhr; 
				},
				beforeSend: function(){
					inputFile.fadeIn(0);
					progressBar.addClass('progress-bar-animated');
				},
				complete: function(){
					progressBar.addClass('bg-success');
					progressBar.html("Upload Complete");
					progressBar.removeClass('progress-bar-animated');
				},
				error: function(data){
					console.log(data);
				},
				success: function(data){
					progressBar.addClass('bg-success');
					progressBar.html("Upload Complete");
					progressBar.removeClass('progress-bar-animated');
					if(num == 2){
						if (data.error) {
							$('.alert-danger').html("<i class='fas fa-exclamation-circle'></i> "+data.error);
							$('.alert-danger').fadeIn(200);
							if ( $("#phenotypicData").val() ) {
								$("#param").append("<option>Select</option>");
							}

						} else if (data.classes1) {
							$('.alert-danger').fadeOut(200);
							if ( $("#phenotypicData").val() ) {
								$("#param").html("");
								$.each(data.classes1, function() {
									$("#param").append("<option>"+this+"</option>");
								});
							}
						}
					} else if(num == 3){
						if (data.error) {
							$('.alert-danger').html("<i class='fas fa-exclamation-circle'></i> "+data.error);
							$('.alert-danger').fadeIn(200);
							if ( $("#pathwaysGMT").val() ) {
								$("#param2").append("<option>Select</option>");
							}
						} else if(data.classes2) {
							$('.alert-danger').fadeOut(200);
							if ($("#pathwaysGMT").val()) {
								$("#param2").html("");

								$.each(data.classes2, function() {
									$("#param2").append("<option>"+this+"</option>");
								});
							}
						} 
					}
				}
			});
		}
	}
}
$('#formUpload').submit(function(){
	Upload.All();
	return false;
});
$('input[type=file]').change(function(){
	var a = $(this),
		b = a.val(),
		c = b.substr(b.lastIndexOf('\\') + 1),
		d = a.attr('data-id');
	a.next().next().html(c);
	Upload.num = d;
	$('#formUpload').submit();
});