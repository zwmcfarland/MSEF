<?php
    /**
     * Name: Event Create Action
     * Description:
     *     This page is a system page used as the action page for event_create form.
     * Arguments:
     *     $_POST['eventName']   - Name of the new event
     *     $_POST['startDate']   - Start date of the event
     *     $_POST['startTime']   - Start time of the event
     *     $_POST['endDate']     - End date of the event
     *     $_POST['endTime']     - End time of the event
     *     $_POST['description'] - Description of the event
     *     $_POST['location']    - Location of the event
     * Modifications:
     *     11/09/2014 - Created file.
     *     12/12/2014 - Created Comments.
     */

    ///Include necessary files
    include("function/event.php");
    date_default_timezone_set('UTC');

    /**---- Variables ----*/
    $result            = array();
    $eventName         = $_POST['eventName'];
    $startDate         = $_POST['startDate'];
    $startTime         = $_POST['startTime'];
    $endDate           = $_POST['endDate'];
    $endTime           = $_POST['endTime'];
    $description       = $_POST['description'];
    $location          = $_POST['location'];
    $startDate        .= " ".$startTime;
    $endDate          .= " ".$endTime;
    /**--- END: Variables ---*/

    /** Validation */
    $result = validate_event($eventName,$startDate,$endDate,$description, $location);
    /** END: Validation */

    ///If passed validation
    if(empty($result))
    {
        /** Create event record in database. */
       $eventId = createEvent($eventName,$startDate,$endDate,$description, $location);
       if(mysql_error()){
           array_push($result, array('Message' => mysql_error(), 'type' => 'error'));
       } else {
              array_push($result, array('SuccessURL' => 'event_detail.php?eventId=' . $eventId . '&message=Successfully+Created+Event', 'type' => 'success'));
       }
    }

    ///Return results array in json format
    echo json_encode($result);
?>