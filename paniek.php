<!DOCTYPE HTML>
<html lang="nl">
	<head>
    	<link rel="stylesheet" href="styling.css">
    	<title>B3W2L3</title> 
  	</head>
  <body>
  	<?php
      // Formulier paniek vragen
      $vragenPaniek = [
        "Welk dier zou je nooit als huisdier willen hebben?",
        "Wie is de belangrijkste persoon in je leven?",
        "In welk land zou je graag willen wonen?",
        "Wat doe je als je je verveelt?",
        "Met welk speelgoed speelde je als kind het meest?",
        "Bij welke docent spijbel je het liefst?",
        "Als je € 100.000,- had, wat zou je dan kopen?",
        "Wat is je favoriete bezigheid?"
      ];

      // Antwoorden voor de forumulieren
      $antwoordenPaniek = array("");
      for ($arrayPusher = 0; $arrayPusher <= 6; $arrayPusher++){
        array_push($antwoordenPaniek, "");
      }


      // Laat op het beeld zien of de vragen goed zijn ingevuld, en wat er fout is gegaan, als het niet goed is ingevuld.
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        for($i = 0; $i <= 7; $i++){
          if (empty($_POST["vraag$i"])){
            $description[$i] = " De vraag moet ingevuld worden";
          }
          else{
            $antwoordenPaniek[$i] = test_input($_POST["vraag$i"]);
            // Checkt of de naam geen tekens heeft
            if(!preg_match("/^[a-zA-Z-' ]*$/",$antwoordenPaniek[$i])){
              $description[$i] = " De vraag mag geen tekens bevatten";
              $antwoordenPaniek[$i] = "";
            }
          }
        }
      }
    ?>


    <h1>Mad libs</h1>
    <div class="menu">
      <ul>
        <li><a href="#">Er heerst paniek...</a></li>
        <li><a href="onkunde.php">Onkunde</a></li>
      </ul>
    </div>
    <h2>Er heerst paniek...</h2><?php

    // Als alle vragen nog niet goed zijn ingevuld blijven de vragen op het scherm staan
    if(in_array("", $antwoordenPaniek)){ ?>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"><?php
        // Laat elke vraag op het scherm zien van het formulier "Onkunde"
        for($i = 0; $i <= 7; $i++){ ?>
          <?php echo $vragenPaniek[$i]; ?><input type="text" name="<?php echo "vraag$i"?>" value="<?php echo $antwoordenPaniek[$i];?>">
          <span class="description">*<?php echo $description[$i]; ?></span><br><br>
        <?php } ?>
        <br><br>
        <input class="submit" type="submit" name="submit" value="Versturen"><br>
      </form><?php
    }

    // Als alle vragen van het formulier "Onkunde" zijn ingevuld, wordt de teskt in beeld gebracht
    if(!in_array("", $antwoordenPaniek)){ ?>
      <p class="verhaal">
        Er heerst paniek in koninkrijk <?php echo $antwoordenPaniek[2]?>. Koning <?php echo $antwoordenPaniek[5]?> is ten einde raad en als Koning <?php echo $antwoordenPaniek[5]?> ten einde raad is, dan roept hij zijn ten-einde-raadsheer <?php echo $antwoordenPaniek[1]?>.<br><br>"<?php echo $antwoordenPaniek[1]?>! Het is een ramp! Het is een schande!"
        <br><br>"Sire, Majesteit, Uwe Luidruchtigheid, wat is er aan de hand?"<br><br>"Mijn <?php echo $antwoordenPaniek[0]?> Is verdwenen! Zo maar, zonder waarschuwing. En ik had net <?php echo $antwoordenPaniek[4]?> voor hem gekocht!"<br><br>
        "Majesteit, uw <?php echo $antwoordenPaniek[0]?> komt vast vanzelf weer terug?"<br><br>
        "Ja da's leuk en aardig, maar hoe moet ik in de tussentijd <?php echo $antwoordenPaniek[7]?> leren?"<br><br>
        "Maar Sire, daar kunt u toch uw <?php echo $antwoordenPaniek[6]?> voor gebruiken."<br><br>
        "<?php echo $antwoordenPaniek[1]?>, je hebt helemaal gelijk! Wat zou ik doen als ik jou niet had."<br><br>
        "<?php echo $antwoordenPaniek[3]?>, Sire."
      </p> 
    <?php } ?>
     
    <div class="footer">
      <p>Xander© 2021</p>
    </div>


    <?php
      // Checkt of de vragen zijn ingevuld, en of er geen tekens bevatten.
      function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>
  </body>
</html>