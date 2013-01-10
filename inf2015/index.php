<?php

require("../general.php");

function generateEmptyPost() {
	echo '<div class="post">';
	echo '<h2 class="title">Session</h2>';
	echo '<p class="meta">';
	echo '<span class="posted">Publié par Jack</span>';
	echo "</p>";
	echo '<div class="entry">';
	echo "<p>Je ne donne pas ce cours en ce moment...</p>";
	echo "</div>";
	echo "</div>";
}

function generateSinglePost($node) {
	echo '<div class="post">';
	echo '<h2 class="title">Semaine ' . $node->getAttribute("number") . "</h2>";
	echo '<p class="meta">';
	echo '<span class="posted">Publié par Jack</span>';
	echo "</p>";
	echo '<div class="entry">';

	generateContentList($node);
	generateLabList($node);

	echo "</div>";
	echo "</div>";
}

function generatePosts($xPath, $dateFilter) {
	$weeks = $xPath->query("/course/week[publication <= $dateFilter]");
	$weekNumber = $weeks->length;
	if ($weekNumber == 0) {
		generateEmptyPost();
	} else {
		for ($i = $weekNumber - 1; $i >= 0; $i--)
			generateSinglePost($weeks->item($i));
	}
}

$xPath = createXPathExplorer("inf2015.xml");

$courseId = getCourseTextElement($xPath, "identifier");
$courseName = getCourseTextElement($xPath, "name");
$group = getCourseTextElement($xPath, "group");
$session = getCourseTextElement($xPath, "session");
$today = date("Ymd");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $courseId . " - " . $courseName; ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="header">
		<div id="logo">
			<h1><?php echo $courseId; ?></h1>
			<p><?php echo $session . " - gr. " . $group; ?></p>
		</div>
		<div id="menu">
			<ul>
				<li class="current_page_item"><a href="index.php">Accueil</a></li>
				<li><a href="material.html">Matériel complémentaire</a></li>
				<li><a href="http://notes.jberger.org/">Notes de cours</a></li>
				<li><a href="mailto:berger.jacques@uqam.ca">Contact</a></li>
			</ul>
		</div>
	</div>

	<div id="page">
		<div id="content">
			<?php generatePosts($xPath, $today); ?>
			<div style="clear: both;">&nbsp;</div>
		</div>

		<div id="sidebar">
			<?php include("../twitter.php"); ?>
			<br />
			<ul>
				<li>
					<h2>Calendrier</h2>
					<?php generateCalendar($xPath); ?>
				</li>
				<li>
					<h2>Documents</h2>
					<?php generateAssignmentList($xPath, $today); ?>
				</li>
			</ul>
		</div>

		<div style="clear: both;">&nbsp;</div>
	</div>
	<div id="footer">
		<p>
			&copy; 2012-2013 Jacques Berger. Tous droits réservés. Design par <a
				href="http://www.freecsstemplates.org/">Free CSS Templates</a>.
		</p>
	</div>
</body>
</html>
