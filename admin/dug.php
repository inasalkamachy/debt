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
    <h2>أجمالي الحفريات</h2>
    
<?php

    $sel_query= "SELECT SUM(`p`.`pprice`) `pprice` FROM (SELECT (SELECT SUM(`cost`) FROM `sulfa` WHERE `sulfa`.`pro` = `projects`.`id`) `pprice` FROM `projects` WHERE `protype` = 2) `p`;";
    $result = mysqli_query($conn,$sel_query);

    $row = mysqli_fetch_assoc($result);
   
    echo "<h3>".number_format($row["pprice"])."</h3>";
    ?>
  </div>
</div>

<table width="100%" border="1" 
style='border-collapse: collapse;border-color: silver'; class='dataframe table my_table' dir="rtl">

<thead text-item:center>

<tr >
  
<th>التسلسل</th>
<th>أسم المشروع </th>

<th>المبلغ الاجمالي</th>


</thead>
<tbody>
<?php
    $sel_query= "SELECT *,
       
        (SELECT SUM(`cost`) FROM `sulfa` WHERE `sulfa`.`pro` = `projects`.`id`) `pprice`
      
        FROM `projects` WHERE protype=2;";
    $result = mysqli_query($conn,$sel_query);

    while($row = mysqli_fetch_assoc($result)) { ?>
        <tr >
            <td align="center"><?php echo $row["id"]; ?></td>
            <td align="center"><?php echo $row["name"]; ?></td>  

            <td align="center"><?php echo number_format($row["pprice"]); ?></td>
           
        </tr>
        <?php
    }

mysqli_close($conn); ?>
</tbody>
</table>
<?php include 'inc/footer.php'; ?>
