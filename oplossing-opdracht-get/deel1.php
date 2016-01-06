<?php
	$artikels = array(
					array(
						'titel' => 'Wilmots en bond lijnrecht tegenover elkaar over verhuis naar nieuw oefencentrum',
						'datum' => '7 oktober 2015',
						'inhoud' => 'De voetbalbond en Marc Wilmots staan lijnrecht tegenover mekaar 
						over het nationaal oefencentrum in Tubeke. 
						De bond wil dat de Rode Duivels vanaf volgend jaar in Tubeke gaan trainen en logeren, 
						maar de bondscoach is dat niet van plan. "Ik heb alles in Neerpede", zegt Wilmots.',
						'afbeelding' => 'artikel01.jpg',
						'afbeeldingBeschrijving' => 'Mark Zuckerberg naast het Facebook logo.',
						),

					array(
						'titel' => 'EU heeft geheim plan voor uitzetting 400.000 migranten',
						'datum' => '7 oktober 2015',
						'inhoud' => 'Honderdduizenden vluchtelingen die geen asiel in Europa krijgen, 
						worden binnen enkele weken uitgezet. 
						De Europese Unie werkt aan een geheim plan met die strekking. 
						Dat meldt de Britse krant The Times.',
						'afbeelding' => 'artikel02.jpg',
						'afbeeldingBeschrijving' => 'Appartementsblok met boom in het midden.',
						),

					array(
						'titel' => 'Top Gear neemt in mei 2016 nieuwe start met "doodsbange" Chris Evans',
						'datum' => '7 oktober 2015',
						'inhoud' => 'Fans van de populaire autoshow Top Gear zullen nog 
						tot mei volgend jaar geduld moeten oefenen. 
						Dan wordt de eerste episode uitgezonden met nieuwe presentator Chris Evans, 
						die naar eigen zeggen doodsbang is voor zijn nieuwe job. ',
						'afbeelding' => 'artikel03.jpg',
						'afbeeldingBeschrijving' => 'Kuifje en Bobby.',
						),
				);

	$individueelArtikel		= 	false;
	$nietBestaandArtikel	=	false;

	if ( isset ( $_GET['id'] ) ) 
	{
		$id = $_GET['id'];

		if ( array_key_exists( $id, $artikels ) )
		{
			$artikels = array( $artikels[$id] );
			$individueelArtikel = true;
		}
		else 
		{
			$nietBestaandArtikel = true;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php if ( !$individueelArtikel ): ?>
		<title>Oplossing get: deel1</title>
	<?php elseif ( $nietBestaandArtikel ): ?>
		<title>Oplossing get: deel1 - Het artikel met id <?php echo $id ?> bestaat niet</title>
	<?php else: ?>
		<title>Oplossing get: deel1. Artikel: <?php echo $artikels[0]['titel'] ?></title>
	<?php endif ?>
		
	<style>
		body
		{
			font-family:"Segoe UI";
			color:#423f37;
		}

		.container
		{
			width:	1024px;
			margin:	0 auto;
		}

		img
		{
			max-width: 100%;
		}

		.multiple
		{
			float:left;
			width:288px;
			margin:16px;
			padding:16px;
			box-sizing:border-box;
			background-color:#EEEEEE;
		}

		.multiple:nth-child(3n+1)
		{
			margin-left:0px;
		}

		.multiple:nth-child(3n)
		{
			margin-right:0px;
		}

		.single img
		{
			float:right;
			margin-left: 16px;
		}


	</style>
</head>
<body>
	<pre><?php var_dump($_GET) ?></pre>
	<?php if ( !$nietBestaandArtikel ): ?>
		<div class="container">
			<?php foreach ( $artikels as $id => $artikel ): ?>
				<article class="<?php echo ( !$individueelArtikel ) ? 'multiple': 'single' ; ?>">
					<h1><?php echo $artikel['titel'] ?></h1>
					<p><?php echo $artikel['datum'] ?></p>
					<img src="img/<?php echo $artikel['afbeelding'] ?>" alt="<?php echo $artikel['afbeeldingBeschrijving'] ?>">
					<p><?php echo ( !$individueelArtikel ) ? str_replace ( "\r\n", "</p><p>", substr( $artikel['inhoud'], 0, 50 ) ) . '...': str_replace ( "\r\n", "</p><p>",$artikel['inhoud'] ) ; ?></p>
					<?php if ( !$individueelArtikel ): ?>
						<a href="deel1.php?id=<?php echo $id ?>">Lees meer</a>
					<?php endif ?>
				</article>
			<?php endforeach ?>
		</div>
	<?php endif ?>
</body>
</html>