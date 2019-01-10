<?php
include_once "header.php";
 ?>


<section class="container-fluid home">

  <div class="row signup-form-row">
    <div class="offset-md-3 offset-lg-3 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
      <div class="signup-form ">
    <form class="text-center" action="includes/signup.inc.php" method="POST">
      <h4 id="Log-head" class="log-head text-center">SIGN-UP</h4>
      <input class="inputs" type="text" value="<?php if(isset($_GET['ut'])){echo($_GET['ut']);}?>" name="username" placeholder="Username" required/><br/>
      <input class="inputs" type="<?php if(isset($_GET['pwd'])){echo('text');} else{echo('password');}?>" value="<?php if(isset($_GET['pwd'])){echo($_GET['pwd']);}?>" name="password" placeholder="Password" required/><br/>
      <input class="inputs" type="text" value="<?php if(isset($_GET['fnameerr'])){echo($_GET['fnameerr']);}?>" name="firstname" placeholder="First Name" required/><br/>
      <input class="inputs" type="text" value="<?php if(isset($_GET['lnameerr'])){echo($_GET['lnameerr']);}?>" name="lastname" placeholder="Last Name" required/><br/>
      <input class="input-email" type="text" value="<?php if(isset($_GET['emailerr'])){echo($_GET['emailerr']);}?>" name="email" placeholder="Amizone Email" required/><i onclick="ev_info()" style="color:white;cursor:pointer" class="fas fa-question-circle"></i><br/>
      <input class="inputs" type="text" name="course" placeholder="Course" required/><br/>
      <input class="inputs" type="text" name="semester" placeholder="Semester" required/><br/>
      <button id="submit-btn"  name="submit" type="submit" >SUBMIT</button>
  </form>

  </div>

   </div>
   </div>
  </section>
  <?php include_once "footer.php" ?>
<!--EMAIL INFO -->

<div id="emailverif" class="ev_info">
<div class="msg-ami text-center">THIS IS YOUR AMIZONE EMAIL<br>DO CHECK THE SPAM!<span class="close-ami" onclick="ev_info_close()"><i class="fas fa-times"></i><span></div>        
  <div class="row text-center image-row-ami text-center">
    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 screend-column">
          <img src="assets/Display/screend.jpg" class="tute-screend"/>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 screenm-column">
          <img src="assets/Display/screenm.jpg" class="tute-screenm"/>
        </div>
</div>
<div class="row ami-btn-row">
  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
    <a target="_blank" href="https://student.amizone.net/"><button class="btn-sm btn-mobile btn-success" >AMIZONE</button></a>
        </div></div>
        </div>
<!--          -->

<script src="js/index.js"></script>

