<?php include 'inc/header.php'?>

<?php
// take as id 
$rows = null;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$q="SELECT * FROM `sulfa` WHERE `id` = ".$id;
	$ress = mysqli_query($conn,$q);
	$rows = mysqli_fetch_assoc($ress);
	
}else{
	header('Location: ./index.php');

}
if(isset($_POST['update']))
{
		$cost=$_POST['cost'];
		$num=$_POST['num'];
		$des=$_POST['des'];
		$date=$_POST['date'];
		$cat=$_POST['cat'];
		$pro=$_POST['pro'];
		$firstdate=$_POST['firstdate'];
		$seconddate=$_POST['seconddate'];
		$cont=$_POST['cont'];
		$contN=$_POST['contN'];

		$sql = "UPDATE `sulfa` SET `cost`=$cost, `num`=$num,
		`des`='$des', `date`='$date', `cat`=$cat, 
		`pro`=$pro, `firstdate`='$firstdate', `seconddate`='$seconddate', `cont`='$cont', `contN`='$contN' where `id`=".$id;
		$res = mysqli_query($conn, $sql);
		if(!$res){
			//die("التسلسل الذي قمت بأدخاله موجود مسبقا");
			echo "حدث خطأ";
			///echo "Could not successfully run query ($query) from DB: " . mysqli_error($conn);
		}
		else{
			echo "تم التعديل بنجاح";
			header('Location: ./toolbar.php?pro='.$pro.'&cat='.$cat.'');
		}
echo $sql;

}
	
?>
<?php //mysqli_close($conn); ?>
<div class="container"  dir="rtl">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form method="POST" id="register-form" action="#"   role="form" style="display: block;">
									<div class="form-group">
									    <label class="form-label">رقم السلفة</label>
										<input type="text" name="num" id="num" tabindex="1" class="form-control" placeholder="رقم السلفة" value="<?php echo $rows["num"]; ?>" required="required" />
									</div>
									<div class="form-group">
									    <label class="form-label">مبلغ السلفة</label>
										<input type="text" name="cost" id="cost" class="form-control" placeholder="كلفة السلفة" value="<?php echo $rows["cost"]; ?>" required="required" />
									</div>
									<div class="form-group">
									    <label class="form-label">التفاصيل</label>
										<textarea name="des" id="des" class="form-control" placeholder="التفاصيل" required="required" ><?php echo $rows["des"]; ?></textarea>
									</div>

									<div class="form-group">
									    <label class="form-label">تاريخ ترويج المعاملة</label>
										<input name="date" id="date" class="form-control" placeholder="التاريخ"  value="<?php echo $rows["date"] ?>" required="required" />
									</div>

									<div class="form-group">
									<label class="form-label">النوع</label>
									<select name="cont" id="cont" class="form-control" required="required" >
										<?php
										$sel_query= "SELECT * FROM `contract`";
										$result = mysqli_query($conn,$sel_query);
										?><option>أختار النوع</option>
										<?php
										while($row = mysqli_fetch_assoc($result)) { 
											if($row["id"] == $rows["type"]){
												echo '<option value="'.$row["id"].'" selected="true">'.$row["name"].'</option>';
											}else{
												echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
											}
										}
										?>
										</select>
									</div>

									<div class="form-group">
									    <label class="form-label">رقم العقد</label>
										<input type="text" name="contN" id="contN" class="form-control" placeholder="رقم العقد" value="<?php echo $rows["contN"] ?>"  />
									</div>
                                    
									<div class="form-group">
										<label class="form-label">تبويب الصرف</label>
										<select name="cat" id="cat" class="form-control" value="<?php echo $cat; ?>" required="required" >
										<?php
										$sel_query= "SELECT * FROM `type`";
										$result = mysqli_query($conn,$sel_query);
										?><option>اختار تبويب الصرف</option>
										<?php
										while($row = mysqli_fetch_assoc($result)) { 
											if($row["id"] == $rows["type"]){
												echo '<option value="'.$row["id"].'" selected="true">'.$row["name"].'</option>';
											}else{
												echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
											}
										}
										?>
										</select>
									</div>
									
									
									<div class="form-group">
									    <label class="form-label">أسم المشروع</label>
										<select name="pro" id="pro" class="form-control"  value="<?php echo $pro; ?>" required="required" >
										<?php
										$sel_query= "SELECT * FROM `projects`";
										$result = mysqli_query($conn,$sel_query);
										?><option>اختار اسم مشروع</option><?php
										while($row = mysqli_fetch_assoc($result)) { 
											if($row["id"] == $rows["pro"]){
												echo '<option value="'.$row["id"].'" selected="true">'.$row["name"].'</option>';
											}else{
												echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
											}
										}
										?>
										</select>
									</div>	
									<div class="form-group">
										<label class="form-label">التبويب</label>
										<select name="cat" id="cat" class="form-control" value="<?php echo $cat; ?>" required="required" >
										<?php
										$sel_query= "SELECT * FROM `cats`";
										$result = mysqli_query($conn,$sel_query);
										?><option>اختار اسم التبويب</option>
										<?php
										while($row = mysqli_fetch_assoc($result)) { 
											if($row["id"] == $rows["cat"]){
												echo '<option value="'.$row["id"].'" selected="true">'.$row["name"].'</option>';
											}else{
												echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
											}
										}
										?>
										</select>
									<div class="form-group">
									    <label class="form-label">من تاريخ</label>
										<input name="firstdate" id="firstdate" class="form-control" placeholder="التاريخ"  value="<?php echo $rows["firstdate"] ?>" required="required" />
									</div>


									
									<div class="form-group">
									    <label class="form-label">لغاية تاريخ</label>
										<input name="seconddate" id="seconddate" class="form-control" placeholder="التاريخ"  value="<?php echo $rows["seconddate"] ?>" required="required" />
									</div>


									

									<div class="col-sm-6 col-sm-offset-3">
										<center>
											<input name="update" type="submit" class="btn btn-primary"  id="register-submit" value="تحديث">
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

	<?php mysqli_close($conn); ?>
    <?php include 'inc/footer.php';?>
