<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EDUCATION | BOARD</title>

    <link href="<?=BASEURL;?>public/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=BASEURL;?>public/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?=BASEURL;?>public/assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?=BASEURL;?>public/assets/css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="<?=BASEURL;?>public/assets/css/animate.css" rel="stylesheet">
    <link href="<?=BASEURL;?>public/assets/css/style.css" rel="stylesheet">
    <link href="<?=BASEURL;?>public/assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="<?=BASEURL;?>public/assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
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
                    <h2>Sub Boards</h2>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Add SubBoard</h5>
                        </div>
                        <div class="ibox-content">
                            <div id="message"></div>
                            <form role="form" id="form">
                                    <div class="form-group">
                                        <label>Name *</label>
                                        <input type="text" placeholder="" class="form-control required" name="subBoardName" id="subBoardName">
                                        <input type="hidden" name="schboardId" id="schboardId" value="<?=$SchBoardId;?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea id="others" name="others"  class="form-control"></textarea>
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
                    <table class="table table-striped table-bordered table-hover dataTables-example" id="table" >
                    <thead>
                    <tr>
                        <th>SubBoard Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($SubBoardList as $_){?>
                    <tr class="gradeX">
                        <td><?=$_['sub_board_name'];?></td>
                        <td>
                            <button class="btn btn-info " type="button" onClick="javascript:editboard('<?=$_['school_sub_board_id'];?>','<?=$_['sub_board_name'];?>','<?=$_['other_text'];?>')"><i class="fa fa-paste" ></i> Edit</button>
                            <button class="btn btn-danger" onClick="javascript:deleteboard('<?=$_['school_sub_board_id'];?>','<?=$_['school_board_id'];?>')"><i class="fa fa-times"></i> Remove</button>
                            
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
     <script src="<?=BASEURL;?>public/assets/js/plugins/sweetalert/sweetalert.min.js"></script>
    <script>
         $(document).ready(function(){

             $("#form").validate({
                 rules: {
                     subboardName: {
                         required: true,
                         minlength: 3
                     }
                 },
                  submitHandler: function (form) {
             //alert('valid form submission'); // for demo
             $.ajax({
                 type: "POST",
                 url: "<?=BASEURL?>board/add_subboard",
                 data: $(form).serialize(),
                 success: function (data) {
                    if(data == 'add')
                    {
                    swal({
                      title: "Added successfully",
                      type: "success",
                      confirmButtonText: "OK"
                    });
                    }
                     if(data == 'edit')
                    {
                      swal({
                      title: "Updated successfully",
                      type: "success",
                      confirmButtonText: "OK"
                    });  
                    }
                    $("#table").load(location.href + " #table");
                    $("#form")[0].reset();
                }
             });
             return false; // required to block normal submit since you used ajax
         }

             });
        });
        function editboard(schboardId, subboardName, others)
        {
            $('#subBoardName').val(subboardName);
             $('#others').val(others);
            $('#form').append('<input type="hidden" name="subBoardId" id="subBoardId" value="'+schboardId+'">');
            $('#submit').attr('value', 'Save Changes');
            $('.ibox-title > h5').text("Edit SubBoard");
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

function deleteboard(subBoardId,schboardId)
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
           type: "POST",
            url: "<?=BASEURL?>board/delete_sub_board",
            data: {schboardId : schboardId, subBoardId:subBoardId },
            success: function () {
               swal({
                      title: "Deleted successfully",
                      type: "success",
                      confirmButtonText: "OK"
                    }, function(isConfirm){
                          location.reload();
                    });
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Error deleting!", "Please try again", "error");
            }
        });
    });
}
</script>

    </script>
   

</body>

</html>
