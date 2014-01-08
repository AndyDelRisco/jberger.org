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

require("dates.php");

function createXPathExplorer($fileName) {
	$xml = new DOMDocument();
	$xml->Load($fileName);
	return new DOMXPath($xml);
}

function getCourseTextElement($xPath, $elementName) {
	return $xPath->query("/course/$elementName")->item(0)->nodeValue;
}

function generateDocumentList($xPath, $dateFilter) {
	echo "<ul>";
	$list = $xPath->query("/course/document[publication <= $dateFilter]");
	$documentNumber = $list->length;
	if ($documentNumber == 0) {
		echo "<li>À venir...</li>";
	} else {
		for ($i = 0; $i < $documentNumber; $i++) {
			$node = $list->item($i);
			echo "<li>";
			$linkContent = $node->getElementsByTagName("link")->item(0)->nodeValue;
			echo "<a href='$linkContent'>";
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
		echo "<p>Cours du " . convertToReadableDate($node->getElementsByTagName("classdate")->item(0)->nodeValue) . " :</p>";
		echo "<ul>";
    for ($i = 0; $i < $contentNumber; $i++) {
      $content = $contentList->item($i);
			echo "<li>" . getContentLabel($content) . getContentLink($content) . "</li>";
		}
		echo "</ul>";
	}
}

function getContentLabel($content) {
  return $content->getElementsByTagName("label")->item(0)->nodeValue;
}

function getContentLink($content) {
  $linkList = $content->getElementsByTagName("link");
  if ($linkList->length == 0) {
    return "";
  }

  $link = $linkList->item(0)->nodeValue;
  return " (<a href='$link'>fichier</a>)";
}

function generateLabList($node) {
  $labdateList = $node->getElementsByTagName("labdate");
  if ($labdateList->length > 0) {
    $labList = $node->getElementsByTagName("lab");
    $labNumber = $labList->length;
    echo "<p>Laboratoire du " . convertToReadableDate($labdateList->item(0)->nodeValue) . " :</p>";
    echo "<ul>";
    if ($labNumber == 0) {
      echo "<li>Aucun</li>";
    } else {
      for ($i = 0; $i < $labNumber; $i++) {
        $lab = $labList->item($i);
        echo "<li>" . $lab->nodeValue . "</li>";
      }
    }
    echo "</ul>";
  }
}

function generateEmptyPost() {
	echo '<div class="post">';
	echo '<div class="post-title">Cours</div>';
	echo '<div class="publication">...</div>';
	echo "<p>Je ne donne pas ce cours en ce moment...</p>";
	echo "</div>";
}

function generateSinglePost($node) {
	echo '<div class="post">';
	echo '<div class="post-title">';
	echo 'Semaine ' . $node->getAttribute("number");
	echo "</div>";
	echo '<div class="publication">';
	echo "Publié le " . convertToReadableDate($node->getElementsByTagName("publication")->item(0)->nodeValue);
	echo '</div>';
  generateContentList($node);
  generateLabList($node);
	echo "</div>";
}

function generatePosts($xPath, $dateFilter) {
	$weeks = $xPath->query("/course/week[publication <= $dateFilter]");
	$weekNumber = $weeks->length;
	if ($weekNumber == 0) {
		generateEmptyPost();
	} else {
		for ($i = $weekNumber - 1; $i >= 0; $i--) {
			generateSinglePost($weeks->item($i));
			if ($i > 0) {
				echo "<hr>";
			}
		}
	}
}

function generateAdditionalMaterial($xPath) {
  $additionalMaterial = $xPath->query("/course/additional-material/item");
  if ($additionalMaterial->length > 0) {
    echo "<div id='additional-material'>";
    echo "<h2 class='title'>Matériel complémentaire</h2>";
    echo "<ul>";
    for ($i = 0; $i < $additionalMaterial->length; $i++) {
      $item = $additionalMaterial->item($i);
      $label = $item->getElementsByTagName("label")->item(0)->nodeValue;
      $link = $item->getElementsByTagName("link")->item(0)->nodeValue;
      echo "<li><a href='$link'>$label</a></li>";
    }
    echo "</ul>";
    echo "</div>";
  }
}
?>
