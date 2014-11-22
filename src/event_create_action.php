<?php
    include("function/event.php");
    date_default_timezone_set('UTC');
    /*---- Variables ----*/
    $result            = array();
    $eventName         = $_POST['eventName'];
    $startDate         = $_POST['startDate'];
    $startTime         = $_POST['startTime'];
    $endDate           = $_POST['endDate'];
    $endTime           = $_POST['endTime'];
    $description       = $_POST['description'];
    $location          = $_POST['location'];
    
    $startDate .= " ".$startTime;
    $endDate .= " ".$endTime;

    /* Validation */
    $result = validate($eventName,$startDate,$endDate,$description, $location);
    /* END: Validation */

    if(empty($result))
    {
        /* Do insert */
       $eventId = createEvent($eventName,$startDate,$endDate,$description, $location);
       if(mysql_error()){
           array_push($result, array('Message' => mysql_error(), 'type' => 'error'));
       } else {
              array_push($result, array('SuccessURL' => "event_detail.php?eventId=<?php echo $eventId; ?>&message=Successfully+Created+Event", 'type' => 'success'));
       }
    }

    echo json_encode($result);
?>