<?php
    include("function/headerfooter.php");
    include_once("function/categories.php");
    include_once("function/keywords.php");
    incHeader('MSEF | Categories', '', 'form.js');
    
    $categoryId = $_GET['category_id'];
    
    /* --- Queries --- */
    $qryCategory = mysql_fetch_assoc(getCategories($categoryId));
    $qryKeywords = getKeywords();
    $qryCategoryKeywords = getCategoryKeywords($categoryId);
    /* --- END: Queries ---*/
    
    /* --- Security --- */
    /* --- END: Security --- */ 
?>

<!-- Script --> 
    <script>
        var keywords = [
            <?php $count = 0;?>
            <?php while($row = mysql_fetch_assoc($qryKeywords)): ?>
                {text: '<?php echo $row['Keyword'];?>'}
                <?php $count = $count + 1?>
                <?php if($count != mysql_num_rows($qryKeywords)):?>
                    ,
                <?php endif;?>
            <?php endwhile; ?>
        ];
        var preload_data = [
            <?php $count = 0;?>
            <?php while($row = mysql_fetch_assoc($qryCategoryKeywords)): ?>
                { text: '<?php echo $row['keyword'];?>'}
                <?php $count = $count + 1?>
                <?php if($count != mysql_num_rows($qryCategoryKeywords)):?>
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
    <!-- Form Detials -->
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="display:inline-block">Category Information</h3>
            </div>

            <div class="panel-body">
                <form style="padding-top: 10px;" action="category_edit_action.php" method="post" enctype="multipart/form-data" id="newFormfrm" target="formSubFrame" onsubmit="formSubmit()">
                    <input type="hidden" name="CategoryId" value="<?php echo $categoryId; ?>">
                    <div class="form-group">
                        <dl class="dl-horizontal">
                            <dt>Name</dt>
                            <dd><input type="text" class="form-control" name="CategoryName" placeholder="Category Name" value="<?php echo $qryCategory['Name']; ?>"></dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <dl class="dl-horizontal">
                            <dt>Description</dt>
                            <dd><textarea class="form-control" name="Description" placeholder="Category Description"><?php echo $qryCategory['Description']; ?></textarea></dd>
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