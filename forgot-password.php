<?php
include_once "header.php";?>

<section class="container-fluid home-login">
  <div class="row forgot-password-form-row">

   <div class="offset-xs-2 offset-sm-2 offset-md-3 offset-lg-4 col-xs-12 col-sm-8 col-md-6 col-lg-4 col-xl-4 text-center">
      <div class="forgot-password-form">
    <form class="text-center" action="includes/forgot-password.inc.php" method="POST">
      <?php if(isset($_GET['msg'])){  if ($_GET['msg']=='sent'){ echo "<span class='login-notice'>RESET EMAIL SENT TO AMIZONE</span>";}} ?>
      <input class="inputs" type="text" value="<?php if(isset($_GET['rescueerr'])){echo($_GET['rescueerr']);}?>" name="rescue" placeholder="Username/Email"/><br/>
      <button id="submit-btn"  name="submit" type="submit" >SUBMIT</button>

      </form>

    </div>

  </div>
  </div>




</section>

<?php
include_once "footer.php";
?>