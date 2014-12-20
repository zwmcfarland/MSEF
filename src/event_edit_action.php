<?php
	/**
	 * Name: Event Edit Action
	 * Description:
	 *     This page is a system page used as the action page for event_edit form.
	 * Arguments:
	 *     $_POST['EventId']     - Id of the event you are editing
	 *     $_POST['eventName']   - Name of the event
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

	//Include necessary files
    include("function/event.php");
    date_default_timezone_set('UTC');

    /**---- Variables ----*/
    $result            = array();
    $eventId           = $_POST['EventId'];
    $eventName         = $_POST['EventName'];
    $startDate         = $_POST['StartDate'];
    $startTime         = $_POST['StartTime'];
    $endDate           = $_POST['EndDate'];
    $endTime           = $_POST['EndTime'];
    $description       = $_POST['Description'];
    $location          = $_POST['Location'];
    $startDate        .= " ".$startTime;
    $endDate          .= " ".$endTime;
    /**--- END: Variables ---*/

    /** Validation */
    //First Name
    $result = validate_event($eventName,$startDate,$endDate,$description, $location);
    /** END: Validation */

    //Passed validation
    if(empty($result))
    {
        /** Update event in database. */
       updateEvent($eventId, $eventName,$startDate,$endDate,$description, $location);
       if(mysql_error()){
           array_push($result, array('Message' => mysql_error(), 'type' => 'error'));
       } 
       else {
           array_push($result, array('SuccessURL' => 'event_detail.php?eventId=' . $eventId . '&message=Successfully+Updated+Event', 'type' => 'success'));
       }
    }

    //Return results array, in json format
    echo json_encode($result);
?>