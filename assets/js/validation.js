  $(document).ready(function() {
     $("#submitdata").click(function() {
     var studentname = $('#studentname').val();
     var studentage = $('#studentage').val();
     var studentgender = $('#studentgender').val();
     var studentaddress = $('#studentaddress').val();
     var studentrollno = $('#studentrollno').val();
     
     var data = {};
      if(studentname == '') 
      {
        $('#errorMsg').css('color','red');
        $('#errorMsg').html('Please add Studentname');
        return false;
      }
      else
      {
        data.studentname = studentname.trim();
      }

      if(studentage == '')
      {
        $('#errorageMsg').css('color','red');
        $('#errorageMsg').html('Please add Studentage');
        return false;
      }
      else
      {
        data.studentage = studentage.trim();
      }

      if (!$('input[id = studentgender]:checked').val() )
      {
        $('#errorgenderMsg').css('color','red');
        $('#errorgenderMsg').html('Please add Studentgender');
        return false;
      }
      else
      {
        data.studentgender = studentgender.trim();
      }

      if(studentaddress == '')
      {
        $('#erroraddressMsg').css('color','red');
        $('#erroraddressMsg').html('Please add Studentaddress');
        return false;
      }
      else
      {
        data.studentaddress = studentaddress.trim();
      }
  
      if(studentrollno == '')
      {
        $('#errorrollnoMsg').css('color','red');
        $('#errorrollnoMsg').html('Please add Studentrollno');
        return false;
      }
      else
      {
        data.studentrollno = studentrollno.trim();
      }
     //alert(JSON.stringify(data));
      //console.log(data);
      console.log(JSON.stringify(data));
      $.ajax({
        type: "POST",
        url: "http://localhost/student/index.php/Studentcontroller/test",
        dataType: "json",
      // data: {"studentname":studentname, "studentage":studentage,"studentgender":studentgender,"studentaddress":studentaddress,"studentrollno":studentrollno},
       data:JSON.stringify(data),
        success : function(data){
            // if (data){
            //     console.log(data);
            //     alert("success");
            // } else {
            //     alert("error");
            //     return false
            // }
            console.log(data);
            return false
        },
        error: function (jqXHR, exception) {
          var msg = '';
          if (jqXHR.status === 0) {
              msg = 'Not connect.\n Verify Network.';
          } else if (jqXHR.status == 404) {
              msg = 'Requested page not found. [404]';
          } else if (jqXHR.status == 500) {
              msg = 'Internal Server Error [500].';
          } else if (exception === 'parsererror') {
              msg = 'Requested JSON parse failed.';
          } else if (exception === 'timeout') {
              msg = 'Time out error.';
          } else if (exception === 'abort') {
              msg = 'Ajax request aborted.';
          } else {
              msg = 'Uncaught Error.\n' + jqXHR.responseText;
          }
          $('#post').html(msg);
          return false;
      }
        //success function ends
       
    });//ajax ends
    return false;
    });
    });
