<?php
    include("function/event.php");
	date_default_timezone_set('UTC');
    /*---- Variables ----*/
    $eventName         = $_POST['eventName'];
	$startDate         = $_POST['startDate'];
	$startTime         = $_POST['startTime'];
	$endDate           = $_POST['endDate'];
	$endTime           = $_POST['endTime'];
	$description       = $_POST['description'];
	$location          = $_POST['location'];
	
	$startDate .= " ".$startTime;
	$endDate .= " ".$endTime;
	//$endDAte = date("Y-m-d H:i:s", $endDate .= $endTime).ToString();
    /* Validation */
    //First Name
    $result = validate($eventName,$startDate,$endDate,$description, $location);
    /* END: Validation */
    if(empty($result))
    {
        /* Do insert */
       createEvent($eventName,$startDate,$endDate,$description, $location);
	   if(mysql_error()){
	       array_push($result, array('Message' => mysql_error(), 'type' => 'error'));
	   } else {
       	   array_push($result, array('SuccessURL' => 'event_list.php?message=Successfully+Created+Project', 'type' => 'success'));
	   }
    }

    echo json_encode($result);
?>