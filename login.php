<?php include 'inc/header copy.php';?>
<center>
<h1>نظام السلف لمحافظة ميسان</h1>
</center>
<?php




if(isset($_POST['Login'])){
	$user=$_POST['user'];
	$pass = $_POST['pass'];
	$usertype=$_POST['usertype'];
	$query = "SELECT * FROM `login` WHERE username='".$user."' and password = '".$pass."' and usertype='".$usertype."'";
	$result = mysqli_query($conn, $query);
	if($result){
	while($row=mysqli_fetch_array($result)){
	echo'<script type="text/javascript">alert("you are login successfully and you are logined as ' .$row['usertype'].'")</script>';
	 
	}
	if($usertype=="admin"){
	?>
	<script type="text/javascript">
	window.location.href="admin/admin.php"</script>
	<?php
	 
	}else{
	?>
	<script type="text/javascript">
	window.location.href="user/user.php"</script>
	<?php
	 
	}
	}else{
	echo 'no result';
	}
	}
	 
	?>
	<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
						
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
				<div class="col-lg-12">
<form id="login-form"  method="POST" action="login.php" role="form" style="display: block;">
					
									<div class="form-group">
									<label for="username">
				                     	<i class="fas fa-user"></i>
			                    	</label>
										<input type="text" name="user"  tabindex="1" class="form-control" placeholder="Username" required>
									</div>
									<div class="form-group">
									<label for="password">
				                 	<i class="fas fa-lock"></i>
				                    </label>
										<input type="text" name="pass"  tabindex="2" class="form-control" placeholder="Password" required>
									</div>

									<div class="form-group">
									<label for="password">
				                 	<i class="fas fa-lock"></i>
				                    </label>
									Select user type: <select name="usertype">
									<option value="admin">admin</option>
									<option value="user">user</option>
									</select>
									</div>


									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<center>
												
												<input type="submit" name="Login"  class="btn btn-primary"  id="register-submit" tabindex="4" value="دخول">
</center>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												
											</div>
										</div>
									</div>
								</form>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
    <?php include 'inc/footer.php';?>
