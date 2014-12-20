<?php
    /**
     * Name: Category Create
     * Description:
     *     This page is used by staff to create categories.
     * Arguments:
     *     None
     * Modifications:
     *     11/09/2014 - Created file.
     *     12/12/2014 - Created Comments.
     */

	///Include necessary files.
    include("function/headerfooter.php");
    include_once("function/keywords.php");

    ///Create standard header, and include form handler
    incHeader('MSEF | Categories', '', 'form.js');
    
    /** --- Queries --- */
    $qryKeywords = getKeywords();
    /** --- END: Queries ---*/
    
    /** --- Security --- */
    /** --- END: Security --- */ 
?>

<!-- Script -->
    <script>
       ///Populates a list of pre-existing keywords
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
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="display:inline-block">Category Information</h3>
            </div>

            <div class="panel-body">
                <form style="padding-top: 10px;" action="category_create_action.php" method="post" enctype="multipart/form-data" id="newFormfrm" target="formSubFrame" onsubmit="formSubmit()">
                    <div class="form-group">
                        <dl class="dl-horizontal">
                            <dt>Name</dt>
                            <dd><input type="text" class="form-control" name="CategoryName" placeholder="Category Name"></dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <dl class="dl-horizontal">
                            <dt>Description</dt>
                            <dd><textarea class="form-control" name="Description" placeholder="Category Description"></textarea></dd>
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
    ///Create stadard footer.
    incFooter(); 
?>