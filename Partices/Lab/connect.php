    <?php
    #database connection
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "books";

    try{
        #connect to the database
    $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

    }
    
    catch(mysqli_sql_exception $e){
        echo "Database connection error: " . $e->getMessage();
    }

    // if($conn){
    //     echo "Yeah! you are the Database";
    // }
    

    ?>