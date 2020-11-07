<?php include 'inc/header.php'?>

<style>
.table>thead>tr>th {
    text-align: center;
    vertical-align: bottom;
    border-bottom: 2px solid #ddd;

    
}
</style>


<div class="jumbotron">
  <div class="container text-center">
    <center><h2>أعمال تطهيرات محافظة ميسان</h2></center>
  </div>
</div>

<center>
<form action="uploads.php" method="post" enctype="multipart/form-data">
<input type="file" name="file" />
<button type="submit" name="btn-upload">تحميل</button>
</form>


<table width="100%" border="1">
    <tr>
    <td>اسم الملف</td>
    <td>نوع الملف</td>
    <td>حجم الملف(KB)</td>
    <td>عرض الملف</td>
    </tr>
    <?php
 $sql="SELECT * FROM tbl_uploads";
 $result_set = mysqli_query($conn,$sql);
 while($row=mysqli_fetch_array($result_set))
 {
  ?>
        <tr>
        <td><?php echo $row['file'] ?></td>
        <td><?php echo $row['type'] ?></td>
        <td><?php echo $row['size'] ?></td>
        <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank"><span class="glyphicon glyphicon-eye-open" > </span></a></td>
        
        </tr>
        <?php
 }
 ?>
</table>
</center>

<table width="100%" border="1" 
style='border-collapse: collapse;border-color: silver'; class='dataframe table my_table' dir="rtl">

<thead text-item:center>

<tr >
  
<th>التسلسل</th>
<th>التفاصيل </th>
<th>الكمية المنجزة</th>
<th>الوحدة</th>
<th>السعر</th>
<th>المبلغ/دينار</th>
<th> المبلغ المصروف</th>
<th>المبلغ المتبقي</th>

</thead>
<tbody>
<?php



    $sel_query= "SELECT *,
        (SELECT `amount`*`price`) `mprice`,
        (SELECT SUM(`cost`) FROM `sulfa` WHERE `sulfa`.`pro` = `projects`.`id`) `pprice`,
        (SELECT (`amount`*`price`)-`pprice`) `rprice`
        FROM `projects` WHERE `type`=1 ORDER BY `id` DESC;";
    $result = mysqli_query($conn,$sel_query);

    while($row = mysqli_fetch_assoc($result)) { ?>

    
        <tr >
            <td align="center"><?php echo $row["id"]; ?></td>
            <td align="center"><?php echo $row["name"]; ?></td>
            <td align="center"><?php echo $row["amount"]; ?></td>
            <td align="center"><?php echo $row["unit"]; ?></td>
            <td align="center"><?php echo number_format($row["price"]); ?></td>
            <td align="center"><?php echo number_format($row["mprice"]); ?></td>
            <td align="center"><?php echo number_format($row["pprice"]); ?></td>
            <td  class = "xyz" id = "abc"  align="center"><?php echo $row["rprice"]; ?></td>
        </tr>
        <?php
    }

mysqli_close($conn); ?>
</tbody>
</table>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script>
    $(function() {
        $(abc).each(function(){
            var txt = $(this).text();
            if( !isNaN(txt) && parseInt(txt) < 0 )
                $(this).parent().css('background-color', '#FF3333');
        });
    });
</script>
<?php include 'inc/footer.php'; ?>
