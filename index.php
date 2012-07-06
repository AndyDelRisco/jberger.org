<?php 
/* Copyright 2012 Jacques Berger

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.
*/

require("functions.php");
?>
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
			<?php generateUpdatePosts(); ?>
		</div>
		
		<?php require("scripts/footer.php"); ?>
	</div>
</body>
</html>
