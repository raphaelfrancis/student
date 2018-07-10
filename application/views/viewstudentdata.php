<html>
<head><center><h1>VIEW STUDENT DATA</h1></center></head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
        <link href='custom.css' rel='stylesheet' type='text/css'>

 <div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="table-responsive">    
<table border=1 class="table">
<tr><td bgcolor="#00FF00">ID</td><td bgcolor="#00FF00" ="color:red;">NAME</td><td bgcolor="#00FF00">AGE</td><td bgcolor="#00FF00">GENDER</td><td bgcolor="#00FF00">ADDRESS</td><td bgcolor="#00FF00">ROLLNO</td><td bgcolor="#00FF00">ACTION</td><td bgcolor="#00FF00">EDIT ACTION</td></tr>
<?php
/*$i=1;
foreach($studentdata as $row)
{
?>
<tr>
<td><?php echo $i;?></td>

<td><?php echo $row["name"];?></td>
<td><?php echo $row["age"];?></td>

<td><?php echo $row["gender"];?></td>

<td><?php echo $row["address"];?></td>
<td><?php echo $row["rollno"];?></td>
<td><a href="deletestudentdata?id=<?php echo $row["id"];?>">DELETE STUDENTDATA</a></td>
<td><a href="editstudentdata?id=<?php echo $row["id"];?>">EDIT STUDENTDATA</a></td>

</tr>
<?php
$i++;
}*/
?>
<?php 
if(is_array($studentdata) ) {
    
 foreach($studentdata as $studdata){     
?>
<tr><td><?=$studdata["id"];?></td><td><?=$studdata["name"];?></td><td><?=$studdata["age"];?></td><td><?=$studdata["gender"];?></td><td><?=$studdata["address"];?></td><td><?=$studdata["rollno"];?></td><td><a href="deletestudentdata?id=<?php echo $studdata["id"];?>">DELETE</a></td><td><a href="editstudentdata?id=<?php echo $studdata["id"];?>">EDIT STUDENT DATA</a></td></tr>     
   <?php 
 }  
}?>  
<ul class="pagination"><?php echo $links;?></ul>
</div>
</div>
</div>
</div>
</body>
</html>