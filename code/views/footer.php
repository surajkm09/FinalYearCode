<!-- jQuery first, then Tether, then Bootstrap JS. -->
<footer class="footer">

    <div class="container">
    <p>&copy; suraj</p>
    
    </div>
    

</footer>
<head>
<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class= "alert alert-danger" id=loginAlert></div>
        <form>
            <input type="hidden" name="loginActive" value="1">
    <div class="form-group">
    
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" placeholder="email address">
    </div>
    <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="mypassword">
    </div>
          </form>
      </div>
      <div class="modal-footer">
          
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="login">Login</button>
      </div>
    </div>
  </div>
</div>
<script>

$("#login").click(function() {
    
    
    $.ajax({
        
        
        type: "POST" ,
        url: "http://www.aryansuraj.xyz/iot/actions.php?action=login",
        data: "email="+$("#email").val()+ "&password="+$("#password").val() , 
        success : function(result){
                    if(result == "1")
                        {
                            window.location.assign("http://www.aryansuraj.xyz/iot/");
                        }
                    else{
                        
                        $("#loginAlert").html(result).show() ;
                    }
        
        
    }
    }
    
    )
    
    
})
 $("#bill").click(function() {
    
        var price = '<?php echo $_SESSION['price']; ?>';
        var month= '<?php echo $_SESSION['month']; ?>';
        var bill = price * month ;
        bill  = bill.toPrecision(3);
        window.alert("Your bill this month is Rs :"+bill);
    
    })

    

</script>



  </body>
</html>