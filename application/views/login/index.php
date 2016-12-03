<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>STUDENT | Login</title>

    <link href="<?=BASEURL;?>public/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=BASEURL;?>public/assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?=BASEURL;?>public/assets/css/animate.css" rel="stylesheet">
    <link href="<?=BASEURL;?>public/assets/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
            <div align="center">

                <h1 class="logo-name">S+</h1>

            </div>
            <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Login</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-6 b-r">
                               <p class="text-center">
                                    <a href=""><i class="fa fa-user fa-3x big-icon"></i></a>
                                </p>
                                
                               <a href="<?=BASEURL?>login/teacher" class="btn btn-primary block full-width m-b">I am Student</a>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-center">
                                    <a href=""><i class="fa fa-sign-in big-icon"></i></a>
                                </p>
                                <a href="<?=BASEURL?>login/teacher" class="btn btn-primary block full-width m-b">I am Teacher</a>
                            </div>
                        </div>
                    </div><br/><br/>
                    <div class="ibox-content">
                        <div class="row">
                            <p class="text-muted text-center"><a href="<?=BASEURL;?>login/passwordrecover"><strong>Forgot password?</strong></a></p>
                            <p class="text-muted text-center"><strong>Do not have an account?</strong></p>
                            <p class="text-muted text-center"><a href="<?=BASEURL;?>login/registration"><strong>Create an account</strong></a></p>
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

</body>

</html>
