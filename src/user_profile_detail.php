<?php
    include("function/headerfooter.php");
    include("function/user.php");
    incHeader('MSEF | Home');
    
    /* --- Queries --- */
    $userInfo = mysql_fetch_assoc(getUserInformation($_SESSION['user_email']));
    /* --- END: Queries ---*/
    
    /* --- Security --- */
    /* --- END: Security --- */
?>
<div class="col-lg-12">
    <!-- Users Detials -->
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Profile Information</h3>
            </div>

            <div class="panel-body">
                <dl class="dl-horizontal">
                    <dt>First Name</dt>
                    <dd><?php echo $userInfo['FirstName']; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last Name</dt>
                    <dd><?php echo $userInfo['LastName']; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>School</dt>
                    <dd>Louisville Public School</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Address</dt>
                    <dd>
                        <address>
                            123 ABC St.<br>
                            Omaha, NE 68037<br>
                        </address>
                    </dd>
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
                        <td><a href="#">Volcano</a></td>
                        <td>Abstract</td>
                        <td>
                            <a href="#">Joe</a>
                            <a href="#">Bob</a>
                            <a href="#">Tim</a>
                        </td>
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
                        <td>Science Fair Entry Form</td>
                        <td>Form required to participate in the science fair.</td>
                        <td style="color: #d9534f;">Required</td>
                    </tr>
                    <tr>
                        <td>Live Animal Form</td>
                        <td>Form required to use live animals in your project.</td>
                        <td style="color: #5cb85c;">Complete</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END: Project Detials -->
</div>
<?php
    incFooter();
?>