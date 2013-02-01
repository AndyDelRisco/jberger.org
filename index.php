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
<title>Jacques Berger - Développeur, enseignant et musicien</title>
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
				<?php generateArticleIndex(); ?>
			</div>

			<div class="bar-section">
				<h2 class="title">Nouvelles</h2>
				<?php include("scripts/twitter.php"); ?>
			</div>
		</div>

		<div id="content">
			<?php
				if (isset($_GET["article"]) && file_exists("articles/" . $_GET["article"] . ".xml")) {
					echo '<h2 class="title">Article</h2>';
					generateArticle("articles/" . $_GET["article"] . ".xml");
				} else {
			        echo '<h2 class="title">Blog</h2>';
			        generateBlogPosts();
				} 
			?>
		</div>
		<?php require("scripts/footer.php"); ?>
	</div>
</body>
</html>
