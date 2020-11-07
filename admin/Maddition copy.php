<?php include 'inc/header.php'?>

<?php

        if(isset($_POST['sub'])) {
		$cost=$_POST['cost'];
		$num=$_POST['num'];
		$des=$_POST['des'];
		$date=$_POST['date'];
		$type=$_POST['type'];
		$cat=$_POST['cat'];
		$pro=$_POST['pro'];
		$firstdate=$_POST['firstdate'];
		$seconddate=$_POST['seconddate'];
		$cont=$_POST['cont'];
		$contN=$_POST['contN'];
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



				if($cat != 0 && $pro != 0){
					$query = "INSERT INTO
						sulfa (cost, num, des, date, type, cat, pro, firstdate, seconddate, cont, contN, name, size, download) 
						VALUES 
						('$cost','$num', '$des', '$date'  , '$type', '$cat', '$pro', '$firstdate', '$seconddate', '$cont', '$contN', '$filename', '$size', 0 )";
		
					$result = mysqli_query($conn, $query);
					if(! $result){
						//die("التسلسل الذي قمت بأدخاله موجود مسبقا");
						echo "حدث خطأ";
						echo "Could not successfully run query ($query) from DB: " . mysqli_error($conn);
		
					}
					else{
						echo "تم الادخال بنجاح";
						
					}
				}else{
					echo"يجب اختيار المشروع والتبويب";
				}
			}
		}
	}
        
		
	
?>

<div class="container" dir="rtl">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
							
								<form method="POST" id="register-form" enctype="multipart/form-data"     role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="num" id="num" tabindex="1" class="form-control" placeholder="رقم السلفة" required="required" />
									</div>
									<div class="form-group">
										<input type="text" name="cost" id="cost" class="form-control" placeholder="كلفة السلفة" required="required" />
									</div>
									<div class="form-group">
										<textarea name="des" id="des" class="form-control" placeholder="التفاصيل" required="required" ></textarea>
									</div>

									<div class="form-group">
								     	<label class="form-label">تاريخ ترويج المعاملة</label>
										<input type="date" name="date" class="form-control" placeholder="التاريخ" required="required"/>
									</div>
                                    
									<div class="form-group">
									<label class="form-label">النوع</label>
									<select name="cont" id="cont" class="form-control" required="required" >
										<?php
										$sel_query= "SELECT * FROM `contract`";
										$result = mysqli_query($conn,$sel_query);
										?><option>أختار النوع</option><?php
										while($row = mysqli_fetch_assoc($result)) { 
											echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
										}
										?>
										</select>
									</div>

									<div class="form-group">
									    <label class="form-label">رقم العقد</label>
										<input type="text" name="contN" id="contN" class="form-control" placeholder="رقم العقد"  />
									</div>

									
									<div class="form-group">
									    <label class="form-label">تبويب الصرف</label>
										<select name="type" id="type" class="form-control" required="required" >
										<?php
										$sel_query= "SELECT * FROM `type`";
										$result = mysqli_query($conn,$sel_query);
										?><option>اختار بتويب الصرف</option><?php
										while($row = mysqli_fetch_assoc($result)) { 
											echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
										}
										?>
										</select>
									</div>	

									<div class="form-group">
									    <label class="form-label">أسم المشروع</label>
										<select name="pro" id="pro" class="form-control" required="required" >
										<?php
										$sel_query= "SELECT * FROM `projects`";
										$result = mysqli_query($conn,$sel_query);
										?><option>اختار اسم مشروع</option><?php
										while($row = mysqli_fetch_assoc($result)) { 
											echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
										}
										?>
										</select>
									</div>	
									<div class="form-group">
										<label class="form-label">التبويب</label>
										<select name="cat" id="cat" class="form-control" required="required" >
										<?php
										$sel_query= "SELECT * FROM `cats`";
										$result = mysqli_query($conn,$sel_query);
										?><option>اختار اسم التبويب</option>
										<?php
										while($row = mysqli_fetch_assoc($result)) { 
											echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
										}
										?>
										</select>
									</div>
									<div class="form-group">
									    <label class="form-label">من تاريخ</label>
										<input type="date" name="firstdate" class="form-control" placeholder="من"  required="required"/>
									</div>
									<div class="form-group">
									    <label class="form-label">لغاية تاريخ</label>
										<input type="date" name="seconddate" class="form-control" placeholder="الى" required="required" />
									</div>

									<div class="form-group">
									<input type="file" name="myfile" />
									</div>


									


									<div class="col-sm-6 col-sm-offset-3">
										<center>
											<input name="sub" type="submit" class="btn btn-primary"  id="register-submit" value="اضف سلفة">
										</center>
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
