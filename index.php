<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Jacques Berger - Développeur et enseignant</title>
<link href="style.css" rel="stylesheet" type="text/css">
<script type="text/javascript"
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script type="text/javascript">
	<?php require("js/script.js"); ?>
</script>
</head>
<body>
	<div id="page">	
		<?php
			require("scripts/header.php"); 
			require("scripts/leftbar.php"); 
		?>
		<div id="rightbar">
			<div class="bar-section">
				<h2 class="title">Articles</h2>
				<ul>
					<li><span class="category" onclick="toggleArticles('cat1');">Littérature
							technique (2)</span>
						<ul class="articles" id="cat1">
							<li><a href="#">Critique de Clean Code : A Handbook of
									Agile Software Craftmanship</a></li>
							<li><a href="#">Critique de Working Effectively with
									Legacy Code</a></li>
						</ul></li>
					<li><span class="category" onclick="toggleArticles('cat2');">Carrière
							(1)</span>
						<ul class="articles" id="cat2">
							<li><a href="#">Améliorer son salaire en trois ans</a></li>
						</ul></li>
					<li><span class="category" onclick="toggleArticles('cat3');">Technologie
							(4)</span>
						<ul class="articles" id="cat3">
							<li><a href="#">Programmation par aspects</a></li>
							<li><a href="#">Comparaison d'Oracle et SQL Server</a></li>
							<li><a href="#">Architecture Javascript</a></li>
							<li><a href="#">PHP en 2012</a></li>
						</ul></li>
				</ul>
			</div>

			<div class="bar-section">
				<h2 class="title">Nouvelles</h2>
				<?php include("scripts/twitter.php"); ?>
			</div>
		</div>

		<div id="content">
			<h2 class="title">Mises à jour</h2>
			<div class="post">
				<div class="post-title">Lorem Ipsum</div>
				<div class="publication">Publiée le 28 juin 2012</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
					do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
					enim ad minim veniam, quis nostrud exercitation ullamco laboris
					nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
					reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
					pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
					culpa qui officia deserunt mollit anim id est laborum.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
					do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
					enim ad minim veniam, quis nostrud exercitation ullamco laboris
					nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
					reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
					pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
					culpa qui officia deserunt mollit anim id est laborum.</p>
				<div class="author">Jacques Berger</div>
			</div> 
			<hr>
			<div class="post">
				<div class="post-title">Lorem Ipsum</div>
				<div class="publication">Publiée le 28 juin 2012</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
					do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
					enim ad minim veniam, quis nostrud exercitation ullamco laboris
					nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
					reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
					pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
					culpa qui officia deserunt mollit anim id est laborum.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
					do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
					enim ad minim veniam, quis nostrud exercitation ullamco laboris
					nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
					reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
					pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
					culpa qui officia deserunt mollit anim id est laborum.</p>
				<div class="author">Jacques Berger</div>
			</div>
			<hr>
			<div class="post">
				<div class="post-title">Lorem Ipsum</div>
				<div class="publication">Publiée le 28 juin 2012</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
					do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
					enim ad minim veniam, quis nostrud exercitation ullamco laboris
					nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
					reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
					pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
					culpa qui officia deserunt mollit anim id est laborum.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
					do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
					enim ad minim veniam, quis nostrud exercitation ullamco laboris
					nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
					reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
					pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
					culpa qui officia deserunt mollit anim id est laborum.</p>
				<div class="author">Jacques Berger</div>
			</div>
		</div>
		
		<?php require("scripts/footer.php"); ?>
	</div>
</body>
</html>
