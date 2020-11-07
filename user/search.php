



<?php include 'inc/header.php'?>
<style>
.table>thead>tr>th {
    text-align: center;
    vertical-align: bottom;
    border-bottom: 2px solid #ddd;
}
</style>


<table width="100%" border="1" 
style='border-collapse: collapse;border-color: silver'; class='dataframe table my_table'>

<thead text-item:center>

 <tr >
 <th style="width:10%;" >التحميل</th>
<th style="width:10%;" >لغاية تاريخ</th>
<th style="width:10%;" >من تاريخ</th>
<th style="width:20%;" >التفاصيل</th>
<th style="width:5%;">الكلفة</th>
<th style="width:10%;">تاريخ ترويج المعاملة</th>
<th style="width:5%;">التبويب</th>
<th style="width:10%;">اسم المشروع</th>
<th style="width:5%;">رقم السلفة</th>
<th style="width:5%;">التسلسل</th>
<th style="width:5%;"></th>
</tr>
</thead>
<tbody>

<?php    
    $sql = "SELECT *,
        
    (SELECT `name` FROM `projects` WHERE `sulfa`.`pro` = `projects`.`id`) `pname`,
    (SELECT `name` FROM `cats` WHERE `sulfa`.`cat` = `cats`.`id`) `cname`
    FROM `sulfa` ORDER BY `id` DESC LIMIT 1";
    
    
    
   // "SELECT * FROM `sulfa` ORDER BY `id` DESC LIMIT 1";
    $result_set = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result_set)) { ?>
        <tr >
            <td align="center"><a href="uploads/<?php echo $row['name']; ?>">Download</td>
            <td align="center"><?php echo $row["seconddate"]; ?></td>
            <td align="center"><?php echo $row["firstdate"]; ?></td>
            <td align="center"><?php echo $row["des"]; ?></td>
            <td align="center"><?php echo number_format( $row["cost"]); ?></td>
            <td align="center"><?php echo $row["date"]; ?></td>
            <td align="center"><?php echo $row["cname"]; ?></td>
            <td align="center"><?php echo $row["pname"]; ?></td>
            <td align="center"><?php echo $row["num"]; ?></td>
            <td align="center"><?php echo $row["id"]; ?></td>
     
            <a href="#" onclick="window.print(); return false;" class="glyphicon glyphicon-print" role="button"></a>
            
          
        </tr>
        <?php
    
}
mysqli_close($conn); ?>

<?php include 'inc/footer.php'; ?>

