<div class="container">
    
    <?php if(!$_SESSION){?>
    <center><img align="right" src="iot.jpg" width="1000px"></center>
    <?php }else{?>
    
    <?php get_data($_SESSION['userId'],$_SESSION['password'])?>
    <center><button type="button" class="btn btn-primary" id="bill">Calculate bill</button></center>
    

    
        
    <?php } ?>
    

</div>