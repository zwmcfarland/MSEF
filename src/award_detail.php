<?php
    include("function/headerfooter.php");
    include("function/user.php");
    incHeader('MSEF | Home');
    
    /* --- Queries --- */
    /* --- END: Queries ---*/
    
    /* --- Security --- */
    /* --- END: Security --- */
?>
<div class="col-lg-12">
    <!-- Users Detials -->
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="display:inline-block">Award Information</h3><a><i style="float:right" class="fa fa-pencil-square-o fa-2x"></i></a>
            </div>

            <div class="panel-body">
                <dl class="dl-horizontal">
                    <dt>Name</dt>
                    <dd>Award 1</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Description</dt>
                    <dd>McFarland</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Reward</dt>
                    <dd>Louisville Public School</dd>
                </dl>
            </div>
        </div>
    </div>
    <!-- END: Users Detials -->

   
</div>
<?php
    incFooter();
?>