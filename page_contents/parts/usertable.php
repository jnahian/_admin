<?php
$oDb = new Database();

//  Delete content
//    if(!empty($_GET['del'])){
//        $id = $_GET['del'];
//        $oDb->query("delete from j_user where u_id = '$id'");
//    }
?>
<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class=" grey lighten-3">
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Manage Users</h5>
                <ol class="breadcrumb">
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="#">Users</a></li>
                    <li class="active">Manage Users</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs end-->
<div class="container">
    <div class="section">
        <!--DataTables example-->
        <div id="table-datatables">
            <h4 class="header">Registered User Information</h4>
            <div class="row">

                <div class="col s12 m8 l12">
                    <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Role</th>
                                <th>DOB</th>
                                <th>Message</th>
                                <th>Picture</th>
                                <th>Manage</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            $qr = $oDb->query("select * from j_user");
                            $sl = 1;
                            while ($res = $oDb->fetch($qr)) {
                                ?>

                                <tr>
                                    <td><?php echo $sl++; ?></td>
                                    <td><?php echo ($res['u_fname'] . ' ' . $res['u_lname']); ?></td>
                                    <td><?php echo $res['u_username']; ?></td>
                                    <td><?php echo $res['u_email']; ?></td>
                                    <td><?php echo $res['u_mob']; ?></td>
                                    <td><?php echo $res['u_role']; ?></td>
                                    <td><?php echo $res['u_dob']; ?></td>
                                    <td><?php echo substr($res['u_msg'], 0, 15) . '...'; ?></td>
                                    <td><img class="user_img" src="../uploads/users/<?php echo $res['u_image']; ?>" alt=""/></td>
                                    <td>
                                        <a class="cyan-text modal-trigger" data-id="<?php echo $res['u_id']; ?>" href="#modal" onclick="viewItem(this, 'j_user')"><i class="mdi-hardware-cast"></i></a> 
                                        <a class="indigo-text" href="adduser.php?edit=<?php echo $res['u_id']; ?>"><i class="mdi-editor-border-color"></i></a>
                                        <a class="red-text" href="#" data-id="<?php echo $res['u_id']; ?>" onclick="return deleteItem(this, 'j_user')"><i class="mdi-action-delete"></i></a>
                                    </td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id = "modal" class = "modal teal"></div>