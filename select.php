<?php 

function select_all_front()
{
include "includes/db.inc.php";
$select="SELECT * from advertisements";
$resultall=mysqli_query($conn,$select);
$checkall=mysqli_num_rows($resultall);
return ceil($checkall/6);
}

function select_all_front_search($search)
{
include "includes/db.inc.php";
$select="SELECT * from advertisements where ((Product_Name like '".$search."%') or (Product_Name like '%".$search."') or (Product_Name like '%".$search."%'))";
$resultall=mysqli_query($conn,$select);
$checkall=mysqli_num_rows($resultall);
return ceil($checkall/6);
}
?>