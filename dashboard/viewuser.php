<?php
require_once('../functions/functions.php');

$ret = array("success" => false, "message" => "");

$oDb = new Database();
$oUser = new User();
if (!empty($_POST)) {

    $operation = htmlentities($_POST['operation'], ENT_QUOTES);
    
    if ($operation == 'view') {
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            if (!empty($_POST['table'])) {
                $id = $_POST['id'];
                $table = $_POST['table'];
                if ($res = $oDb->q_fetch("select * from $table where u_id = '$id'")) {
                    $ret['success'] = true;
                    $ret['message'] = 'Successfully Opened';
                    ?>


                    <div class = "modal-content white-text">
                        <h4><?php echo ($res['u_fname'] . ' ' . $res['u_lname']);?> <i><?php $oUser->getUserRole($res['u_username']); ?></i></h4>
                        <div class = "col-8">
                            <p class="col-4"><strong>Username</strong></p><p class="col-8">: <?php echo $res['u_username']; ?></p>
                            <p class="col-4"><strong>Email</strong></p><p class="col-8">: <?php echo $res['u_email']; ?></p>
                            <p class="col-4"><strong>Mobile</strong></p><p class="col-8">: <?php echo $res['u_mob']; ?></p>
                            <p class="col-4"><strong>Date of Birth</strong></p><p class="col-8">: <?php echo $res['u_dob']; ?></p>
                            <p class="col-4"><strong>Message</strong></p><p class="col-8">: <?php echo $res['u_msg']; ?></p>
                        </div>
                        <div class="col-4">
                            <img class="responsive" src="../uploads/users/<?php echo $res['u_image']; ?>"/>
                        </div>
                    </div>


                    <?php
                } else
                    $ret['message'] = 'Query Failed!';
            } else
                $ret['message'] = 'Failed! No table given';
        } else
            $ret['message'] = 'Failed! Key value missing';
    }
}
?>

