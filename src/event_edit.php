<?php
    /*
     * Name: Event Edit
     * Description:
     *     This page allows staff members to edit existing events.
     * Arguments:
     *     $_GET['eventId'] - Id of the event staff is editing.
     * Modifications:
     *     11/09/2014 - Created file.
     *     12/12/2014 - Created Comments.
     */

	//Include necessary files.
    include("function/headerfooter.php");
    include("function/event.php");

    //Create default header, and include form handler component.
    incHeader('MSEF | Event', '', 'form.js');

    /* --- Params --- */
    $eventId = $_GET['eventId'];
    /* --- END: Params --- */

    /* --- Queries --- */
    $qryEvent = mysql_fetch_assoc(getEvents($eventId));
    /* --- END: Queries ---*/

    /* --- Security --- */
    /* --- END: Security --- */
?>
<!-- Script --> 
    <script>
        //Display a warning if user trys to leave page before saving changes.
        $(window).bind('beforeunload', function(e){
            return "All unsaved data will be lost:";
        });
    </script>
<!-- END: Script -->
<div class="col-lg-12">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="display:inline-block">Event Information</h3>
            </div>
            <div class="panel-body">
                <form style="padding-top: 10px;" action="event_edit_action.php" method="post" enctype="multipart/form-data" target="formSubFrame" onsubmit="formSubmit()">
                    <input type="hidden" name="EventId" value="<?php echo $eventId; ?>">
                    <dl class="dl-horizontal">
                        <dt>Name</dt>
                        <dd><input type="text" name="EventName" value="<?php echo $qryEvent['Name']; ?>" placeholder="Award Name" class="form-control"/></dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>Description</dt>
                        <dd><textarea name="Description" placeholder="Event Description" class="form-control"><?php echo $qryEvent['Description']; ?></textarea></dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>Location</dt>
                        <dd><textarea name="Location" placeholder="Event Description" class="form-control"><?php echo $qryEvent['Location']; ?></textarea></dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>Start Date</dt>
                        <dd>
                            <div class="form-inline">
                                <input type="date" name="StartDate" value="<?php echo date('Y-m-d',strtotime($qryEvent['StartDate'])); ?>" class="form-control">
                                <input type="time" name="StartTime" value="<?php echo date('H:i:s',strtotime($qryEvent['StartDate'])); ?>" class="form-control">
                            </div>
                        </dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>End Date</dt>
                        <dd>
                            <div class="form-inline">
                                <input type="date"  name="EndDate" value="<?php echo date('Y-m-d',strtotime($qryEvent['EndDate'])); ?>" class="form-control">
                                <input type="time" name="EndTime" value="<?php echo date('H:i:s',strtotime($qryEvent['EndDate'])); ?>" class="form-control">
                            <div class="form-inline">
                        </dd>
                    </dl>
                    
                    <div class="form-group" align="center">
                        <button type="button" onclick="window.location='event_detail.php?eventId=<?php echo $eventId;?>';" class="btn">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div> 
                </form>
            </div>
        </div>
    </div>
    <iframe name="formSubFrame" style="display:none;" id="iframSub" onload="subComp()"></iframe>
</div>
<?php
    //Create default footer.
    incFooter();
?>