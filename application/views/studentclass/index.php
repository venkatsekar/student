<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EDUCATION | CLASS</title>

    <link href="<?=BASEURL;?>public/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=BASEURL;?>public/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?=BASEURL;?>public/assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?=BASEURL;?>public/assets/css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="<?=BASEURL;?>public/assets/css/animate.css" rel="stylesheet">
    <link href="<?=BASEURL;?>public/assets/css/style.css" rel="stylesheet">
    <link href="<?=BASEURL;?>public/assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
      <link href="<?=BASEURL;?>public/assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

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
                    <a href="<?=BASEURL;?>syllabus"><i class="fa fa-diamond"></i> <span class="nav-label">Syllabus</span></a>
                </li>
                <li>
                    <a href="<?=BASEURL;?>role"><i class="fa fa-wifi"></i> <span class="nav-label">Role</span></a>
                </li>
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0;height: 66px;">
            <ul class="nav navbar-top-links navbar-right">
               
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Classes</h2>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Add Class</h5>
                        </div>
                        <div class="ibox-content">
                            <div id="message"></div>
                            <form role="form" id="form">
                                    <div class="form-group">
                                        <label>Name *</label>
                                        <input type="text" placeholder="" class="form-control required" name="className" id="className">
                                    </div>
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <textarea id="remarks" name="remarks" type="text" class="form-control"></textarea>
                                    </div>
                                    <div align="center">
                                        <a class="btn btn-md btn-white m-t-n-xs" href="#">Cancel</a>
                                        <input class="btn btn-md btn-primary m-t-n-xs" type="submit" id="submit" value="Save">
                                    </div>
                            </form>
                        </div>
                    </div>
                    <div class="ibox-content">
                    <div class="table-responsive">
                    <table class="table" id="table" >
                    <thead>
                    <tr>
                        <th>Class Name</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($ClassList as $_){?>
                    <tr class="gradeX">
                        <td><?=$_['class_name'];?></td>
                        <td><?=$_['remarks'];?></td>
                        <td>
                            <button class="btn btn-info " type="button" onClick="javascript:editclass('<?=$_['class_id'];?>','<?=$_['class_name'];?>','<?=$_['remarks'];?>')"><i class="fa fa-paste" ></i> Edit</button>
                            <button class="btn btn-danger" onClick="javascript:deleteclass(<?=$_['class_id'];?>)"><i class="fa fa-times"></i> Remove</button>
                            
                        </td>
                    </tr>
                    <?}?>
                    </table>
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

    <!-- Custom and plugin javascript --
    <script src="<?=BASEURL;?>public/assets/js/inspinia.js"></script>-->
    <script src="<?=BASEURL;?>public/assets/js/plugins/pace/pace.min.js"></script>

    <!-- Steps -->
    <script src="<?=BASEURL;?>public/assets/js/plugins/staps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="<?=BASEURL;?>public/assets/js/plugins/validate/jquery.validate.min.js"></script>
    <!-- Data picker -->
    <script src="<?=BASEURL;?>public/assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?=BASEURL;?>public/assets/js/plugins/dataTables/datatables.min.js"></script>
     <script>
         $(document).ready(function(){

             $("#form").validate({
                 rules: {
                     className: {
                         required: true,
                         minlength: 3
                     }
                 },
                  submitHandler: function (form) {
             //alert('valid form submission'); // for demo
             $.ajax({
                 type: "POST",
                 url: "<?=BASEURL?>studentclass/studentclass",
                 data: $(form).serialize(),
                 success: function (data) {

                    $('#message').html('<div class="alert alert-success alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'+data+'<a class="alert-link" href="#">Alert Link</a>.</div>');
                    //location.reload();
                    $("#table").load(location.href + " #table");
                    $("#form")[0].reset();
                }
             });
             return false; // required to block normal submit since you used ajax
         }

             });
        });
        function editclass(classId, className, remarks)
        {
            $('#className').val(className);
            $('#remarks').val(remarks);
            $('#form').append('<input type="hidden" name="classId" id="classId" value="'+classId+'">');
            $('#submit').attr('value', 'Save Changes');
            $('.ibox-title > h5').text("Edit Class");
        }
    </script>
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 10,
                responsive: true,
                 buttons: [
                   { customize: function (win){
                        $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });
        function deleteclass(classId)
        {
        var classId = classId;
        if(confirm("Are you sure you want to delete this?"))
        {
         $.ajax({
           type: "POST",
           url: "<?=BASEURL?>studentclass/delete_student_class",
           data: {classId : classId },
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

    </script>
   

</body>

</html>