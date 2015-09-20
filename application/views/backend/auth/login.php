<!DOCTYPE html>
<html lang="en">

<head>
	<base href="<?php echo base_url(); ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="assets/admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Giriş Yapınız, Hüseyin DOL Admin Paneli</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo form_open('backend/auth/validate_credentials'); ?>
                            <fieldset>
                                <div class="form-group">
                                    <?php echo form_input('username',(isset($username))?$username:'','placeholder="Kullanıcı adınız" class="form-control"'); ?>
                                </div>
                                <div class="form-group">
                                    <?php echo form_password('password','','placeholder="Şifreniz" class="password form-control"'); ?>
                                </div>
                                <hr />
                                <!-- Change this to a button or input when using this as a form -->
                                <?php 
									echo form_submit('submit','Giriş Yap','class="btn btn-lg btn-success btn-block"');
									echo form_hidden('url',current_url()); 
								?>
                            </fieldset>
                        <?php
							echo form_close(); 
							echo validation_errors('<p style="color:#dc0001;">');
							if (isset($errors)) {
								echo '<p style="color:#dc0001;">'.$errors.'</p>';
							}
						?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="assets/admin/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="assets/admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="assets/admin/dist/js/sb-admin-2.js"></script>

</body>

</html>