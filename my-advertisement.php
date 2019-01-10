<?php
include_once "header.php";
$limit= ceil($_SESSION['ad_count']/6);
$pn=ceil($limit/6);
if(isset($_GET['page']))
{
  if($_GET['page']!=1)
  {
  $ll=(($_GET['page']*6)-6);
  $page=$_GET['page'];
}
else{
  $ll=0;
  $page=1;
}
}
else{
  $page=1;
  $ll=0;
}?>

<section class="myads-section ">

<div class="ad-block">

  <div class="row">
    <?php
    for($x=$ll;$x<($page*6);$x++)
    {
      if(isset($_SESSION['Product_Name'][$x]))
      {
    echo('  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center  ad-card-column">

        <div class="ad-card">');
          echo('<img src="assets/Products/'.$_SESSION['Product_Pic'][$x].'" class="ad-pic"/>
          <div class="ad-card-body text-center">');
            echo('<p class="ad-head">'.$_SESSION["Product_Name"][$x].'</p><hr class="ad-card-divider"/>');
            echo('<p class="ad-info">'. $_SESSION["Product_Type"][$x].'<br/><i class="fas fa-rupee-sign"></i>'.$_SESSION['Product_Price'][$x].'<br/>'.
              $_SESSION["Product_Description"][$x].'<br/></p>
            <a href="#dialog" onclick="del('.$_SESSION['idno'][$x].')" class="btn-sm btn-danger smooth-scroll" >DELETE</a>
          </div>
        </div>
      </div>');
    }
    else{
      echo('');
    }
  }
     ?>
</div>
</div>

<?php
echo("<ul class='ad-pagin text-center'>
<span class='pagin-element-block'><a href='index.php?page=");
if($page>1){echo($page-1);}
else{echo("1");}
echo("'class='pagin-element btn-sm btn-warning'><i class='fas fa-angle-left'></i></li>");
if($page<6)
{
for($x=0;$x<6;$x++)
{ 
  if($x<$limit)
    {
    echo("<a href='my-advertisement.php?page=".($x+1)."' class='pg-no pagin-element'>".($x+1)."</li>");
    }
}}
else if($page%6==0){
  for($x=$page;$x<$page+6;$x++)
{
  if($x<=$limit)
  {
  echo("<a href='index.php?page=".($x)."' class='pg-no pagin-element'>".($x)."</li>");
}}}
else if(!($page%6==0) && $page>6 && $page<=$limit){
  for($k=$page;$k>0;$k--)
  {
    if(($k%6==0)&&($k!=$page))
    {
      for($x=$k;$x<$k+6;$x++)
      {
        if($x<=$limit)
        {
        echo("<a href='my-advertisement.php?page=".($x)."' class='pg-no pagin-element'>".($x)."</li>");
      }}
    }}}
else{
  http_response_code(404);
  include('my_404.php');
  die();
}
echo("<a href='my-advertisement.php?page=");
if($page<$limit){echo($page+1);}
else{echo($limit);}
echo("' class='pagin-element btn-sm btn-warning'><i class='fas fa-angle-right'></i></a>
</span>
</ul><br/>");
?>

<div id="dialog" class="delete-dialog text-center">
</div>

<script>
 function del(id){
  document.getElementById('dialog').innerHTML= '<p class="delete-warning">THIS ADVERTISEMENT WILL BE DELETED</p><br/>'+
          '<a href="includes/delete.inc.php?id='+id+'" ><span class="btn-sm btn-danger btn-dialog">DELETE</span></a><span  onclick="go_back()" class="btn-sm btn-success btn-dialog">GO BACK</span>';
  document.getElementById('dialog').style.display="block";
  document.getElementsByClassName('ad-block')[0].style.opacity="0.7";     
 }

 function go_back(){
  document.getElementById('dialog').style.display="none";
   document.getElementsByClassName('ad-block')[0].style.opacity="1";
 }
 $(document).ready(function(){
  // Add smooth scrolling to all links
$(".smooth-scroll").click(function (event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top -200
      }, 800);
    }});
  });

</script>

<script>
$(document).ready(function(){
  var pg = (document.URL).split("=");
  var chngclr=parseInt(pg[1],10);
  console.log(chngclr);
  console.log(typeof chngclr);
  if(pg[1]%6==0)
  {
    chngclr=1;
  }else if(pg[1]>6 && !(pg[1]%6==0))
  {
    for(var k=pg[1];k>0;k--)
    {
      if(k%6==0 && k!=pg[1])
  {
        chngclr=(pg[1]-k+1);
  }}}
  else if(!chngclr){
    chngclr=1;
  }
  $(".pg-no").css("background-color","rgba(254,254,254,0.5)");
  document.getElementsByClassName("pg-no")[chngclr-1].style.backgroundColor="#ffc107"; 
  $(window).scroll(function (){
    console.log(5);
    if($(window).width()>574)
    {
    if($(this).scrollTop()>35)
    {
      $(".headblock").css("padding","3");
    }
    else{
      $(".headblock").css("padding","30");
    }
  }
  else{ console.log(5);
    if($(this).scrollTop()>35)
    {
      $(".headblock").css("padding","5");
    }
    else{
      $(".headblock").css("padding","20");
    }
  }
});
});
</script>
</section>
<?php
include_once "footer.php" ?>
