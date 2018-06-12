<?php

    session_start();
    $link= mysqli_connect("shareddb-h.hosting.stackcp.net","water-db-3333d45f","123456789","water-db-3333d45f");
    if(mysqli_connect_errno())
    {
        print_r(mysqli_connect_error());
        
    }
    
    if($_GET['function']=="verifyUser")
    {   
        global $link ;
        
        $queryData = "SELECT * FROM data WHERE userid='".$_GET['userid']."'LIMIT 1";
        $resultData= mysqli_query($link,$queryData); 
        $row = mysqli_fetch_assoc($resultData);
        if(mysqli_num_rows($resultData)==0)
        {
            echo "no";
        }
        else if($row['password']==$_GET['password'])
        {
            echo "yes";
        }
        else
        {
            echo "no";
        }
    }
    if($_GET['function']=="getData")
    {
        global $link ;
        $queryData = "SELECT * FROM data WHERE userid='".$_GET['userid']."'LIMIT 1";
        $resultData= mysqli_query($link,$queryData); 
        $row = mysqli_fetch_assoc($resultData);
        if(mysqli_num_rows($resultData)==0)
        {
            echo "error";
        }
        else if($row['password']==$_GET['password'])
        {
            echo $row['userid']." ".$row['billingid']." ".$row['appid']." ".$row['day']." ".$row['month']." ".$row['year']." ".$row['ph']." ".$row['price'];
        }
        else
        {
            echo "error";
        }
    }
    
    if($_GET['function']=="updateUseage")
    {
        global $link ;
        $queryUpdate = "UPDATE data SET day = ".$_GET['dayuseage']." WHERE userid='".$_GET['userid']."' and  appid=".$_GET['appid']  ;
        mysqli_query($link,$queryUpdate);
        $queryUpdate = "UPDATE data SET month = ".$_GET['monthuseage']." WHERE userid='".$_GET['userid']."' and  appid=".$_GET['appid']  ;
        mysqli_query($link,$queryUpdate);
        $queryUpdate = "UPDATE data SET year = ".$_GET['yearuseage']." WHERE userid='".$_GET['userid']."' and  appid=".$_GET['appid']  ;
        mysqli_query($link,$queryUpdate);
        
    }
    if($_GET['function']=="updatePh")
    {
        global $link ;
        $queryUpdate = "UPDATE data SET ph = ".$_GET['ph']." where appid=".$_GET['appid']  ;
        mysqli_query($link,$queryUpdate);
        
        
    }
    if($_GET['function']=="updatePrice")
    {
        global $link ;
        $queryUpdate = "UPDATE data SET price = ".$_GET['price']." where appid=".$_GET['appid']  ;
        mysqli_query($link,$queryUpdate);
        
        
    }
     if($_GET['function']=="createUser")
    {
        global $link ;
        $queryUpdate = "INSERT INTO data VALUES ('".$_GET['userid']."', '".$_GET['pass']."', '".$_GET['billingid']."','".$_GET['appid']."', '', '', '', '', '')" ;
        mysqli_query($link,$queryUpdate);
        echo "<center>succesfully entered</center>";
        
    }
    
    
?>