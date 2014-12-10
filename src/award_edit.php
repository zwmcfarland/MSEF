<?php
    include("function/headerfooter.php");
    include("function/awards.php");
    include("function/keywords.php");
    incHeader('MSEF | Award', '', 'form.js');

    /* --- Params --- */
    $awardId = $_GET['awardId'];
    /* --- END: Params --- */

    /* --- Queries --- */
    $qryAward = mysql_fetch_assoc(getAward($awardId));
    $qryKeywords = getKeywords();
    $qryAwardKeywords = getAwardKeywords($awardId);
    /* --- END: Queries ---*/
    
    /* --- Security --- */
    /* --- END: Security --- */
?>
<!-- Script --> 
    <script>
        var keywords = [
            <?php $count = 0;?>
            <?php while($row = mysql_fetch_assoc($qryKeywords)): ?>
                { text: '<?php echo $row['Keyword'];?>'}
                <?php $count = $count + 1?>
                <?php if($count != mysql_num_rows($qryKeywords)):?>
                    ,
                <?php endif;?>
            <?php endwhile; ?>
        ];
        var preload_data = [
            <?php $count = 0;?>
            <?php while($row = mysql_fetch_assoc($qryAwardKeywords)): ?>
                { text: '<?php echo $row['keyword'];?>'}
                <?php $count = $count + 1?>
                <?php if($count != mysql_num_rows($qryAwardKeywords)):?>
                    ,
                <?php endif;?>
            <?php endwhile; ?>
        ]; 
        $(window).bind('beforeunload', function(e){
            return "All unsaved data will be lost:";
        });

        $(document).on('ready', function() {
            $("#keywordTg").select2({
                multiple: true,
                tags: keywords
            });
            $('#keywordTg').select2('data', preload_data);
        });
    </script>
<!-- END: Script -->
<div class="col-lg-12">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="display:inline-block">Award Information</h3>
            </div>

            <div class="panel-body">
                <form style="padding-top: 10px;" action="award_edit_action.php" method="post" enctype="multipart/form-data" target="formSubFrame" onsubmit="formSubmit()">
                    <input type="hidden" name="AwardId" value="<?php echo $awardId; ?>">
                    <dl class="dl-horizontal">
                        <dt>Name</dt>
                        <dd><input type="text" name="AwardName" value="<?php echo $qryAward['Name']; ?>" placeholder="Award Name" class="form-control"/></dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>Description</dt>
                        <dd><textarea name="Description" placeholder="Award Description" class="form-control"><?php echo $qryAward['Description']; ?></textarea></dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>Reward</dt>
                        <dd><textarea name="Reward" placeholder="Award Description" class="form-control"><?php echo $qryAward['Reward']; ?></textarea></dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>Keywords</dt>
                        <dd><input type="text" name="Keywords" id="keywordTg" style="width:100%;"></dd>
                    </dl>
    
                    <div class="form-group" align="center">
                        <button type="button" onclick="window.location='award_detail.php?awardId=<?php echo $awardId;?>';" class="btn">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <iframe name="formSubFrame" style="display:none;" id="iframSub" onload="subComp()"></iframe>
</div>
<?php
    incFooter();
?>