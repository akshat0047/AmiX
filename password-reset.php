<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');
include_once "header.php";
include_once "includes/db.inc.php";
$user=$_GET['user'];
$token=$_GET['tk'];
$sql="SELECT user_at from verification where user_uid="."'".$user."';";
$result=mysqli_query($conn,$sql);
$check=mysqli_num_rows($result);
if($check>0)
{
    $row=mysqli_fetch_assoc($result);
    if($row['user_at']==$token)
    {
        include_once "header.php";
        echo '<section class="container-fluid home-login">
        <div class="row forgot-password-form-row">
      
         <div class="offset-xs-2 offset-sm-2 offset-md-3 offset-lg-3 col-xs-12 col-sm-8 col-md-6 col-lg-6 col-xl-6 text-center">
            <div class="forgot-password-form">
          <form class="text-center" action="includes/password-reset.inc.php" method="POST"> 
          <span class="error">RESET PASSWORD</span>
            <input class="hide" type="number" value="'.$row['user_at'].'" name="token" placeholder="token"/><br/>    
            <input class="hide" type="text" value="'.$user.'" name="pwd-reset-user" placeholder="USERNAME"/><br/>        
            <input class="inputs" type="password" name="new-pwd" placeholder="NEW PASSWORD"/><br/>
            <input id="check" class="inputs" onchange="checktype()" type="text" onfocus="(this.type='."'"."password"."'".')" value="' ;
             if(isset($_GET["rpwderr"])){echo($_GET['rpwderr']);}
            echo '" name="confirm-new-pwd" placeholder="CONFIRM NEW PASSWORD"/><br/>
            <button id="submit-btn"  name="submit" type="submit" >SUBMIT</button>     
            </form></div>      
        </div></div>    
      </section>';
    }
}
include_once "footer.php";
?>
<script> 
function checktype()
{
        $("#check").attr("type","password");
}
</script>