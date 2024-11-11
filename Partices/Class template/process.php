FORM VALIDATION
index.php

<!DOCTYPE html>
<html lang="en">
<head>
    <title>FORM VALIDATION</title>
</head>
<body>
    <h1>FORM VALIDATION USING PHP</h1>
    <form action="process.php" method="post">
            <input type="text" name="field1" placeholder="Data">
            <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>

process.php

<?php


    if (!empty(trim($_POST['field1']))) { // trim truncates white spaces
        echo "Hi ".$_POST['field1']; // . is concatenation

    }else {
        echo "No data provided!";
    }
        
    // filter_sanitize_email
    //filter_validate_email
    
    if (preg_match("/[0-9]/", $_POST['field1'])) { //pattern recognition
        echo "It's a match";
    }
    else {
        echo "Not a match";
    }
        
       
        if (preg_match("/[a-z0-9]/", $_POST['field1'])) { //pattern recognition
            echo "It's a match";
        }
        else {
            echo "Not a match";
        }
            

            if (preg_match("/@+(student)+\.(aiub)+\.(edu)/", $_POST['field1'])) { //pattern recognition
                echo "It's a match";
            }
            else {
                echo "Not a match";
            }    

    if (strlen($_POST['field1']) < 5) {
        echo "Length must be greater than 5";
    }
    else 
    {       echo "OK!";}


?>