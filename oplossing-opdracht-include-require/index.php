<?php
	$artikels = array
	(
		array("title" => "Titel van artikel 1", 
			"text" => "Tekst van artikel 1", 
			"tags" => array("Tag 1 van artikel 1")
			),

		array("title" => "Titel van artikel 2", 
			"text" => "Tekst van artikel 2", 
			"tags" => array("Tag 1 van artikel 2", "Tag 2 van artikel 2")
			),

		array("title" => "Titel van artikel 3", 
			"text" => "Tekst van artikel 3", 
			"tags" => array("Tag 1 van artikel 3", "Tag 2 van artikel 3", "Tag 3 van artikel 3")
			)
	);

	print '<pre>';
	print_r($artikels);
	print '</pre>';


	include 'view/header-partial.html';
	include 'view/body-partial.html';
	include 'view/footer-partial.html';
?>