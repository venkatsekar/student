<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>STUDENT | PREPARATION</title>

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
                    <h2>Preparation</h2>
                </div>
                 <div class="col-lg-2">
                 <h2><a class="btn btn-info" href="<?=BASEURL?>student">Back to Student</a></h2>  
                </div>
            </div>
        <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Edit Preparation</h5>
                        </div>
                        <div class="ibox-content">
                            <div id="message"></div>
                            <table class="table" id="table" >
                                        <thead>
                                        <tr>
                                            <th>Topic Name</th>
                                            <th>Remarks</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($EditTopic as $_){?>
                                        <tr class="gradeX">
                                            <td><?=$_['topic_name'];?></td>
                                            <td><?=$_['remarks'];?></td>
                                            <td>
                                                <button class="btn btn-info " onClick="javascript:edittopic('<?=$_['module_lesson_topic_id'];?>','<?=$_['topic_name'];?>','<?=$_['remarks'];?>')"><i class="fa fa-paste" ></i> Edit</button>
                                                <button class="btn btn-danger" onClick="javascript:deletetopic(<?=$_['module_lesson_topic_id'];?>)"><i class="fa fa-times"></i> Remove</button>
                                                
                                            </td>
                                        </tr>
                                        <?}?>
                                        </table>
                            <form role="form" id="form">
                                    <input type="hidden" name="PreparationModuleId" id="PreparationModuleId" value="<?=@$EditPrepar[0]['preparation_module_id'];?>"/>
                                    <input type="hidden" name="moduleLessonId" id="moduleLessonId" value="<?=@$EditPrepar[0]['module_lesson_id'];?>"/>
                                    <div class="form-group">
                                        <label>List of class</label>
                                        <select name="classId" class="form-control" id="classId" required>
                                            <option value="">Select Class</option>
                                            <?php foreach($ClassList as $_c){
                                                if($_c['class_id'] == $EditPrepar[0]['class_id']){?>
                                            <option value="<?=$_c['class_id'];?>" selected="selected"><?=$_c['class_name'];?></option>
                                            <?php }else {?>
                                            <option value="<?=$_c['class_id'];?>"><?=$_c['class_name'];?></option>
                                            <?} }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>List of subject</label>
                                        <select name="studentSubjectId" class="form-control" id="studentSubjectId" required>
                                            <option>Select Subject</option>
                                            <?php foreach($SubjectList as $_s){
                                            if($_s['subject_id'] == $EditPrepar[0]['subject_id']){?>
                                                <option value="<?=$_s['subject_id'];?>" selected="selected"><?=$_s['subject_name'];?></option>
                                            <?} else {?>
                                                <option value="<?=$_s['subject_id'];?>"><?=$_s['subject_name'];?></option>
                                            <?php }}?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Virtual Rack Name</label>
                                        <input type="text" placeholder="" class="form-control" name="virtualRackName" id="virtualRackName" value="<?=$EditPrepar[0]['virtual_rack_name'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Lesson Name</label>
                                        <input type="text" placeholder="" class="form-control" name="lessonName" id="lessonName" value="<?=$EditPrepar[0]['lesson_name'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Topic name</label>
                                        <div class="input_fields_wrap">
                                            <div class="input-group m-b"><input type="text" name="topicName[]" class="form-control">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-primary add_field_button">Add</button> </span> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>No of test</label>
                                        <input type="text" placeholder="" class="form-control" name="noTest" id="noTest" value="<?=$EditPrepar[0]['number_test'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Test Duration</label>
                                        <input type="text" placeholder="" class="form-control" name="testTiming" id="testTiming" value="<?=$EditPrepar[0]['test_timing'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Home work</label>
                                        <input type="text" placeholder="" class="form-control" name="homeWork" id="homeWork" value="<?=$EditPrepar[0]['number_home_work'];?>"> 
                                    </div>
                                   <div class="form-group">
                                        <label>Examination Timing</label>
                                        <input type="text" placeholder="" class="form-control" name="examTiming" id="examTiming" value="<?=$EditPrepar[0]['examination_timing'];?>">
                                    </div><br/><br/>
                                     
                                    <div align="center">
                                        <a class="btn btn-md btn-white m-t-n-xs" href="#">Cancel</a>
                                        <input class="btn btn-md btn-primary m-t-n-xs" type="submit" id="submit" value="Save Changes">
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
                 url: "<?=BASEURL?>preparation/edit_preparation",
                 data: $(form).serialize(),
                 success: function (data) {
                   if(data > 1)
                    {
                    swal({
                      title: "Updated successfully",
                      type: "success",
                      confirmButtonText: "OK"
                    }, function(isConfirm){
                          window.location.href = "<?=BASEURL?>preparation/";
                    });
                    }
                    else
                    {
                        swal({
                      title: "Fail To Add",
                      type: "success",
                      confirmButtonText: "OK"
                    }, function(isConfirm){
                          window.location.href = "<?=BASEURL?>preparation/";
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
        function edittopic(moduleLessonTopicId, topicname, remarks)
        {
            swal({
  title: "An input!",
  text: "Write something interesting:",
  type: "input",
  inputValue: topicname,
  showCancelButton: true,
  closeOnConfirm: false,
  animation: "slide-from-top",
  inputPlaceholder: "Write something"
  
}, function (inputValue) {
 if (!inputValue) return;

        $.ajax({
            url: "<?=BASEURL?>preparation/edit_topic",
            type: "POST",
            data: {
                moduleLessonTopicId : moduleLessonTopicId,
                topicName : inputValue,
                remarks : remarks
            },
            success: function () {
                swal("Done!", "It was succesfully deleted!", "success");
                 $("#table").load(location.href + " #table");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Error deleting!", "Please try again", "error");
            }
        });
 swal("Nice!", "You wrote: " + inputValue, "success");
});
        }
        function deletetopic(moduleLessonTopicId)
{
    
  swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }, function (isConfirm) {
        if (!isConfirm) return;
        $.ajax({
            url: "<?=BASEURL?>preparation/delete_topic",
            type: "POST",
            data: {
                moduleLessonTopicId : moduleLessonTopicId
            },
            success: function () {
                swal("Done!", "It was succesfully deleted!", "success");
                 $("#table").load(location.href + " #table");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Error deleting!", "Please try again", "error");
            }
        });
    });
}
        
    </script>

</body>

</html>
