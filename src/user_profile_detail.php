<?php
    include_once("function/headerfooter.php");
    include_once("function/user.php");
    include_once("function/form.php");
    incHeader('MSEF | Profile');
    
    /* --- Queries --- */
    $userInfo = mysql_fetch_assoc(getUserInformation($_SESSION['user_email']));
    $forms = getStudentForms($_SESSION['user_id']);
    $suggestedForms = getSuggestedForms($userInfo['ProjectId']);
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
    <div class="col-md-4">
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
                <dl class="dl-horizontal sponsor">
                    <dt>Position</dt>
                    <dd><?php echo $userInfo['Position']; ?></dd>
                </dl>
                <dl class="dl-horizontal student">
                    <dt>Grade</dt>
                    <dd><?php echo $userInfo['Grade']; ?>th</dd>
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
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Projects</h3>
            </div>
            <div class="panel-body">
                <?php if($userInfo['ProjectName'] != ''):?>
                    <dl class="dl-horizontal">
                        <dt>Name</dt>
                        <dd><a href="student_project_detail.php"><?php echo $userInfo['ProjectName']; ?></a></dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>Description</dt>
                        <dd><?php echo $userInfo['Description']; ?></dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>Status</dt>
                        <dd title="<?php echo $userInfo['ProjectStatusDescription']; ?>"><?php echo $userInfo['ProjectStatus']; ?></dd>
                    </dl>
                <?php else:?>
                    <p>Looks like you aren't a part of any projects yet, you can either join an existing project <a href="project_signup.php">here</a>, or you can create your own project <a href="student_project_create.php">here</a>.</p>
                <?php endif;?>
            </div>
        </div>
    </div>
    <!-- END: Project Detials -->

    <!-- Form Detials -->
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Forms</h3>
            </div>
            <table class="table">
                <tbody>
                    <?php while($row = mysql_fetch_assoc($forms)):?>
                        <tr>
                            <td><a href="form_detail.php?formId=<?php echo $row['form_id']; ?>"><?php echo $row['FormName']; ?></a></td>
                            <td style="color: #d9534f;"><?php echo $row['FormName']; ?></td>
                        </tr>
                    <?php endwhile;?>
                    <?php foreach($suggestedForms as $form):?>
                        <tr>
                            <td><a href="form_detail.php?formId=<?php echo $form['Id']; ?>"><?php echo $form['Name']; ?></a></td>
                            <td>Suggested</td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if(mysql_num_rows($forms) == 0 && count($suggestedForms) == 0):?>
                        <tr>
                            <td>You currently don't have any required forms.</td>
                        </tr>
                    <?php endif;?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END: Form Detials -->

    <!-- Parent Detials -->
    <div class="col-md-8 student studentonly">
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