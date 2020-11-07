<?php include 'inc/header.php'?>

<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
                            <?php
                                $sel_query= "SELECT * FROM `projects` ";
                                $result = mysqli_query($conn,$sel_query);
                                ?><option>اختار المشروع</option><?php
                                while($row = mysqli_fetch_assoc($result)) { 
                                    echo '<a href="toolbar.php?pro=1&cat='.$row["id"].'">'.$row["name"].'</a><br/>';
                                }
                            ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <?php include 'inc/footer.php';?>
    ///////////////////////////////////////////////////
    <style>
.center{
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%
}
</style>
<?php include 'inc/header.php' ?>
<?php
	

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}
?>
<body>

<style>
* {
  box-sizing: border-box;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
  /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
</head>
<body>



<div class="row">
  
  <div class="column" style="background-color:#eee;">
  <a href="plan/plan.php"><img src="inc/img/kota.png"  class="img-responsive" style="width:100%" alt="Image"></a>
    
  </div>
  <div class="column" style="background-color:#eee;">
  <a href="budget/budget.php"><img src="inc/img/mez.png"  class="img-responsive" style="width:100%" alt="Image"></a>
    
  </div>
</div>





<div class="col-sm-2 sidenav">
      <div class="well well-sm">
     

        <p><a href="delete.php"><span class="glyphicon glyphicon-remove fa-lg"></span></a></p>
      </div>
      <div class="well well-sm">
        <p><a href="read.php"><span class="glyphicon glyphicon-eye-open fa-lg"></span></a></p>
      </div>
      <div class="well well-sm">
        <p><a href="update.php"><span class="glyphicon glyphicon-edit fa-lg"></span></a></p>
      </div><div class="well well-sm">
        <p><a href="search.php"><span class="glyphicon glyphicon-search fa-lg"></span></a></p>
      </div><div class="well well-sm">
        <p><a href="addition.php"><span class="glyphicon glyphicon-plus fa-lg"></span></a></p>
      
    </div>
</div><br><br> 

<?php include 'inc/footer.php' ?>
