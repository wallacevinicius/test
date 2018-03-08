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
				<h1>About</h1>
			</div>
			<div id="baseButtons">
				<?php include "buttons.php" ?>
			</div>
			<div id="forms">
					
				<form>
					<p>The Molecular Degree of Perturbation (MDP) is a webtool that allows the examination of the heterogeneity of gene expression data. It takes data containing at least two classes (control and perturbed) and assigns a score to all samples based on how perturbed they are compared to the controls. Perturbation can be an infection, drug treatment, siRNA silencing, vaccination, and any type of disease.</p>

					<h3>What files do I need to provide?</h3>
					<p>You need to provide expression data, phenotypic data and an optional .gmt file. See the tutorial for more information.</p>

					<h3>The algorithm:</h3>
					<p>The design of the algorithm is based on the Molecular Distance to Health which was first described by Pankla et al. 2009. The MDP works as follows: a Z-score normalisation of all genes is performed using the healthy samples to compute the gene medians and standard deviations. The absolute values of this matrix are then taken. As a default, values under 2 are set to 0. The values that remain represent significant deviations from the healthy samples. The scores for each sample are calculated by finding the average of the normalised gene values for each sample, using either a) all genes, b) perturbed genes and c) optionally supplied gene sets.</p>
					<p>We define "perturbed genes" as the top 25% genes that have the greatest difference in average normalised expression value between the case samples versus the controls. The percentage chosen can be changed by the user.</p>

					<h3>What type of experimental data is the MDP useful for?</h3>
					<p>The MDP analysis is useful for gene expression data, as well as proteomic and metabolomic data, that have control and “perturbed” samples in the same dataset. The more control and perturbed samples that you have (ideally at least 10), the more accurate the calculation sample scores.</p>
											
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