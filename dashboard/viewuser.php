

<?php
$oUser = new User();
if (!empty($_GET['view'])) {
    $id = $_GET['view'];

    if ($res = $oDb->q_fetch("select * from j_user where u_id = '$id'")) {
        ?>
        <div id="modal" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4>View User</h4>
                <div class="col-8">
                    <h5><?php echo ($res['u_fname'] . ' ' . $res['u_lname']); ?></h5>
                    <p><?php $oUser->getUserRole($res['u_username']); ?></p>
                    <p><strong>Username: </strong> <?php echo $res['u_username']; ?></p>
                    <p><strong>Email: </strong><?php echo $res['u_email']; ?></p>
                    <p><srtong>Mobile: </srtong><?php echo $res['u_mob']; ?></p>
                    <p><strong>Date of Birth: </strong><?php echo $res['u_dob']; ?></p>
                    <p><strong>Message: </strong><?php echo $res['u_msg']; ?></p>
                </div>
                <div class="col-4">
                    <img class="responsive" src="../uploads/users/<?php echo $res['u_image']; ?>"/>
                </div>
            </div>
            <div class="modal-footer clearfix">
                <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">close</a>
            </div>
        </div>

    <?php
    }
}
?>

