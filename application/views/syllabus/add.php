<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>STUDENT | SYLLABUS</title>

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
                    <h2>Syllabus</h2>
                </div>
                 <div class="col-lg-2">
                 <h2><a class="btn btn-info" href="<?=BASEURL?>syllabus">Back to Syllabus</a></h2>  
                </div>
            </div>
        <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Add Syllabus</h5>
                        </div>
                        <div class="ibox-content">
                            <div id="message"></div>
                            <form role="form" id="form">
                                    <div class="form-group">
                                        <label>List of class</label>
                                        <select name="classId" class="form-control" id="classId" required>
                                            <option value="">Select Class</option>
                                            <?php foreach($ClassList as $_c){?>
                                            <option value="<?=$_c['class_id'];?>"><?=$_c['class_name'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>List of subject</label>
                                        <select name="studentSubjectId" class="form-control" id="studentSubjectId" required>
                                            <option>Select Subject</option>
                                            <?php foreach($SubjectList as $_s){?>
                                            <option value="<?=$_s['subject_id'];?>"><?=$_s['subject_name'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>List of Language</label>
                                        <select name="langId" class="form-control" id="langId" required>
                                            <option>Select Language</option>
                                            <?php foreach($LangList as $_s){?>
                                            <option value="<?=$_s['lang_id'];?>"><?=$_s['lang_name'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Lesson Name</label>
                                        <input type="text" placeholder="" class="form-control" name="lessonName" id="lessonName">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <input type="text" placeholder="" class="form-control" name="remarks" id="remarks">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="description" id="description"></textarea>
                                    </div>
                                    <div align="center">
                                        <a class="btn btn-md btn-white m-t-n-xs" href="#">Cancel</a>
                                        <input class="btn btn-md btn-primary m-t-n-xs" type="submit" id="submit" value="Save">
                                    </div>
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
    <script src="<?=BASEURL;?>public/assets/js/plugins/sweetalert/sweetalert.min.js"></script>

    <script>
        $(document).ready(function(){

             $("#form").validate({
                 rules: {
                     lessonName: {
                         required: true,
                         minlength: 3
                     }
                 },
                  submitHandler: function (form) {
             //alert('valid form submission'); // for demo
             $.ajax({
                 type: "POST",
                 url: "<?=BASEURL?>syllabus/add_syllabus",
                 data: $(form).serialize(),
                 success: function (data) {
                    if(data > 1)
                    {
                    swal({
                      title: "Added successfully",
                      type: "success",
                      confirmButtonText: "OK"
                    }, function(isConfirm){
                          window.location.href = "<?=BASEURL?>syllabus/";
                    });
                    }
                    else
                    {
                        swal({
                      title: "Fail To Add",
                      type: "success",
                      confirmButtonText: "OK"
                    }, function(isConfirm){
                          window.location.href = "<?=BASEURL?>syllabus/add";
                    });
                    }
                }
             });
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
                    $(wrapper).append('<div class="form-group input-group m-b"><input type="text" name="topicName[]" class="form-control"><span class="input-group-btn remove_field"><button type="button" class="btn btn-danger">Remove</button> </span></div>'); //add input box
                    
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
        
        
    </script>

</body>

</html>
