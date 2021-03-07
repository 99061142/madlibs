<!DOCTYPE HTML>
<html lang="nl">
	<head>
    	<link rel="stylesheet" href="styling.css">
    	<title>B3W2L3</title> 
  	</head>
  <body>
  	<?php
      // Formulier onkunde vragen
      $vragenOnkunde = [
        "Wat zou je graag willen kunnen?",
        "Met welke personen kun je goed opschieten?",
        "Wat is je favoriete getal?",
        "Wat heb je altijd bij je als je op vakantie gaat?",
        "Wat is je beste persoonlijke eigenschap?",
        "Wat is je slechtste persoonlijke eigenschap?",
        "Wat is het ergste dat je kan overkomen?"
      ];

      // Antwoorden voor de forumulieren
      $antwoordenOnkunde = array("");
      for ($arrayPusher = 0; $arrayPusher <= 5; $arrayPusher++){
        array_push($antwoordenOnkunde, "");
      }


      // Laat op het beeld zien of de vragen goed zijn ingevuld, en wat er fout is gegaan, als het niet goed is ingevuld.
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        for($i = 0; $i <= 6; $i++){
          // Checkt of de input leeg is
          if (empty($_POST["vraag$i"])){
            $description[$i] = " De vraag moet ingevuld worden";
          }
          else{
            $antwoordenOnkunde[$i] = dataChecker($_POST["vraag$i"]);
            // Checkt of de input geen tekens heeft
            if(!preg_match("/^[a-zA-Z-' ]*$/",$antwoordenOnkunde[$i])){
              $description[$i] = " De vraag mag geen tekens bevatten";
              $antwoordenOnkunde[$i] = "";
            }
          }
        }
      }
    ?>


    <h1>Mad libs</h1>
    <div class="menu">
      <ul>
        <li><a href="paniek.php">Er heerst paniek...</a></li>
        <li><a href="#">Onkunde</a></li>
      </ul>
    </div>
    <h2>Onkunde</h2><?php

    // Als alle vragen nog niet goed zijn ingevuld blijven de vragen op het scherm staan
    if(in_array("", $antwoordenOnkunde)){ ?>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"><?php
        // Laat elke vraag op het scherm zien van het formulier "Onkunde"
        for($i = 0; $i <= 6; $i++){ ?>
          <?php echo $vragenOnkunde[$i]; ?><input type="text" name="<?php echo "vraag$i"?>" value="<?php echo $antwoordenOnkunde[$i];?>">
          <span class="description">*<?php echo $description[$i]; ?></span><br><br>
        <?php } ?>
        <br><br>
        <input class="submit" type="submit" name="submit" value="Versturen"><br>
      </form><?php
    }

    // Als alle vragen van het formulier "Onkunde" zijn ingevuld, wordt de teskt in beeld gebracht
    if(!in_array("", $antwoordenOnkunde)){?>
      <p class="verhaal">
        Er zijn veel mensen die niet kunnen <?php echo $antwoordenOnkunde[0]?>. Neem nou <?php echo $antwoordenOnkunde[1]?>. 
        Zelfs met de hulp van een <?php echo $antwoordenOnkunde[3]?> of zelfs <?php echo $antwoordenOnkunde[2]?> 
        kan <?php echo $antwoordenOnkunde[1]?> niet tekenen. 
        Dat heeft niets te maken met een gebrek aan <?php echo $antwoordenOnkunde[4]?>, 
        maar met een te veel aan <?php echo $antwoordenOnkunde[5]?>. Te veel <?php echo $antwoordenOnkunde[5]?> 
        leidt tot <?php echo $antwoordenOnkunde[6]?> en dat is niet goed als je wilt <?php echo $antwoordenOnkunde[0]?>. 
        Helaas voor <?php echo $antwoordenOnkunde[1]?>.
      </p>  
    <?php } ?>

    <div class="footer">
      <p>Xander© 2021</p>
    </div>


    <?php
      // Checkt of het antwoord geen tekents bevatten.
      function dataChecker($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>
  </body>
</html>
