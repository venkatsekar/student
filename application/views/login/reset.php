<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>STUDENT | Forgot password</title>

    <link href="<?=BASEURL;?>public/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=BASEURL;?>public/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?=BASEURL;?>public/assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?=BASEURL;?>public/assets/css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="<?=BASEURL;?>public/assets/css/animate.css" rel="stylesheet">
    <link href="<?=BASEURL;?>public/assets/css/style.css" rel="stylesheet">
	<link href="<?=BASEURL;?>public/assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="<?=BASEURL;?>public/assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="<?=BASEURL;?>public/assets/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
  

</head>

<body class="gray-bg">

    <div class="passwordBox animated fadeInDown">
        <div class="row">

            <div class="col-md-12">
                <div class="ibox-content">

                    <h2 class="font-bold">Forgot password</h2>

                    <p>
                        Enter your email address and your password will be reset and emailed to you.
                    </p>

                    <div class="row">

                        <div class="col-lg-12">
                                                  <form action="<?=BASEURL?>login/resetpassword" method="POST" id="form1" name="form"  data-parsley-validate="" novalidate="" context="form"  enctype="multipart/form-data" >
                             <? if(isset($_GET['mes']) && $_GET['mes']==0 ){?>
        <div class="info">
            
            <p>Failed to Reset. Try Again</p>
        </div>
       <?}?>
       <? if(isset($_GET['mes']) && $_GET['mes']==1){?>
  <div class="info">
     <div class="infomess">
       
        <p>Your password have been successfully reset.  <br>
          <a href="<?=BASEURL?>login/" >click here</a> to Login.</p>
      </div>
    </div>              
    <? } ?>
    <? if(!isset($_GET['mes']) || $_GET['mes']==0){?>
        <input type="hidden" name="user_id" id="user_id" <? if(isset($_GET['raw'])){?> value="<?=$_GET['raw'];?>" <? } ?> >
		<div class="form-group">
        <input type="password" class="form-control" placeholder="Password" class="input-field" name="password" id="password" required/>
		</div>
		<div class="form-group">
        <input type="password" class="form-control" placeholder="Confirm Password" class="input-field" name="password1" id="password1" onblur="checkConfirmPass();"  onchange="checkConfirmPass();"/>
		</div>
        <span id="confirmPassMess" style="margin-left: 42px;"></span>
        <button type="submit" class="btn btn-primary block full-width m-b">Request</button>
    <?}?>
    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
       
    </div>
<!-- Mainly scripts -->
    <script src="<?=BASEURL;?>public/assets/js/jquery-2.1.1.js"></script>
    <script src="<?=BASEURL;?>public/assets/js/bootstrap.min.js"></script>
    <script src="<?=BASEURL;?>public/assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?=BASEURL;?>public/assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <!--<script src="<?=BASEURL;?>public/assets/js/inspinia.js"></script>-->
    <script src="<?=BASEURL;?>public/assets/js/plugins/pace/pace.min.js"></script>

    <!-- Steps -->
    <script src="<?=BASEURL;?>public/assets/js/plugins/staps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="<?=BASEURL;?>public/assets/js/plugins/validate/jquery.validate.min.js"></script>
    <!-- Data picker -->
    <script src="<?=BASEURL;?>public/assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?=BASEURL;?>public/assets/js/plugins/sweetalert/sweetalert.min.js"></script>

    <script>
        
        $(document).ready(function(){

             $("#form").validate({
                 rules: {
                            emailAddress: {
                                required: true
                            }
                        },
                
                  submitHandler: function (form) {
             //alert('valid form submission'); // for demo
              var formData = new FormData(form);

                $.ajax({
                type: 'POST',
                url: $(form).attr('action'),
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success: function(data) {
                    swal({
                      title: "Reset password link has been sent to your mail",
                      type: "success",
                      confirmButtonText: "OK"
                    }, function(isConfirm){
                          window.location.href = "<?=BASEURL?>login/";
                    });
                }
                });
             return false; // required to block normal submit since you used ajax
         }
             });
        });
      
       
    </script>
 <script type="text/javascript">
    function checkConfirmPass()
    {
    if(document.getElementById('password1').value!="")
    {
        if(document.getElementById('password').value==document.getElementById('password1').value)
        {
          document.getElementById('confirmPassMess').innerHTML='<span class="okmessage">Password Matched</span>';
        }
        else 
        {
            document.getElementById('confirmPassMess').innerHTML='<span class="errormessage">Password Not Matched</span>';          
        }
    } else
    {
        document.getElementById('confirmPassMess').innerHTML='<span class="errormessage">Confirm Password Empty</span>';
    }
}
</script>
</body>

</html>
