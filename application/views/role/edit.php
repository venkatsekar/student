<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EDUCATION | ROLES</title>

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

        .wizard > .content > .body { position: relative; }

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
                    <h2>Edit Roles</h2>
                </div>
                <div class="col-lg-2">
                 <h2>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal4">
                              Add Roles
                    </button></h2>  
                </div>
                <form  id="addRoleForm">
                <input type="hidden" name="roleid" id="roleid" value="<?=$RoleId;?>" />
                <div class="modal inmodal fade" id="myModal4" tabindex="-1" role="dialog"  aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content animated fadeIn">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Add pages to Roles</h4>
                            </div>
                            <div class="modal-body">
                               <div class="row">
                                <div class="col-md-12">
                                     <?php if(count($UnEditRole)>=1){?>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                            <?php foreach ($UnEditRole as $_) {?>
                                                <div class="col-md-4">
                                                    <div class="i-checks"><label> <input type="checkbox" name="roles[]" value="<?=$_['page_id'];?>" id="<?=$_['page_id']?>"> <i></i> <?=$_['page_name'];?> </label></div>&nbsp;&nbsp;&nbsp; 
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div> <span id="imgerr" style="display:none;color:red;">Please Select One Value From checkbox</span>
                                        <?php } else {
                                                    echo "<center><b>The page name not available</b></center>";
                                                }?>
                                       
                                </div>
                            </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                <?php if(count($UnEditRole)>=1){?>
                                    <input type="submit" name="submit" id="submit" value="Save" class="btn btn-primary m-r-10">
                                <?}?>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <div id="message"></div>
                           <div class="row">
                                <form  id="form">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="row border-gray">
                                            <div class="panel-heading">
                                            <div class="col-md-6 m-b-20">
                                                <div class="form-group">
                                                    <input type="hidden" name="roleid" id="roleid1" value="<?=$RoleId;?>" />
                                                    <label for="title">Role Name*</label>
                                                    <input type="text" id="rolename" name="rolename" class="form-control required" value="<?=$roles[0]['role_name']?>"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 m-b-20" style="margin-top: 22px;">
                                                <input type="submit" name="submit" id="submit1" value="Save" class="btn btn-primary m-r-10">
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </form>
                                <div class="col-md-12">
                                    <div class="col-md-12" id="multivariant">
                                        <strong>Click which variants will be updated</strong>
                                        <div id="select-variants" class="col-md-12 col-sm-12 col-xs-12 table-responsive" bind-show="!autoGenerate &amp;&amp; variants.length > 0">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th><strong>Page</strong></th>
                                                        <th><strong>Action</strong></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr><?php if(isset($EditRole)){
                                                    foreach ($EditRole as $_) {?>
                                                        <td>
                                                            <div class="ui-checkbox ui-state-disabled"><label class="ui-btn ui-corner-all ui-btn-inherit ui-btn-icon-left ui-checkbox-on">
                                                                <input type="checkbox" name="roles[]"  value="<?=$_['page_id'];?>" id="<?=$_['page_id']?>" checked="" disabled=""><?=$_['page_name'];?>
                                                                </label></div>
                                                        </td>
                                                        <td>
                                                            <?php if(count($EditRole)>=2){?>
                                                                <a href="<?=BASEURL?>role/remove_pageroleid/<?=$_['role_page_id']?>/?page_id=<?=$_['page_id'];?>&&role_id=<?=$_['role_id'];?>"  class="btn btn-danger" data-toggle="modal" >Delete</a>
                                                            <?}?>
                                                        </td>
                                                     </tr><?php } ?><?}?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                                                        
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
                     roleName: {
                         required: true,
                         minlength: 3
                     }
                 },
                  submitHandler: function (form) {
             //alert('valid form submission'); // for demo
             $.ajax({
                 type: "POST",
                 url: "<?=BASEURL?>role/update_new_roles",
                 data: $(form).serialize(),
                 success: function (data) {

                     swal({
                      title: "Updated successfully",
                      type: "success",
                      confirmButtonText: "OK"
                    }, function(isConfirm){
                          window.location.href = "<?=BASEURL?>role/";
                    });
                }
             });
             return false; // required to block normal submit since you used ajax
         }

             });
        });
        function editrole(roleId, roleName)
        {
            $('#roleName').val(roleName);
            $('#form').append('<input type="hidden" name="roleId" id="roleId" value="'+roleId+'">');
            $('#submit').attr('value', 'Save Changes');
            $('.ibox-title > h5').text("Edit Role");
        }
    </script>
    <script>
        
function deleterole(roleId)
{
var roleId = roleId;
if(confirm("Are you sure you want to delete this?"))
{
 $.ajax({
   type: "POST",
   url: "<?=BASEURL?>role/delete_role",
   data: {roleId : roleId },
   success: function(data){
    $('#message').html('<div class="alert alert-success alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'+data+'<a class="alert-link" href="#">Alert Link</a>.</div>');
                    //location.reload();
                    $("#table").load(location.href + " #table");
 }
});
  $(this).parents(".show").animate({ backgroundColor: "#003" }, "slow")
  .animate({ opacity: "hide" }, "slow");
 }
return false;
}
</script>
 <script>
         $(document).ready(function(){

             $("#addRoleForm").validate({
                 rules: {
                     roleName: {
                         required: true,
                         minlength: 3
                     }
                 },
                  submitHandler: function (form) {
             //alert('valid form submission'); // for demo
             $.ajax({
                 type: "POST",
                 url: "<?=BASEURL?>role/update_new_roles",
                 data: $(form).serialize(),
                 success: function (data) {
                   // alert(data);
                     swal({
                title: "Student",
                text: "The value added successfully"
            },function(){
      window.location.href = "edit?rid="+data;
});
                }
             });
             return false; // required to block normal submit since you used ajax
         }

             });
        });
    </script>
   
</body>

</html>
