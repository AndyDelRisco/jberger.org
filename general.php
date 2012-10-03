<?php

function createXPathExplorer($fileName) {
	$xml = new DOMDocument();
	$xml->Load($fileName);
	return new DOMXPath($xml);
}

function getCourseTextElement($xPath, $elementName) {
	return $xPath->query("/course/$elementName")->item(0)->nodeValue;
}

function generateAssignmentList($xPath, $dateFilter) {
	echo "<ul>";
	$list = $xPath->query("/course/assignment[publication <= $dateFilter]");
	$assignmentNumber = $list->length;
	if ($assignmentNumber == 0) {
		echo "<li>À venir...</li>";
	} else {
		for ($i = 0; $i < $assignmentNumber; $i++) {
			$node = $list->item($i);
			echo "<li>";
			echo '<a href="';
			echo $node->getElementsByTagName("link")->item(0)->nodeValue;
			echo '">';
			echo $node->getAttribute("name");
			echo "</a>";
			echo "</li>";
		}
	}
	echo "</ul>";
}

function generateCalendar($xPath) {
	echo "<ul>";
	$list = $xPath->query("/course/calendar/item");
	$itemNumber = $list->length;
	if ($itemNumber == 0) {
		echo "<li>À venir...</li>";
	} else {
		for ($i = 0; $i < $itemNumber; $i++) {
			echo "<li>";
			echo $node = $list->item($i)->textContent;
			echo "</li>";
		}
	}
	echo "</ul>";
}

function generateContentList($node) {
	$contentList = $node->getElementsByTagName("content");
	$contentNumber = $contentList->length;
	if ($contentNumber > 0) {
		echo "<p>Cours (" . $node->getElementsByTagName("classdate")->item(0)->nodeValue . ") :</p>";
		echo "<ul>";
		for ($i = 0; $i < $contentNumber; $i++)
		echo "<li>" . $contentList->item($i)->nodeValue . "</li>";
		echo "</ul>";
	}
}

function generateLabList($node) {
	$labList = $node->getElementsByTagName("lab");
	$labNumber = $labList->length;
	echo "<p>Laboratoire (" . $node->getElementsByTagName("labdate")->item(0)->nodeValue . ") :</p>";
	echo "<ul>";
	if ($labNumber == 0)
	echo "<li>Aucun</li>";
	else {
		for ($i = 0; $i < $labNumber; $i++)
		echo "<li>" . $labList->item($i)->nodeValue . "</li>";
	}
	echo "</ul>";
}
?>