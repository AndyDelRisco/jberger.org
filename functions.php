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

require("scripts/dates.php");

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
				$url = $node->textContent;
				echo "<a href=\"$url\">$url</a>";
			}
			echo "</p>";
		}
	}
}

function generateEmptyPost() {
	echo '<div class="post">';
	echo '<div class="post-title">Aucune mise à jour</div>';
	echo '<div class="publication">Publiée aujourd\'hui</div>';
	echo "<p>Aucune mise à jour n'a été publiée pour l'instant.</p>";
	echo '<div class="author">Jacques Berger</div>';
	echo "</div>";
}

function generateUpdatePosts() {
	$document = new DOMDocument();
	$document->load("xml/updates.xml");
	$updates = $document->getElementsByTagName("update");
	$updateCount = $updates->length;
	
	if ($updateCount == 0) {
		generateEmptyPost();
	} else {
		for ($i = 0; $i < $updateCount; $i++) {
			$updateNode = $updates->item($i);
			
			echo '<div class="post">';
			$title = $updateNode->getElementsByTagName("title")->item(0)->textContent;
			echo "<div class=\"post-title\">$title</div>";
			$readableDate = convertToReadableDate($updateNode->getElementsByTagName("date")->item(0)->textContent);
			echo "<div class=\"publication\">Publiée le $readableDate</div>";
			generatePostContent($updateNode->getElementsByTagName("content")->item(0));
			echo '<div class="author">Jacques Berger</div>';
			echo "</div>";
			
			if ($i < ($updateCount - 1)) {
				echo "<hr>";
			}
		}
	}
}

function generateDocbookSection($sectionNode) {
	$nodes = $sectionNode->childNodes;
	for ($i = 0; $i < $nodes->length; $i++) {
		$node = $nodes->item($i);
		
		if ($node->nodeName == "title") {
			echo "<p class=\"section-title\">$node->textContent</p>";
		} else if ($node->nodeName == "para") {
			echo "<p>$node->textContent</p>";
		}
	}
}

function generateArticle($filename) {
	$document = new DOMDocument();
	$document->load($filename);
	$info = $document->getElementsByTagName("info")->item(0);
	
	echo '<div class="post">';
	$title = $info->getElementsByTagName("title")->item(0)->textContent; 
	echo "<div class=\"post-title\">$title</div>";
	$readableDate = convertToReadableDate($info->getElementsByTagName("pubdate")->item(0)->textContent); 
	echo "<div class=\"publication\">Publiée le $readableDate</div>";
	$sections = $document->getElementsByTagName("section");
	for ($i = 0; $i < $sections->length; $i++) {
		generateDocbookSection($sections->item($i));
	}

	echo '<div class="author">Jacques Berger</div>';
	echo "</div>";
}

function generateArticleIndex() {
	$document = new DOMDocument();
	$document->load("xml/articleindex.xml");
	$sections = $document->getElementsByTagName("section");
	
	echo "<ul>";
	for ($i = 0; $i < $sections->length; $i++) {
		$section = $sections->item($i);
		$articles = $section->getElementsByTagName("article");
		
		echo "<li>";
		$categoryId = "cat" . $i;
		$jsOnClickEvent = "toggleArticles('$categoryId');";
		$categoryName = $section->getAttribute("name");
		echo "<span class=\"category\" onclick=\"$jsOnClickEvent\">$categoryName ($articles->length)</span>";
		
		echo "<ul class=\"articles\" id=\"$categoryId\">";
		for ($j = 0; $j < $articles->length; $j++) {
			$article = $articles->item($j);
			echo "<li>";
			$articleIdentifier = $article->getElementsByTagName("identifier")->item(0)->textContent;
			$articleTitle = $article->getElementsByTagName("title")->item(0)->textContent; 
			echo "<a href=\"index.php?article=$articleIdentifier\">$articleTitle</a>";
			echo "</li>";
		}
		echo "</ul>";
		echo "</li>";
	}

	echo "</ul>";
}
?>