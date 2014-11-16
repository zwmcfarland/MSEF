<?php
    include("function/headerfooter.php");
    incHeader('MSEF | Awards', '', 'form.js');
    
    /* --- Queries --- */
    /* --- END: Queries ---*/
    
    /* --- Security --- */
    /* --- END: Security --- */ 
?>

<!-- Script -->
    <script>
        $(window).bind('beforeunload', function(e){
            return "All unsaved data will be lost:";
        });

        $("#keywordTg").select2({tags:["red", "green", "blue"]});
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
                <form style="padding-top: 10px;" action="form_create_action" method="post" enctype="multipart/form-data" id="newFormfrm" target="formSubFrame" onsubmit="formSubmit()">
                    <div class="form-group">
                        <dl class="dl-horizontal">
                            <dt>Name</dt>
                            <dd><input type="text" class="form-control" name="FormName" placeholder="Award Name"></dd>
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
                                <input type="hidden" name="Keywords" id="keywordTg">
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