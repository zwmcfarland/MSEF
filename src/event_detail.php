<?php
    include("function/headerfooter.php");
    include("function/event.php");
    incHeader('MSEF | Event');

    /* --- Params --- */
    $eventId = $_GET['eventId'];
    /* --- END: Params --- */

    /* --- Queries --- */
    $qryEvent = mysql_fetch_assoc(getEvents($eventId));
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
                <h3 class="panel-title" style="display:inline-block">Event Information</h3><a href="event_edit.php?eventId=<?php echo $eventId;?>" class="staff"><i style="float:right" class="fa fa-pencil-square-o fa-2x"></i></a>
            </div>

            <div class="panel-body">
                <dl class="dl-horizontal">
                    <dt>Name</dt>
                    <dd><?php echo $qryEvent['Name']; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Description</dt>
                    <dd><?php echo $qryEvent['Description']; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Location</dt>
                    <dd><?php echo $qryEvent['Location']; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Start Date</dt>
                    <dd><?php echo $qryEvent['StartDate']; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>End Date</dt>
                    <dd><?php echo $qryEvent['EndDate']; ?></dd>
                </dl>
            </div>
        </div>
    </div>
</div>
<?php
    incFooter();
?>