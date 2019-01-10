<?php session_start(); 
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');
include_once "includes/db.inc.php";
?>
<!DOCTYPE html>
<html>

<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-121535119-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-121535119-2');
</script>

<!-- GOOGLE ADS -->
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-1772316900422345",
    enable_page_level_ads: true
  });
</script>
<title>AmiXchange</title>
<meta charset="UTF-8">
<meta name="description" content="Sell your products in Amity Lucknow Campus">
<meta name="keywords" content="Buy,Sell,Earn,Amity,Lucknow,Notes,Pdf,Books,Stationary">
<meta name="author" content="Akshat Pande">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/svg" href="assets/Display/favicon.svg"/>
<link rel="stylesheet" href="styles/layout.css">
<link href="https://fonts.googleapis.com/css?family=Chela+One" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</head>

<body>

<div id="menu-mobile-con" class="menu-mobile-con text-center">
<span><i id="close-menu" class="fas fa-times mob-menu-close-icon"></i>
  <h4 >DASHBOARD</h4><hr/></span>
  <ul class="mob-menu-list text-center">
    <a href='index.php' class='mob-link'><li class='mob-menu-list-element' >HOME</li></a>
    <?php if(!isset($_SESSION['u_id'])){echo"<a href='signup.php' class='mob-link'><li class='mob-menu-list-element' >SIGNUP</li></a>";}?>
    <?php if(!isset($_SESSION['u_id'])){echo"<a href='login.php' class='mob-link'><li class='mob-menu-list-element'>LOGIN</li></a>";}?>
    <?php if(isset($_SESSION['u_id'])){
      $sql="SELECT user_pv,user_ev FROM verification WHERE user_uid="."'".$_SESSION['u_id']."';";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_assoc($result);
      if(($row['user_pv']==1)||($row['user_ev']==1))
      {
       if($row['user_ev']==1)
       {
       echo '<li id="activity-button2" class="profile-activity-desktop btn-warning text-center">VERIFY EMAIL</li>';
       }
       else if($row['user_pv']==1){
         echo '<a href="phone-verification-enquiry.php" ><li id="activity-button2" class="profile-activity-desktop btn-warning text-center">VERIFY PHONE NUMBER</li></a>';
       }
         echo "<a href='profile.php' class='mob-link'><li class='mob-menu-list-element'>PROFILE</li></a>";
      }
      else{
          echo"<a href='profile.php' class='mob-link'><li class='mob-menu-list-element'>PROFILE</li></a>".
              "<a href='edit-profile.php' class='mob-link'><li class='mob-menu-list-element'>EDIT-PROFILE</li></a>".
              "<a href='includes/advertisement.inc.php' class='mob-link'><li class='mob-menu-list-element'>MY-ADVERTISEMENT</li></a>".
              "<a href='add.php' class='mob-link'><li class='mob-menu-list-element' style='white-space:nowrap'>POST-ADVERTISEMENT</li></a>";}}
    echo '</ul>
    <p class="mob-menu-con-text">1.0.0(Early Access)<br/><i class="far fa-copyright"></i> 2019 | All Rights Reserved | Made with <i class="far fa-heart"></i> in Amity
    <br/>Powered by <strong>ALiAS LUCKNOW</strong></p>
</div>

  <header id="headblock" class="container-fluid  headblock">
<div class="row align-items-center header-row">
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center ">
  <img src="assets/Display/AmiXchange_logo_dark.svg.png" class="header-logo"/>
  </div>';

  echo '<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center search-block">
  <form action="index.php" class="search-form" method="GET">
     <input type="search" name="search" class="input-search" placeholder="Search Products"/>
     <button type="submit" name="submit" class="btn-sm btn-warning btn-search" value="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
  </form>';

echo '<span id="expand-menu" class="menu-mobile"><i class="fas fa-bars"></i></span>';
   if(!isset($_SESSION['u_id'])){
      echo '<a href="signup.php" class="nav-btns desktop"><span class="btn-sm">SIGN-UP</span></a>';
    }
    
      echo '<a href="index.php" class="nav-btns desktop"><span class="btn-sm">HOME</span></a>';
  
   if(!isset($_SESSION['u_id'])){
    echo '<a  href="login.php" class="nav-btns desktop"><span class="btn-sm">LOGIN</span></a>';
  }
    else{
    echo '<a href="profile.php" class="nav-btns desktop"><span class="btn-sm">PROFILE</span></a>';
    }
    if((isset($_SESSION['u_id'])) && !(($row['user_pv']==1)||($row['user_ev']==1))){
    echo '<a href="edit-profile.php" class="nav-btns desktop"><span class="btn-sm">EDIT PROFILE</span></a>';
    }?>
  </div>

</div>

</header>

<?php if(isset($_SESSION["u_id"])){
  echo "<form class='logout-form' action='includes/logout.inc.php' method='POST'>
  <button class='side-scrl' name='submit'>
    <i class='fas fa-power-off ic-logout'></i>
    </button>
    </form>";}
?>

<script>
  $(document).ready(function(){
    var g=0;
    $("#expand-menu").click(function(){
      $("#menu-mobile-con").css({"width":"100%","padding":"20px"});
    var numitems=$(".mob-link").length;
    console.log(numitems);
    var interval= setInterval(() => {
      if(g<numitems)
      {
        document.getElementsByClassName("mob-link")[g].style.visibility="visible";
        document.getElementsByClassName("mob-link")[g].style.opacity="1";
        g++;
      }
    }, 100);
    setTimeout(() => {
      clearInterval(interval);
    }, 1900);
  });

  $("#close-menu").click(function(){
    $(".mob-link").css({"visibility":"hidden","opacity":"0"});
    $("#menu-mobile-con").css({"width":"0%","padding":"0px"});
    g=0;
  });
  });
</script>