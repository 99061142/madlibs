<!DOCTYPE HTML>
<html lang="nl">
	<head>
    	<link rel="stylesheet" href="styling.css">
    	<title>B3W2L3</title> 
  	</head>
  <body>
  	<?php
      // Vragen voor de forumulieren
      $vragen = [
        // Formulier onkunde vragen
        "Wat zou je graag willen kunnen?",
        "Met welke personen kun je goed opschieten?",
        "Wat is je favoriete getal?",
        "Wat heb je altijd bij je als je op vakantie gaat?",
        "Wat is je beste persoonlijke eigenschap?",
        "Wat is je slechtste persoonlijke eigenschap?",
        "Wat is het ergste dat je kan overkomen?",
        // Formulier paniek vragen
        "Welk dier zou je nooit als huisdier willen hebben?",
        "Wie is de belangrijkste persoon in je leven?",
        "In welk land zou je graag willen wonen?",
        "Wat doe je als je je verveelt?",
        "Met welk speelgoed speelde je als kind het meest?",
        "Bij welke docent spijbel je het liefst?",
        "Als je € 100 000,- had, wat zou je dan kopen?",
        "Wat is je favoriete bezigheid?"
      ];

      // Antwoorden voor de forumulieren
      $antwoorden = array("");
      for ($arrayPusher = 0; $arrayPusher <= 14; $arrayPusher++){
        array_push($antwoorden, "");
      }


      if($_SERVER["REQUEST_METHOD"] == "POST"){
        for($i = 0; $i <= 1; $i++){
          if (empty($_POST["vraag$i"])){
            $description[$i] = "<br>De vraag hierboven moet ingevuld worden";
          }
          else{
            $antwoorden[$i] = test_input($_POST["vraag$i"]);
            // Checkt of de naam geen tekens heeft
            if(!preg_match("/^[a-zA-Z-' ]*$/",$antwoorden[$i])){
              $description[$i] = "<br>Alleen letters en spaties zijn toegestaan";
              $antwoorden[$i] = "";
            }
          }
        }
      }

?>

      <h1>Mad libs</h1>
      <div class="onkundeDiv">
        <p>&emsp;Er heerst paniek...&emsp;&emsp;Onkunde</p>
      </div>
      <h2>Onkunde</h2><?php
      for($i = 0; $i <= 1; $i++){
        if($antwoorden[$i] == ""){ ?>
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <?php for($i = 0; $i <= 1; $i++){ ?>
              <?php echo $vragen[$i]; ?><input type="text" name="<?php echo "vraag$i"?>" value="<?php echo $antwoorden[$i];?>">
              <span class="description">*<?php echo $description[$i]; ?></span><br><br>
            <?php } ?>
            <br>
            <input class="submit" type="submit" name="submit" value="Versturen">
          </form>
        <?php }
      } ?>
      <p class="onkundeVerhaal">
        Test
      </p>
      <div class="footer">
        <p>naam© 2021</p>
      </div>



    <?php
      //Haalt bepaalde tekens uit de teksten zodat ze niet meer werken
      function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>
  </body>
</html>