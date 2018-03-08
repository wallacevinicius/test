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
		c = $('[data-prog="'+num+'"]'),
		d = $('[data-prog="'+num+'"] .progress-bar');
		alert("Inicio"+num);
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
							d.animate({'width': Math.round(percentComplete1 * 100)+'%'});
							console.log(Math.round(percentComplete1 * 100));
						}
					}, false);
					xhr.addEventListener("progress", function(evt){
						if(evt.lengthComputable){
							var percentComplete1 = evt.loaded / evt.total;
							d.animate({'width': Math.round(percentComplete1 * 100)+'%'});
							console.log(percentComplete1);
						}
					}, false);
					return xhr; 
				},
				beforeSend: function(){
					c.fadeIn(0);
					d.addClass('progress-bar-animated');
				},
				complete: function(){
					d.removeClass('progress-bar-animated');
					alert(num);
				},
				error: function(data){
					console.log(data);
				},
				success: function(data){
					alert(num);
					d.addClass('bg-success');
					d.html("Upload Complete");
					d.removeClass('progress-bar-animated');
					if(num == 2){
						alert(num);
						if (data.error) {
							console.info(data.error);

							if ( $("#phenotypicData").val() ) {
								$("#param").append("<option>Select</option>");
							}

							console.log( data );

						} else if (data.classes) {

							console.log( data );

							if ( $("#phenotypicData").val() ) {
								$("#param").html("");

								$.each(data.classes, function() {
									$("#param").append("<option>"+this+"</option>");
								});
							}
						}
					} else if(num == 3){
						alert(num);
						if (data.error) {
							console.info(data.error);

							if ( $("#pathwaysGMT").val() ) {
								$("#param2").append("<option>Select</option>");
							}

							console.log( data );

						} else if (data.classes) {

							console.log( data );

							if ( $("#pathwaysGMT").val() ) {
								$("#param2").html("");

								$.each(data.classes, function() {
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