<?php include_once "header.php"; ?>

<section class="container-fluid home-login">
  <div class="row login-form-row">

   <div class="offset-xs-2 offset-sm-2 offset-md-3 offset-lg-4 col-xs-12 col-sm-8 col-md-6 col-lg-4 col-xl-4 text-center">
      <div class="login-form">
	  <div class="error"></div>
        <form id="frm-mobile-verification" class="text-center">
           <h4 id="Log-head" class="log-head text-center">Mobile Number Verification</h4>
           <input type="number" id="mobile" class="inputs" placeholder="Enter a 10 digit mobile"><br/>
          <button type="button" id="submit-btn" onClick="sendOTP()">SEND OTP</button>
          <span id="loader" class="loader text-center"></span>
        </form>
       </div>
    </div>
   </div>
</section>
  
<script src="js/mobile-verification.js"></script>
<?php include_once "footer.php"; ?>