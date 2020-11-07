


    <?php include 'inc/header.php'?>
<?php
				if(isset($_POST['btn-upload']))
				{    
					
				$file = rand(1000,100000)."-".$_FILES['file']['name'];
				$file_loc = $_FILES['file']['tmp_name'];
				$file_size = $_FILES['file']['size'];
				$file_type = $_FILES['file']['type'];
				$folder="uploads/";
				
				move_uploaded_file($file_loc,$folder.$file);
				$sql="INSERT INTO tbl_uploads(file,type,size) VALUES('$file','$file_type','$file_size')";
				$res = mysqli_query($conn,$sql); 

				if(!$res){
					//die("التسلسل الذي قمت بأدخاله موجود مسبقا");
					echo "حدث خطأ";
					///echo "Could not successfully run query ($query) from DB: " . mysqli_error($conn);
				}
				else{
					//echo "تم التعديل بنجاح";
					header('Location: clean.php');
				}


				}
?>
    <?php include 'inc/footer.php';?>




