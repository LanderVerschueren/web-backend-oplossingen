<?php
	$getal1 = 150;
	$getal2 = 100;

	function __autoload( $className ) 
	{
		include ('classes/' . $className . '.php');
	}

	$percentClass = new Percent($getal1, $getal2);
?>

<html>
<head>
	<title></title>
</head>
<body>
	<p>Hoeveel procent is <?= $getal1 ?> van <?= $getal2 ?>?</p>

	<table>
		<tr>
			<td>Absoluut</td>
			<td><?= $percentClass->absolute ?></td>
		</tr>
		<tr>
			<td>Relatief</td>
			<td><?= $percentClass->relative ?></td>
		</tr>
		<tr>
			<td>Geheel getal</td>
			<td><?= $percentClass->hundred ?></td>
		</tr>
		<tr>
			<td>Nominaal</td>
			<td><?= $percentClass->nominal ?></td>
		</tr>
	</table>
</body>
</html>