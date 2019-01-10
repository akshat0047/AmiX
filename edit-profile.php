<?php 
include_once "header.php";
if(isset($_SESSION['u_id']))
{

echo('<div class="edit-profile">
   <div class="row  edit-row">
      <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <span class="edit-label text-center"> FIRST NAME:</span><br/>
                <span class="edit-label text-center"> LAST NAME:</span><br/>
                <span class="edit-label text-center"> OLD PASSWORD:</span><br/>
                <span class="edit-label text-center"> NEW PASSWORD:</span><br/>
                <span class="edit-label text-center"> RENTER NEW PASSWORD:</span><br/>
                <span class="edit-label text-center"> COURSE:</span><br/>
                <span class="edit-label text-center"> SEMESTER:</span><br/>
      </div>
      <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <form  action="includes/edit-profile.inc.php" method="POST">
                <input class="inputs" value="'.$_SESSION['u_first'].'" type="text" name="firstname" placeholder="First Name"/>
                <input class="inputs" value="'.$_SESSION['u_last'].'" type="text" name="lastname" placeholder="Last Name"/><br/>
                <input class="inputs" type="password" name="password" placeholder="Password"/><br/>
                <input class="inputs" type="password" name="passwordnew" placeholder="New Password"/><br/>
                <input class="inputs" type="password" name="passwordrenew" placeholder="Re-enter Password"/><br/>
                <input class="inputs" value="'.$_SESSION['u_email'].'" type="text" name="email" placeholder="Email"/><br/>
                <input class="inputs" value="'.$_SESSION['u_course'].'" type="text" name="course" placeholder="Course"/><br/>
                <input class="inputs" value="'.$_SESSION['u_semester'].'" type="text" name="semester" placeholder="Semester"/><br/><br/>
                <button class="edit-submit" id="submit-btn"  name="submit" type="submit" >SUBMIT</button>
                </form>
                <a href="phone-verification-enquiry.php"><button class="edit-submit" id="submit-btn"  >CHANGE MOBILE NUMBER</button></a>
      </div>
   </div>
</div>');


include_once "footer.php";
}
?>