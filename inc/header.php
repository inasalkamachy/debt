<?php include_once 'inc/config.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ALFANY</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="inc/style.css" />
  <style>
  
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
      text-align:center;
    }
  </style>
      <nav class="navbar navbar-inverse">
  <div class="container-fluid">

           <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">

            <li><a href="./logout.php"><span class="glyphicon glyphicon-log-in"></span>خروج</a></li>
            <li><a href="./index.php"><span class="glyphicon glyphicon-home"></span>الرئيسية</a></li>
            <li><a href="Maddition.php"><span class="glyphicon glyphicon-plus" > </span></a></li>   
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <?php
                if(isset($_GET["pro"])){
                  $pro = $_GET["pro"];
                }else{
                  $pro = 1;
                }
                $sel_query= "SELECT * FROM `cats`";
                $result = mysqli_query($conn,$sel_query);
                while($row = mysqli_fetch_assoc($result)) { 
                    echo '<li class=""><a href="toolbar.php?pro='.$pro.'&cat='.$row["id"].'">'.$row["name"].'</a></li>';
                }
            ?>
            </ul>
      
          </div>
  </div>
</nav>
</head>