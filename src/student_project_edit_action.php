<?php
    include("function/project.php");

    /*---- Variables ----*/
    

	$projectId        = $_POST['ProjectId'];
    $ProjectName        = $_POST['ProjectName'];
	$description        = $_POST['Description'];
	$abstract        = $_POST['Abstract'];
	$electrical        = false;
	if(isset($_POST['Electrical'])){
		$electrical = true;
	}
    
    /* Validation */
    //First Name
    $result = validate($ProjectName,$description,$abstract,$electrical);
    /* END: Validation */
    if(empty($result))
    {
        /* Do update */
       updateProject($projectId, $ProjectName,$description,$abstract,$electrical);
	   if(mysql_error()){
	       array_push($result, array('Message' => mysql_error(), 'type' => 'error'));
	   }
       array_push($result, array('SuccessURL' => 'student_project_detail.php?projectId=' . $projectId . '&message=Successfully+Updated+Project', 'type' => 'success'));
    }

    echo json_encode($result);
?>