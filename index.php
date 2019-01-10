<?php
include_once "header.php";
include_once "includes/db.inc.php";
include_once "select.php";
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
}
if(isset($_GET['search']))
{
$search=mysqli_real_escape_string($conn,$_GET['search']);
$limit=select_all_front_search($_GET['search']);
$sql="SELECT * from advertisements where ((Product_Name like '".$search."%') or (Product_Name like '%".$search."') or (Product_Name like '%".$search."%')) LIMIT ".$ll.",6";
$result=mysqli_query($conn,$sql);
$resultcheck=mysqli_num_rows($result);
$pn=ceil($limit/6);
}
else{
$limit=select_all_front();
$sql="SELECT * FROM advertisements ORDER BY idno DESC LIMIT ".$ll.",6";
$result=mysqli_query($conn,$sql);
$resultcheck=mysqli_num_rows($result);
$pn=ceil($limit/6);
}
echo('<section class="store">
<div class="row item-row-store">');
while($row=mysqli_fetch_assoc($result))
{
    echo('  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center  ad-card-column">

      <div class="ad-card">');
        echo('<img src="assets/Products/'.$row['Product_Pic'].'" class="ad-pic"/>
        <div class="ad-card-body text-center">');
          echo('<p class="ad-head">'.$row["Product_Name"].'</p><hr class="ad-card-divider"/>');
          echo('<p class="ad-info">'. $row["Product_Type"].'<br/><i class="fas fa-rupee-sign"></i>'.$row['Product_Price'].'<br/></p>
          <a href="know_more.php?user='.$row['user_uid'].'&product='.$row['Product_Name'].'" class="btn-sm btn-warning btn-know-more" >Know More</a>
        </div>
      </div>
    </div>');
  }


echo('</div>');

if(isset($_GET['search']))
{
  echo("<ul class='ad-pagin text-center'>
  <span class='pagin-element-block'><a href='index.php?page=");
  if($page>1){echo($page-1);}
  else{echo("1");}
  echo("&search=".$_GET['search']."'class='pagin-element btn-sm btn-warning'><i class='fas fa-angle-left'></i></li>");
  if($page<6)
  {
  for($x=0;$x<6;$x++)
  { 
    if($x<$limit)
    {
    echo("<a href='index.php?page=".($x+1)."' class='pg-no pagin-element'>".($x+1)."</li>");
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
          echo("<a href='index.php?page=".($x)."' class='pg-no pagin-element'>".($x)."</li>");
        }}
      }}}
  else{
    http_response_code(404);
    include('my_404.php');
    die();
  }
echo("<a href='index.php?page=");
if($page<$limit){echo($page+1);}
else{echo($limit);}
echo("&search=".$_GET['search']."' class='pagin-element btn-sm btn-warning'><i class='fas fa-angle-right'></i></a>
</span>
</ul><br/>");
  }

  else{
    
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
    echo("<a href='index.php?page=".($x+1)."' class='pg-no pagin-element'>".($x+1)."</li>");
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
          echo("<a href='index.php?page=".($x)."' class='pg-no pagin-element'>".($x)."</li>");
        }}
      }}}
  else{
    http_response_code(404);
    include('my_404.php');
    die();
  }
echo("<a href='index.php?page=");
if($page<$limit){echo($page+1);}
else{echo($limit);}
echo("' class='pagin-element btn-sm btn-warning'><i class='fas fa-angle-right'></i></a>
</span>
</ul><br/>");
  }
 ?>

</section>
<?php include_once "footer.php";?>
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
  $("#headblock").css("position","fixed");
  $(window).scroll(function (){
    if($(window).width()>768)
    {
    if($(this).scrollTop()>35)
    {
      $("#headblock").css("padding","3");
    }
    else{
      $("#headblock").css("padding","27");
    }
  }
  else{
    if($(this).scrollTop()>35)
    {
      $("#headblock").css("padding","5");
    }
    else{
      $("#headblock").css("padding","15");
    }
  }
});
});
</script>

