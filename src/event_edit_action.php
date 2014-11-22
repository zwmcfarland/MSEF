<?php
    include("function/event.php");
    date_default_timezone_set('UTC');
    /*---- Variables ----*/
    $result            = array();
    $eventId           = $_POST['EventId'];
    $eventName         = $_POST['EventName'];
    $startDate         = $_POST['StartDate'];
    $startTime         = $_POST['StartTime'];
    $endDate           = $_POST['EndDate'];
    $endTime           = $_POST['EndTime'];
    $description       = $_POST['Description'];
    $location          = $_POST['Location'];
    
    $startDate .= " ".$startTime;
    $endDate .= " ".$endTime;

    /* Validation */
    //First Name
    $result = validate($eventName,$startDate,$endDate,$description, $location);
    /* END: Validation */
    if(empty($result))
    {
        /* Do insert */
       updateEvent($eventId, $eventName,$startDate,$endDate,$description, $location);
       if(mysql_error()){
           array_push($result, array('Message' => mysql_error(), 'type' => 'error'));
       } 
       else {
           array_push($result, array('SuccessURL' => 'event_detail.php?eventId=' . $eventId . '&message=Successfully+Updated+Event', 'type' => 'success'));
       }
    }

    echo json_encode($result);
?>