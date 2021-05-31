<?php
     // Variable
     $answerOnkunde = [];


     // Push empty strings to the array
     for ($i = 1; $i <= 7; $i++){
          array_push($answerOnkunde, "");
     }


     // Makes an array with questions for the inputs
     $questionOnkunde = [
          "Wat zou je graag willen kunnen?",
          "Met welke personen kun je goed opschieten?",
          "Wat is je favoriete getal?",
          "Wat heb je altijd bij je als je op vakantie gaat?",
          "Wat is je beste persoonlijke eigenschap?",
          "Wat is je slechtste persoonlijke eigenschap?",
          "Wat is het ergste dat jou kan overkomen?"
     ];


     // check if the input is correct, and if not, the user gets an description what was wrong
     if($_POST){
          for($i = 0; $i < count($questionOnkunde); $i++){
               // Check if the input is empty
               if(!$_POST["question$i"]){
                    $description[$i] = "De vraag moet ingevuld worden";
               }else{
                    $answerOnkunde[$i] = dataChecker($_POST["question$i"]);
                    // Check if the input does not have characters in it
                    if(!preg_match("/^[a-zA-Z-' ]*$/", $answerOnkunde[$i])){
                         $description[$i] = " De vraag mag geen tekens bevatten";
                         $answerOnkunde[$i] = "";
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
<html lang="en">
     <head>
          <title>Mad libs</title>
          <link rel="stylesheet" href="styling.css">
     </head>
     <body>
          <h1>Mad libs</h1>
          <nav>
               <ul>
                    <li>
                         <a href="paniek.php">Er heerst paniek...</a>
                         <a href="#">Onkunde</a>
                    </li>
               </ul>
         </nav>
         <div>
              <h2>Onkunde</h2>

               <?php if(in_array("", $answerOnkunde)){ ?>
                    <form method="post">
                         <?php for($i = 0; $i < count($questionOnkunde); $i++){ ?>
                              <div class="question">
                                   <label for="<?= "question$i" ?>"><?= $questionOnkunde[$i] ?></label>
                                   <span>* <?= $description[$i] ?></span>
                                   <input type="text" name="<?= "question$i" ?>" value="<?= $answerOnkunde[$i] ?>">
                              </div>
                              <br>
                         <?php } ?>
                         <input class="submit" type="submit" name="submit" value="Versturen">
                    </form>
               <?php } 


               if(!in_array("", $answerOnkunde)){ ?>
                    <p>
                         Er zijn veel mensen die niet kunnen <?= $answerOnkunde[0] ?>. Neem nou <?= $answerOnkunde[1] ?>. 
                         Zelfs met de hulp van een <?= $answerOnkunde[3] ?> of zelfs <?= $answerOnkunde[2] ?> 
                         kan <?= $answerOnkunde[1] ?> niet tekenen. 
                         Dat heeft niets te maken met een gebrek aan <?= $answerOnkunde[4] ?>, 
                         maar met een te veel aan <?= $answerOnkunde[5] ?>. Te veel <?= $answerOnkunde[5] ?> 
                         leidt tot <?= $answerOnkunde[6] ?> en dat is niet goed als je wilt <?= $answerOnkunde[0] ?>. 
                         Helaas voor <?= $answerOnkunde[1] ?>.
                    </p>  
                <?php } ?>
          </div>
          <footer>Xander© 2021</footer>
     </body>
</html>
