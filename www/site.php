<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="php-logo.png">
    <title> PHP Practice</title>
</head>

<body>
    <h1 class="title"> PHP Practice</h1>
    <p class="date">Today's date is : <?php echo date('F j, Y') ?></p> <!--  pulling the date from the server using PHP-->

    <!-- GET Testing -->
    <form action="site.php" method="get" class="container">
        <!--PHP function to generate random numbers and assign to vars-->
        <?php
        $num1 = rand(1, 20);
        $num2 = rand(1, 20);
        ?>
        First number:
        <input type="number" name="firstNum" value="<?php echo $num1 ?>"> <!-- echos num1 to the input box-->
        <br>
        <br>
        Second Number:
        <input type="number" name="secNum" value="<?php echo $num2 ?>"> <!-- echos num2 to the input box-->
        <input type="submit">
        <p style="font-family:Arial, Helvetica, sans-serif; color:crimson; font-size:x-large">Result:
            <?php
            //Uses the GET command to retrieve the numbers from the input boxes and sums them
            //NOTE: Uses fallback zero because once the next form is submitted an undefined array key warning pops up
            //      this way the result defaults back to zero since there is no functionality for saving $num1 and $num2 after the form is submitted
            $num1 = $_GET["firstNum"] ?? 0;
            $num2 =  $_GET["secNum"] ?? 0;

            echo  $num1 + $num2;
            ?>
        </p>
    </form>

    <br>



    <br>
    <br>

    <!-- POST Testing -->

    <form class="container" action="site.php" method="post">
        <h3>Enter a Password</h3>
        <div>Password: <input type="password" class="password-box" name="password"> </div>
        <p>Entered:
            <?php
            echo $_POST["password"] ?? ""; //handles warning undefined array key with fallback = ""
            ?>
        </p>
    </form>
    <br>
    <!-- Working with checkboxes    -->
    <form class="container" action="site.php" method="post">
        <h2>Please Select which colors you like</h2>
        Blue:<input type="checkbox" name="colors[]" value="blue"><br>
        Green:<input type="checkbox" name="colors[]" value="green"><br>
        Yellow:<input type="checkbox" name="colors[]" value="yellow"><br>
        Orange:<input type="checkbox" name="colors[]" value="orange"><br>
        <input type="submit">
        <!-- Uses a foreach loop to iterate through the array and display it on screen -->    
        You Have selected:<?php
                            $colors = $_POST["colors"] ?? "";
                            foreach ($colors as $value) {
                                echo ("<h3> $value </h3>");
                            };
                            ?>
    </form>
    <br>
    
    <br>

    <!-- Working with Associative Arrays -->
    <form class="container" action="site.php" method="post">
        <h3>Please Enter a name (Sam, Adam, Brian) to see their grade</h3>
        <input type="text" name="student">
        <input type="submit">
        <p style="font-family: fantasy; font-size:x-large">Grade:
            <?php
            $grades = array("Sam" => "A", "Brain" => "B", "Adam" => "A+");
            echo $grades[$_POST["student"]] ?? "";
            ?>
        </p>
    </form>
    <br>

    <!-- Some Work with funtions -->
    <!-- *For some reason this doesn't work* -->
    <?php 
        function square($num){
            return $num * $num;
        }

        if(isset($_POST["numToSquare"])){
            $result = square(intval($_POST["numToSquare"]));
        }
     ?> 

    <form class="container" action="site.php" action="post">
        <h3>Please enter a number to be squared</h3>
        Enter: <input type="text" name="numToSquare">
        <input type="submit">
        <?php if(isset($result)){ ?>
        <h1> Result: <?php echo $result ?></h1>
     <?php } ?>
    </form>

</body>

</html>