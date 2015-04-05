<html>
    <head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </head>
    <body>
	<div class='container'>
	<br/>
        <div class="progress">
		  <div class="progress-bar progress-bar-striped active" id='mybar' role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 2%">20%
		  </div>
		</div>
		
		 <button type="button" class="btn btn-default" onclick='makeRequest()'>Show Demo</button>
    </div>
    </body>
	<script>
	function makeRequest(){
		var bar = $('#mybar');
		// Lets pick a sample url of google maps api
		var url = 'https://maps.googleapis.com/maps/api/streetview?size=400x400&location=40.720032,-73.988354&fov=90&heading=235&pitch=10'
	    var xhr = new XMLHttpRequest();
	    xhr.open("GET", url, true);
	    xhr.responseType = "document";
		
		xhr.addEventListener("load", function () {
			if (xhr.status === 200) {
                alert("Reqeuest Complete!!");				
			} else {
			  alert('Error making the request');
			}
		  }, false);

		  var prev_percent = 0;
		  xhr.addEventListener("progress", function(event) {
			if (event.lengthComputable) {
			  var percent = Math.round((event.loaded / event.total) * 100);
			  if (percent != prev_percent) {
				prev_percent = percent;
				bar.css('width', percent+"%");
             	bar.html(percent+"%");
			  }
			}
		  });
		  xhr.send();	
	}
	</script>
</html>