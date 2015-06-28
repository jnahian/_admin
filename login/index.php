<?php require_once ('../functions/functions.php');
    
    $err = '';
    if(!empty($_POST)){
        $user = htmlentities($_POST['user'], ENT_QUOTES);
        $pass = sha1(md5(htmlentities($_POST['pass'], ENT_QUOTES)));
        
        if(!empty($user) && !empty($pass)){
            if($user_data = $oDb->q_fetch("select * from j_user where u_username = '$user'")){
                if($user_data['u_pass'] === $pass) {
                    $_SESSION['username'] = $user;
                    $oTools->redirect('../dashboard/');
                } else $err = 'Password Doesn\'t Match.';
            } else $err = 'You are not registered yet.';
        } else $err = 'Error! Required field empty';
    }
    $oUser->logout();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <title>Management | Login</title>

    <!-- Favicons-->
    <link rel="icon" href="../images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="../images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->


    <!-- CORE CSS-->

    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="../css/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="../css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="../js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">

</head>

    <body class="green lighten-5">
    <!-- Start Page Loading -->
<!--
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
-->
    <!-- End Page Loading -->



    <div id="login-page" class="row">
        <div class="col s12 z-depth-4 card-panel">
            <form class="login-form" method="post" action="index.php">
                <div class="row">
                    <div class="input-field col s12 center">
                        <img src="../images/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">
                        <p class="center login-form-text">Managment Login</p>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input id="username" type="text" name="user">
                        <label for="username" class="center-align">Username</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-action-lock-outline prefix"></i>
                        <input id="password" type="password" name="pass">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12  login-text">
                        <input type="checkbox" id="remember-me" />
                        <label for="remember-me">Remember me</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button type="submit" class="btn waves-effect waves-light col s12">Login</button>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 m6 l6">
                        <p class="margin medium-small"><a href="register.php">Register Now!</a>
                        </p>
                    </div>
                    <div class="input-field col s6 m6 l6">
                        <p class="margin right-align medium-small"><a href="forgot-password.php">Forgot password ?</a>
                        </p>
                    </div>
                </div>

            </form>
        </div>
    </div>



    <!-- ================================================
    Scripts
    ================================================ -->

    <!-- jQuery Library -->
    <script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="../js/materialize.js"></script>
    <!--prism-->
    <script type="text/javascript" src="../js/prism.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="../js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="../js/plugins.js"></script>
    <script type="text/javascript" src="../js/form.js"></script>
    <?php 
        if(!empty($err)){ ?>
            <script>Materialize.toast('<?php echo $err; ?>', 3000);</script>
        <?php }
    ?>

</body>

</html>