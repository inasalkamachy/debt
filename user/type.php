<?php include 'inc/header.php'?>

<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
                            <?php
                                $sel_query= "SELECT * FROM `type`";
                                $result = mysqli_query($conn,$sel_query);
                                ?><option>اختار بتويب الصرف</option><?php
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
    