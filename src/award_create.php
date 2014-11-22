<?php
    include_once("function/headerfooter.php");
    include_once("function/keywords.php");
    incHeader('MSEF | Awards', '', 'form.js');
    
    /* --- Queries --- */
    $qryKeywords = getKeywords();
    /* --- END: Queries ---*/
    
    /* --- Security --- */
    /* --- END: Security --- */ 
?>

<!-- Script --> 
    <script>
        var keywords = [
            <?php $count = 0;?>
            <?php while($row = mysql_fetch_assoc($qryKeywords)): ?>
                { id: '<?php echo $row['Id'];?>', text: '<?php echo $row['Keyword'];?>'}
                <?php $count = $count + 1?>
                <?php if($count != mysql_num_rows($qryKeywords)):?>
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
        });
    </script>
<!-- END: Script -->

<div class="col-lg-12">
    <!-- Form Detials -->
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="display:inline-block">Award Information</h3>
            </div>

            <div class="panel-body">
                <form style="padding-top: 10px;" action="award_create_action.php" method="post" enctype="multipart/form-data" id="newFormfrm" target="formSubFrame" onsubmit="formSubmit()">
                    <div class="form-group">
                        <dl class="dl-horizontal">
                            <dt>Name</dt>
                            <dd><input type="text" class="form-control" name="AwardName" placeholder="Award Name"></dd>
                        </dl>
                    </div>

                    <div class="form-group">
                        <dl class="dl-horizontal">
                            <dt>Description</dt>
                            <dd>
                               <textarea class="form-control" name="Description" placeholder="Award Description"></textarea>
                            </dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <dl class="dl-horizontal">
                            <dt>Reward</dt>
                            <dd><textarea class="form-control" name="Reward" placeholder="Reward"></textarea></dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <dl class="dl-horizontal">
                            <dt title="Used to nominate projects for awards.">Keywords</dt>
                            <dd>
                                <input type="text" name="Keywords" id="keywordTg" style="width:100%;">
                            </dd>
                        </dl>
                    </div>
                    <div class="form-group" align="center">
                        <button type="button" onclick="window.location='index.php';" class="btn">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END: Form Details -->
   <iframe name="formSubFrame" style="display:none;" id="iframSub" onload="subComp()"></iframe>
</div>
<?php
    incFooter(); 
?>