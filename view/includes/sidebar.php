<?php
$teamid=$loginuser['teamid'];
$roleid=$loginuser['roleid'];

?>

<section id="main" data-layout="layout-1">
    <aside id="sidebar" class="sidebar c-overflow">
        <div class="profile-menu">
            <a href="#">
                <div class="profile-pic">
                    <!-- <img src="assets/img/profile-pics/1.jpg" alt=""> -->
                    <br /><br /><br /><br />
                </div>

                <div class="profile-info">
                    Deals Portal

                    <i class="zmdi zmdi-caret-up"></i>
                </div>
            </a>

            <!-- <ul class="main-menu" >
                <li>
                    <a href="profile-about.php"><i class="zmdi zmdi-account"></i> View Profile</a>
                </li>
                <li>
                    <a href="#"><i class="zmdi zmdi-input-antenna"></i> Privacy Settings</a>
                </li>
                <li>
                    <a href="#"><i class="zmdi zmdi-settings"></i> Settings</a>
                </li>
                <li>
                    <a href="#"><i class="zmdi zmdi-time-restore"></i> Logout</a>
                </li>
            </ul> -->

        </div>

        <ul class="main-menu">
            <li><a  href="dashboard.php"><i class="zmdi zmdi-home"></i> Home</a></li>
            <li><a  href="manage_agreement_amendment.php"><i class="zmdi zmdi-file"></i> Manage Agreement Amendment</a></li>
            <?php if($roleid == 1 || $roleid == 2) { ?>
                <li><a  href="report.php"><i class="zmdi zmdi-view-headline"></i> Reports</a></li>
            <?php } ?>
            <?php if($teamid == 1 && $roleid == 1) { ?>
                <li><a  href="user_team.php"><i class="zmdi zmdi-account"></i> Manage User </a></li>
            <?php }  ?>
            <!--<li><a  href="user_team.php"><i class="zmdi zmdi-accounts-list"></i>Users</a></li> -->
            <li><a  href="../controller/logout.php"><i class="zmdi zmdi-time-restore"></i> Logout</a></li>

            <!-- <li class="sub-menu">
                <a href="#"><i class="zmdi zmdi-collection-text"></i> Forms</a>

                <ul>
                    <li><a href="form-elements.php">Credit Report</a></li>
                    <li><a href="form-components.php">Credit Repair</a></li>
                    <li><a href="form-examples.php">Debt Settlment</a></li>
                    <li><a href="form-validations.php">My Letters</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="zmdi zmdi-collection-item"></i>My Letters</a></li> -->

        </ul>
    </aside>


    </aside>
