<?php
	$rijen = 10;
	$kolommen = 10;
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Untitled</title>
        <style>
            .oneven {
                background-color: lightgreen;
            }
        </style>
        <link rel="stylesheet" href="css/style.css">
        <link rel="author" href="humans.txt">
    </head>
    <body>
        
        <table border="1">
        	<?php for ($rij=0; $rij < $rijen; $rij++): ?>
        		<tr>
        			<?php for ($kolom=0; $kolom < $kolommen; $kolom++): ?>
                        <td class="<?= ( ( $rij * $kolom ) % 2 != 0 ) ? 'oneven' : null ?>">
                            <?= $rij * $kolom ?></td>
                    <?php endfor ?>    		
        		</tr>  
        	<?php endfor ?>      	
        </table>
    </body>
</html>