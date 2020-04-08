<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fibonacci</title>
</head>
<body>
    <form action="index.php" method="POST" name="fff">
            <label for="">Enter number value:</label>
            <input type="text" name="num_value">
            <input type="submit">
    </form>
    <?php

        if (!empty($_POST)) {
            $num_val = $_POST['num_value'];
            $num1 = 0;
            $num2 = 1;

            echo "SERIES :".$num2;
            for($i=1;$i<$num_val;$i++)    
            {    
                $num3=$num1+$num2;    
                echo "  ".$num3;    
                $num1=$num2;    
                $num2=$num3;     
            }    
            echo "<br>OUTPUT :".$num3;
        }
      

    ?>

</body>
</html>