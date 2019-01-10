<?php include_once "header.php"; ?>

<section class="post-add-section">

  <div class="row add-form-row">
    <div class="offset-md-3 offset-lg-3 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
      <div class="add-form ">
    <form class="text-center" action="includes/report.inc.php" method="POST">
      <h4 id="Log-head" class="log-head text-center">REPORT DETAILS</h4>
      <p class="text-center" style="color:white">The reports will be acted upon in 48 hours time period.<br/>
                             AmiXchange Team is not responsible for any personal conflicts.<br/>
                             Strict Action on fake reports will take place.</p>
      <select class="inputs" name="reason" required>
      <option>Reason for reporting</option>
      <option value="Inappropriate Content">Inappropriate Content</option>
      <option value="Not Authorized owner of Product">Not Authorized owner of Product</option>
      <option value="Wrong Use of Contact Details">Wrong Use of Contact Details</option>
      <option value="Disturbing on Negotiations">Disturbing on Negotiations</option>
      <option value="Other">Other</option>
      </select><br/>
      <input type="text" class="hide" value="<?php echo($_POST['reported-user']); ?>" name="reported-user" required/>
      <input class="inputs" type="textarea" name="description" placeholder="Description" required/><br/>
      <button id="submit-btn"  name="submit" type="submit" >SUBMIT</button>
  </form>

  </div>

   </div>
   </div>

  </section>

<?php  include_once "footer.php"; ?>