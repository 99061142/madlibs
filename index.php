<!DOCTYPE HTML>
<html lang="en">
	<head>
    	<link rel="stylesheet" href="madlibsStyling.css">
    	<title>B3W2L3</title> 
  	</head>
  <body>
  	<?php
    	$vraagEenRequired = $vraagTweeRequired = $vraagDrieRequired = $vraagVierRequired = 
      $vraagVijfRequired = $vraagZesRequired = $vraagZevenRequired = "";
    	$vraagEen = $vraagTwee = $vraagDrie = $vraagVier = $vraagVijf = $vraagZes = $vraagZeven = "";
    ?>
      <h1>Mad libs</h1>
    	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    		<div class="onkundeDiv">
    		  <p>&emsp;Er heerst paniek...&emsp;&emsp;Onkunde</p>
        </div>
    		<h2>Onkunde</h2>
        Wat zou je graag willen kunnen?<input type="text" name="vraagEen" value="<?php echo $vraagEen;?>">
        <span>*<?php echo $vraagEenRequired;?></span><br><br>
        Met welke personen kun je goed opschieten?<input type="text" name="vraagTwee" value="<?php echo $vraagTwee;?>">
        <span>*<?php echo $vraagTweeRequired;?></span><br><br>  
        Wat is je favoriete getal?<input type="text" name="vraagDrie" value="<?php echo $vraagDrie;?>">
        <span>*<?php echo $vraagDrieRequired;?></span><br><br>          	
        Wat heb je altijd bij je als je op vakantie gaat?<input type="text" name="vraagVier" value="<?php echo $vraagVier;?>">
        <span>*<?php echo $vraagVierRequired;?></span><br><br>
        Wat is je beste persoonlijke eigenschap?<input type="text" name="vraagVijf" value="<?php echo $vraagVijf;?>">
        <span>*<?php echo $vraagVijfRequired;?></span><br><br>
        Wat is je slechtste persoonlije eigenschap?<input type="text" name="vraagZes" value="<?php echo $vraagZes;?>">
        <span>*<?php echo $vraagZesRequired;?></span><br><br>
        Wat is het ergste dat je kan overkomen?<input type="text" name="vraagZeven" value="<?php echo $vraagZeven;?>">
        <span>*<?php echo $vraagZevenRequired;?></span><br><br>  
        <input type="submit" name="submit" value="Versturen">
        <div class="footer">
    	    <p>Deze website is gemaakt door Spinoza</p>
    	  </div>
      </form>        	        	
  </body>
</html>