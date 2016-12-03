<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>STUDENT | STUDENT</title>

    <link href="<?=BASEURL;?>public/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=BASEURL;?>public/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?=BASEURL;?>public/assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?=BASEURL;?>public/assets/css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="<?=BASEURL;?>public/assets/css/animate.css" rel="stylesheet">
    <link href="<?=BASEURL;?>public/assets/css/style.css" rel="stylesheet">
    <link href="<?=BASEURL;?>public/assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
     <!-- Sweet Alert -->
    <link href="<?=BASEURL;?>public/assets/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

    <style>

        .wizard > .content > .body  {position: relative; }

    </style>

</head>

<body class="gray-bg">
        <div class="wrapper wrapper-content animated fadeInRight">
            
            <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Registration</h5>
                    </div>
                    <div class="ibox-content">
                         <form id="form" action="<?=BASEURL?>login/add_new_user" class="wizard-big"  enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>User Name*</label>
                                    <input id="studentName" name="studentName" type="text" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>First name</label>
                                    <input id="firstName" name="firstName" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Last name</label>
                                    <input id="lastName" name="lastName" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email address *</label>
                                    <input id="emailAddress" name="emailAddress" type="email" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Password *</label>
                                    <input id="password" name="password" type="password" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input id="confirm" name="confirm" type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>How do you know about studyhome</label>
                                    <textarea id="aboutStudy" name="aboutStudy" type="text" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Enter your secret question</label>
                                    <input id="secretQuest" name="secretQuest" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Answer your question</label>
                                    <input id="ansQues" name="ansQues" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                        <label>List of Role</label>
                                        <select name="roleId" class="form-control" id="roleId" required>
                                            <option value="">Select Role</option>
                                            <?php foreach($Roles as $_c){?>
                                            <option value="<?=$_c['role_id'];?>"><?=$_c['role_name'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                <div align="center">
                                    <a class="btn btn-md btn-white m-t-n-xs" href="#">Cancel</a>
                                    <input class="btn btn-md btn-primary m-t-n-xs" type="submit" id="submit" value="Save">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-lg-2"></div>
            </div>
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
                            password: {
                                required: true,
                                pwchecklowercase: true,
                                pwcheckuppercase: true,
                                pwchecknumber: true,
                                pwcheckconsecchars: true,
                                pwcheckspechars: true,
                                minlength: 8,
                                maxlength: 20
                            },
                            confirm: {
                                equalTo: "#password"
                            },
                            roleId: {
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
                      title: "Your activation link has been sent to your email, Please check your mail",
                      type: "success",
                      confirmButtonText: "OK"
                    }, function(isConfirm){
                          window.location.href = "<?=BASEURL?>login/";
                    });
                }
                });
             /*$.ajax({
                 type: "POST",
                 url: "<?=BASEURL?>student/add_student",
                 data: $(form).serialize(),
                 success: function (data) {

                    swal({
                      title: "Added successfully",
                      type: "success",
                      confirmButtonText: "OK"
                    }, function(isConfirm){
                          window.location.href = "<?=BASEURL?>student/";
                    });
                   
                }
             });*/
             return false; // required to block normal submit since you used ajax
         }
             });
        });
       //Append prefered contact number
        $(document).ready(function() {
            var max_fields      = 3; //maximum input boxes allowed
            var wrapper         = $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID
            
            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div class="form-group input-group m-b"><input type="text" name="preference_contact[]" class="form-control"><span class="input-group-btn remove_field"><button type="button" class="btn btn-danger">Remove</button> </span></div>'); //add input box
                    
                }
                
            });
            
            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove();  x--;
            })
            //Data of Birth
            $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: "dd/mm/yyyy"
            });
            $('#data_2 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: "dd/mm/yyyy"
            });
            $('#data_3 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: "dd/mm/yyyy"
            });
        });
        $(document).ready(function () {
    $.validator.addMethod("dob", function (value, element) {
        var result = true;
        var ageMin = 17;
        var ageMax = 85;

        //is the date valid?
        //is it within the allowed range
        var myDate = value.split("/");
        var subDay = myDate[0];
        var subMonth = myDate[1] - 1;
        var subYear = myDate[2];
        var subDate = new Date(subYear, subMonth, subDay);
        // this will "correct" any out of range input
        var calcDay = subDate.getDate();
        var calcMonth = subDate.getMonth();
        var calcYear = subDate.getFullYear();
        // this checks to see if any of the submitted input was out of range
        // comment this out to ignore the discrepancy if you want to set a "corrected" value below
        if(value != '')
        {
        if (calcDay != subDay || calcMonth != subMonth || calcYear != subYear) {
            $.validator.messages.dob = "Invalid date";
            result = false;
        }
        }
        if (result) {
            var currDate = new Date();
            var currYear = currDate.getFullYear();
            var currMonth = currDate.getMonth();
            var currDay = currDate.getDate();

            var age = currYear - subYear;
            
            if (subMonth > currMonth) {
                age = age - 1; // next birthday not yet reached
            } else if (subMonth == currMonth && currDay < subDay) {
                age = age - 1;
            } 

            if (ageMin != undefined) {
                if (age < ageMin) {
                    $.validator.messages.dob = "Min 18 years old";
                    result = false;
                } 
            }
            if(value != '')
            {
            if (ageMax != undefined) {
                if (age > ageMax) {
                    $.validator.messages.dob = "Invalid date";
                    result = false;
                }
            }
            }
        }
        return result;
    }, "Please enter a date in the format DD/MM/YYYY");
jQuery.validator.addMethod("specialChar", function(value, element) {
     return this.optional(element) || /([0-9a-zA-Z\s])$/.test(value);
  }, "Special character not allowed.");

 $.validator.addMethod("pwcheckspechars", function (value) {
        
        return /[!@#$%^&*()_=\[\]{};':"\\|,.<>\/?+-]/.test(value)
    }, "The password must contain at least one special character");
    
    $.validator.addMethod("pwcheckconsecchars", function (value) {
        return ! (/(.)\1\1/.test(value)) // does not contain 3 consecutive identical chars
    }, "The password must not contain 3 consecutive identical characters");

    $.validator.addMethod("pwchecklowercase", function (value) {
        return /[a-z]/.test(value) // has a lowercase letter
    }, "The password must contain at least one lowercase letter");
    
    $.validator.addMethod("pwcheckrepeatnum", function (value) {
        return /\d{2}/.test(value) // has a lowercase letter
    }, "The password must contain at least one lowercase letter");
    
    $.validator.addMethod("pwcheckuppercase", function (value) {
        return /[A-Z]/.test(value) // has an uppercase letter
    }, "The password must contain at least one uppercase letter");
    
    $.validator.addMethod("pwchecknumber", function (value) {
        return /\d/.test(value) // has a digit
    }, "The password must contain at least one number");
    

  });

        
    </script>

</body>

</html>
