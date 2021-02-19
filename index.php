<!DOCTYPE HTML>
<html lang="en">
	<head>
    	<link rel="stylesheet" href="madlibsStyling.css">
    	<title>B3W2L3</title> 
  	</head>
  <body>
  	<?php
      $vraag1Req = $vraag2Req = $vraag3Req = $vraag4Req = $vraag5Req = $vraag6Req = $vraag7Req ="*";
      $vraag0 = $vraag1 = $vraag3 = $vraag4 = $vraag5 = $vraag6 = $vraag7 = "";

      $vragen = [
        "Wat zou je graag willen kunnen?",
        "Met welke personen kun je goed opschieten?",
        "Wat is je favoriete getal?",
        "Wat heb je altijd bij je als je op vakantie gaat?",
        "Wat is je beste persoonlijke eigenschap?",
        "Wat is je slechtste persoonlijke eigenschap?",
        "Wat is het ergste dat je kan overkomen?"
      ];


      if($_SERVER["REQUEST_METHOD"] == "POST"){
        //

        if (empty($_POST["vraag1"])){
          $vraag1Req = "Name is required";
        } 
        //
        else{
          $vraag1 = test_input($_POST["vraag1"]);
          $vraag1Req = "";
          //
          if(!preg_match("/^[a-zA-Z-' ]*$/",$vraag1)){
            $vraag1Req = "Only letters and white space allowed";
            $vraag1 = "";
          }
        }
        //
        if (empty($_POST["vraag2"])){
          $vraag2Req = "Name is required";
        } 
        //
        else{
          $vraag2 = test_input($_POST["vraag2"]);
          $vraag2Req = "";
          //
          if(!preg_match("/^[a-zA-Z-' ]*$/",$vraag2)){
            $vraag2Req = "Only letters and white space allowed";
            $vraag2 = "";
          }
        }     
      }

      //Als de naam en email goed zijn ingevuld gaat het formulier weg
      if($_POST[""] == ""){?>
        <h1>Mad libs</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
          <div class="onkundeDiv">
            <p>&emsp;Er heerst paniek...&emsp;&emsp;Onkunde</p>
          </div>
          <h2>Onkunde</h2>

          <?php for($i = 0; $i < 7; $i++){
            $vraag = 'vraag'.$i; //vraag4

            ?>

            <?php echo $vragen[$i]; ?><input type="text" name="<?php echo "vraag" . $i;?>" value="<?php echo $$vraag ?>">
            <br>
          <?php } ?>


          <input type="submit" name="submit" value="Versturen">
          <div class="footer">
            <p>naam© 2021</p>
          </div>
        </form><?php 
      }


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