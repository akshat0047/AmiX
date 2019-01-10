<?php include_once "header.php";
      include_once "includes/db.inc.php";
$user=$_GET['user'];
$sql="select user_first,user_last from users where user_uid='".$user."'";
$result= mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$sql1="select * from advertisements where user_uid='".$user."' AND Product_Name='".$_GET['product']."';";
$result1= mysqli_query($conn,$sql1);
$row1=mysqli_fetch_assoc($result1);
echo '<section class="profile-section-know-more ">';
  echo '<div class="know-more-inner">
        <div class="row align-items-center">'.

    '<div  class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6  text-center   image-box">'.
         '<img src="assets/Products/'.$row1['Product_Pic'].'" class=" profile-dp-know-more text-center"/> 
         </div>'.
    
     '<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">'.
      '<table class="profile-info-know-more">
        <tr>
        <td><span class="infos text-center">USER:</span></td>
        <td><span class="infos text-center">'.$row['user_first']." ".$row['user_last'].'</span></td>
        </tr>
        <tr>
        <td><span class="infos text-center">ITEM NAME:</span></td>
        <td><span class="infos text-center">'.$row1['Product_Name'].'</span></td>
        </tr>
        <tr>
        <td> <span class="infos text-center">PURCHASED/STARTED:</span></td>
        <td><span class="infos text-center">'.$row1['time_since_purchase'].'</span></td>
        </tr>
        <tr>
        <td><span class="infos text-center">PRICE:</span></td>
        <td><span class="infos text-center"><i class="fas fa-rupee-sign"></i>'.$row1['Product_Price'].'</span></td>
        </tr>
        <tr><td colspan="2"><span class="text-center desc-head">ITEM DESCRIPTION:</span></tr></td>
        <tr><td colspan="2"><p class="text-center desc">'.$row1['Product_Description'].'</p></tr></td>
        </table>
      </div></div>

      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
          <br/><a href="user-details.php?user='.$user.'" class="btn btn-warning seller-info-button" >SELLER DETAILS</a>
        </div>
        </div>
     </div>'.

'<div class="slick">';
$sql2="select * from advertisements where user_uid='".$user."';";
$result2=mysqli_query($conn,$sql2);
while($row2=mysqli_fetch_assoc($result2))
{
 if(!($row2['idno']==$row1['idno']))
 {
echo ('<div class="know-more-card text-center">');
echo('<img src="assets/Products/'.$row2['Product_Pic'].'" class=" ad-pic"/>
<div class="know-more-card-body text-center">');
  echo('<p class="ad-head">'.$row2["Product_Name"].'</p><hr class="ad-card-divider"/>');
  echo('<p class="ad-info"'. $row2["Product_Type"].'<br/><i class="fas fa-rupee-sign"></i>'.$row2["Product_Price"].'<br/>'.
    '</p><a href="know_more.php?user='.$row2['user_uid'].'&product='.$row2['Product_Name'].'" class="btn-sm btn-primary " >Know More</a>
</div>
</div>');
 }
}
?>
</div>
</section>
<?php include_once "footer.php"?>
<script type="text/javascript">
    $(document).ready(function(){
      $('.slick').slick({
        dots: false,
  infinite: true,
  speed: 2000,
  autoplay:true,
  autoplaySpeed:2500,
  prevArrow: '<a class= "slick-prev text-center" ><i class="fas fa-chevron-left" ></i></a>',
  nextArrow: '<a class= "slick-next text-center" ><i class="fas fa-chevron-right" ></i></a>',
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 3,
  responsive: [
   
    {
      breakpoint: 600,
      settings: {
        autoplay:true,
        autoplaySpeed:2500,
        infinite:true,
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows:false,
        autoplay:true,
        autoplaySpeed:2500,
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
      });
    });
  </script>

