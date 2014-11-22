<?php
    include("function/headerfooter.php");
    include("function/awards.php");
    include("function/keywords.php");
    incHeader('MSEF | Award');

    /* --- Params --- */
    $awardId = $_GET['awardId'];
    /* --- END: Params --- */

    /* --- Queries --- */
    $qryAward = mysql_fetch_assoc(getAward($awardId));
    $qryKeywords = getAwardKeywords($awardId);
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
    </div>
</div>
<?php
    incFooter();
?>