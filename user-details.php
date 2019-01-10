<?php 
include_once "header.php";
include_once "includes/db.inc.php";
$sql="select * from users where user_uid='".$_GET['user']."';";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
echo('<section class="profile-section-know-more-details">
<div class="know-more-inner">
<div class="row align-items-center user-details-row">'.
'<div  class=" col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6  text-center   image-box">'.
         '<img src="assets/Users/');if(isset($row['user_dp'])){
           echo($row['user_dp']);
         }
         else{
           echo'default.png';
         } echo('" class="profile-dp-know-more text-center"/> 
         </div>'.
    
     '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 text-center">'.
      '<div class="profile-info-know-more">
        <div class="row ">
          <div id="info-que" class="col-6 col-sm-6 col-md-6 col-lg-6 ">
          <div class="row">
           <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
           <span class="infos text-center">NAME:</span>
           <span class="infos text-center">COURSE:</span>
           <span class="infos text-center">SEMESTER:</span>');
           if(isset($row['user_phone'])){echo('<span class="infos text-center">PHONE:</span>');}
           echo('<span class="infos text-center">EMAIL:</span>
         </div></div></div>');
      echo('<div id="info-ans" class="col-6 col-sm-6 col-md-6 col-lg-6">'.
              '<span class="infos text-center">'.$row['user_first'].' '.$row['user_last'].'</span>'.
              '<span class="infos text-center">'.$row['user_course'].'</span>'.
              '<span class="infos text-center">'.$row['user_semester'].'</span>');
              if(isset($row['user_phone'])){echo('<span class="infos text-center">'.$row['user_phone'].'</span>');}
              echo('<a target="_blank" href="mailto:'.$row['user_email'].'?Subject=Ami-Exchange%20" class="seller-email"><span class="infos text-center">'.$row['user_email'].'</span></a>'.
        '</div>
      </div>
      </div><br/>');
      if(isset($_SESSION['u_id']))
      {
        if($row['user_uid']!=$_SESSION['u_id'])
        {
      echo('<form method="POST" action="report.php">
      <input type="text" class="hide" value="'.$row['user_uid'].'" name="reported-user">
      <button id="submit-btn" type="submit" class="hide" value="submit"></button>
      <label for="submit-btn"><span class="btn btn-danger report-btn">REPORT</span></label>
      </form>');
        }
      }
      else{
        echo('<a href="login.php"><span class="btn btn-danger report-btn">LOGIN TO REPORT</span></a>');
      }
      echo('</div></div></div>   
      </section>');
  
include_once "footer.php";
?>