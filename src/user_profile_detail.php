<?php
    include_once("function/headerfooter.php");
    include_once("function/user.php");
    incHeader('MSEF | Home');
    
    /* --- Queries --- */
    $userInfo = mysql_fetch_assoc(getUserInformation($_SESSION['user_email']));
    /* --- END: Queries ---*/
    
    /* --- Security --- */
    /* --- END: Security --- */
?>
<?php if(isset($_GET['message'])):?>
    <div style="margin-bottom:20px;min-height:40px;text-align:center;" class="bg-success col-md-3 col-md-offset-5">
        <?php echo $_GET['message']; ?>
    </div>
<?php endif;?>
<div class="col-lg-12">
    <!-- Users Detials -->
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="display:inline-block;">Profile Information</h3>
                <a href="user_profile_edit.php" title="Edit Profile">
                    <i class="fa fa-edit fa-2x" style="float:right;display:inline-block;"></i>
                </a>
            </div>

            <div class="panel-body">
                <dl class="dl-horizontal student">
                    <dt>First Name</dt>
                    <dd><?php echo $userInfo['FirstName']; ?></dd>
                </dl>
                <dl class="dl-horizontal students">
                    <dt>Last Name</dt>
                    <dd><?php echo $userInfo['LastName']; ?></dd>
                </dl>
                <dl class="dl-horizontal student">
                    <dt>Email Address</dt>
                    <dd><?php echo $userInfo['Email']; ?></dd>
                </dl>
                <dl class="dl-horizontal student">
                    <dt>Phone Number</dt>
                    <dd><?php echo $userInfo['PhoneNumber']; ?></dd>
                </dl>
                <dl class="dl-horizontal student">
                    <dt>Alterternate Phone</dt>
                    <dd><?php echo $userInfo['AltPhoneNumber']; ?></dd>
                </dl>
                <dl class="dl-horizontal student">
                    <dt>School</dt>
                    <dd><?php echo $userInfo['SchoolName']; ?></dd>
                </dl>
                <dl class="dl-horizontal student">
                    <dt>Grade</dt>
                    <dd><?php $userInfo['Grade']; ?>th</dd>
                </dl>
                <dl class="dl-horizontal student">
                    <dt>Address 1</dt>
                    <dd><?php echo $userInfo['Address1']; ?></dd>
                </dl>
                <dl class="dl-horizontal student">
                    <dt>Address 2</dt>
                    <dd><?php echo $userInfo['Address2']; ?></dd>
                </dl>
                <dl class="dl-horizontal student">
                    <dt>City</dt>
                    <dd><?php echo $userInfo['City']; ?></dd>
                </dl>
                <dl class="dl-horizontal student">
                    <dt>State</dt>
                    <dd><?php echo $userInfo['State']; ?></dd>
                </dl>
                <dl class="dl-horizontal student">
                    <dt>Zip</dt>
                    <dd><?php echo $userInfo['Zip']; ?></dd>
                </dl>
            </div>
        </div>
    </div>
    <!-- END: Users Detials -->

    <!-- Project Detials -->
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Projects</h3>
            </div>
            <table class="table">
                <tbody>
                    <tr>
                        <td><a href="student_project_detail.php">Volcano</a></td>
                        <td>Abstract</td>
                        <td align="center">Submitted</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END: Project Detials -->

    <!-- Form Detials -->
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Forms</h3>
            </div>
            <table class="table">
                <tbody>
                    <tr>
                        <td><a href="#">Science Fair Entry Form</a></td>
                        <td>Form required to participate in the science fair.</td>
                        <td style="color: #d9534f;">Required</td>
                    </tr>
                    <tr>
                        <td><a href="#">Live Animal Form</a></td>
                        <td>Form required to use live animals in your project.</td>
                        <td style="color: #5cb85c;">Complete</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END: Project Detials -->

    <!-- Parent Detials -->
    <div class="col-md-6 studentonly">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="display:inline-block;">Parent Information</h3>
                <a href="parent_profile_edit.php" title="Edit Parent Info">
                    <i class="fa fa-edit fa-2x" style="float:right;display:inline-block;"></i>
                </a>
            </div>
            <div class="panel-body">
                <dl class="dl-horizontal">
                    <dt>First Name</dt>
                    <dd><?php echo $userInfo['ParentFirstName']; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last Name</dt>
                    <dd><?php echo $userInfo['ParentLastName']; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Phone Number</dt>
                    <dd><?php echo $userInfo['ParentPhoneNumber']; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Parent Email</dt>
                    <dd><?php echo $userInfo['ParentEmail']; ?></dd>
                </dl>
            </div>
        </div>
    </div>
    <!-- END: Parent Detials -->
</div>
<?php
    incFooter();
?>