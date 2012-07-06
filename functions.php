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

/*
 * <div class="post">
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
 */

function convertDate($formatDate) {
	$year = substr($formatDate, 0, 4);
	$month = substr($formatDate, 5, 2);
	$day = substr($formatDate, 8, 2);
	
	if ($day < 10) {
		$day = substr($day, 1, 1);
	}
	
	$readableDate = $day;
	if ($day == 1) {
		$readableDate = $readableDate . "er";
	}
	$readableDate = $readableDate . " ";
	
	switch($month) {
		case 1:
			$readableDate = $readableDate . "janvier";
			break;
		case 2:
			$readableDate = $readableDate . "février";
			break;
		case 3:
			$readableDate = $readableDate . "mars";
			break;
		case 4:
			$readableDate = $readableDate . "avril";
			break;
		case 5:
			$readableDate = $readableDate . "mai";
			break;
		case 6:
			$readableDate = $readableDate . "juin";
			break;
		case 7:
			$readableDate = $readableDate . "juillet";
			break;
		case 8: 
			$readableDate = $readableDate . "août";
			break;
		case 9:
			$readableDate = $readableDate . "septembre";
			break;
		case 10:
			$readableDate = $readableDate . "octobre";
			break;
		case 11:
			$readableDate = $readableDate . "novembre";
			break;
		case 12:
			$readableDate = $readableDate . " ";
			break;
	}
	$readableDate = $readableDate . " " . $year;
	
	return $readableDate;
}

function generatePostContent($contentNode) {
	$nodes = $contentNode->childNodes;
	$nodeCount = $nodes->length;
	if ($nodeCount == 0) {
		echo "<p>Erreur : Aucun contenu</p>";
	} else {
		for ($i = 0; $i < $nodeCount; $i++) {
			$node = $nodes->item($i);
			
			echo "<p>";
			if ($node->nodeName == "para") {
				echo $node->textContent;
			} else if ($node->nodeName == "link") {
				echo '<a href="' . $node->textContent . '">' . $node->textContent . "</a>";
			}
			echo "</p>";
		}
	}
}

function generateUpdatePosts() {
	$document = new DOMDocument();
	$document->load("xml/updates.xml");
	$updates = $document->getElementsByTagName("update");
	$updateCount = $updates->length;
	
	if ($updateCount == 0) {
		echo '<div class="post">';
		echo '<div class="post-title">Aucune mise à jour</div>';
		echo '<div class="publication">Publiée aujourd\'hui</div>';
		echo "<p>Aucune mise à jour n'a été publiée pour l'instant.</p>";
		echo '<div class="author">Jacques Berger</div>';
		echo "</div>";
	} else {
		for ($i = 0; $i < $updateCount; $i++) {
			$updateNode = $updates->item($i);
			
			echo '<div class="post">';
			echo '<div class="post-title">' . $updateNode->getElementsByTagName("title")->item(0)->textContent . '</div>';
			echo '<div class="publication">Publiée le ' . convertDate($updateNode->getElementsByTagName("date")->item(0)->textContent) . '</div>';
			generatePostContent($updateNode->getElementsByTagName("content")->item(0));
			echo '<div class="author">Jacques Berger</div>';
			echo "</div>";
			
			if ($i < ($updateCount - 1)) {
				echo "<hr>";
			}
		}
	}
}
?>