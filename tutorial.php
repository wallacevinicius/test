<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>MDP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,400,400i,700,700i" rel="stylesheet">
	<link rel="stylesheet" href="../assets/css/global.css">
</head>
<body>
	<div id="main">
	<div class="container">
		<div id="base">
			<nav class="navbar navbar-expand-lg navbar-light bg-white">
				<a class="navbar-brand" href="#"><img src="../assets/images/mdp.png" width="120" alt=""></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<i class="fa fa-th-list" aria-hidden="true"></i>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<?php include "navbar.php" ?>									      
					</ul>
				</div>

				<div class="groups">
					<img src="../assets/images/csbl.png" width="90" alt="" style="float: right;">
					<img src="../assets/images/lib.png" width="120" alt="" style="float: right;">					
				</div>				
			</nav>

			<div id="slide">
				<h1>Tutorial</h1>
			</div>
			<div id="baseButtons">
				<?php include "buttons.php" ?>
			</div>
			<div id="forms">
				<form >
					<h3>Expression Data:</h3>
					<p>A tab-delimited text table of expression data that contains an initial column named "Symbol" with unique gene annotation, and other columns that contain gene expression data and sample names in the header.</p>
					<img src="../assets/images/tut1.png" width="100%" alt=""><p></p>

					<h3>Phenotypic Data:</h3>
					<p>A table that contains at least two columns, "Sample" and "Class", which contain sample and class information. One of these classes will be chosen as the control class when the data is uploaded. Other columns can be provided that contain additional phenotypic information.</p>
					<img src="../assets/images/tut2.png" width="100%" alt=""><p></p>

					<h3>Pathways gmt file (optional)</h3>
					<p>This is a .gmt format file that contains pathway information. The gene sets are arranged across the rows. The first column contains the pathway name, the second column contains a shorter description or a dummy field ("NA"), and the remainder of each row contains the gene symbols in that pathway. Rows can have unequal length. See link <a href="https://software.broadinstitute.org/cancer/software/gsea/wiki/index.php/Data_formats#GMT:_Gene_Matrix_Transposed_file_format_.28.2A.gmt.29">here</a> for more information.</p>

					<h3>Statistics average method:</h3>
					<p>By default the Z-score is calculated using the median, but it can be changed to the mean.</p>

					<h3>Standart deviation:</h3>
					<p>By default the Z-score normalized values are thresholded such that values less than 2 are set to zero, but this can be changed.</p>

					<h3>Top perturbed genes (%):</h3>
					<p>The percentage of all genes that will contribute to the "perturbed genes" list. Perturbed genes are defined as the top genes that have the greatest difference in average normalised expression value between the case samples versus the controls.</p>
										
				</form>
			</div>
		</div>
	</div>
	</div>
	<div class="container">
		<div class="footer">
			<?php include "footer.php" ?>
		</div>
	</div>	
</body>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="../assets/js/jquery.js"></script>
	<script src="../assets/js/jquery-ui.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<script src="../assets/js/global.js"></script>

</html>