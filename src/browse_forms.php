<?php
    include("function/headerfooter.php");
    include("function/form.php");
    incHeader('MSEF | Award');

    /* --- Params --- */
    /* --- END: Params --- */

    /* --- Queries --- */
    $qryAward = getForms();
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
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="display:inline-block">Awards</h3>
            </div>

            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysql_fetch_assoc($qryAward)):?>
                            <tr>
                                <td><?php echo $row['Name']; ?></td>
                                <td>
                                    <a href="form_detail.php?formId=<?php echo $row['Id']; ?>">View</a>
                                </td>
                            </tr>
                        <?php endwhile;?>
                        <?php if(mysql_num_rows($qryAward) == 0):?>
                            <tr>
                                <td colspan="2">There aren't currently any forms</td>
                            </tr>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
    incFooter();
?>