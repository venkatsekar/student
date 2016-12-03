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
                    <h2>Boards</h2>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Add Board</h5>
                        </div>
                        <div class="ibox-content">
                            <div id="message"></div>
                            <form role="form" id="form">
                                    <div class="form-group">
                                        <label>Name *</label>
                                        <input type="text" placeholder="" class="form-control required" name="boardName" id="boardName">
                                    </div>
                                    <div class="form-group">
                                        <label>Number of terms</label>
                                        <div class="input_fields_wrap">
                                        <div class="input-group m-b"><input type="text" name="noofterms[]" id="noofterms"class="form-control">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-primary add_field_button">Add</button> </span> 
                                            </div>
                                        </div>
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
                            },
                            photo: {required: true, 
                                 extension: "jpg|jpeg|png"
                            }
                        },
                  submitHandler: function (form) {
             //alert('valid form submission'); // for demo
             $.ajax({
                 type: "POST",
                 url: "<?=BASEURL?>board/board",
                 data: $(form).serialize(),
                 success: function (data) {
                    swal({
                      title: "Added successfully",
                      type: "success",
                      confirmButtonText: "OK"
                    }, function(isConfirm){
                          window.location.href = "<?=BASEURL?>board/";
                    });
                    //$('#message').html('<div class="alert alert-success alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'+data+'<a class="alert-link" href="#">Alert Link</a>.</div>');
                    //location.reload();
                    $("#table").load(location.href + " #table");
                    $("#form")[0].reset();
                }
             });
             return false; // required to block normal submit since you used ajax
         }

             });
        });
     
    </script>
    <script>
     $(document).ready(function() {
            var max_fields      = 6; //maximum input boxes allowed
            var wrapper         = $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID
            //alert($('#noofterms').val());
             if ($('#noofterms').val() == '') {
                $(add_button).prop( "disabled", true );
            }
            $('#noofterms').keyup(function(){ 
                if ($('#noofterms').val() == '') {
                $(add_button).prop( "disabled", true );
            }else{
                 $(add_button).prop( "disabled", false );
           }
             });
            var x = 1; //initlal text box count

            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                   $(wrapper).append('<div class="form-group input-group m-b"><input type="text" id="'+x+'"name="noofterms[]" class="form-control"><span class="input-group-btn remove_field"><button type="button" class="btn btn-danger">Remove</button> </span></div>'); //add input box
                   
                }
                
            });
            
            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove();  x--;
            })
        });
        
    </script>


</body>

</html>
