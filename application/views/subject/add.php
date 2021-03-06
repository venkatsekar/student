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


    <style>

        .wizard > .content > .body  {position: relative; }

    </style>

</head>

<body>

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                   
                </li>
                <li>
                    <a href="<?=BASEURL;?>student"><i class="fa fa-users"></i> <span class="nav-label">Student Profile</span></a>
                    
                </li>
                <li>
                    <a href="<?=BASEURL;?>teacher"><i class="fa fa-user-md"></i> <span class="nav-label">Teacher Profile</span></a>
                </li>
                <li>
                    <a href="<?=BASEURL;?>board"><i class="fa fa-clipboard"></i> <span class="nav-label">Board</span></a>
                </li>
                <li>
                    <a href="<?=BASEURL;?>studentclass"><i class="fa fa-calculator"></i> <span class="nav-label">Class</span></a>
                </li>
                <li>
                    <a href="<?=BASEURL;?>role"><i class="fa fa-wifi"></i> <span class="nav-label">Role</span></a>
                </li>
                <li>
                    <a href="<?=BASEURL;?>preparation"><i class="fa fa-clipboard"></i> <span class="nav-label">Preparation</span></a>
                </li>
                <li>
                    <a href="<?=BASEURL;?>settings"><i class="fa fa-user-md"></i> <span class="nav-label">Settings</span></a>
                </li>
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
       <?php
            load_view("common/header" , array("name" => $name));
        ?>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Student</h2>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Add Student</h5>
                        </div>
                        <div class="ibox-content">
                            <form id="form" action="<?=BASEURL;?>student/add_student" class="wizard-big" method="POST">
                                <h1>Student</h1>
                                <fieldset>
                                    <h2>Student Information</h2>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Student name *</label>
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
                                                <input id="emailAddress" name="emailAddress" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Password *</label>
                                                <input id="password" name="password" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password *</label>
                                                <input id="confirm" name="confirm" type="text" class="form-control">
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
                                                <label>How do you study about home</label>
                                                <textarea id="aboutStudy" name="aboutStudy" type="text" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                                <h1>Family</h1>
                                <fieldset>
                                    <h2>Family Information</h2>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Father's name</label>
                                                <input id="fatherName" name="fatherName" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Mother's Name</label>
                                                <input id="motherName" name="motherName" type="text" class="form-control">
                                            </div>
                                            <div class="form-group" id="data_1">
                                                <label class="font-noraml">Date of birth</label>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" placeholder="DD/MM/YYYY" name="dob" id="dob">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>City</label>
                                                <input id="city" name="city" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Preferred contact number</label>
                                                <div class="input_fields_wrap">
                                                <div class="input-group m-b"><input type="text" name="preference_contact[]" class="form-control">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-primary add_field_button">Add</button> </span> 
                                                </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Bank accno</label>
                                                <input id="bankAccno" name="bankAccno" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>IFSC code</label>
                                                <input id="ifsc" name="ifsc" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Brother name</label>
                                                <input id="brotherName" name="brotherName" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Sister name</label>
                                                <input id="sisterName" name="sisterName" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Father's Occupation</label>
                                                <input id="fatherOccu" name="fatherOccu" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Mother's Occupation</label>
                                                <input id="motherOccu" name="motherOccu" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Present address</label>
                                                <input id="preAddress" name="preAddress" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>State</label>
                                                <select name="state" class="form-control" id="state">
                                                    <option value="">------------Select State------------</option>
                                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                    <option value="Assam">Assam</option>
                                                    <option value="Bihar">Bihar</option>
                                                    <option value="Chandigarh">Chandigarh</option>
                                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                                    <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                                    <option value="Daman and Diu">Daman and Diu</option>
                                                    <option value="Delhi">Delhi</option>
                                                    <option value="Goa">Goa</option>
                                                    <option value="Gujarat">Gujarat</option>
                                                    <option value="Haryana">Haryana</option>
                                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                    <option value="Jharkhand">Jharkhand</option>
                                                    <option value="Karnataka">Karnataka</option>
                                                    <option value="Kerala">Kerala</option>
                                                    <option value="Lakshadweep">Lakshadweep</option>
                                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                    <option value="Maharashtra">Maharashtra</option>
                                                    <option value="Manipur">Manipur</option>
                                                    <option value="Meghalaya">Meghalaya</option>
                                                    <option value="Mizoram">Mizoram</option>
                                                    <option value="Nagaland">Nagaland</option>
                                                    <option value="Orissa">Orissa</option>
                                                    <option value="Pondicherry">Pondicherry</option>
                                                    <option value="Punjab">Punjab</option>
                                                    <option value="Rajasthan">Rajasthan</option>
                                                    <option value="Sikkim">Sikkim</option>
                                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                                    <option value="Tripura">Tripura</option>
                                                    <option value="Uttaranchal">Uttaranchal</option>
                                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                    <option value="West Bengal">West Bengal</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Photo</label>
                                                <input id="photo" name="photo" type="file" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Bank name</label>
                                                <input id="bankName" name="bankName" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Bank branch</label>
                                                <input id="bankBranch" name="bankBranch" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Brother D.O.B</label>
                                                <input id="brotherDob" name="brotherDob" type="text" class="form-control">
                                             </div>
                                            <div class="form-group">
                                                <label>Sister D.O.B</label>
                                                 <input id="sisterDob" name="sisterdob" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <h1>School</h1>
                                <fieldset>
                                    <h2>School Information</h2>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>School Name</label>
                                                <input id="schoolName" name="schoolName" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Board</label>
                                                <select name="state" class="form-control" id="state">
                                                    <option value="">------------Select Board------------</option>
                                                    <option value="ICSE">ICSE</option>
                                                    <option value="IB">IB</option>
                                                    <option value="CBSE">CBSE</option>
                                                    <option value="State Board">State Board</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Last 3 score cards</label>
                                                <select name="scoreCards" class="form-control" id="scoreCards">
                                                    <option value="">------------Select Score------------</option>
                                                    <option value="Term1">Term1</option>
                                                    <option value="Term2">Term2</option>
                                                    <option value="Term3">Term3</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>List of Subject</label>
                                                <select name="scoreCards" class="form-control" id="scoreCards">
                                                    <option value="">------------Select Subject------------</option>
                                                    <option value="Term1">English</option>
                                                    <option value="Term2">Maths</option>
                                                    <option value="Term3">Science</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Remarks</label>
                                                <textarea id="remarks" name="remarks" type="text" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
      

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


    <script>
        $(document).ready(function(){
            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                        errorPlacement: function (error, element)
                        {
                            element.before(error);
                        },
                        rules: {
                            confirm: {
                                equalTo: "#password"
                            }
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
        });
        
        
    </script>

</body>

</html>
