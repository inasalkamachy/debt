<?php include_once 'inc/config.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ALFANY</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
      
    }

    .well{
        
    min-height: 10px;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 5px;
    background-color: #f5f5f5;
    border: 1px solid #e3e3e3;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.05);

    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
      text-align:center;
    }
    ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a, .dropbtn {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}



</style>
</head>
<body>


   
        <div class="container text-center">
            <h1>نظام السلف لمحافظة ميسان </h1>      
            <p>نظام السلف يعني بحساب التكلفة و التكلفة الكليه للمشاريع </p>
        </div>
 
      <nav class="navbar navbar-inverse">
  
        <ul>
        
        <li><a href="./logout.php"><span class="glyphicon glyphicon-log-in"></span>خروج</a></li>
        <li ><a href="Maddition.php"><span class="glyphicon glyphicon-plus" > </span></a></li>   
        <li><a href="./search.php"><span class="glyphicon glyphicon-search"></span>أخر سلفة</a></li>
        
        
       
       </ul>
  
      </nav>

      
</head>