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
      <?php
      if(isset($_GET["pro"]) && isset($_GET["cat"])){
        // echo "pro ".$_GET["pro"];
        // echo "cat ".$_GET["cat"];
    
        $pro = $_GET["pro"];
        $cat = $_GET["cat"];


        $sel_query= "SELECT
        (SELECT `name` FROM `projects` WHERE `id` = ".$pro.") `pron` ,
        (SELECT `name` FROM `cats` WHERE `id` = ".$cat.") `catn`,
        (SELECT SUM(`cost`) FROM `sulfa` WHERE `cat` = ".$cat." AND  `pro` = ".$pro.") `catc`,
        (SELECT SUM(`cost`) FROM `sulfa` WHERE `pro` = ".$pro.") `proc`";
        $result = mysqli_query($conn,$sel_query);
    
        $row = mysqli_fetch_assoc($result);
        echo '<h2>السلف الخاصة '.$row["pron"].' ('.number_format($row["proc"]).')</h2>';
        echo '<h3>'.$row["catn"].' ('.number_format($row["catc"]).')</h3>';
      ?>
  </div>
</div>


<table width="100%" border="1" 
style='border-collapse: collapse;border-color: silver'; class='dataframe table my_table'>

<thead text-item:center>

<tr >
   


<th style="width:10%;">تحميل </th>
<th style="width:10%;">لغاية تاريخ</th>
<th style="width:10%;">من تاريخ</th>
<th style="width:20%;" >التفاصيل</th>
<th style="width:5%;">الكلفة</th>
<th style="width:10%;">تاريخ ترويج المعاملة</th>
<th style="width:5%;">رقم العقد</th>
<th style="width:5%;">نوع العقد</th>
<th style="width:5%;">رقم السلفة</th>
<th style="width:5%;">التسلسل</th>
<th style="width:10%;"></th>






</thead>
<tbody>
<?php



            $sel_query= "SELECT *,
            (SELECT `name` FROM `contract` WHERE `sulfa`.`cont` = `contract`.`id`) `proon`,
            (SELECT `name` FROM `projects` WHERE `sulfa`.`pro` = `projects`.`id`) `pron`,
            (SELECT `name` FROM `cats` WHERE `sulfa`.`cat` = `cats`.`id`) `catn`
            FROM `sulfa` WHERE `pro` = ".$pro." AND `cat` = ".$cat;
            $result = mysqli_query($conn,$sel_query);

    while($row = mysqli_fetch_assoc($result)) { ?>
        <tr >
        <?php

if(isset($_GET['file_id']))
{
    $id = $_GET['file_id'];

    $sql="SELECT * FROM sulfa WHERE id = $id";

    $result = mysqli_query($conn,$sql);
    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' .$file['name'];

    if(file_exists($filepath))
    {
           header('Content-Type: application/octet-stream');
           header('Content-Description: File Transfer');
           header('Content-Disposition: attachment; filename='. basename($filepath));
           header('Expires: 0');
           header('Cach-Control: must-revalidate');
           header('Pragma:public');
           header('Content-Length:'  .filesize('uploads/' .$file['name']));
           readfile('uploads/' .$file['name']);
           

    }
}
?> 


            <td align="center"><a href="uploads/<?php echo $row['name']; ?>">Download</td>
            <td align="center"><?php echo $row["seconddate"]; ?></td>
            <td align="center"><?php echo $row["firstdate"]; ?></td>
            <td align="center"><?php echo $row["des"]; ?></td>
            <td align="center"><?php echo number_format( $row["cost"]); ?></td>
            <td align="center"><?php echo $row["date"]; ?></td>
            <td align="center"><?php echo $row["contN"]; ?></td>
            <td align="center"><?php echo $row["proon"]; ?></td>
            <td align="center"><?php echo $row["num"]; ?></td>
            <td align="center"><?php echo $row["id"]; ?></td>
       
            <td>
            <a href="#" onclick="window.print(); return false;" class="glyphicon glyphicon-print" role="button"></a>
           
            
            </td>
          
        </tr>
        <?php
    }
}else{
    echo "NO Query String";
}
mysqli_close($conn); ?>
</tbody>
</table>
<?php include 'inc/footer.php'; ?>
