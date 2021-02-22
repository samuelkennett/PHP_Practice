<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title> Number Adder</title>
    </head>

    <body>
        <h1 class = "title"> Number Adder</h1>

        <p class = "date">Today's date is : <?php echo date('F j, Y') ?></p> <!--  pulling the date from the server using PHP-->

        <form action = "site.php" method="get" class = "num-adder-container">

            <!--PHP function to generate random numbers and assign to vars-->
            <?php 

                $num1 = rand(1,20);
                $num2 = rand(1,20);

            ?>

            First number:
            <input type="number" name = "firstNum" value = "<?php echo $num1?>" >

            <br>
            <br>

            Second Number:
           <input type="number" name="secNum" value = "<?php echo $num2?>">

          <input type="submit"> 
        </form>

        <br>

        <h2>Result:</h2>  <?php 
            echo $_GET["firstNum"] + $_GET["secNum"];
            
         ?> 

    </body>

</html>