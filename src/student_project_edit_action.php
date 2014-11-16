<?php
    include("function/project.php");

    /*---- Variables ----*/
    $result = array();

    $name        = $_POST['Name'];
	$projectId        = $_POST['ProjectID'];

    
    
    /* Validation */
    //First Name
    if(empty($name) || $name == NULL) {
        array_push($result, array('Message' => 'A project Name is required.', 'Element' => 'Name', 'type' => 'error'));
    }
    /* END: Validation */
    if(empty($result))
    {
        /* Do update */
       updateProject($projectId, $name);
       array_push($result, array('SuccessURL' => 'student_project_detail.php?userId=' . $projectId . '&message=Successfully+Updated+Profile', 'type' => 'success'));
    }

    echo json_encode($result);
?>