<?php
    /*
     * Name: Award Detail
    * Description:
    *     This page allows users to view detailed information about an award.
    * Arguments:
    *     $_GET['awardId']   - The id of the award you are viewing.
    * Modifications:
    *     11/09/2014 - Created file.
    *     12/11/2014 - Created Comments.
    */
    /*--- Include neccessary files ---*/
    include("function/headerfooter.php");
    include_once("function/awards.php");
    /*--- END: Include neccessary files ---*/
    
    //Generate standard header.
    incHeader('MSEF | Award');

    /* --- Params --- */
    $awardId = $_GET['awardId'];
    /* --- END: Params --- */

    /* --- Queries --- */
    $qryAward = mysql_fetch_assoc(getAward($awardId));
    $suggested = getSuggestedProjects($awardId);
    /* --- END: Queries ---*/
    
    /* --- Security --- */
    /* --- END: Security --- */
?>
<!-- Used to display messages after editing an award. -->
<?php if(isset($_GET['message'])):?>
    <div style="margin-bottom:20px;min-height:40px;text-align:center;" class="bg-success col-md-3 col-md-offset-5">
        <?php echo $_GET['message']; ?>
    </div>
<?php endif;?>

<div class="col-lg-12">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="display:inline-block">Award Information</h3><a href="award_edit.php?awardId=<?php echo $awardId;?>" class="staff"><i style="float:right" class="fa fa-pencil-square-o fa-2x"></i></a>
            </div>

            <div class="panel-body">
                <dl class="dl-horizontal">
                    <dt>Name</dt>
                    <dd><?php echo $qryAward['Name']; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Description</dt>
                    <dd><?php echo $qryAward['Description']; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Reward</dt>
                    <dd><?php echo $qryAward['Reward']; ?></dd>
                </dl>
            </div>
        </div>
        <div class="panel panel-default staff">
            <div class="panel-heading">
                <h3 class="panel-title" style="display:inline-block">Possible Project Canadites</h3>
            </div>

            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Project Name</th>
                            <th>Project Description</th>
                            <th>Project Abstract</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysql_fetch_assoc($suggested)): ?>
                            <tr>
                                <td><?php echo $row['Name']; ?></td>
                                <td><?php echo $row['Description']; ?></td>
                                <td><?php echo $row['Abstract']; ?></td>
                                <td><?php echo $row['MatchRating']; ?></td>
                            </tr>
                        <?php endwhile;?>
                        <?php if(mysql_num_rows($suggested) == 0):?>
                            <tr>
                                <td colspan="3">No projects found</td>
                            </tr>
                       <?php endif;?>
                    </tbody>
                            
                </table>
            </div>
        </div>
    </div>
</div>
<?php
    //Get standard footer.
    incFooter();
?>