<?php
     // Variable
     $answerPaniek = [];


     // Push empty strings to the array
     for ($i = 1; $i <= 8; $i++){
          array_push($answerPaniek, "");
     }


     // Makes an array with questions for the inputs
      $questionPaniek = [
        "Welk dier zou je nooit als huisdier willen hebben?",
        "Wie is de belangrijkste persoon in je leven?",
        "In welk land zou je graag willen wonen?",
        "Wat doe je als je je verveelt?",
        "Met welk speelgoed speelde je als kind het meest?",
        "Bij welke docent spijbel je het liefst?",
        "Als je € 100.000,- had, wat zou je dan kopen?",
        "Wat is je favoriete bezigheid?"
      ];


     // check if the input is correct, and if not, the user gets an description what was wrong
     if($_POST){
          for($i = 0; $i < count($questionPaniek); $i++){
               // Check if the input is empty
               if(!$_POST["question$i"]){
                    $description[$i] = "De vraag moet ingevuld worden";
               }else{
                    $answerPaniek[$i] = dataChecker($_POST["question$i"]);
                    // Check if the input does not have characters in it
                    if(!preg_match("/^[a-zA-Z-' ]*$/", $answerPaniek[$i])){
                         $description[$i] = " De vraag mag geen tekens bevatten";
                         $answerPaniek[$i] = "";
                    }
               }
          }
     }


     // The input gets checked for characters that can break the code
     function dataChecker($question){
          $question = trim($question);
          $question = stripslashes($question);
          $question = htmlspecialchars($question);
          return $question;
     }
?>


<!DOCTYPE HTML>
<html lang="nl">
	<head>
    	<link rel="stylesheet" href="styling.css">
    	<title>B3W2L3</title> 
  	</head>
     <body>
          <h1>Mad libs</h1>
          <nav>
               <ul>
                    <li>
                         <a href="#">Er heerst paniek...</a>
                         <a href="onkunde.php">Onkunde</a>
                    </li>
               </ul>
         </nav>
         <div>
               <h2>Er heerst paniek...</h2>

               <?php if(in_array("", $answerPaniek)){ ?>
                    <form method="post">
                         <?php for($i = 0; $i < count($questionPaniek); $i++){ ?>
                              <div class="question">
                                   <label for="<?= "question$i" ?>"><?= $questionPaniek[$i] ?></label>
                                   <span>* <?= $description[$i] ?></span>
                                   <input type="text" name="<?= "question$i" ?>" value="<?= $answerPaniek[$i] ?>">
                              </div>
                              <br>
                         <?php } ?>
                         <input class="submit" type="submit" name="submit" value="Versturen">
                    </form>
               <?php } 

               if(!in_array("", $answerPaniek)){ ?>
                    <p>
                       Er heerst paniek in koninkrijk <?= $answerPaniek[2] ?>. Koning <?= $answerPaniek[5] ?> is ten einde raad en als Koning <?= $answerPaniek[5] ?> ten einde raad is, dan roept hij zijn ten-einde-raadsheer <?= $answerPaniek[1] ?>.
                       <br><br>
                       "<?= $answerPaniek[1] ?>! Het is een ramp! Het is een schande!"
                       <br><br>
                       "Sire, Majesteit, Uwe Luidruchtigheid, wat is er aan de hand?"
                       <br><br>
                       "Mijn <?= $answerPaniek[0]?> Is verdwenen! Zo maar, zonder waarschuwing. En ik had net <?= $answerPaniek[4] ?> voor hem gekocht!"
                       <br><br>
                       "Majesteit, uw <?= $answerPaniek[0] ?> komt vast vanzelf weer terug?"
                       <br><br>
                       "Ja da's leuk en aardig, maar hoe moet ik in de tussentijd <?= $answerPaniek[7]?> leren?"
                       <br><br>
                       "Maar Sire, daar kunt u toch uw <?= $answerPaniek[6] ?> voor gebruiken."
                       <br><br>
                       "<?= $answerPaniek[1]?>, je hebt helemaal gelijk! Wat zou ik doen als ik jou niet had."
                       <br><br>
                       "<?= $answerPaniek[3]?>, Sire."
                    </p> 
               <?php } ?>
          </div>
          <footer>Xander© 2021</footer>
     </body>
</html>