<?php
    /**
     * Name: Browse events
     * Description:
     *     This page gives a way for all users to view a calender of events.
     * Arguments:
     *     None
     * Modifications:
     *     11/09/2014 - Created file.
     *     12/12/2014 - Created Comments.
     */

    ///Include necessary files
    include("function/headerfooter.php");
    include("function/event.php");
    
    ///Create default header, and include the calender component files.
    incHeader('MSEF | Events','', 'moment.min.js,fullcalendar.js');

    /** --- Params --- */
    /** --- END: Params --- */

    /** --- Queries --- */
    $qryEvents = getEvents();
    /** --- END: Queries ---*/
    
    /** --- Security --- */
    /** --- END: Security --- */
?>
<!-- Script -->
<script type="text/javascript">
    $(document).ready(function() {
        ///Creates the calender for viewing events.
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            height: 600,
            defaultDate:  '<?php echo date("Y-m-d");?>',
            editable: false,
            eventLimit: true, /// allow "more" link when too many events
            events: [
                <?php $count = 0;?>
                <?php while($row = mysql_fetch_assoc($qryEvents)):?>
                    {
                        title: '<?php echo $row['Name']; ?>',
                        start: '<?php echo $row['StartDate'];?>',
                        end: '<?php echo $row['EndDate'];?>',
                        url: 'event_detail.php?eventId=<?php echo $row['Id'];?>'
                    }
                    <?php $count = $count + 1;?>
                    <?php if($count != mysql_num_rows($qryEvents)):?>
                        ,
                    <?php endif; ?>
                <?php endwhile;?>
            ]
        });
    });
</script>
<!-- END: Script -->
<div class="col-lg-12">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="display:inline-block">Events</h3>
            </div>

            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Location</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(mysql_num_rows($qryEvents) == 0):?>
                            <tr>
                                <td colspan="3">There aren't currently any events.</td>
                            </tr>
                        <?php else:?>
                            <?php mysql_data_seek($qryEvents, 0);
                              while($row = mysql_fetch_assoc($qryEvents)):?>
                                <tr>
                                    <td><?php echo $row['Name']; ?></td>
                                    <td><?php echo $row['Description']; ?></td>
                                    <td><?php echo $row['Location']; ?></td>
                                </tr>
                            <?php endwhile;?>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="display:inline-block">Calender</h3>
            </div>

            <div class="panel-body">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>
<?php
    ///Create default footer.
    incFooter();
?>