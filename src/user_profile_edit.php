<?php
    include("function/headerfooter.php");
    include("function/user.php");
    include("function/school.php");
    include("function/states.php");
    include_once("function/form.php");
    incHeader('MSEF | Profile', '', 'form.js');
    
    /* --- Queries --- */
    $userInfo = mysql_fetch_assoc(getUserInformation($_SESSION['user_email']));
    $schools = getSchools();
    $forms = getStudentForms($_SESSION['user_id']);
    /* --- END: Queries ---*/
    
    /* --- Security --- */
    /* --- END: Security --- */
?>
<!-- Script -->
    <script>
        $(window).bind('beforeunload', function(e){
            return "All unsaved data will be lost:";
        });
    </script>
<!-- END: Script -->

<div class="col-lg-12">
    <!-- Users Detials -->
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="display:inline-block;">Profile Information</h3>
            </div>

            <div class="panel-body">
                <form style="padding-top: 10px;" action="user_profile_edit_action.php" method="post" enctype="multipart/form-data" id="newBrdForm" target="formSubFrame" onsubmit="formSubmit()">
                    <input type="hidden" name="UserId"  value="<?php echo $userInfo['UserId']; ?>"/> 
                    <div class="form-group">
                        <dl class="dl-horizontal student">
                            <dt>First Name</dt>
                            <dd><input type="text" name="FirstName" value="<?php echo $userInfo['FirstName']; ?>" placeholder="First Name" class="form-control"/></dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <dl class="dl-horizontal students">
                            <dt>Last Name</dt>
                            <dd><input type="text" name="LastName" value="<?php echo $userInfo['LastName']; ?>" placeholder="Last Name" class="form-control"/></dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <dl class="dl-horizontal student">
                            <dt>Email Address</dt>
                            <dd><input type="email" name="Email" value="<?php echo $userInfo['Email']; ?>" placeholder="Email Address" class="form-control"/></dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <dl class="dl-horizontal student">
                            <dt>Phone Number</dt>
                            <dd><input type="text" name="PhoneNumber" value="<?php echo $userInfo['PhoneNumber']; ?>" placeholder="Phone Number" class="form-control"/></dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <dl class="dl-horizontal student">
                            <dt>Alterternate Phone</dt>
                            <dd><input type="text" name="AltPhoneNumber" value="<?php echo $userInfo['AltPhoneNumber']; ?>" placeholder="Phone Number" class="form-control"/></dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <dl class="dl-horizontal student">
                            <dt>School</dt>
                            <dd>
                                <select name="School" class="form-control">
                                    <?php while($row = mysql_fetch_array($schools)):?>
                                        <option value="<?php echo $row['Id']; ?>" <?php if( $row['Id'] == $userInfo['school_id']):?>selected="selected"<?php endif;?>><?php echo $row['Name']; ?></option>
                                    <?php endwhile;?>
                                </select>
                            </dd>
                        </dl>
                    </div>
                    <div class="form-group sponsor">
                        <dl class="dl-horizontal sponsor">
                            <dt>Position</dt>
                            <dd><input type="text" name="Position" value="<?php echo $userInfo['Position']; ?>" placeholder="Position" class="form-control"></dd>
                        </dl>
                    </div>
                    <div class="form-group studentonly">
                        <dl class="dl-horizontal student">
                            <dt>Grade</dt>
                            <dd>
                                <select name="Grade" class="form-control">
                                    <option value="7" <?php if( 7 == $userInfo['Grade']):?>selected="selected"<?php endif;?>>7th</option>
                                    <option value="8" <?php if( 8 == $userInfo['Grade']):?>selected="selected"<?php endif;?>>8th</option>
                                    <option value="9" <?php if( 9 == $userInfo['Grade']):?>selected="selected"<?php endif;?>>9th</option>
                                    <option value="10" <?php if(10 == $userInfo['Grade']):?>selected="selected"<?php endif;?>>10th</option>
                                    <option value="11" <?php if(11 == $userInfo['Grade']):?>selected="selected"<?php endif;?>>11th</option>
                                    <option value="12" <?php if(12 == $userInfo['Grade']):?>selected="selected"<?php endif;?>>12th</option>
                                </select>
                            </dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <dl class="dl-horizontal student">
                            <dt>Address 1</dt>
                            <dd><input type="text" name="Address1" value="<?php echo $userInfo['Address1']; ?>" placeholder="Address Line 1" class="form-control"/></dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <dl class="dl-horizontal student">
                            <dt>Address 2</dt>
                            <dd><input type="text" name="Address2" value="<?php echo $userInfo['Address2']; ?>" placeholder="Address Line 2" class="form-control"/></dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <dl class="dl-horizontal student">
                            <dt>City</dt>
                            <dd><input type="text" name="City" value="<?php echo $userInfo['City']; ?>" placeholder="City" class="form-control"/></dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <dl class="dl-horizontal student">
                            <dt>State</dt>
                            <dd>
                                <select name="State" class="form-control">
                                    <?php foreach($states as $state):?>
                                        <option value="<?php echo $state; ?>" <?php if($state == $userInfo['State']): ?>selected="selected"<?php endif; ?>><?php echo $state; ?></option>
                                    <?php endforeach;?>
                                </select>
                            </dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <dl class="dl-horizontal student">
                            <dt>Zip</dt>
                            <dd><input type="text" name="Zip" value="<?php echo $userInfo['Zip']; ?>" placeholder="Zip Code" class="form-control"/></dd>
                        </dl>
                    </div>

                    <div class="form-group" align="center">
                        <button type="button" onclick="window.location='user_profile_detail.php';" class="btn">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
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
                    <?php if($userInfo['ProjectName'] != ''):?>
                        <tr>
                            <td><a href="student_project_detail.php"><?php echo $userInfo['ProjectName']; ?></a></td>
                            <td><?php echo $userInfo['Description']; ?></td>
                            <td align="center" title="<?php echo $userInfo['ProjectStatusDescription']; ?>><?php echo $userInfo['ProjectStatus']; ?></td>
                        </tr>
                    <?php else:?>
                        <tr>
                            <td>No Projects.</td>
                            <td><a href="project_add.php">Create New Project</a></td>
                        </tr>
                    <?php endif;?>
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
                    <?php while($row = mysql_fetch_assoc($forms)):?>
                        <tr>
                            <td><a href="form_detail.php?formId=<?php echo $row['form_id']; ?>"><?php echo $row['FormName']; ?></a></td>
                            <td style="color: #d9534f;"><?php echo $row['FormName']; ?></td>
                        </tr>
                    <?php endwhile;?>
                    <?php if(mysql_num_rows($forms) == 0):?>
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

    <iframe name="formSubFrame" style="display:none;" id="iframSub" onload="subComp()"></iframe>
</div>
<?php
    incFooter();
?>