<?php
    /*
     * Name: Event Create
     * Description:
     *     This page allows staff members to create events.
     * Arguments:
     *     None
     * Modifications:
     *     11/09/2014 - Created file.
     *     12/12/2014 - Created Comments.
     */

    //Include necessary files.
    include("function/headerfooter.php");

    //Create default header, and include form handler compoent
    incHeader('MSEF | Events', '', 'form.js');
    
    /* --- Queries --- */
    /* --- END: Queries ---*/
    
    /* --- Security --- */
    /* --- END: Security --- */ 
?>

<!-- Script -->
    <script>
        //Shows warning if user trys to leave without saving.
        $(window).bind('beforeunload', function(e){
            return "All unsaved data will be lost:";
        });
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
                            <dt>Description</dt>
                            <dd><textarea class="form-control" name="location" placeholder="Event Description"></textarea></dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <dl class="dl-horizontal">
                            <dt>Location</dt>
                            <dd><textarea class="form-control" name="location" placeholder="Event Location"></textarea></dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <dl class="dl-horizontal">
                            <dt>Start Date</dt>
                               <dd>
                                   <div class="form-inline">
                                       <input type="date" class="form-control" name="startDate">
                                       <input type="time" class="form-control" name="startTime">
                                   </div>
                               </dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <dl class="dl-horizontal">
                            <dt>End Date</dt>
                            <dd>
                                <div class="form-inline">
                                    <input type="date" class="form-control" name="endDate">
                                    <input type="time" class="form-control" name="endTime">
                                </div>
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
    //Create default footer.
    incFooter(); 
?>