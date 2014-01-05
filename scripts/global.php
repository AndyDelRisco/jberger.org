<?php 
/* Copyright 2013 Jacques Berger

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

require("../scripts/course-general.php");


$xPath = createXPathExplorer("main.xml");

$courseId = getCourseTextElement($xPath, "identifier");
$courseName = getCourseTextElement($xPath, "name");
$group = getCourseTextElement($xPath, "group");
$session = getCourseTextElement($xPath, "session");
$today = date("Ymd");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $courseId . " - " . $courseName; ?></title>
<link href="../style.css" rel="stylesheet" type="text/css">
<script type="text/javascript"
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
</head>
<body>
	<div id="page">
		<header>
      <h1>
        <?php echo "$courseId - $courseName, groupe $group, $session";?>
		  </h1>
			<h2>Jacques Berger</h2>
			<!--[if lt IE 9]>
        <marquee>Vous utilisez une ancienne version d'Internet Explorer.
                 Votre version ne supporte pas les balises HTML5.
                 Rendez-vous service et téléchargez un fureteur à jour dès maintenant 
                 (Internet Explorer 9, Firefox ou Chrome).</marquee>
    <![endif]-->
		</header>
		
		<?php require("../scripts/leftbar.php"); ?>
		<div id="rightbar">
			<div class="bar-section">
				<h2 class="title">Calendrier</h2>
				<?php generateCalendar($xPath); ?>
			</div>

			<div class="bar-section">
				<h2 class="title">Documents</h2>
				<?php generateDocumentList($xPath, $today); ?>
			</div>

			<div class="bar-section">
				<h2 class="title">Nouvelles</h2>
				<?php include("../scripts/twitter.php"); ?>
			</div>
		</div>

		<div id="content">
			<h2 class="title">Contenu hebdomadaire</h2>
			<?php generatePosts($xPath, $today); ?>
			<?php generateAdditionalMaterial($xPath); ?>
		</div>

		<footer>&copy; 2014 Jacques Berger</footer>
	</div>
</body>
</html>
