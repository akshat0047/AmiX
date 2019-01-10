<?php include_once "header.php";
include_once "includes/db.inc.php";
?>

<section class="profile-section">
  <div class="profile-box">
  <div class="row">
    <div  class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center image-box">

    <form action="includes/dp.inc.php" method="POST" enctype="multipart/form-data">

      <label for="profiledp" ><?php if(isset($_SESSION['u_dp'])){ echo "<img src='assets/Users/".$_SESSION['u_dp']."'"."class='profile-dp text-center'/>";}
        else{
          echo "<img src='assets/Users/default.png' class=' profile-dp text-center'/>";
        }?></label>
      <input class="profile-upload-hide dp" type="file" id="profiledp"  name="displaypic" />
    </form>

    </div>

  <div  class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 profile-activity-box-desktop  desktop">
      <ul >
        <a href="includes/advertisement.inc.php" ><li id="activity-button1" class="profile-activity-desktop btn-warning text-center">MY ADDS</li></a>
        <?php
         $sql="SELECT user_pv,user_ev FROM verification WHERE user_uid='".$_SESSION['u_id']."'";
         $result=mysqli_query($conn,$sql);
         $row=mysqli_fetch_assoc($result);
         if(($row['user_pv']==1)||($row['user_ev']==1))
         {
          if($row['user_ev']==1)
          {
            echo '<li id="activity-button2" onclick="ev_info()" class="profile-activity-desktop btn-warning text-center">VERIFY EMAIL</li>';
          }
          else if($row['user_pv']==1){
            echo '<a href="phone-verification-enquiry.php" ><li id="activity-button2" class="profile-activity-desktop btn-warning text-center">VERIFY PHONE NUMBER</li></a>';
          }
         }
         else{
          echo '<a href="add.php" ><li id="activity-button2" class="profile-activity-desktop btn-warning text-center">POST AN ADD</li></a>';
         }?>
      </ul>
      </div>

  </div>
</div>
<br/>
    <div class="row profile-info-row">
      <div class="offset-md-1 offset-lg-1 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center  profile-info">

        <div class="row">
          <div id="info-que" class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
           <span class="infos text-center">NAME:</span>
           <span class="infos text-center">COURSE:</span>
           <span class="infos text-center">SEMESTER:</span>
           <span class="infos text-center">USERNAME:</span>
           <?php if($row['user_pv']==0){echo '<span class="infos text-center">PHONE:</span>';}?>
         </div>

      <div id="info-ans" class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 ">
              <span class="infos text-center"> <?php echo $_SESSION['u_first'].' '.$_SESSION['u_last'] ; ?></span>
              <span class="infos text-center"> <?php echo $_SESSION['u_course']; ?></span>
              <span class="infos text-center"> <?php echo $_SESSION['u_semester']; ?></span>
              <span class="infos text-center"> <?php echo $_SESSION['u_id']; ?></span>
              <?php if($row['user_pv']==0){ echo '<span class="infos text-center">'.$_SESSION['ph_no'].'</span>';} ?> 
        </div>
      </div>

      </div>
    </div>
</div>
        </div>
        
</section>

<!--EMAIL INFO -->

<div id="emailverif" class="ev_info">
<div class="msg-ami text-center">CHECK YOUR AMIZONE EMAIL TO VERIFY!<br/>Do Check The Spam Box<span class="close-ami" onclick="ev_info_close()"><i class="fas fa-times"></i><span></div>        
  <div class="row text-center">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 screend-column">
          <img src="assets/Display/screend.jpg" class="tute-screend"/>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 screenm-column">
          <img src="assets/Display/screenm.jpg" class="tute-screenm"/>
        </div>
</div>
<div class="row ami-btn-row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
    <a target="_blank" href="https://student.amizone.net/"><button class="btn btn-success" >AMIZONE</button></a>
        </div></div>
        </div>
<!--          -->
<?php include_once "footer.php"?>
<script src="js/index.js"></script>
<script>
$("input").change(function(){
   $("form").submit();
});
</script>