<?php
/* Copyright 2011 Jacques Berger

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

function createXPathExplorer($fileName) {
	$xml = new DOMDocument();
	$xml->Load($fileName);
	return new DOMXPath($xml);
}

function displayDisconnect() {
	echo "<form action='index.php' method='post' onsubmit='resetCookie();'>";
	echo "<p><input type='submit' value='Déconnexion'></p>";
	echo "</form>";
}

function displayLectureNotes($students, $Id) {
	$name = getStudentName($students, $Id);
	$courseElements = getStudentCourseElements($students, $Id);
	echo "<p>Bonjour $name.</p>";
	
	for ($i = 0; $i < $courseElements->length; $i++) {
		$courseId = $courseElements->item($i)->getAttribute("id");
		echo "<h1>$courseId</h1>";
		
		$xPath = createXPathExplorer($courseId . ".xml");
		$notes = $xPath->query("/notes/note");
		if ($notes->length > 0) {
			echo "<ul>";
			for ($j = 0; $j < $notes->length; $j++) {
				$note = $notes->item($j);
				echo "<li>";
				echo $note->getElementsByTagName("label")->item(0)->textContent;
				echo " (";
				echo '<a href="files/' . $note->getElementsByTagName("pdf")->item(0)->textContent . '">';
				echo "PDF";
				echo "</a>";
				echo " | ";
				echo '<a href="files/' . $note->getElementsByTagName("impress")->item(0)->textContent . '">';
				echo "Impress";
				echo "</a>";
				echo ")";
				echo "</li>";
			}
			echo "</ul>";
		}
	}
}

function displayLoginPrompt() {
	echo "<form action='index.php' method='post' onsubmit='saveCookie();'>";
	echo "<table>";
	echo "<tr>";
	echo "<td>Nom d'utilisateur :</td>";
	echo "<td><input type='text' name='login' id='login'></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Mot de passe :</td>";
	echo "<td><input type='password' name='password' id='password'></td>";
	echo "</tr>";
	echo "</table>";
	echo "<p><input type='submit' value='Valider'></p>";
	echo "</form>";
	echo '<a href="help.html" style="font-size:10px">' . "Je ne connais pas mon nom d'utilisateur ou mon mot de passe" . "</a>";
}

function displayLoginError() {
	echo '<p><img src="images/trollface.jpg" alt="Problem?"></p>';
	echo "<p>La tentative de connexion a échoué. Voici la marche à suivre :</p>";
	echo "<ul>";
	echo "<li>Vérifiez votre nom d'utilisateur et votre mot de passe. Les lettres du code permanent doivent être en majuscules.</li>";
	echo "<li>Si vous êtes inscrit depuis peu de temps à un de mes cours, avisez-moi" . 
	      ' <a href="mailto:berger.jacques@uqam.ca">par courriel</a> pour que je' .
	      " vous donne accès aux notes de cours. Spécifiez le sigle du cours dans votre courriel.</li>";
	echo "<li>Si vous n'êtes pas inscrit à un de mes cours, inutile de m'écrire pour avoir un accès.</li>";
	echo "</ul>";
}

function validateLogin($students, $login, $password) {
	if ($login != $password)
		return false;
	
	$studentList = $students->query("/students/student[@id='$login']");
	if ($studentList->length == 1)
		return true;
	
	return false;
}

function checkLoginAttempt() {
	if (isset($_POST["login"]) || isset($_POST["password"]))
		return true;

	return false;
}

function checkLogin($students) {
	if (!isset($_POST["login"]) || !isset($_POST["password"]))
		return false;
	
	return validateLogin($students, $_POST["login"], $_POST["password"]);
}

function getStudentId() {
	if (isset($_POST["login"]))
		return $_POST["login"];
	return ""; 
}

function getStudentName($students, $studentId) {
	return $students->query("/students/student[@id='$studentId']/name")->item(0)->textContent;
}

function getStudentCourseElements($students, $studentId) {
	return $students->query("/students/student[@id='$studentId']/course");
}

$studentsDocument = createXPathExplorer("students.xml");
$loginAttempted = checkLoginAttempt();
$loginSucceeded = checkLogin($studentsDocument);
$studentId = getStudentId();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Notes de cours</title>
<script type="text/javascript">
<?php require("script.js"); ?>
</script>
</head>
<body>
	<div>
	<?php
		if ($loginAttempted) {
			if ($loginSucceeded)
				displayLectureNotes($studentsDocument, $studentId);
			else {
				displayLoginError();
				displayLoginPrompt();
			}
		} else {
			displayLoginPrompt();
		}
	?>
	</div>
</body>
</html>