<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo  base_url('assets/css/common.css');?>">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <!--<script src="<?php echo base_url('assets/js/validation.js');?>"></script>-->


  
</head>
  
  <body>
  <div class="container m-t-4">
  <form id ="form-user" >
  
  <div class="row">
    <div class="col-sm-2">
      <label>NAME:</label>
    </div>
    <div class="col-sm-4" >
      <input type ="text" name ="studentname" class = "form-control" id = "studentname" value = "<?php if(isset($_POST["studentname"])){ echo $_POST["studentname"];}?>">
    </div>
    <div class="col-sm-4" >
      <div><span id="errorMsg"></span></div>
    </div>
  </div>
 
<br>

  <div class="row">
    <div class="col-sm-2">
    <label>AGE:</label>
    </div>
    <div class="col-sm-4" >
      <input type ="text" name ="studentage" class = "form-control" id ="studentage" value = "<?php if(isset($_POST["studentage"])){ echo $_POST["studentage"];}?>">
    </div>
    <div class="col-sm-4" >
      <div><span id="errorageMsg"></span></div>
    </div>
  </div>




  <div class="row">
    <div class="col-sm-3">
    <label>GENDER:</label>
    </div>
    <div class="col-sm-2">
    <input class="form-check-input" name="studentgender" type="radio" id="studentgender" value ="m">male
    </div>
    <div class="col-sm-2">
     <input class="form-check-input" name="studentgender" type="radio" id="studentgender" value ="f">female
    </div>
    <div class="col-sm-3" >
      <div><span id="errorgenderMsg"></span></div>
    </div>
  </div>

  

 
  <div class="row">
    <div class="col-sm-2">
    <label>ADDRESS:</label>
    </div>
    <div class="col-sm-4" >
  <textarea rows = "4" cols = "15" name = "studentaddress" class="form-control" id = "studentaddress"><?php if(isset($_POST["studentaddress"])){ echo $_POST["studentaddress"];}?></textarea><br>
  </div>
  <div class="col-sm-4" >
      <div><span id="erroraddressMsg"></span></div>
    </div>
  </div>
  
<br>

  <div class="row">
    <div class="col-sm-2">
    <label>ROLLNO:</label>
    </div>
    <div class="col-sm-4" >
      <input type ="text" name ="studentrollno"  class="form-control" id = "studentrollno" value ="">
    </div>
    <div class="col-sm-4" >
      <div><span id="errorrollnoMsg"></span></div>
    </div>
    
  </div><br>




  <div class="row">
    <div class="col-sm-2">
      
    </div>
    <div class="col-sm-2" >
      <input type ="submit" value ="submit" name ="submitdata" class = "btn btn-primary" id = "submitdata">
    </div>
    <div class="col-sm-2" >
      <a href="<?php echo site_url('Studentcontroller/viewstudentdata'); ?>" class="btn">VIEW STUDENTDATA</a>
    </div>
  
</div>
</form>
<script>
$("#form-user").submit(function(e)){
    e.preventDefault();
    var me = $(this);
    $.ajax({
        url:me.attr('action'),
        type:'post',
        data:me.serialize();
        dataType:'json',
        success:function(response)
        {
            if(respond.success == true)
            {
                alert('success');
            }
            else
            {
                alert('error');
            }
        }

    })
}
</script>







   
  

  </body>
  <?php
  if(isset($error))
  {
   foreach($error as $key =>$value)
   {
    echo $key . "-" . $value . "<br>";
   }               
  }
  ?>

  </html>