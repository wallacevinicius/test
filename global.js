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
	All: function(){
		var formData = new FormData($('#formUpload')[0]),
		a = $('input[name="expressionData"]'),
		b = $('input[name="phenotypicData"]'),
		c = $('[data-prog="1"]'),
		d = $('[data-prog="1"] .progress-bar'),
		e = $('[data-prog="2"]'),
		f = $('[data-prog="2"] .progress-bar'),
		g = $('input[name="pathwaysGMT"]'),
		h = $('[data-prog="3"]'),
		i = $('[data-prog="3"] .progress-bar');
		if(a.get(0).files.length === 0){ 
			a.focus();
		} else if(a.get(0).files.length !== 0 && Upload.one == 0) {
			alert('one');
			Upload.one++;
			$.ajax({
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
							d.animate({'width': Math.round(percentComplete1 * 100)+'%'}); // mas eu acho q n ta indo n visse. q n funcionou. pq antes demorava q so pra enviar esse arquivo
							console.log(percentComplete1);
						}
					}, false);
					return xhr; 
				},
				type: 'POST',
				url: '/assets/scripts/upload.php',
				processData: false,
				contentType: false,
				data: formData,
				beforeSend: function(){
					c.fadeIn(0);
					d.addClass('progress-bar-animated');
				},
				complete: function(){
					d.html("Upload Complete");
					d.addClass('bg-success');
					d.removeClass('progress-bar-animated');
				},
				success: function(data){
					d.addClass('bg-success');
					d.html("Upload Complete");
					d.removeClass('progress-bar-animated');
					console.info(data); 

				}
			});
		}
		if(b.get(0).files.length === 0){
			b.focus();
		} else if(b.get(0).files.length !== 0 && Upload.two == 0) {
			alert('two');
			Upload.two++;
			$.ajax({
				xhr: function(){
					var xhr = new window.XMLHttpRequest();
					xhr.upload.addEventListener("progress", function(evt){
						if(evt.lengthComputable){
							var percentComplete2 = evt.loaded / evt.total;
							f.animate({'width': Math.round(percentComplete2 * 100)+'%'});
							console.log(Math.round(percentComplete2 * 100));
						}
					}, false);
					xhr.addEventListener("progress", function(evt){
						if(evt.lengthComputable){
							var percentComplete2 = evt.loaded / evt.total;
							f.animate({'width': Math.round(percentComplete2 * 100)+'%'}); // mas eu acho q n ta indo n visse. q n funcionou. pq antes demorava q so pra enviar esse arquivo
							console.log(percentComplete2);
						}
					}, false);
					return xhr;
				},
				type: 'POST',
				url: '/assets/scripts/upload.php',
				processData: false,
				contentType: false,
				data: formData,
				error: function(){
					console.log('Something is wrong.');
					$('.alert-danger').fadeIn(200);
				},
				beforeSend: function(){
					e.fadeIn(0);
					f.addClass('progress-bar-animated');
				},
				success: function(data){
					f.addClass('bg-success');
					f.html("Upload Complete");
					f.removeClass('progress-bar-animated');
					
					console.info(data);
					
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

				}
			});
		}
		if(g.get(0).files.length === 0){
			g.focus();
		} else if(g.get(0).files.length !== 0 && Upload.three == 0) {
			alert('three');
			Upload.three++;
			$.ajax({
				xhr: function(){
					var xhr = new window.XMLHttpRequest();
					xhr.upload.addEventListener("progress", function(evt){
						if(evt.lengthComputable){
							var percentComplete3 = evt.loaded / evt.total;
							i.animate({'width': Math.round(percentComplete3 * 100)+'%'});
							console.log(Math.round(percentComplete3 * 100));
						}
					}, false);
					xhr.addEventListener("progress", function(evt){
						if(evt.lengthComputable){
							var percentComplete3 = evt.loaded / evt.total;
							i.animate({'width': Math.round(percentComplete3 * 100)+'%'}); // mas eu acho q n ta indo n visse. q n funcionou. pq antes demorava q so pra enviar esse arquivo
							console.log(percentComplete3);
						}
					}, false);
					return xhr;
				},
				type: 'POST',
				url: '/assets/scripts/upload.php',
				processData: false,
				contentType: false,
				data: formData,
				/*
				error: function(){
					console.log('Something is wrong.');
					$('.alert-danger').fadeIn(200);
				},
				*/
				beforeSend: function(){
					h.fadeIn(0);
					i.addClass('progress-bar-animated');
				},
				success: function(data){
					i.addClass('bg-success');
					i.html("Upload Complete");
					i.removeClass('progress-bar-animated');
					
					console.info(data);
					
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
		c = b.substr(b.lastIndexOf('\\') + 1);
	a.next().next().html(c);
	$('#formUpload').submit();
});