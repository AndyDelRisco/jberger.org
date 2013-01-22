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

function convertMonth($monthNumber) {
	$months = array("janvier",
					"février",
					"mars",
					"avril",
					"mai",
					"juin",
					"juillet",
					"août",
					"septembre",
					"octobre",
					"novembre",
					"décembre");
	return $months[$monthNumber - 1];
}

function convertToReadableDate($formatDate) {
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
	$readableDate = $readableDate . " " . convertMonth($month) . " " . $year;

	return $readableDate;
}

function convertToReadableDateTEMP($formatDate) {
	$year = substr($formatDate, 0, 4);
	$month = substr($formatDate, 4, 2);
	$day = substr($formatDate, 6, 2);

	if ($day < 10) {
		$day = substr($day, 1, 1);
	}

	$readableDate = $day;
	if ($day == 1) {
		$readableDate = $readableDate . "er";
	}
	$readableDate = $readableDate . " " . convertMonth($month) . " " . $year;

	return $readableDate;
}
?>
