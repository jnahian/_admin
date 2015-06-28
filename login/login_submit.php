<?php session_start(); require_once ('../functions/functions.php');
    $err = '';
    if(!empty($_POST)){
        $user = htmlentities($_POST['user'], ENT_QUOTES);
        $pass = sha1(md5(htmlentities($_POST['pass'], ENT_QUOTES)));
        
        if(!empty($user) && !empty($pass)){
            if($user_data = $oDb->q_fetch("select * from j_user where u_username = '$user'")){
                if($user_data['u_pass'] === $pass) {
                    $_SESSION['username'] = $user;
                    $oTools->redirect('../dashboard/');
                } else echo $err = 'Password Doesn\'t Match.';
            } else echo $err = 'You are not registered yet.';
        } else echo $err = 'Error! Required field empty';
    }
?>
