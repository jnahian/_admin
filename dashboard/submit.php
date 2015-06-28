<?php

require_once('../functions/functions.php');

$ret = array("success" => false, "message" => "");

$oDb = new Database();

if (!empty($_POST)) {

    $operation = htmlentities($_POST['operation'], ENT_QUOTES);

    if ($operation == 'add') {
        $edit = htmlentities($_POST['edit'], ENT_QUOTES);
        $firstName = htmlentities($_POST['first_name'], ENT_QUOTES);
        $lastName = htmlentities($_POST['last_name'], ENT_QUOTES);
        $userName = htmlentities($_POST['username'], ENT_QUOTES);
        $email = htmlentities($_POST['email'], ENT_QUOTES);
        $password = sha1(md5(htmlentities($_POST['password'], ENT_QUOTES)));
        $userRole = htmlentities(!empty($_POST['user_role']) ? $_POST['user_role'] : "", ENT_QUOTES);
        $dob = htmlentities($_POST['date_of_birth'], ENT_QUOTES);
        $mob = htmlentities($_POST['mobile'], ENT_QUOTES);
        $msg = htmlentities($_POST['message'], ENT_QUOTES);

        $image = "";

        if ($_FILES['pro_img']['error'] == 0) {
            $img = $_FILES['pro_img'];
            $image = 'user' . time() . $img['name'];
        }


        if (!empty($firstName) && !empty($lastName) && !empty($userName) && !empty($email) && !empty($password) && !empty($userRole) && !empty($dob)) {
            if ($oCheck->chkName($firstName)) {
                if ($oCheck->chkName($lastName)) {
                    if ($oCheck->chkName($userName)) {
                        if ($oCheck->chkEmail($email)) {
                            if (!empty($edit)) {
                                if ($oDb->query(" UPDATE j_user set u_fname = '$firstName', u_lname = '$lastName', u_email = '$email', u_pass = '$password', u_role = '$userRole', u_dob = '$dob', u_image = '$image', u_mob = '$mob', u_msg = '$msg' where u_id = '$edit'")) {
                                    move_uploaded_file($img['tmp_name'], '../uploads/users/' . $image);
                                    $ret['message'] = "User Updated Successful.";
                                    $ret['success'] = true;
                                } else {
                                    $ret['message'] = "Update Error!";
                                }
                            } else {
                                $q = $oDb->query("select * from j_user where u_username = '$userName' ");
                                if ($q->num_rows < 1) {
                                    if ($oDb->query("INSERT INTO j_user (u_fname, u_lname, u_username, u_email, u_pass, u_role, u_dob, u_image, u_mob, u_msg) values ('$firstName', '$lastName', '$userName', '$email', '$password', '$userRole', '$dob', '$image','$mob', '$msg')")) {

                                        move_uploaded_file($img['tmp_name'], '../uploads/users/' . $image);
                                        $ret['message'] = "User Registration Successful.";
                                        $ret['success'] = true;
                                    } else {
                                        $ret['message'] = "Registration Error!";
                                    }
                                } else
                                    $ret['message'] = "Sorry! Username is already taken.";
                            }
                        } else
                            $ret['message'] = "Email format mismatch.";
                    } else
                        $ret['message'] = "Username format mismatch.";
                } else
                    $ret['message'] = "Last Name format mismatch.";
            } else
                $ret['message'] = "First Name format mismatch.";
        } else
            $ret['message'] = "Required Field Empty";
    }
    elseif ($operation == 'delete') {
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            if (!empty($_POST['table'])) {
                $id = $_POST['id'];
                $table = $_POST['table'];
                if ($oDb->query("delete from $table where u_id = '$id'")) {
                    $ret['success'] = true;
                    $ret['message'] = 'Successfully Deleted';
                } else
                    $ret['message'] = 'Failed! Cannot delete item';
            } else
                $ret['message'] = 'Failed! No table given';
        } else
            $ret['message'] = 'Failed! Key value missing';
    }
    elseif ($operation == 'view') {
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            if (!empty($_POST['table'])) {
                $id = $_POST['id'];
                $table = $_POST['table'];
                if ($oDb->q_fetch("select * from $table where u_id = '$id'")) {
                    $ret['success'] = true;
                    $ret['message'] = 'Successfully Opened';
                } else
                    $ret['message'] = 'Query Failed!';
            } else
                $ret['message'] = 'Failed! No table given';
        } else
            $ret['message'] = 'Failed! Key value missing';
    }
}



echo json_encode($ret);
?>