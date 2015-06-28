<?php  
    $oUser = new User(); 
    $user = $_SESSION['username'];
?>
<!-- START LEFT SIDEBAR NAV-->
<aside id="left-sidebar-nav">
    <ul id="slide-out" class="side-nav fixed leftside-navigation">
        <li class="user-details cyan darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <!--<img src="../images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">-->
                    <img src="<?php $oUser->getUserImage($user) ?>" alt="" class="circle responsive-img valign profile-image">
                </div>
                <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                        </li>
                        <li><a href="#"><i class="mdi-action-settings"></i> Settings</a>
                        </li>
                        <li><a href="#"><i class="mdi-communication-live-help"></i> Help</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="mdi-action-lock-outline"></i> Lock</a>
                        </li>
                        <li><a href="../login/index.php?out"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                        </li>
                    </ul>
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">
                        <?php echo $user; ?><i class="mdi-navigation-arrow-drop-down right"></i>
                    </a>
                    <p class="user-roal"><?php $oUser->getUserRole($user); ?></p>
                </div>
            </div>
        </li>
        
        
		<li class="bold">
       		<a href="index.php" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
        </li>
        
        
        
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
				<li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-social-person-outline"></i> Users</a>
                    <div class="collapsible-body">
                        <ul>
							<li>
								<a href="adduser.php"><i class="mdi-social-person-add"></i>Add User</a>
                            </li>                                        
							<li><a href="manageuser.php"><i class="mdi-social-group"></i>Manage User</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
        
        <li class="li-hover"><div class="divider"></div></li>
        <li class="li-hover"><p class="ultra-small margin more-text">Daily Sales</p></li>
        <li class="li-hover">
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="sample-chart-wrapper">                            
                        <div class="ct-chart ct-golden-section" id="ct2-chart"></div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i class="mdi-navigation-menu" ></i></a>
</aside>
<!-- END LEFT SIDEBAR NAV-->