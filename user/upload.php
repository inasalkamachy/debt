


    <?php include 'inc/header.php'?>
    <?php
//This code shows how to Upload And Insert Image Into Mysql Database Using Php Html.
//connecting to uploadFile database.

//if button with the name uploadfilesub has been clicked
if(isset($_POST['save'])) {


$filename = $_FILES['myfile']['name'];
$distination = 'uploads/'. $filename;
$extension = pathinfo($filename,PATHINFO_EXTENSION);
$file = $_FILES['myfile']['tmp_name'];
$size = $_FILES['myfile']['size'];
if(!in_array($extension,['zip','pdf','png','jpg']))
{
	echo "Your file must be .zip, .pdf, .png, .jpg";
}

elseif($_FILES['myfile']['size']>1000000)
{
	echo " file is too larg";
}

else {
	if (move_uploaded_file($file,$distination))
	{
		$sql = "INSERT INTO `tool1` ( `name`, `size`, `download`) 
		VALUES ( '$filename', '$size', 0 );";
		
		if(mysqli_query($conn, $sql)) {

			echo" successful upload";

		}
		else{
			echo" faild";
		}

	}
}

	
}
?>




<?php mysqli_close($conn); ?>
<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">

<form method="POST" id="register-form"  action="upload.php"  role="form" style="display: block;" enctype="multipart/form-data">

                <div class="form-group">
<!--input tag for file types should have a "type" attribute with value "file"-->
<input type="file" name="myfile" />
</div>



				
		<div class="form-group">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<center>
<input name="save" type="submit" class="btn btn-primary"  id="register-submit" tabindex="4" value="upload">
</center>
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




