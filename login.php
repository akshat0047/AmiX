<?php
include_once "header.php";
?>

<section class="container-fluid home-login">
  <div class="row login-form-row">

   <div class="offset-xs-2 offset-sm-2 offset-md-3 offset-lg-3 col-xs-12 col-sm-8 col-md-6 col-lg-6 col-xl-6 text-center">
      <div class="login-form">
    <form class="text-center" action="includes/login.inc.php" method="POST">
<?php if(isset($_GET['status'])){  if ($_GET['status']=='verified'){ echo "<span class='login-notice'>EMAIL VERIFIED</span>";}} if(isset($_GET['signup'])){if($_GET['signup']=='success'){ echo "<span class='login-notice'>ACCOUNT CREATED</span>";}}  if(isset($_GET['pass'])){if($_GET['pass']=='reset'){ echo "<span class='login-notice'>PASSWORD CHANGED</span>";}} ?>
      <h4 id="Log-head" class="log-head text-center">LOG-IN</h4>
      <input class="inputs" value="<?php if(isset($_GET['usererr'])){echo($_GET['usererr']);}?>" type="text" name="username" placeholder="Username/Email" required/><br/>
      <input class="inputs" value="<?php if(isset($_GET['pwderr'])){echo($_GET['pwderr']);}?>" type="text" onfocus="this.type='password'" name="password" placeholder="Password" required/><br/>
      <a href="forgot-password.php" style="color:white" >FORGOT PASSWORD?</a><br/>
      <button id="submit-btn"  name="submit" type="submit" >SUBMIT</button>

      </form>

    </div>

  </div>
  </div>




</section>

<?php
include_once "footer.php"
 ?>
