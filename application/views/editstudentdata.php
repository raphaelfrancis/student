<?php

if(isset($studenteditdata))
{
    
    
    $updateid = $studenteditdata[0]["id"];
    $name = $studenteditdata[0]["name"];
    $age = $studenteditdata[0]["age"];
    $gender = $studenteditdata[0]["gender"];
    $address = $studenteditdata[0]["address"];
    $rollno = $studenteditdata[0]["rollno"];
    
}
?>


<html>
  <head><h1><center>EDIT STUDENT DATA</center></h1></head>
  <body>
  <div class="container m-t-4">
  
  <?php echo form_open('Studentcontroller/updatestudentdata');?>

  <div class="row">
    <div class="col-sm-2">
      <label>NAME:</label>
    </div>
    <div><span style="padding-right:42px;"></span><input type = "text" name = "studentname" value = "<?php if(isset($name))echo $name;?>" ></div><br>

    <div class="col-sm-4" >
      <div><span id="errorMsg"></span></div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-sm-2">
    
    </div>
    <div class="col-sm-4" >
    <div><label>AGE:<span style="padding-right:55px;"></span></label><input type = "text" name = "studentage" value = "<?php if(isset($age))echo $age;?>" ></div>

    </div>
    <div class="col-sm-4" >
      <div><span id="errorageMsg"></span></div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-sm-2">
    <label>ADDRESS:</label>
    </div>
    <div><span style="padding-right:20px;"></span><textarea rows = "4" cols = "15" name = "studentaddress" value = ""><?php if(isset($address))echo $address;?></textarea></div>

  <div class="col-sm-4" >
      <div><span id="erroraddressMsg"></span></div>
    </div>
  </div>

<div class="row">
    <div class="col-sm-2">
    <label>ROLLNO:</label>
    </div>
    <div><span style="padding-right:28px;"></span><input type = "text" name = "studentrollno" value = "<?php if(isset($rollno))echo $rollno;?>"></div>

    <div class="col-sm-4" >
      <div><span id="errorrollnoMsg"></span></div>
    </div>
    
  </div><br>

  
  <?php
  if(isset($updateid))
  {
  ?>
  <div><input type = "hidden" name = "updateid" value = "<?php echo $updateid;?>">
  <?php
  }
  ?>
  <div><input type = "submit" name = "submit" value =  "update" class = "btn btn-primary"></div>
  <?php echo form_close();?>
  
  </body>
  <?php
  if(isset($updateerror))
  {
   foreach($updateerror as $key =>$value)
   {
    echo $key . "-" . $value . "<br>";
   }               
  }
  ?>
  </html>