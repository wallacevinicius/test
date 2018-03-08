<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>MDP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,400,400i,700,700i" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/global.css">
</head>
<body>
	<div id="main">
	<div class="container">
		<div id="base">
			<nav class="navbar navbar-expand-lg navbar-light bg-white">
				<a class="navbar-brand" href="#"><img src="assets/images/mdp.png" width="120" alt=""></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<i class="fa fa-th-list" aria-hidden="true"></i>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<?php include "pages/navbar.php" ?>								      
					</ul>
				</div>

				<div class="groups">
					<img src="assets/images/csbl.png" width="90" alt="" style="float: right;">
					<img src="assets/images/lib.png" width="120" alt="" style="float: right;">					
				</div>				
			</nav>

			<div id="slide">
				<h1>Run (All genes)</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur numquam reiciendis odio accusantium voluptatem minus iste ratione, quod, maxime excepturi debitis dicta sint sed omnis fugit laudantium rem ad non!</p>
			</div>
			<div id="baseButtons">
				<?php include "pages/buttons.php" ?>
			</div>
			<div id="forms">
				<div class="alert alert-primary" role="alert">
	  				To show all plots you have to <b>upload</b> the input files
				</div>

				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Hey there!</strong> Something is wrong.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<form enctype="multipart/form-data" id="formUpload">	

					<?php $GLOBALS['DIR_RANDOM'] = md5(date('Y-m-d H:i:s.') . gettimeofday()['usec']) ; ?>
					<input type="hidden" name="exec" value="<?php echo $DIR_RANDOM ?>">

					<h3><i class="fa fa-file-text-o" aria-hidden="true"></i>
 Inputs</h3>
					<p>Select the files that the inputs ask you</p>


					<div class="dropdown-divider"></div>
					<div class="form-group">
						<label for="expressionData">Expression Data</label>
						<div class="baseFile">
							<input type="file" data-id="1" data-number=2 name="expressionData" class="form-control-file" id="expressionData" accept="text/csv,text/tab-separated-values,text/plain,.tsv,.csv,.txt">
							<div class="buttonFile">Browser</div>
							<span>Select or drag a file here</span>
						</div>
						<small id="dataHelp" class="form-text text-muted"><a href="example/GSE19439_data.tsv"  download>Click here</a> to see a example</small>
						<div class="progress" data-action="progress" data-prog="1">
							<div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>

					<div class="form-group">
						<label for="phenotypicData">Phenotypic Data</label>
						<div class="baseFile">
							<input type="file" data-id="2" data-number=2 name="phenotypicData" class="form-control-file" id="phenotypicData" accept="text/csv,text/tab-separated-values,text/plain,.tsv,.csv,.txt">
							<div class="buttonFile">Browser</div>
							<span>Select or drag a file here</span>
						</div>
						
						<small id="dataHelp" class="form-text text-muted"><a href="example/GSE19439_pdata.tsv" download>Click here</a> to see a example</small>
						<div class="progress" data-action="progress" data-prog="2">
							<div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
				</form>
				
				<!-- FORM WITH OPTION POST PER JS -->
				<form enctype="multipart/form-data" id="formData" method="POST" action="assets/scripts/plot.php">
					<input type="hidden" name="exec" value="<?php echo $DIR_RANDOM ?>">

					<div class="form-group bottomSpace">
						<label for="param">Select the parameter</label>
						<select class="form-control" name="class" id="param">
							<option>Upload some file in Phenotypic Data</option>
						</select>
					</div>

					<h3><i class="fa fa-list" aria-hidden="true"></i> Parameters</h3>
					<p>Select the parameters that the inputs ask you</p>
					<div class="dropdown-divider"></div>
					<div class="form-group">
						<label for="average">Statistics average method</label>
						<select class="form-control" name="stats" id="average">
							<option>Median</option>
							<option>Mean</option>
						</select>
					</div>
					<div class="form-group">
						<label for="stan">Standart deviation</label>
						<select class="form-control" name="stan" id="stan">
							<option>1</option>
							<option>2</option>
							<option>3</option>
						</select>
					</div>						
					<div class="form-group">
						<label for="pertubed">Top perturbed genes (<i class="fa fa-percent" aria-hidden="true"></i>)</label>
						<select class="form-control" name="average" id="pertubed">
							<option>0.05</option>
							<option>0.1</option>
							<option>0.15</option>
							<option>0.2</option>
							<option>0.25</option>
							<option>0.30</option>
							<option>0.35</option>
							<option>0.40</option>
							<option>0.45</option>
							<option>0.50</option>						
							<option>0.55</option>
							<option>0.6</option>
							<option>0.65</option>
							<option>0.7</option>
						</select>
					</div>
					<div id="loading">Imagem here</div>
					<input type="submit" class="btn btn-primary upload" value="Create plot" id="creatPlot">		
				</form>
			</div>

		</div>
	</div>
	</div>
	<div class="container">
		<div class="footer">
			<?php include "pages/footer.php" ?>
		</div>
	</div>	
</body>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/jquery-ui.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<script src="assets/js/global.js"></script>

</html>
