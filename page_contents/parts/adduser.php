<?php
    $oDb = new Database();
    $data;
    if(!empty($_GET['edit'])){
        $edtId = $_GET['edit'];
        $GLOBALS['data'] = $oDb->q_fetch("select * from j_user where u_id = '$edtId'");
        // print_r($GLOBALS['data']);
    }
    
//    function detectMode($edtId){
//        if(!empty($edtId)) {
//            echo 'edit';
//        } else echo 'add';
//    }
//    detectMode($edtId);
    function setValue($fieldname){
        if(!empty($GLOBALS['data'])) {
            echo $GLOBALS['data'][$fieldname];
        }
    }
?>
<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class=" grey lighten-3">
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Users</h5>
                <ol class="breadcrumb">
                    <li><a href="index.php">Dashboard</a>
                    </li>
                    <li><a href="#">Users</a>
                    </li>
                    <li class="active">Add User</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs end-->


<!--start container-->
<div class="container">
    <!--Form Advance-->
    <div class="row">
        <div class="col s12 m12 l12">
            <div class="card-panel">
                <h4 class="header2">Add User</h4>
                <div class="row">
                    <form class="col s12" method="post" enctype="multipart/form-data" action="submit.php">
                        <input type="hidden" name="operation" value="add"/>
                        <input type="hidden" name="edit" value="<?php setValue('u_id'); ?>"/>
                        <div class="row">
                            <div class="input-field col s6">
                                <i class="mdi-editor-format-color-text prefix"></i>
                                <input id="first_name" type="text" class="validate" name="first_name" required value="<?php setValue('u_fname'); ?>">
                                <label for="first_name">First Name</label>
                            </div>

                            <div class="input-field col s6">
                                <i class="mdi-editor-format-color-text prefix"></i>
                                <input id="last_name" type="text" class="validate" name="last_name" required value="<?php setValue('u_lname'); ?>">
                                <label for="last_name">Last Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <i class="mdi-action-account-circle prefix"></i>
                                <input id="username" type="text" name="username" class="validate" required value="<?php setValue('u_username'); ?>">
                                <label for="username">Username</label>
                            </div>

                            <div class="input-field col s6">
                                <i class="mdi-communication-email prefix"></i>
                                <input id="email" type="email" class="validate" name="email" required value="<?php setValue('u_email'); ?>">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <i class="mdi-action-visibility-off prefix"></i>
                                <input id="password" type="password" class="validate" name="password" required>
                                <label for="password">Password</label>
                            </div>
                            <div class="input-field col s6">
                                <select name="user_role" required>
                                    <option value="" selected>Choose User Role</option>
                                    <option value="1">Administrator</option>
                                    <option value="2">Mordarator</option>
                                    <option value="3">Client</option>
                                </select>
                                <label>Select User Role</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s6">
                                <i class="mdi-editor-insert-invitation prefix"></i>
                                <input type="date" name="date_of_birth" class="datepicker" placeholder="Date Of Birth" required value="<?php setValue('u_dob'); ?>">
                            </div>
                            <div class="file-field input-field col s6">
                                <input class="file-path validate" type="text" />
                                <div class="btn">
                                    <span>Image</span>
                                    <input type="file" name="pro_img" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <i class="mdi-communication-call prefix"></i>
                                <input id="mobile" type="tel" class="validate" name="mobile" required value="<?php setValue('u_mob'); ?>">
                                <label for="mobile">Mobile</label>
                            </div>
                            <div class="input-field col s6">
                                <i class="mdi-action-question-answer prefix"></i>
                                <textarea id="message" name="message" class="materialize-textarea" length="120"><?php setValue('u_msg'); ?></textarea>
                                <label for="message">Message</label>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="reset" class="reset"/>
                                <button class="btn waves-effect waves-light right" type="submit" onclick="submitForm(this)">Submit
                                    <i class="mdi-content-send right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
