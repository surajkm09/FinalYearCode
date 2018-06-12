<?php
    include("functions.php");

    $error= "";
    if(!$_POST['email'] )
    {
        $error="email adrress   is required ";
    }
    else if(!$_POST['password'])
    {
         $error= " password  is required ";
    }
    if($error != "")
    {
        echo $error ;
        exit();
    }

    
    $query = "SELECT * FROM data WHERE userid ='".mysqli_real_escape_string($link,$_POST['email'])."'LIMIT 1";
    $result= mysqli_query($link,$query);
    $row = mysqli_fetch_assoc($result);
    /*print_r($row);
    echo $row['password'];
    */
    if($row['password'] == $_POST['password'])
        {
            echo "1";
            $_SESSION['userId']=$row['userid'];
            $_SESSION['password']=$row['password'];
        }
    else{
        echo "wrong username/password ";
    }
    
?>