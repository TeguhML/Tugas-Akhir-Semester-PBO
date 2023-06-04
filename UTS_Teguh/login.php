<?php
    if (!empty($_SESSION)) {
    } else {
        session_start();
    }
?>
<!doctype html>
<html>
<head>
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body style="background-image: url('pisang.jpg'); background-size: cover; background-repeat: no-repeat;">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <br/><br/>
                <?php if(isset($_GET['signout']) && $_GET['signout'] == 'sukses'){ ?>
                    <div id="logout" class="alert alert-success">
                        <small>Anda Berhasil Logout</small>
                    </div>
                <?php } ?>
                <div id="notifikasi">
                    <div class="alert alert-danger">
                        <small>Login Anda Gagal, Periksa Kembali email dan Password</small>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sign in</h4>
                    </div>
                    <div class="card-body">
                        <!-- The form sends the input data with the POST method to the login process with the action parameter 'aksi=login' -->
                        <form method="post" action="crud.php?aksi=login" id="formlogin">
                            <div class="form-group">
                                <label>Your email</label>
                                <input name="email" class="form-control" placeholder="email" type="email" autocomplete="off">
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                <label>Your password</label>
                                <input name="pass" class="form-control" placeholder="******" type="password" autocomplete="off">
                            </div> <!-- form-group// --> 
                            <div class="form-group">
                                <button type="submit" name="login" class="btn btn-primary btn-block"> Login  </button>
                            </div> <!-- form-group// -->                                                           
                        </form>
                        <div class="form-group">
                            <a href="logout.php"> Logout </a>
                        </div> <!-- form-group//-->
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
            </div>
        </div> 
    </div>
    <script>
        // Hide the failed notification
        <?php if(empty($_GET['get'])){ ?>
            $("#notifikasi").hide();
        <?php } ?>
        var logingagal = function(){
            $("#logout").fadeOut('slow');
            $("#notifikasi").fadeOut('slow');
        };
        setTimeout(logingagal, 4000);
    </script> 
</body>
</html>
