<?php
    include("function/headerfooter.php");
    incHeader('MSEF | Events', '', 'form.js');
    
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
                <h3 class="panel-title" style="display:inline-block">Event Information</h3>
            </div>

            <div class="panel-body">
                <form style="padding-top: 10px;" action="event_create_action.php" method="post" enctype="multipart/form-data" id="newFormfrm" target="formSubFrame" onsubmit="formSubmit()">
                    <div class="form-group">
                        <dl class="dl-horizontal">
                            <dt>Name</dt>
                            <dd><input type="text" class="form-control" name="eventName" placeholder="Event Name"></dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <dl class="dl-horizontal">
                            <dt>Start Date</dt>
                               <dd><input type="datetime" class="form-control" name="startDate" placeholder="Event Name"></dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <dl class="dl-horizontal">
                            <dt>End Date</dt>
                            <dd><input type="datetime" class="form-control" name="endDate" placeholder="Event Name"></dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <dl class="dl-horizontal">
                            <dt>Description</dt>
                            <dd><input type="text" class="form-control" name="description" placeholder="Event Name"></dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <dl class="dl-horizontal">
                            <dt>Location</dt>
                            <dd><input type="text" class="form-control" name="location" placeholder="Event Name"></dd>
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