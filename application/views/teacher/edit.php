<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>STUDENT | TEACHER</title>

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
                    <h2>Teacher</h2>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Add Teacher</h5>
                        </div>
                        <div class="ibox-content">
                            <form id="form" action="<?=BASEURL?>teacher/update_teacher" class="wizard-big"  enctype="multipart/form-data">
                                <input type="hidden" name="userInfoId" id="userInfoId" value="<?=@$EditTeacher[0]['user_info_id'];?>"/>
                                <input type="hidden" name="teacherInfoId" id="teacherInfoId" value="<?=@$EditTeacher[0]['student_info_id'];?>"/>
                                <h1>Basic</h1>
                                <fieldset>
                                    <h2>Basic Information</h2>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Teacher name *</label>
                                                <input id="teacherName" name="teacherName" type="text" class="form-control required" value="<?=@$EditTeacher[0]['login_id'];?>">
                                            </div>
											<div class="form-group">
                                                <label>First name</label>
                                                <input id="firstName" name="firstName" type="text" class="form-control" value="<?=@$EditTeacher[0]['first_name'];?>">
                                            </div>
											<div class="form-group">
                                                <label>Last name</label>
                                                <input id="lastName" name="lastName" type="text" class="form-control" value="<?=@$EditTeacher[0]['last_name'];?>">
                                            </div>
											<div class="form-group">
                                                <label>Email address *</label>
                                                <input id="emailAddress" name="emailAddress" type="email" class="form-control required" value="<?=@$EditTeacher[0]['email_id'];?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Password *</label>
                                                <input id="password" name="password" type="password" class="form-control required" value="<?=@$EditTeacher[0]['password'];?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password *</label>
                                                <input id="confirm" name="confirm" type="password" class="form-control" value="<?=@$EditTeacher[0]['password'];?>">
                                            </div>
											<div class="form-group">
                                                <label>How do you know about studyhome</label>
                                                <textarea id="aboutStudy" name="aboutStudy" type="text" class="form-control" value="<?=@$EditTeacher[0]['know_about'];?>"></textarea>
                                            </div>
											<div class="form-group">
                                                <label>Qualification</label>
												<div class="input_fields_wrapper">
												<div class="input-group m-b"><input type="text" name="teacher_quali[]" class="form-control" placeholder="Qualification">
												<span class="input-group-btn">
													<button type="button" class="btn btn-primary add_field_qualify">Add</button> </span> 
												</div>
												</div>
                                            </div>
											<div class="form-group">
                                                <label>Document</label>
                                                <input id="document" name="document" type="file" class="form-control">
                                            </div>
											<div class="form-group">
                                                <label>List of class</label>
                                                <select name="classId[]" class="form-control" id="classId" multiple>
                                                    <option value="">Select Class</option>
                                                    <?php foreach($ClassList as $_c){?>
                                                    <option value="<?=$_c['class_id'];?>"><?=$_c['class_name'];?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
											<div class="form-group">
                                                <label>Enter your secret question</label>
                                                <input id="secretQuest" name="secretQuest" type="text" class="form-control" value="<?=@$EditTeacher[0]['question_id'];?>">
                                            </div>
											<div class="form-group">
                                                <label>Answer your question</label>
                                                <input id="ansQues" name="ansQues" type="text" class="form-control" value="<?=@$EditTeacher[0]['answer'];?>">
                                            </div>
											<!--<div class="form-group">
												<label>Date of Birth</label>
												 <input id="sisterDob" name="sisterdob" type="text" class="form-control">
											</div>-->
                                        </div>
                                    </div>

                                </fieldset>
                                <h1>Personal</h1>
                                <fieldset>
                                    <h2>Personal Information</h2>
                                    <div class="row">
                                        <div class="col-lg-6">
											<div class="form-group">
                                                <label>Present address</label>
                                                <input id="preAddress" name="preAddress" type="text" class="form-control" value="<?=@$EditTeacher[0]['address_line_1'];?>">
                                            </div>
											<div class="form-group">
                                                <label>City</label>
                                                <input id="city" name="city" type="text" class="form-control" value="<?=@$EditTeacher[0]['city'];?>">
                                            </div>
											<div class="form-group">
                                                <label>Photo</label>
                                                <input id="photo" name="photo" type="file" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label>IFSC code</label>
                                                <input id="ifsc" name="ifsc" type="text" class="form-control specialChar" maxlength="10" value="<?=@$EditTeacher[0]['ifsc_code'];?>">
                                            </div>
											<div class="form-group">
												<label>Class room</label>
												<input id="classRoom" name="classRoom" type="text" class="form-control specialChar" value="<?=@$EditTeacher[0]['class_room'];?>">
											 </div>
                                             <table class="table" id="table1" >
                                                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#myModal4"><i class="fa fa-paste"></i> Add Qualification</a>
                                                <thead>
                                                <tr>
                                                    <th>Qualification</th>
                                                    <th>Grade</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($EditQuali as $_){?>
                                                <tr class="gradeX">
                                                    <td><?=$_['qualification_name'];?></td>
                                                    <td><?=$_['teacher_university'];?></td>
                                                    <td>
                                                        <!--<button class="btn btn-info " type="button" onClick="javascript:editrole('<?=$_['role_id'];?>','<?=$_['role_name'];?>')"><i class="fa fa-paste" ></i> Edit</button>-->
                                                         <a href="#" onClick="javascript:edit_quali('<?=$_['teacher_qualification_id'];?>','<?=$_['qualification_name'];?>','<?=$_['teacher_university'];?>','<?=$_['teacher_grade'];?>')" class="btn btn-info"><i class="fa fa-paste"></i> Edit</a>
                                                        <a href="#" class="btn btn-danger" onClick="javascript:delete_quali(<?=$_['teacher_qualification_id'];?>)"><i class="fa fa-times"></i> Remove</a>
                                                        
                                                    </td>
                                                </tr>
                                                <?}?>
                                            </table>
                                            <table class="table" id="table2" >
                                                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#myModal5"><i class="fa fa-paste"></i> Add Class</a>
                                                <thead>
                                                <tr>
                                                    <th>Class Name</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($EditClass as $_){?>
                                                <tr class="gradeX">
                                                    <td><?=$_['class_name'];?></td>
                                                    <td>
                                                        <!--<button class="btn btn-info " type="button" onClick="javascript:editrole('<?=$_['role_id'];?>','<?=$_['role_name'];?>')"><i class="fa fa-paste" ></i> Edit</button>-->
                                                         <a href="#" class="btn btn-danger" onClick="javascript:delete_class(<?=$_['teacher_class_id'];?>)"><i class="fa fa-times"></i> Remove</a>
                                                        
                                                    </td>
                                                </tr>
                                                <?}?>
                                            </table>
										</div>
                                        <div class="col-lg-6">
                                                <div class="form-group">
                                                <label>Preferred contact number1</label>
												<input type="text" name="preference_contact[]" class="form-control" value="<?=@$EditTeacher[0]['first_contact_number'];?>">
												<!--<span class="input-group-btn">
													<button type="button" class="btn btn-primary add_field_button">Add</button> </span> -->
												</div>
												<div class="form-group">
                                                    <label>Preferred contact number2</label>
                                                    <input type="text" name="preference_contact[]" class="form-control" value="<?=@$EditTeacher[0]['second_contact_number'];?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Preferred contact number3</label>
                                                    <input type="text" name="preference_contact[]" class="form-control" value="<?=@$EditTeacher[0]['third_contact_number'];?>">
                                                </div>
                                           
											<div class="form-group">
                                                <label>State</label>
                                                <select name="state" class="form-control" id="state">
													<option value="">Select State</option>
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
                                            <div class="form-group" id="data_1">
                                                <label class="font-noraml">Date of birth</label>
                                                 <?php $ConvertDOB = str_replace('-', '/', @$EditTeacher[0]['date_of_birth']);
                                                    $DOB = date('d/m/Y', strtotime($ConvertDOB));?>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" placeholder="DD/MM/YYYY" name="dob" id="dob" value="<?=@$DOB?>">
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label>Bank accno</label>
                                                <input id="bankAccno" name="bankAccno" type="text" class="form-control specialChar" value="<?=@$EditTeacher[0]['bank_account_number'];?>">
                                            </div>
											<div class="form-group">
                                                <label>Bank name</label>
                                                <input id="bankName" name="bankName" type="text" class="form-control specialChar" value="<?=@$EditTeacher[0]['bank_name'];?>">
                                            </div>
											<div class="form-group">
                                                <label>Bank branch</label>
                                                <input id="bankBranch" name="bankBranch" type="text" class="form-control specialChar" value="<?=@$EditTeacher[0]['branch_name'];?>">
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
                                                <label>Current working school Name</label>
                                                <input id="currentSchool" name="currentSchool" type="text" class="form-control" value="<?=@$EditTeacher[0]['current_school_name'];?>">
                                            </div>
											<div class="form-group" id="data_5">
                                                <label class="font-noraml">Current Joining Date</label>
                                                <?php $ConvertCurrentJoin = str_replace('-', '/', @$EditTeacher[0]['current_school_joining_date']);
                                                    $CurrentJoin = date('d/m/Y', strtotime($ConvertCurrentJoin));?>
                                                <?php $ConvertCurrentToJoin = str_replace('-', '/', @$EditTeacher[0]['current_school_joining_to_date']);
                                                    $CurrentToJoin = date('d/m/Y', strtotime($ConvertCurrentToJoin));?>
                                                <div class="input-daterange input-group" id="datepicker">
                                                    <input type="text" class="input-sm form-control" id="currentSchoolJoin" name="currentSchoolJoin" value="<?=@$CurrentJoin;?>"/>
                                                    <span class="input-group-addon">to</span>
                                                    <input type="text" class="input-sm form-control" id="currentSchoolToJoin" name="currentSchoolToJoin"  value="<?=@$CurrentToJoin;?>"/>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label>Previous working school Name</label>
                                                <input id="prevSchool" name="prevSchool" type="text" class="form-control" value="<?=@$EditTeacher[0]['previous_school_name'];?>">
                                            </div>
											<div class="form-group" id="data_6">
                                                <label class="font-noraml">Previous Joining Date</label>
                                                <?php $ConvertPreviousJoin = str_replace('-', '/', @$EditTeacher[0]['previous_school_joining_date']);
                                                    $PreviousJoin = date('d/m/Y', strtotime($ConvertPreviousJoin));?>
                                                <?php $ConvertPreviousToJoin = str_replace('-', '/', @$EditTeacher[0]['previous_school_joining_to_date']);
                                                    $PreviousToJoin = date('d/m/Y', strtotime($ConvertPreviousToJoin));?>
                                                <div class="input-daterange input-group" id="datepicker">
                                                    <input type="text" class="input-sm form-control" id="prevSchoolJoin" name="prevSchoolJoin" value="<?=@$PreviousJoin;?>"/>
                                                    <span class="input-group-addon">to</span>
                                                    <input type="text" class="input-sm form-control" id="prevSchoolToJoin" name="prevSchoolToJoin"  value="<?=@$PreviousToJoin;?>"/>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label>Remarks</label>
                                                <textarea id="remarks" name="remarks" type="text" class="form-control"><?=@$EditTeacher[0]['remarks'];?></textarea>
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
        <div class="modal inmodal" id="myModal4" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content animated fadeIn">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Add Qualification</h4>
                    </div>
                    <form role="form" id="form1">
                        <input type="hidden" name="teacher_info_id" id="teacher_info_id" value="<?=@$EditTeacher[0]['teacher_info_id'];?>" />
                    <div class="modal-body">
                        <div id="message"></div>
                        <div class="form-group">
                            <label>Qualification</label>
                            <div class="input_fields_wrapper">
                                <div class="input-group m-b"><div class="col-md-4"><input type="text" name="teacher_quali" id="teacher_quali" class="form-control" placeholder="Qualification"></div>
                                    <div class="col-md-4"><input type="text" name="teacher_university" id="teacher_university" class="form-control" placeholder="University"></div><div class="col-md-4"><input type="text" name="teacher_grade" id="teacher_grade" class="form-control" placeholder="Grade"></div>
                                    </div>
                            </div>
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Save" name="submit1" id="submit1">
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal inmodal" id="myModal6" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content animated fadeIn">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Add Qualification</h4>
                    </div>
                    <form role="form" id="form3">
                        <input type="hidden" name="teacher_info_id" id="teacher_info_id" value="<?=@$EditTeacher[0]['teacher_info_id'];?>" />
                    <div class="modal-body">
                        <div id="message"></div>
                        <div class="form-group">
                            <label>Qualification</label>
                            <div class="input_fields_wrapper">
                                <div class="input-group m-b"><div class="col-md-4"><input type="text" name="teacher_quali" id="teacher_quali" class="form-control" placeholder="Qualification"></div>
                                    <div class="col-md-4"><input type="text" name="teacher_university" id="teacher_university" class="form-control" placeholder="University"></div><div class="col-md-4"><input type="text" name="teacher_grade" id="teacher_grade" class="form-control" placeholder="Grade"></div>
                                    </div>
                            </div>
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Save" name="submit1" id="submit1">
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal inmodal" id="myModal5" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content animated fadeIn">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Add Classes</h4>
                    </div>
                    <form role="form" id="form2">
                    <div class="modal-body">
                        <input type="hidden" name="teacher_info_id1" id="teacher_info_id1" value="<?=@$EditTeacher[0]['teacher_info_id'];?>"/>
                        <?php if(count($UnEditClass)>=1){?>
                        <div class="form-group">
                            <div class="col-md-12">
                                <?php foreach ($UnEditClass as $_) {?>
                                <div class="col-md-4">
                                    <div class="i-checks"><label> <input type="checkbox" name="classId[]" value="<?=$_['class_id'];?>" id="<?=$_['class_id']?>"> <i></i> <?=$_['class_name'];?> </label></div>&nbsp;&nbsp;&nbsp; 
                                </div>
                                <?php } ?>
                            </div>
                            </div> <span id="imgerr" style="display:none;color:red;">Please Select One Value From checkbox</span>
                            <?php } else {
                                    echo "<center><b>The class name not available</b></center>";
                             }?>
                      
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Save" name="submit2" id="submit2">
                    </div>
                </form>
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
                             teacherName: {
                                required: true,
                                specialChar: true
                            },
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
                            city: {
                                specialChar: true
                            },
                            confirm: {
                                equalTo: "#password"
                            },
                             dob: {
                                dob: true
                            }
                        },
                         submitHandler: function (form) {
             //alert('valid form submission'); // for demo
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
                      title: "Updated successfully",
                      type: "success",
                      confirmButtonText: "OK"
                    }, function(isConfirm){
                          window.location.href = "<?=BASEURL?>student/";
                    });
                }
                });
             /*$.ajax({
                 type: "POST",
                 url: "<?=BASEURL?>teacher/update_teacher",
                 data: $(form).serialize(),
                 success: function (data) {

                    swal({
                      title: "Updated successfully",
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
            $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
             $('#data_5 .input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });
            $('#data_6 .input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
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
		});
		//Append Qualification
	    $(document).ready(function() {
			var max_fields      = 7; //maximum input boxes allowed
			var wrapper1         = $(".input_fields_wrapper"); //Fields wrapper
			var add_button1      = $(".add_field_qualify"); //Add button ID
			
			var x = 1; //initlal text box count
			$(add_button1).click(function(e){ //on add input button click
				e.preventDefault();
				if(x < max_fields){ //max input box allowed
					x++; //text box increment
					$(wrapper1).append('<div class="form-group input-group m-b"><input type="text" name="teacher_quali[]" class="form-control"><span class="input-group-btn remove_field1"><button type="button" class="btn btn-danger">Remove</button> </span></div>'); //add input box
					
				}
				
			});
			
			$(wrapper1).on("click",".remove_field1", function(e){ //user click on remove text
				e.preventDefault(); $(this).parent('div').remove();  x--;
			})

             //Data of Birth
            $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: "DD/MM/YYYY"
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
            
            if (ageMax != undefined) {
                if (age > ageMax) {
                    $.validator.messages.dob = "Invalid date";
                    result = false;
                }
            }
        }
        return result;
    },
      "Please enter a date in the format DD/MM/YYYY");  
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
<script type="text/javascript">
 function edit_quali(teacher_quali_id, teacher_quali_name, teacher_quali_university, teacher_quali_grade)
{
    $('#myModal6').show();
    $('#teacher_quali').val(teacher_quali_name);
    $('#teacher_info_id').remove();
    $('#teacher_university').val(teacher_quali_university);
    $('#teacher_grade').val(teacher_quali_grade);
    $('#message').append('<input type="hidden" name="teacher_quali_id" id="teacher_quali_id" value="'+teacher_quali_id+'">');
    $('#submit1').attr('value', 'Save Changes');
    $('.ibox-title > h5').text("Edit Qualification");
}

 $(document).ready(function(){

             $("#form1").validate({
                  submitHandler: function (form) {
             //alert('valid form submission'); // for demo
             $.ajax({
                 type: "POST",
                 url: "<?=BASEURL?>teacher/update_quali",
                 data: $(form).serialize(),
                 success: function (data) {

                   // $('#message').html('<div class="alert alert-success alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'+data+'<a class="alert-link" href="#">Alert Link</a>.</div>');
                    //location.reload();
                    swal({
                      title: "Added successfully",
                      type: "success",
                      confirmButtonText: "OK"
                    });
                    $("#table1").load(location.href + " #table1");
                    $('#myModal4').hide();
                    $('.modal-backdrop').hide();
                    $("#form")[0].reset();
                }
             });
             return false; // required to block normal submit since you used ajax
         }

             });
        $("#form3").validate({
                  submitHandler: function (form) {
             //alert('valid form submission'); // for demo
             $.ajax({
                 type: "POST",
                 url: "<?=BASEURL?>teacher/update_quali",
                 data: $(form).serialize(),
                 success: function (data) {

                   // $('#message').html('<div class="alert alert-success alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'+data+'<a class="alert-link" href="#">Alert Link</a>.</div>');
                    //location.reload();
                    swal({
                      title: "Updated successfully",
                      type: "success",
                      confirmButtonText: "OK"
                    });
                    $("#table1").load(location.href + " #table1");
                    $('#myModal4').hide();
                    $('.modal-backdrop').hide();
                    $("#form")[0].reset();
                }
             });
             return false; // required to block normal submit since you used ajax
         }

             });
        });
 $(document).ready(function(){

             $("#form2").validate({
                  submitHandler: function (form) {
             //alert('valid form submission'); // for demo
             $.ajax({
                 type: "POST",
                 url: "<?=BASEURL?>teacher/add_new_class",
                 data: $(form).serialize(),
                 success: function (data) {

                   // $('#message').html('<div class="alert alert-success alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'+data+'<a class="alert-link" href="#">Alert Link</a>.</div>');
                    //location.reload();
                      swal({
                      title: "Added successfully",
                      type: "success",
                      confirmButtonText: "OK"
                    });
                    $("#table2").load(location.href + " #table2");
                     $('#myModal5').hide();
                    $('.modal-backdrop').hide();
                    $("#form")[0].reset();
                }
             });
             return false; // required to block normal submit since you used ajax
         }

             });
        });
 function delete_quali(teacher_quali_id) {
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
            url: "<?=BASEURL?>teacher/delete_quali",
            type: "POST",
            data: {
                teacher_quali_id: teacher_quali_id
            },
            success: function () {
                swal("Done!", "It was succesfully deleted!", "success");
                $("#table1").load(location.href + " #table1");
                $("#form1").load(location.href + " #form1");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Error deleting!", "Please try again", "error");
            }
        });
    });
}
 function delete_class(teacher_class_id) {
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
            url: "<?=BASEURL?>teacher/delete_class",
            type: "POST",
            data: {
                teacher_class_id: teacher_class_id
            },
            success: function () {
                swal("Done!", "It was succesfully deleted!", "success");
                 $("#table2").load(location.href + " #table2");
                 $("#form2").load(location.href + " #form2");
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
